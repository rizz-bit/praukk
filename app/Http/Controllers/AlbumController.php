<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Foto;

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
            'tanggal_dibuat' => now(),
            'photo' => $path,
            'user_id' => Auth::user()->id,
        ]);

        // dd($album);

        return redirect()->route('album.show', ['id' => auth()->user()->id, 'tab' => 'album'])->with('success', 'Album created successfully');

    }

    public function show($id){
        $foto = Foto::with('album')->where('album_id',$id)->get();
        return view('album.show',compact('foto'));
    }

    // public function viewaddfoto(){
    //     $albums = Album::where('user_id', Auth::id())->get();
    //     return view('foto.index',compact('albums'));
    // }

}
