<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2024',
            'body' => 'required'
         ]);

        //  jika user mengupload sebuah gambar
         if($request->file('image')){
            // untuk upload gambar
            // agar file gambar bisa diakses oleh public, maka harus mengetikkan perintah artisan berikut : php artisan storage:link
            $validatedData['image'] = $request->file('image')->store('post-images');
         }

        //  untuk mengambil data user id agar sesuai dengan id yang melakuakn add post
         $validatedData['user_id'] = auth()->user()->id;
        //  untuk melimit karakter / membuat excerpt
        // strip_tags : untuk menghilangkan format html yang ada pada tulisan body
         $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
         
         Post::create($validatedData);
         return redirect('/dashboard/posts')->with('success', 'New Post has been added');   
    }

    public function show(Post $post)
    {
        // validasi agar tidak bisa mengedit/melihat postingan orang lain
        if($post->author->id !== auth()->user()->id) 
        {
            abort(403);
        }
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
        }

    public function edit(Post $post)
    {
        // validasi agar tidak bisa mengedit/melihat postingan orang lain
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }

        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2024',
            'body' => 'required'
         ];

         //  Untuk cek jika tidak ada merubah pada slug dan judul
         if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
         }
         $validatedData = $request->validate($rules);

         //  jika user mengupload sebuah gambar
         if($request->file('image')){
            // untuk upload gambar
            // hapus gambar lama pada local, ketika user mengubah gambar 
            if($post->image){
                Storage::delete($post->image);
            }
            // agar file gambar bisa diakses oleh public, maka harus mengetikkan perintah artisan berikut : php artisan storage:link
            $validatedData['image'] = $request->file('image')->store('post-images');
         }

         //  untuk mengambil data user id
         $validatedData['user_id'] = auth()->user()->id;
        //  untuk melimit karakter / membuat excerpt
        // strip_tags : untuk menghilangkan format html yang ada pada tulisan body
         $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
         
         Post::where('id', $post->id)->update($validatedData);
         return redirect('/dashboard/posts')->with('success', 'New Post has been Updated');
    }

    public function destroy(Post $post)
    {
        // hapus gambar pada local
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
