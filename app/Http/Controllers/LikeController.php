<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\LikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike($postId)
    {
        $user = Auth::user();
        $post = Foto::find($postId);

        // Cek apakah user sudah melakukan like
        $like = LikeFoto::where('user_id', $user->id)->where('foto_id', $postId)->first();

        if ($like) {
            // Jika sudah di-like, hapus like
            $like->delete();
        } else {
            // Jika belum di-like, tambahkan like
            LikeFoto::create([
                'user_id' => $user->id,
                'foto_id' => $post->id,
                'tanggal_like' => now(),
            ]);
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
