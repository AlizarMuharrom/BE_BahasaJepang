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
            ['A' => 'n', 'B' => 'i', 'C' => 'a', 'D' => 'e'],
            'C',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa bunyi dari huruf か?",
            ['A' => 'ki', 'B' => 'ga', 'C' => 'ka', 'D' => 'ku'],
            'C',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Manakah huruf untuk bunyi 'ni'?",
            ['A' => 'の', 'B' => 'ぬ', 'C' => 'ね', 'D' => 'に'],
            'D',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'みず'?",
            ['A' => 'Api', 'B' => 'Air', 'C' => 'Angin', 'D' => 'Tanah'],
            'B',
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
            ['A' => 'ごめんなさい', 'B' => 'すみません', 'C' => 'ありがとう', 'D' => 'おはよう'],
            'C',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa respon untuk 'ありがとう'?",
            ['A' => 'すみません', 'B' => 'どういたしまして', 'C' => 'はい', 'D' => 'いいえ'],
            'B',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'おなまえは?'",
            ['A' => 'Berapa usia Anda?', 'B' => 'Anda tinggal dimana?', 'C' => 'Siapa nama Anda?', 'D' => 'Apa kabar?'],
            'C',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'Saya dari Indonesia'?",
            ['A' => 'インドネシアがすきです', 'B' => 'インドネシアです', 'C' => 'インドネシアにいます', 'D' => 'インドネシアからです'],
            'D',
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
            ['A' => 'あした', 'B' => 'きょう', 'C' => 'きのう', 'D' => 'あさって'],
            'B',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'なんにんですか?'",
            ['A' => 'Siapa nama Anda?', 'B' => 'Berapa orang?', 'C' => 'Berapa umur?', 'D' => 'Jam berapa?'],
            'B',
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
            ['A' => 'Camilan', 'B' => 'Makanan', 'C' => 'Minuman', 'D' => 'Buah'],
            'C',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Bagaimana mengatakan 'tolong' dalam bahasa Jepang?",
            ['A' => 'ごめんなさい', 'B' => 'すみません', 'C' => 'ありがとう', 'D' => 'おねがいします'],
            'D',
        );

        $this->createQuestion(
            $ujianPemula->id,
            "Apa arti dari 'だいじょうぶですか?'",
            ['A' => 'Anda mengerti?', 'B' => 'Siapa nama Anda?', 'C' => 'Anda lapar?', 'D' => 'Apakah Anda baik-baik saja?'],
            'D',
        );

        Level::updateOrCreate(
            ['id' => 2],
            ['level_name' => 'N5']
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