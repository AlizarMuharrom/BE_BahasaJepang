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
        Schema::create('detail_kamuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamus_id')->constrained()->onDelete('cascade');
            $table->string('kanji');
            $table->string('arti');
            $table->string('voice_record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kamuses');
    }
};