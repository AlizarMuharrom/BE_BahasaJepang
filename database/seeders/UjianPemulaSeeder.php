<?php

namespace Database\Seeders;

use App\Models\DetailUjian;
use App\Models\Level;
use App\Models\Ujian;
use Illuminate\Database\Seeder;

class UjianPemulaSeeder extends Seeder
{
    public function run()
    {
        // Pastikan level Pemula ada
        Level::updateOrCreate(
            ['id' => 1],
            ['level_name' => 'Pemula']
        );

        // Buat ujian pemula
        $ujianPemula = Ujian::updateOrCreate(
            ['level_id' => 1],
            [
                'judul' => 'Ujian Bahasa Jepang Dasar',
                'jumlah_soal' => 20,
            ]
        );

        // Hapus soal lama jika ada
        DetailUjian::where('ujian_id', $ujianPemula->id)->delete();

        // Soal 1-5: Pengenalan Hiragana
        $this->createQuestion(
            $ujianPemula->id,
            "Apa bunyi dari huruf あ?",
            ['A' => 'a', 'B' => 'i', 'C' => 'u', 'D' => 'e'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa bunyi dari huruf か?",
            ['A' => 'ka', 'B' => 'ga', 'C' => 'ki', 'D' => 'ku'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Manakah huruf untuk bunyi 'ni'?",
            ['A' => 'に', 'B' => 'ぬ', 'C' => 'ね', 'D' => 'の'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'みず'?",
            ['A' => 'Air', 'B' => 'Api', 'C' => 'Angin', 'D' => 'Tanah'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Manakah yang berarti 'makan'?",
            ['A' => 'たべる', 'B' => 'のむ', 'C' => 'ねる', 'D' => 'あるく'],
            'A',
        );

        // Soal 6-10: Percakapan Dasar
        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'こんにちは'?",
            ['A' => 'Halo', 'B' => 'Selamat tinggal', 'C' => 'Terima kasih', 'D' => 'Permisi'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'Terima kasih'?",
            ['A' => 'ありがとう', 'B' => 'すみません', 'C' => 'ごめんなさい', 'D' => 'おはよう'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa respon untuk 'ありがとう'?",
            ['A' => 'どういたしまして', 'B' => 'すみません', 'C' => 'はい', 'D' => 'いいえ'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'おなまえは?'",
            ['A' => 'Siapa nama Anda?', 'B' => 'Anda tinggal dimana?', 'C' => 'Anda berapa usia?', 'D' => 'Apa kabar?'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'Saya dari Indonesia'?",
            ['A' => 'インドネシアからです', 'B' => 'インドネシアです', 'C' => 'インドネシアにいます', 'D' => 'インドネシアがすきです'],
            'A',
        );

        // Soal 11-15: Angka dan Waktu
        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'いち'?",
            ['A' => '1', 'B' => '2', 'C' => '3', 'D' => '4'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'jam 3'?",
            ['A' => 'さんじ', 'B' => 'よじ', 'C' => 'ごじ', 'D' => 'にじ'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Manakah yang berarti 'hari ini'?",
            ['A' => 'きょう', 'B' => 'あした', 'C' => 'きのう', 'D' => 'あさって'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'なんにんですか?'",
            ['A' => 'Berapa orang?', 'B' => 'Siapa nama Anda?', 'C' => 'Berapa umur?', 'D' => 'Jam berapa?'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan '500 yen'?",
            ['A' => 'ごひゃくえん', 'B' => 'ごえん', 'C' => 'ひゃくえん', 'D' => 'せんえん'],
            'A',
        );

        // Soal 16-20: Kosakata Sehari-hari
        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'えき'?",
            ['A' => 'Stasiun', 'B' => 'Bandara', 'C' => 'Terminal bus', 'D' => 'Pelabuhan'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Manakah yang berarti 'mahal'?",
            ['A' => 'たかい', 'B' => 'やすい', 'C' => 'おおきい', 'D' => 'ちいさい'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'のみもの'?",
            ['A' => 'Minuman', 'B' => 'Makanan', 'C' => 'Camilan', 'D' => 'Buah'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'tolong' dalam bahasa Jepang?",
            ['A' => 'おねがいします', 'B' => 'すみません', 'C' => 'ありがとう', 'D' => 'ごめんなさい'],
            'A',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'だいじょうぶですか?'",
            ['A' => 'Apakah Anda baik-baik saja?', 'B' => 'Siapa nama Anda?', 'C' => 'Anda lapar?', 'D' => 'Anda mengerti?'],
            'A',
        );
    }

    private function createQuestion($ujianId, $soal, $pilihan, $jawabanBenar)
    {
        DetailUjian::create([
            'ujian_id' => $ujianId,
            'soal' => $soal,
            'jawaban_benar' => $jawabanBenar,
            'pilihan_jawaban' => json_encode($pilihan, JSON_UNESCAPED_UNICODE),
        ]);
    }
}