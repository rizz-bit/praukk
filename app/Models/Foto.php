<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $guarded = [
        'judul_foto',
        'deskripsi_foto',
        'user_id',
        'album_id',
        'tanggal_unggah',
        'lokasi_file'
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

}
