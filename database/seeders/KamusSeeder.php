<?php

namespace Database\Seeders;

use App\Models\Kamus;
use Illuminate\Database\Seeder;

class KamusSeeder extends Seeder
{
    public function run()
    {
        Kamus::create([
            'judul' => '母親',
            'nama' => 'Ibu',
            'baca' => 'ははおや',
            'contoh_penggunaan' => json_encode([
                ["kanji" => "母は市場に行きます", "arti" => "Ibu pergi ke pasar", "voice_record" => "assets/voice/haha1.mp3"],
                ["kanji" => "母が料理をしている", "arti" => "Ibu sedang memasak", "voice_record" => "path/to/haha_cooking.mp3"],
                ["kanji" => "母は庭にいる", "arti" => "Ibu berada di kebun", "voice_record" => "path/to/haha_garden.mp3"],
                ["kanji" => "私の母は40歳です", "arti" => "Ibuku berumur 40 tahun", "voice_record" => "path/to/haha_age.mp3"]
            ])
        ]);

    }
}
