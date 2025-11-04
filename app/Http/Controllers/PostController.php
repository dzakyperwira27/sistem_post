<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts = \App\Models\Post::with('category', 'tags', 'user')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('posts.index', compact('posts', 'search'));
    }


    public function create()
    {
        $users = \App\Models\User::all();
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();
        return view('posts.create', compact('users', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        $post->tags()->attach($request->tags);
        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = \App\Models\User::all();
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();
        return view('posts.edit', compact('post', 'users', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
