<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        // $photo = Foto::all();
        $search = $request->input('search');

        // Jika ada kata kunci pencarian, filter foto berdasarkan nama
        if ($search) {
            $photo = Foto::where('judul_foto','like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua foto
            $photo = Foto::all();
        }

        return view('maincontain.index',compact('photo'));
    }

    public function foto($id){
        $photo = Foto::find($id);
        return view('foto.index',compact('photo'));
    }

}
