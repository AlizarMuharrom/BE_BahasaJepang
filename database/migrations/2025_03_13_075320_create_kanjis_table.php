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
        Schema::create('kanjis', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['tandoku', 'okurigana', 'jukugo']);
            $table->string('judul');
            $table->string('nama');
            $table->string('kunyomi');
            $table->string('onyomi');
            $table->string('voice_record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    
    {
        Schema::dropIfExists('kanjis');
    }
};
