<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// akan menampilkan halaman view about
Route::get('/about', function () {
    return view('about', [
        "name" => "Erik Cahya Pradana",
        "email" => "erikcp38@gmail.com",
        "image" => "avatar.png",
        "title" => "About"
    ]);
});

// akan menampilkan halaman posts
Route::get('/blog', [PostController::class, 'index']);

// Akan menampilkan single post
// post:slug : akan mencari slug dari post yang dipilih 
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// akan menampilkan halaman view categories
Route::get('/categories', function () {
    return view('categories', [
        "title" => "Post Categories",
        "active" => "categories",
        "categories" => Category::all()
    ]);
});
