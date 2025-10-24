<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Ambil posts beserta tags
        $posts = Post::with('tags')->get();

        return view('posts.index', compact('posts'));
    }
}
