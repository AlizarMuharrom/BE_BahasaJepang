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

        $ujianN5 = Ujian::updateOrCreate(
            ['level_id' => 2],
            [
                'judul' => 'Ujian Bahasa Jepang N5',
                'jumlah_soal' => 20,
            ]
        );

        // Hapus soal lama jika ada
        DetailUjian::where('ujian_id', $ujianN5->id)->delete();

        // =============== Soal N5 =============== //

        // Soal 1-5: Tata Bahasa Dasar
        $this->createQuestion(
            $ujianN5->id,
            "Manakah kalimat yang benar untuk 'Saya minum air'?",
            ['A' => 'みずをのむ', 'B' => 'みずがのむ', 'C' => 'みずにのむ', 'D' => 'みずでのむ'],
            'A',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Partikel mana yang tepat untuk mengisi: がっこう＿いきます",
            ['A' => 'は', 'B' => 'に', 'C' => 'を', 'D' => 'で'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Bentuk negatif dari たべます adalah:",
            ['A' => 'たべない', 'B' => 'たべません', 'C' => 'たべなく', 'D' => 'たべなかった'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Manakah yang merupakan bentuk lampau dari いきます?",
            ['A' => 'いきました', 'B' => 'いきません', 'C' => 'いきましょう', 'D' => 'いきない'],
            'A',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Kalimat mana yang berarti 'Ini bukan buku saya'?",
            ['A' => 'これはわたしのほんです', 'B' => 'これはわたしのほんではありません', 'C' => 'これはわたしのほんですか', 'D' => 'これはわたしのほんでした'],
            'B',
        );

        // Soal 6-10: Kosakata
        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari としょかん?",
            ['A' => 'Sekolah', 'B' => 'Perpustakaan', 'C' => 'Kantor', 'D' => 'Rumah sakit'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Manakah yang berarti 'murah'?",
            ['A' => 'おおきい', 'B' => 'ちいさい', 'C' => 'やすい', 'D' => 'たかい'],
            'C',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari おかね?",
            ['A' => 'Makanan', 'B' => 'Uang', 'C' => 'Air', 'D' => 'Buku'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Bagaimana mengatakan 'hari Minggu' dalam bahasa Jepang?",
            ['A' => 'もくようび', 'B' => 'にちようび', 'C' => 'どようび', 'D' => 'げつようび'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari おんなのこ?",
            ['A' => 'Anak laki-laki', 'B' => 'Anak perempuan', 'C' => 'Ibu', 'D' => 'Ayah'],
            'B',
        );

        // Soal 11-15: Kanji Dasar
        $this->createQuestion(
            $ujianN5->id,
            "Kanji 人 dibaca:",
            ['A' => 'ひと', 'B' => 'いぬ', 'C' => 'ねこ', 'D' => 'ほん'],
            'A',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Manakah bacaan yang benar untuk 山?",
            ['A' => 'かわ', 'B' => 'やま', 'C' => 'うみ', 'D' => 'もり'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Kanji mana yang berarti 'hari'?",
            ['A' => '月', 'B' => '日', 'C' => '火', 'D' => '水'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Bagaimana menulis 'guru' dalam kanji?",
            ['A' => '学生', 'B' => '先生', 'C' => '医者', 'D' => '社員'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Kanji 大 berarti:",
            ['A' => 'Kecil', 'B' => 'Besar', 'C' => 'Sedang', 'D' => 'Panjang'],
            'B',
        );

        // Soal 16-20: Pemahaman Kalimat
        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari: わたしはあさごはんをたべます",
            ['A' => 'Saya makan siang', 'B' => 'Saya makan malam', 'C' => 'Saya makan pagi', 'D' => 'Saya minum teh'],
            'C',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Manakah respon yang tepat untuk: おげんきですか?",
            ['A' => 'はい、そうです', 'B' => 'はい、げんきです', 'C' => 'いいえ、たべません', 'D' => 'ありがとうございます'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari: きょうはあめがふっています",
            ['A' => 'Hari ini cerah', 'B' => 'Hari ini hujan', 'C' => 'Hari ini berangin', 'D' => 'Hari ini dingin'],
            'B',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Kalimat mana yang berarti 'Saya pergi ke sekolah jam 7'?",
            ['A' => 'わたしはがっこうにしちじにいきます', 'B' => 'わたしはがっこうをしちじにいきます', 'C' => 'わたしはがっこうでしちじにいきます', 'D' => 'わたしはがっこうへしちじにいきます'],
            'A',
        );

        $this->createQuestion(
            $ujianN5->id,
            "Apa arti dari: このほんはいくらですか",
            ['A' => 'Buku ini bagus', 'B' => 'Buku ini mahal', 'C' => 'Berapa harga buku ini?', 'D' => 'Buku ini milik siapa?'],
            'C',
        );

        Level::updateOrCreate(
            ['id' => 3],
            ['level_name' => 'N4']
        );

        $ujianN4 = Ujian::updateOrCreate(
            ['level_id' => 3],
            [
                'judul' => 'Ujian Bahasa Jepang N4',
                'jumlah_soal' => 20,
            ]
        );

        DetailUjian::where('ujian_id', $ujianN4->id)->delete();

        $this->createQuestion(
            $ujianN4->id,
            "Apa arti dari: このほんはいくらですか",
            ['A' => 'Buku ini bagus', 'B' => 'Buku ini mahal', 'C' => 'Berapa harga buku ini?', 'D' => 'Buku ini milik siapa?'],
            'C',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah yang merupakan bentuk て dari のむ?",
            ['A' => 'のんで', 'B' => 'のめて', 'C' => 'のまて', 'D' => 'のんでて'],
            'A',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Kalimat mana yang berarti 'Boleh saya meminjam pensil?'",
            ['A' => 'えんぴつをかりますか', 'B' => 'えんぴつをかりましょうか', 'C' => 'えんぴつをかしてくれますか', 'D' => 'えんぴつをかしてもらえますか'],
            'D',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Bentuk pasif dari おこす adalah:",
            ['A' => 'おこされる', 'B' => 'おこさせる', 'C' => 'おこさされる', 'D' => 'おこしられる'],
            'A',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah yang merupakan bentuk なければならない?",
            ['A' => 'たべなくて', 'B' => 'たべなければならない', 'C' => 'たべないで', 'D' => 'たべなくなる'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Partikel mana yang tepat: でんしゃ＿＿のって、かいしゃへいきます",
            ['A' => 'が', 'B' => 'に', 'C' => 'で', 'D' => 'を'],
            'B',
        );

        // Soal 6-10: Kosakata N4
        $this->createQuestion(
            $ujianN4->id,
            "Apa arti dari けんきゅうしつ?",
            ['A' => 'Laboratorium', 'B' => 'Ruang rapat', 'C' => 'Ruang guru', 'D' => 'Perpustakaan'],
            'A',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah yang berarti 'mengantri'?",
            ['A' => 'ならぶ', 'B' => 'まつ', 'C' => 'はしる', 'D' => 'すわる'],
            'A',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Apa lawan kata dari おくれる?",
            ['A' => 'はやい', 'B' => 'おそい', 'C' => 'まにあう', 'D' => 'やすむ'],
            'C',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Apa arti dari しんぱいする?",
            ['A' => 'Senang', 'B' => 'Khawatir', 'C' => 'Terkejut', 'D' => 'Marah'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah yang berarti 'menyerah'?",
            ['A' => 'あきらめる', 'B' => 'つづける', 'C' => 'がんばる', 'D' => 'たすける'],
            'A',
        );

        // Soal 11-15: Kanji N4
        $this->createQuestion(
            $ujianN4->id,
            "Kanji 駅 dibaca:",
            ['A' => 'まち', 'B' => 'えき', 'C' => 'みせ', 'D' => 'いえ'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah bacaan kunyomi untuk 食?",
            ['A' => 'しょく', 'B' => 'た', 'C' => 'く', 'D' => 'じ'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Kanji mana yang berarti 'barang'?",
            ['A' => '物', 'B' => '者', 'C' => '品', 'D' => '具'],
            'A',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Bagaimana menulis 'yasui' (murah) dalam kanji?",
            ['A' => '古い', 'B' => '安い', 'C' => '低い', 'D' => '軽い'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Kanji 卒業 berarti:",
            ['A' => 'Masuk sekolah', 'B' => 'Lulus sekolah', 'C' => 'Ujian', 'D' => 'Liburan'],
            'B',
        );

        // Soal 16-20: Pemahaman Kalimat N4
        $this->createQuestion(
            $ujianN4->id,
            "Apa arti dari: ここでたばこをすってはいけません",
            ['A' => 'Silakan merokok di sini', 'B' => 'Dilarang merokok di sini', 'C' => 'Rokok sudah habis', 'D' => 'Tolong beri saya rokok'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Manakah respon yang tepat untuk: あしたいっしょにえいがをみにいきませんか?",
            ['A' => 'はい、みました', 'B' => 'いいえ、いきましょう', 'C' => 'ええ、いいですね', 'D' => 'いいえ、みません'],
            'C',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Apa arti dari: このまちにはぎんこうがふたつあります",
            ['A' => 'Kota ini punya dua stasiun', 'B' => 'Kota ini punya dua bank', 'C' => 'Bank ini punya dua cabang', 'D' => 'Ada dua kota dengan bank'],
            'B',
        );

        $this->createQuestion(
            $ujianN4->id,
            "Kalimat mana yang berarti 'Saya lupa membawa dompet'?",
            ['A' => 'さいふをもってくるのをわすれました', 'B' => 'さいふをおとしたかもしれません', 'C' => 'さいふをかうのをやめました', 'D' => 'さいふをみつけました'],
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