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
        Schema::create('materi_n5_n4_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_n5_n4_id')->constrained('materi_n5_n4s')->onDelete('cascade');
            $table->string('judul');
            $table->text('isi');
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
