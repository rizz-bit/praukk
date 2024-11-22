<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        return view('album.index');
    }

    public function store(Request $request){
        if(!Auth::check()){
            return redirect()->route('login')->withErrors('Please login dulu');
        }

        $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
            'tanggal_dibuat' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('album_images','public');

       $album = Album::create([
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'tanggal_dibuat' => now()   ,
            'photo' => $path,
            'user_id' => Auth::user()->id,
        ]);

        // dd($album);

        return redirect()->route('album.show', auth()->user()->id)->with('success', 'Album created successfully');

    }
}
