<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AddFotoController extends Controller
{
    public function index($id)
    {
        $albums = Album::with('user')->where('user_id',$id)->get(); 
        return view('addimage.index',compact('albums'));
    }

    public function store(Request $request){
    }
}
