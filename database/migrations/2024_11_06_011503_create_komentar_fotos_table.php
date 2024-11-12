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
        Schema::create('komentar_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foto_id')->constrained(table: 'fotos',indexName: 'koementarfoto_id');
            $table->foreignId('user_id')->constrained(table: 'users',indexName: 'komentar_user_id');
            $table->string('isi_komentar');
            $table->date('tanggal_komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_fotos');
    }
};
