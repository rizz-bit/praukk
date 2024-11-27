<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddFotoController extends Controller
{
    public function index($id)
    {
        $albums = Album::with('user')->where('user_id',$id)->get(); 
        return view('addimage.index',compact('albums'));
    }

    public function store(Request $request){
        if(!Auth::check()){
            return redirect()->route('login')->withErrors('Please login dulu');
        }

        $request->validate([
            'judul_foto' => 'required',
            'deskripsi_foto' => 'required',
            'tanggal_dibuat' => 'required',
            'album_id' => 'required',
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('lokasi_file')->store('foto_images','public');

       $album = Foto::create([
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto' => $request->deskripsi_foto,
            'tanggal_dibuat' => now(),
            'album_id' => $request->album_id,
            'lokasi_file' => $path,
            'user_id' => Auth::user()->id,
        ]);

        dd($album);

        return redirect()->route('profile', ['id' => auth()->user()->id, 'tab' => 'created'])->with('success', 'Album created successfully');

    }
}
