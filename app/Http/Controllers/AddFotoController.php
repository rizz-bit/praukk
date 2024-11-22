<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddFotoController extends Controller
{
    public function index()
    {
        return view('addimage.index');
    }

    public function store(Request $request){
    }
}
