<?php

namespace Database\Seeders;

use App\Models\Kamus;
use App\Models\DetailKamus;
use App\Models\Level;
use Illuminate\Database\Seeder;

class KamusSeeder extends Seeder
{
    public function run()
    {
        $levelN5 = Level::where('level_name', 'N5')->first();
        $levelN4 = Level::where('level_name', 'N4')->first();

        $kamus1 = Kamus::create([
            'judul' => '母親',
            'nama' => 'Ibu',
            'baca' => 'ははおや',
            'level_id' => $levelN5->id,
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus1->id,
            'kanji' => '母は市場に行きます',
            'arti' => 'Ibu pergi ke pasar',
            'voice_record' => 'assets/voice/haha1.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus1->id,
            'kanji' => '母が料理をしている',
            'arti' => 'Ibu sedang memasak',
            'voice_record' => 'path/to/haha_cooking.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus1->id,
            'kanji' => '母は庭にいる',
            'arti' => 'Ibu berada di kebun',
            'voice_record' => 'path/to/haha_garden.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus1->id,
            'kanji' => '私の母は40歳です',
            'arti' => 'Ibuku berumur 40 tahun',
            'voice_record' => 'path/to/haha_age.mp3',
        ]);

        $kamus2 = Kamus::create([
            'judul' => '母親',
            'nama' => 'Ibu',
            'baca' => 'ははおや',
            'level_id' => $levelN4->id,
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus2->id,
            'kanji' => '母は市場に行きます',
            'arti' => 'Ibu pergi ke pasar',
            'voice_record' => 'assets/voice/haha1.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus2->id,
            'kanji' => '母が料理をしている',
            'arti' => 'Ibu sedang memasak',
            'voice_record' => 'path/to/haha_cooking.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus2->id,
            'kanji' => '母は庭にいる',
            'arti' => 'Ibu berada di kebun',
            'voice_record' => 'path/to/haha_garden.mp3',
        ]);

        DetailKamus::create([
            'kamus_id' => $kamus2->id,
            'kanji' => '私の母は40歳です',
            'arti' => 'Ibuku berumur 40 tahun',
            'voice_record' => 'path/to/haha_age.mp3',
        ]);
    }
}