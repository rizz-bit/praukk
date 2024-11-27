<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'user_id',
        'album_id',
        'tanggal_unggah',
        'lokasi_file',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->tanggal_unggah = now(); // Mengisi tanggal saat record dibuat
        });
    }

    public function likes()
{
    return $this->hasMany(LikeFoto::class);
}

}
