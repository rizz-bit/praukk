<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Bus;

class KomentarFoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_id',
        'user_id',
        'isi_komentar',
        'tanggal_komentar',
        
    ];


    public function foto():BelongsTo
    {
        return $this->belongsTo(Foto::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->tanggal_komentar = now(); // Mengisi tanggal saat record dibuat
        });
    }
    
}
