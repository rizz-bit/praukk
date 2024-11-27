<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $photo = Foto::all();
        return view('maincontain.index',compact('photo'));
    }

    public function foto($id){
        $photo = Foto::find($id);
        return view('foto.index',compact('photo'));
    }

}
