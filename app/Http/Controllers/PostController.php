<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with(['user', 'category', 'tags'])->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();
        return view('posts.create', compact('users', 'categories', 'tags'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $post = \App\Models\Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        $post->tags()->attach($request->tags);
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $users = \App\Models\User::all();
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();
        return view('posts.edit', compact('post', 'users', 'categories', 'tags'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
