<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.index', [
            'title' => 'Register Page'
        ]);
    }
    public function store(Request $request)
    {
        // return request()->all();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|min:5|max:255'
        ]);

        // 2 metode untuk hash password
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('flash-regis', 'Registration Successfully');
        return redirect('login')->with('flash-regis', 'Registration Successfully');
    }
}
