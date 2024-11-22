<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('judul_foto');
            $table->string('deskripsi_foto');
            $table->date('tanggal_unggah')->default(now());
            $table->string('lokasi_file');
            $table->foreignId('album_id')->constrained(table: 'albums',indexName: 'foto_album_id');
            $table->foreignId('user_id')->constrained(table: 'users',indexName: 'foto_user_id');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
