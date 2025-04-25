<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materi_n5_n4s', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('level_id')->constrained('levels'); // Pastikan tabel levels sudah ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
