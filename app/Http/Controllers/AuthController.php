<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Invalid login details');  
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        // dd($user);

        return redirect()->back()->with('modal', 'login');
    }
}
