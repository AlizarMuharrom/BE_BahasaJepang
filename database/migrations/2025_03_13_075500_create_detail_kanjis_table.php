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
        Schema::create('detail_kanjis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kanji_id');
            $table->string('kanji');
            $table->string('arti');
            $table->string('romaji');
            $table->string('voice_record');
            $table->timestamps();

            $table->foreign('kanji_id')->references('id')->on('kanjis')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kanjis');
    }
};
