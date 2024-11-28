<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $photoId){
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
        ]);
    
        KomentarFoto::create([
            'foto_id' => $photoId,
            'user_id' => auth()->id(),
            'isi_komentar' => $request->isi_komentar,
            'tanggal_komentar' => now(),
        ]);
    
        // Redirect kembali ke halaman yang sama agar data terbaru langsung muncul
        return redirect()->back();
    }
}
