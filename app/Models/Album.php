<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'nama_album',
        'deskripsi',
        'tanggal_dibuat',
        'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
