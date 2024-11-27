<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    use HasFactory;
    protected $fillable = ['foto_id', 'user_id','tanggal_like'];
    protected $table = 'like_fotos';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id');
    }   

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->tanggal_like = now(); // Mengisi tanggal saat record dibuat
        });
    }
}
