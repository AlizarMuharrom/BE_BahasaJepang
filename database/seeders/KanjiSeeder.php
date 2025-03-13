<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kanji;
use App\Models\DetailKanji;
use Illuminate\Database\Seeder;

class KanjiSeeder extends Seeder
{
    public function run()
    {
        // Data untuk tabel kanji
        $kanji1 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '母',
            'nama' => 'Ibu',
            'kunyomi' => 'はは',
            'onyomi' => 'ぼ',
            'voice_record' => 'assets/voice/haha.mp3',
        ]);

        DetailKanji::create([
            'kanji_id' => $kanji1->id,
            'kanji' => '母親',
            'romaji' => 'hahaoya',
            'arti' => 'Ibu Kandung',
            'voice_record' => 'assets/voice/haha.mp3',
        ]);

        DetailKanji::create([
            'kanji_id' => $kanji1->id,
            'kanji' => '母国',
            'romaji' => 'bokoku',
            'arti' => 'Tanah Air',
            'voice_record' => 'assets/voice/haha.mp3',
        ]);

        $kanji2 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '食',
            'nama' => 'Makan',
            'kunyomi' => 'たべる',
            'onyomi' => 'しょく',
            'voice_record' => 'okurigana',
        ]);

        DetailKanji::create([
            'kanji_id' => $kanji2->id,
            'kanji' => '食べる',
            'romaji' => 'taberu',
            'arti' => 'Makan',
            'voice_record' => 'path/to/voice_母国.mp3',
        ]);

        $kanji3 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '校',
            'nama' => 'Sekolah',
            'kunyomi' => 'こう',
            'onyomi' => 'こう',
            'voice_record' => 'path/to/voice_学校.mp3',
        ]);

        DetailKanji::create([
            'kanji_id' => $kanji3->id,
            'kanji' => '学校',
            'romaji' => 'gakkou',
            'arti' => 'Sekolah',
            'voice_record' => 'path/to/voice_母国.mp3',
        ]);
    }
}