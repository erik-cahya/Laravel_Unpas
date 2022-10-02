<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Login
// ->name('login') : adalah sebuah penamaan route yang digunakan untuk redirect 
// untuk mengubah nama routenya, bisa dilakukan di app\Http\Middleware\Authenticate.php,line 19
// secara default, jika gagal login middleware akan membawa ke link /home, untuk mengubahnya, bisa dilakukan di Providers/RouteServiceProvider, line 21
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// untuk dapat mencari post berdasarkan slug, harus memberikan getRouteKeyName() pada model post
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// except : untuk mengecualikan suatu method pada controller, contoh disini kita tidak menggunakan method show, jadi dikecualikan agar tidak digunakan
// middlware('is_admin') : adalah sebuah middleware yang kita buat sendiri, untuk membuatnya bisa menggunakan perintah artisan | php artisan make:middleware IsAdmin
// setelah membuat middleware, kita harus mendaftarkan middleware tersebut ke Kernel.php pada bagian line 67
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');




 



