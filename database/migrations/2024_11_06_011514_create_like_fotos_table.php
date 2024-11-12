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
        Schema::create('like_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foto_id')->constrained(table: 'fotos',indexName: 'like_foto_id');
            $table->foreignId('user_id')->constrained(table: 'users',indexName: 'like_user_id');
            $table->date('tanggal_like');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_fotos');
    }
};
