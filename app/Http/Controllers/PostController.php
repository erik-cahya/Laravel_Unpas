<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => Post::all()
            // "with" : digunakan untuk mengatasi masalah n+1 problem | sudah dipindahkan ke model
            // "posts" => Post::with(['author', 'category'])->latest()->get()
            // "withQueryString : agar pagination berjalan pada saat melakukan search
            // paginate() = Untuk membuat pagination 
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
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
