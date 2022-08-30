<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            "active" => "posts",
            // "posts" => Post::all()
            // "with" : digunakan untuk mengatasi masalah n+1 problem | sudah dipindahkan ke model
            // "posts" => Post::with(['author', 'category'])->latest()->get()
            "posts" => Post::latest()->get()
        ]);
    }

    // public function show($slug)
    // {
    //     return view('post', [
    //         'title' => "Single Post",
    //         "post" => Post::find($slug)
    //     ]);
    // }

    // dengan meggunakan metode model binding 
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
