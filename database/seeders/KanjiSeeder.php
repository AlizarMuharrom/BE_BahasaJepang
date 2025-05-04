<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kanji;
use App\Models\DetailKanji;
use Illuminate\Database\Seeder;

class KanjiSeeder extends Seeder
{
    public function run()
    {
        $levelN5 = Level::where('level_name', 'N5')->first();
        $levelN4 = Level::where('level_name', 'N4')->first();

        $kanji1 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '母',
            'nama' => 'Ibu',
            'kunyomi' => 'はは',
            'onyomi' => 'ぼ',
            'voice_record' => 'assets/voice/haha.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji1->id,
                'kanji' => '母親',
                'romaji' => 'hahaoya',
                'arti' => 'Ibu kandung',
                'voice_record' => 'assets/voice/hahaoya.mp3',
            ],
            [
                'kanji_id' => $kanji1->id,
                'kanji' => 'お母さん',
                'romaji' => 'okaasan',
                'arti' => 'Ibu (sopan)',
                'voice_record' => 'assets/voice/okaasan.mp3',
            ],
            [
                'kanji_id' => $kanji1->id,
                'kanji' => '母校',
                'romaji' => 'bokou',
                'arti' => 'Almamater',
                'voice_record' => 'assets/voice/bokou.mp3',
            ],
            [
                'kanji_id' => $kanji1->id,
                'kanji' => '母国',
                'romaji' => 'bokoku',
                'arti' => 'Tanah air',
                'voice_record' => 'assets/voice/bokoku.mp3',
            ],
        ]);

        $kanji2 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '先',
            'nama' => 'Dulu',
            'kunyomi' => 'さき',
            'onyomi' => 'せん',
            'voice_record' => 'assets/voice/saki.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji2->id,
                'kanji' => '先生',
                'romaji' => 'sensei',
                'arti' => 'Guru',
                'voice_record' => 'assets/voice/sensei.mp3',
            ],
            [
                'kanji_id' => $kanji2->id,
                'kanji' => '先月',
                'romaji' => 'sengetsu',
                'arti' => 'Bulan lalu',
                'voice_record' => 'assets/voice/sengetsu.mp3',
            ],
            [
                'kanji_id' => $kanji2->id,
                'kanji' => '先週',
                'romaji' => 'senshuu',
                'arti' => 'Minggu lalu',
                'voice_record' => 'assets/voice/senshuu.mp3',
            ],
            [
                'kanji_id' => $kanji2->id,
                'kanji' => '先日',
                'romaji' => 'senjitsu',
                'arti' => 'Beberapa hari lalu',
                'voice_record' => 'assets/voice/senjitsu.mp3',
            ],
        ]);

        $kanji3 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '生',
            'nama' => 'Lahir',
            'kunyomi' => 'うまれる',
            'onyomi' => 'せい',
            'voice_record' => 'assets/voice/umareru.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji3->id,
                'kanji' => '学生',
                'romaji' => 'gakusei',
                'arti' => 'Pelajar',
                'voice_record' => 'assets/voice/gakusei.mp3',
            ],
            [
                'kanji_id' => $kanji3->id,
                'kanji' => '先生',
                'romaji' => 'sensei',
                'arti' => 'Guru',
                'voice_record' => 'assets/voice/sensei.mp3',
            ],
            [
                'kanji_id' => $kanji3->id,
                'kanji' => '生まれる',
                'romaji' => 'umareru',
                'arti' => 'Lahir',
                'voice_record' => 'assets/voice/umareru.mp3',
            ],
            [
                'kanji_id' => $kanji3->id,
                'kanji' => '一生',
                'romaji' => 'isshou',
                'arti' => 'Seumur hidup',
                'voice_record' => 'assets/voice/isshou.mp3',
            ],
        ]);

        $kanji4 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '学',
            'nama' => 'Belajar',
            'kunyomi' => 'まなぶ',
            'onyomi' => 'がく',
            'voice_record' => 'assets/voice/gaku.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji4->id,
                'kanji' => '学校',
                'romaji' => 'gakkou',
                'arti' => 'Sekolah',
                'voice_record' => 'assets/voice/gakkou.mp3',
            ],
            [
                'kanji_id' => $kanji4->id,
                'kanji' => '学生',
                'romaji' => 'gakusei',
                'arti' => 'Siswa',
                'voice_record' => 'assets/voice/gakusei.mp3',
            ],
            [
                'kanji_id' => $kanji4->id,
                'kanji' => '学ぶ',
                'romaji' => 'manabu',
                'arti' => 'Belajar',
                'voice_record' => 'assets/voice/manabu.mp3',
            ],
            [
                'kanji_id' => $kanji4->id,
                'kanji' => '大学',
                'romaji' => 'daigaku',
                'arti' => 'Universitas',
                'voice_record' => 'assets/voice/daigaku.mp3',
            ],
        ]);

        $kanji5 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '人',
            'nama' => 'Orang',
            'kunyomi' => 'ひと',
            'onyomi' => 'じん',
            'voice_record' => 'assets/voice/hito.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji5->id,
                'kanji' => '日本人',
                'romaji' => 'nihonjin',
                'arti' => 'Orang Jepang',
                'voice_record' => 'assets/voice/nihonjin.mp3',
            ],
            [
                'kanji_id' => $kanji5->id,
                'kanji' => '一人',
                'romaji' => 'hitori',
                'arti' => 'Sendirian',
                'voice_record' => 'assets/voice/hitori.mp3',
            ],
            [
                'kanji_id' => $kanji5->id,
                'kanji' => '人々',
                'romaji' => 'hitobito',
                'arti' => 'Orang-orang',
                'voice_record' => 'assets/voice/hitobito.mp3',
            ],
            [
                'kanji_id' => $kanji5->id,
                'kanji' => '友人',
                'romaji' => 'yuujin',
                'arti' => 'Teman',
                'voice_record' => 'assets/voice/yuujin.mp3',
            ],
        ]);

        $kanji6 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '国',
            'nama' => 'Negara',
            'kunyomi' => 'くに',
            'onyomi' => 'こく',
            'voice_record' => 'assets/voice/kuni.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji6->id,
                'kanji' => '外国',
                'romaji' => 'gaikoku',
                'arti' => 'Negara asing',
                'voice_record' => 'assets/voice/gaikoku.mp3',
            ],
            [
                'kanji_id' => $kanji6->id,
                'kanji' => '中国',
                'romaji' => 'chuugoku',
                'arti' => 'Tiongkok',
                'voice_record' => 'assets/voice/chuugoku.mp3',
            ],
            [
                'kanji_id' => $kanji6->id,
                'kanji' => '国会',
                'romaji' => 'kokkai',
                'arti' => 'Parlemen',
                'voice_record' => 'assets/voice/kokkai.mp3',
            ],
            [
                'kanji_id' => $kanji6->id,
                'kanji' => '母国',
                'romaji' => 'bokoku',
                'arti' => 'Tanah air',
                'voice_record' => 'assets/voice/bokoku.mp3',
            ],
        ]);

        $kanji7 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '男',
            'nama' => 'Laki-laki',
            'kunyomi' => 'おとこ',
            'onyomi' => 'だん',
            'voice_record' => 'assets/voice/otoko.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji7->id,
                'kanji' => '男の子',
                'romaji' => 'otokonoko',
                'arti' => 'Anak laki-laki',
                'voice_record' => 'assets/voice/otokonoko.mp3',
            ],
            [
                'kanji_id' => $kanji7->id,
                'kanji' => '男子',
                'romaji' => 'danshi',
                'arti' => 'Laki-laki (resmi)',
                'voice_record' => 'assets/voice/danshi.mp3',
            ],
            [
                'kanji_id' => $kanji7->id,
                'kanji' => '男性',
                'romaji' => 'dansei',
                'arti' => 'Pria dewasa',
                'voice_record' => 'assets/voice/dansei.mp3',
            ],
            [
                'kanji_id' => $kanji7->id,
                'kanji' => '長男',
                'romaji' => 'chounan',
                'arti' => 'Anak laki-laki pertama',
                'voice_record' => 'assets/voice/chounan.mp3',
            ],
        ]);

        // 女 - Perempuan
        $kanji8 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '女',
            'nama' => 'Perempuan',
            'kunyomi' => 'おんな',
            'onyomi' => 'じょ',
            'voice_record' => 'assets/voice/onna.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji8->id,
                'kanji' => '女の人',
                'romaji' => 'onna no hito',
                'arti' => 'Wanita',
                'voice_record' => 'assets/voice/onnanohito.mp3',
            ],
            [
                'kanji_id' => $kanji8->id,
                'kanji' => '彼女',
                'romaji' => 'kanojo',
                'arti' => 'Dia (perempuan)',
                'voice_record' => 'assets/voice/kanojo.mp3',
            ],
            [
                'kanji_id' => $kanji8->id,
                'kanji' => '少女',
                'romaji' => 'shoujo',
                'arti' => 'Gadis kecil',
                'voice_record' => 'assets/voice/shoujo.mp3',
            ],
            [
                'kanji_id' => $kanji8->id,
                'kanji' => '女性',
                'romaji' => 'josei',
                'arti' => 'Wanita dewasa',
                'voice_record' => 'assets/voice/josei.mp3',
            ],
        ]);

        // 子 - Anak
        $kanji9 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '子',
            'nama' => 'Anak',
            'kunyomi' => 'こ',
            'onyomi' => 'し',
            'voice_record' => 'assets/voice/ko.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji9->id,
                'kanji' => '子ども',
                'romaji' => 'kodomo',
                'arti' => 'Anak-anak',
                'voice_record' => 'assets/voice/kodomo.mp3',
            ],
            [
                'kanji_id' => $kanji9->id,
                'kanji' => '男子',
                'romaji' => 'danshi',
                'arti' => 'Laki-laki',
                'voice_record' => 'assets/voice/danshi.mp3',
            ],
            [
                'kanji_id' => $kanji9->id,
                'kanji' => '女子',
                'romaji' => 'joshi',
                'arti' => 'Anak perempuan',
                'voice_record' => 'assets/voice/joshi.mp3',
            ],
            [
                'kanji_id' => $kanji9->id,
                'kanji' => '男の子',
                'romaji' => 'otokonoko',
                'arti' => 'Anak laki-laki',
                'voice_record' => 'assets/voice/otokonoko.mp3',
            ],
        ]);

        // 友 - Teman
        $kanji10 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '友',
            'nama' => 'Teman',
            'kunyomi' => 'とも',
            'onyomi' => 'ゆう',
            'voice_record' => 'assets/voice/tomo.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji10->id,
                'kanji' => '友だち',
                'romaji' => 'tomodachi',
                'arti' => 'Teman',
                'voice_record' => 'assets/voice/tomodachi.mp3',
            ],
            [
                'kanji_id' => $kanji10->id,
                'kanji' => '親友',
                'romaji' => 'shinyuu',
                'arti' => 'Sahabat dekat',
                'voice_record' => 'assets/voice/shinyuu.mp3',
            ],
            [
                'kanji_id' => $kanji10->id,
                'kanji' => '友情',
                'romaji' => 'yuujou',
                'arti' => 'Persahabatan',
                'voice_record' => 'assets/voice/yuujou.mp3',
            ],
            [
                'kanji_id' => $kanji10->id,
                'kanji' => '友人',
                'romaji' => 'yuujin',
                'arti' => 'Teman (formal)',
                'voice_record' => 'assets/voice/yuujin.mp3',
            ],
        ]);

        // 父 - Ayah
        $kanji11 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '父',
            'nama' => 'Ayah',
            'kunyomi' => 'ちち',
            'onyomi' => 'ふ',
            'voice_record' => 'assets/voice/chichi.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji11->id,
                'kanji' => '父',
                'romaji' => 'chichi',
                'arti' => 'Ayah saya',
                'voice_record' => 'assets/voice/chichi.mp3',
            ],
            [
                'kanji_id' => $kanji11->id,
                'kanji' => 'お父さん',
                'romaji' => 'otousan',
                'arti' => 'Ayah (sopan)',
                'voice_record' => 'assets/voice/otousan.mp3',
            ],
            [
                'kanji_id' => $kanji11->id,
                'kanji' => '祖父',
                'romaji' => 'sofu',
                'arti' => 'Kakek',
                'voice_record' => 'assets/voice/sofu.mp3',
            ],
            [
                'kanji_id' => $kanji11->id,
                'kanji' => '父母',
                'romaji' => 'fubo',
                'arti' => 'Ayah dan ibu',
                'voice_record' => 'assets/voice/fubo.mp3',
            ],
        ]);

        // 名 - Nama
        $kanji12 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '名',
            'nama' => 'Nama',
            'kunyomi' => 'な',
            'onyomi' => 'めい',
            'voice_record' => 'assets/voice/na.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji12->id,
                'kanji' => '名前',
                'romaji' => 'namae',
                'arti' => 'Nama',
                'voice_record' => 'assets/voice/namae.mp3',
            ],
            [
                'kanji_id' => $kanji12->id,
                'kanji' => '有名',
                'romaji' => 'yuumei',
                'arti' => 'Terkenal',
                'voice_record' => 'assets/voice/yuumei.mp3',
            ],
            [
                'kanji_id' => $kanji12->id,
                'kanji' => '名人',
                'romaji' => 'meijin',
                'arti' => 'Ahli / Master',
                'voice_record' => 'assets/voice/meijin.mp3',
            ],
            [
                'kanji_id' => $kanji12->id,
                'kanji' => '名字',
                'romaji' => 'myouji',
                'arti' => 'Nama keluarga',
                'voice_record' => 'assets/voice/myouji.mp3',
            ],
        ]);

        $kanji13 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '田',
            'nama' => 'Sawah',
            'kunyomi' => 'た',
            'onyomi' => 'でん',
            'voice_record' => 'assets/voice/ta.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji13->id,
                'kanji' => '田んぼ',
                'romaji' => 'tanbo',
                'arti' => 'Sawah',
                'voice_record' => 'assets/voice/tanbo.mp3',
            ],
            [
                'kanji_id' => $kanji13->id,
                'kanji' => '山田',
                'romaji' => 'yamada',
                'arti' => 'Yamada (nama orang)',
                'voice_record' => 'assets/voice/yamada.mp3',
            ],
            [
                'kanji_id' => $kanji13->id,
                'kanji' => '田中',
                'romaji' => 'tanaka',
                'arti' => 'Tanaka (nama orang)',
                'voice_record' => 'assets/voice/tanaka.mp3',
            ],
            [
                'kanji_id' => $kanji13->id,
                'kanji' => '田村',
                'romaji' => 'tamura',
                'arti' => 'Tamura (nama orang)',
                'voice_record' => 'assets/voice/tamura.mp3',
            ],
        ]);

        $kanji14 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '山',
            'nama' => 'Gunung',
            'kunyomi' => 'やま',
            'onyomi' => 'さん',
            'voice_record' => 'assets/voice/yama.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji14->id,
                'kanji' => '富士山',
                'romaji' => 'fujisan',
                'arti' => 'Gunung Fuji',
                'voice_record' => 'assets/voice/fujisan.mp3',
            ],
            [
                'kanji_id' => $kanji14->id,
                'kanji' => '火山',
                'romaji' => 'kazan',
                'arti' => 'Gunung api',
                'voice_record' => 'assets/voice/kazan.mp3',
            ],
            [
                'kanji_id' => $kanji14->id,
                'kanji' => '山田',
                'romaji' => 'yamada',
                'arti' => 'Yamada (nama orang)',
                'voice_record' => 'assets/voice/yamada.mp3',
            ],
            [
                'kanji_id' => $kanji14->id,
                'kanji' => '山口',
                'romaji' => 'yamaguchi',
                'arti' => 'Yamaguchi (nama tempat)',
                'voice_record' => 'assets/voice/yamaguchi.mp3',
            ],
        ]);

        $kanji15 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '語',
            'nama' => 'Bahasa',
            'kunyomi' => 'かた(る)',
            'onyomi' => 'ご',
            'voice_record' => 'assets/voice/go.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji15->id,
                'kanji' => '日本語',
                'romaji' => 'nihongo',
                'arti' => 'Bahasa Jepang',
                'voice_record' => 'assets/voice/nihongo.mp3',
            ],
            [
                'kanji_id' => $kanji15->id,
                'kanji' => '英語',
                'romaji' => 'eigo',
                'arti' => 'Bahasa Inggris',
                'voice_record' => 'assets/voice/eigo.mp3',
            ],
            [
                'kanji_id' => $kanji15->id,
                'kanji' => '中国語',
                'romaji' => 'chuugokugo',
                'arti' => 'Bahasa Cina',
                'voice_record' => 'assets/voice/chuugokugo.mp3',
            ],
            [
                'kanji_id' => $kanji15->id,
                'kanji' => '言語',
                'romaji' => 'gengo',
                'arti' => 'Bahasa (umum)',
                'voice_record' => 'assets/voice/gengo.mp3',
            ],
        ]);

        $kanji16 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '本',
            'nama' => 'Buku',
            'kunyomi' => 'もと',
            'onyomi' => 'ほん',
            'voice_record' => 'assets/voice/hon.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji16->id,
                'kanji' => '本',
                'romaji' => 'hon',
                'arti' => 'Buku',
                'voice_record' => 'assets/voice/hon.mp3',
            ],
            [
                'kanji_id' => $kanji16->id,
                'kanji' => '日本',
                'romaji' => 'nihon',
                'arti' => 'Jepang',
                'voice_record' => 'assets/voice/nihon.mp3',
            ],
            [
                'kanji_id' => $kanji16->id,
                'kanji' => '本棚',
                'romaji' => 'hondana',
                'arti' => 'Rak buku',
                'voice_record' => 'assets/voice/hondana.mp3',
            ],
            [
                'kanji_id' => $kanji16->id,
                'kanji' => '本当',
                'romaji' => 'hontou',
                'arti' => 'Sebenarnya / sungguh',
                'voice_record' => 'assets/voice/hontou.mp3',
            ],
        ]);


        $kanji17 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '何',
            'nama' => 'Apa',
            'kunyomi' => 'なに / なん',
            'onyomi' => '',
            'voice_record' => 'assets/voice/nani.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji17->id,
                'kanji' => '何',
                'romaji' => 'nani',
                'arti' => 'Apa',
                'voice_record' => 'assets/voice/nani.mp3',
            ],
            [
                'kanji_id' => $kanji17->id,
                'kanji' => '何人',
                'romaji' => 'nannin',
                'arti' => 'Berapa orang',
                'voice_record' => 'assets/voice/nannin.mp3',
            ],
            [
                'kanji_id' => $kanji17->id,
                'kanji' => '何時',
                'romaji' => 'nanji',
                'arti' => 'Jam berapa',
                'voice_record' => 'assets/voice/nanji.mp3',
            ],
            [
                'kanji_id' => $kanji17->id,
                'kanji' => '何日',
                'romaji' => 'nannichi',
                'arti' => 'Tanggal berapa',
                'voice_record' => 'assets/voice/nannichi.mp3',
            ],
        ]);

        $kanji18 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '時',
            'nama' => 'Jam / Waktu',
            'kunyomi' => 'とき',
            'onyomi' => 'じ',
            'voice_record' => 'assets/voice/ji.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji18->id,
                'kanji' => '一時',
                'romaji' => 'ichiji',
                'arti' => 'Jam satu',
                'voice_record' => 'assets/voice/ichiji.mp3',
            ],
            [
                'kanji_id' => $kanji18->id,
                'kanji' => '時間',
                'romaji' => 'jikan',
                'arti' => 'Waktu / jam (durasi)',
                'voice_record' => 'assets/voice/jikan.mp3',
            ],
            [
                'kanji_id' => $kanji18->id,
                'kanji' => '何時',
                'romaji' => 'nanji',
                'arti' => 'Jam berapa',
                'voice_record' => 'assets/voice/nanji.mp3',
            ],
            [
                'kanji_id' => $kanji18->id,
                'kanji' => '時々',
                'romaji' => 'tokidoki',
                'arti' => 'Kadang-kadang',
                'voice_record' => 'assets/voice/tokidoki.mp3',
            ],
        ]);

        $kanji19 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '分',
            'nama' => 'Menit / Membagi',
            'kunyomi' => 'わ(ける)',
            'onyomi' => 'ふん / ぶん',
            'voice_record' => 'assets/voice/fun.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji19->id,
                'kanji' => '五分',
                'romaji' => 'gofun',
                'arti' => 'Lima menit',
                'voice_record' => 'assets/voice/gofun.mp3',
            ],
            [
                'kanji_id' => $kanji19->id,
                'kanji' => '分かる',
                'romaji' => 'wakaru',
                'arti' => 'Mengerti',
                'voice_record' => 'assets/voice/wakaru.mp3',
            ],
            [
                'kanji_id' => $kanji19->id,
                'kanji' => '十分',
                'romaji' => 'juppun',
                'arti' => 'Sepuluh menit / cukup',
                'voice_record' => 'assets/voice/juppun.mp3',
            ],
            [
                'kanji_id' => $kanji19->id,
                'kanji' => '半分',
                'romaji' => 'hanbun',
                'arti' => 'Setengah bagian',
                'voice_record' => 'assets/voice/hanbun.mp3',
            ],
        ]);

        $kanji20 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '間',
            'nama' => 'Antara / Waktu',
            'kunyomi' => 'あいだ / ま',
            'onyomi' => 'かん / けん',
            'voice_record' => 'assets/voice/aida.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji20->id,
                'kanji' => '時間',
                'romaji' => 'jikan',
                'arti' => 'Waktu / durasi',
                'voice_record' => 'assets/voice/jikan.mp3',
            ],
            [
                'kanji_id' => $kanji20->id,
                'kanji' => '人間',
                'romaji' => 'ningen',
                'arti' => 'Manusia',
                'voice_record' => 'assets/voice/ningen.mp3',
            ],
            [
                'kanji_id' => $kanji20->id,
                'kanji' => '間に合う',
                'romaji' => 'maniau',
                'arti' => 'Tepat waktu',
                'voice_record' => 'assets/voice/maniau.mp3',
            ],
            [
                'kanji_id' => $kanji20->id,
                'kanji' => 'この間',
                'romaji' => 'kono aida',
                'arti' => 'Belakangan ini',
                'voice_record' => 'assets/voice/konoaida.mp3',
            ],
        ]);

        $kanji21 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '半',
            'nama' => 'Setengah',
            'kunyomi' => '',
            'onyomi' => 'はん',
            'voice_record' => 'assets/voice/han.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji21->id,
                'kanji' => '半分',
                'romaji' => 'hanbun',
                'arti' => 'Setengah',
                'voice_record' => 'assets/voice/hanbun.mp3',
            ],
            [
                'kanji_id' => $kanji21->id,
                'kanji' => '三時半',
                'romaji' => 'sanjihan',
                'arti' => 'Jam setengah empat',
                'voice_record' => 'assets/voice/sanjihan.mp3',
            ],
            [
                'kanji_id' => $kanji21->id,
                'kanji' => '半年',
                'romaji' => 'hantoshi',
                'arti' => 'Setengah tahun',
                'voice_record' => 'assets/voice/hantoshi.mp3',
            ],
            [
                'kanji_id' => $kanji21->id,
                'kanji' => '前半',
                'romaji' => 'zenhan',
                'arti' => 'Paruh pertama',
                'voice_record' => 'assets/voice/zenhan.mp3',
            ],
        ]);

        $kanji22 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '午',
            'nama' => 'Siang',
            'kunyomi' => '',
            'onyomi' => 'ご',
            'voice_record' => 'assets/voice/go.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji22->id,
                'kanji' => '午前',
                'romaji' => 'gozen',
                'arti' => 'Sebelum tengah hari / A.M.',
                'voice_record' => 'assets/voice/gozen.mp3',
            ],
            [
                'kanji_id' => $kanji22->id,
                'kanji' => '午後',
                'romaji' => 'gogo',
                'arti' => 'Setelah tengah hari / P.M.',
                'voice_record' => 'assets/voice/gogo.mp3',
            ],
            [
                'kanji_id' => $kanji22->id,
                'kanji' => '正午',
                'romaji' => 'shougo',
                'arti' => 'Tengah hari (12:00)',
                'voice_record' => 'assets/voice/shougo.mp3',
            ],
            [
                'kanji_id' => $kanji22->id,
                'kanji' => '午休',
                'romaji' => 'gokyuu',
                'arti' => 'Istirahat siang',
                'voice_record' => 'assets/voice/gokyuu.mp3',
            ],
        ]);


        $kanji23 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '前',
            'nama' => 'Depan / Sebelum',
            'kunyomi' => 'まえ',
            'onyomi' => 'ぜん',
            'voice_record' => 'assets/voice/mae.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji23->id,
                'kanji' => '名前',
                'romaji' => 'namae',
                'arti' => 'Nama',
                'voice_record' => 'assets/voice/namae.mp3',
            ],
            [
                'kanji_id' => $kanji23->id,
                'kanji' => '午前',
                'romaji' => 'gozen',
                'arti' => 'Pagi (a.m.)',
                'voice_record' => 'assets/voice/gozen.mp3',
            ],
            [
                'kanji_id' => $kanji23->id,
                'kanji' => '前半',
                'romaji' => 'zenhan',
                'arti' => 'Paruh pertama',
                'voice_record' => 'assets/voice/zenhan.mp3',
            ],
            [
                'kanji_id' => $kanji23->id,
                'kanji' => '一年前',
                'romaji' => 'ichinen mae',
                'arti' => 'Setahun yang lalu',
                'voice_record' => 'assets/voice/ichinenmae.mp3',
            ],
        ]);

        $kanji24 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '後',
            'nama' => 'Belakang',
            'kunyomi' => 'うし・あと',
            'onyomi' => 'ご',
            'voice_record' => 'assets/voice/ushi.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji24->id,
                'kanji' => '後ろ',
                'romaji' => 'ushiro',
                'arti' => 'Belakang',
                'voice_record' => 'assets/voice/ushiro.mp3',
            ],
            [
                'kanji_id' => $kanji24->id,
                'kanji' => '後で',
                'romaji' => 'atode',
                'arti' => 'Nanti / Setelah',
                'voice_record' => 'assets/voice/atode.mp3',
            ],
            [
                'kanji_id' => $kanji24->id,
                'kanji' => '最後',
                'romaji' => 'saigo',
                'arti' => 'Terakhir',
                'voice_record' => 'assets/voice/saigo.mp3',
            ],
            [
                'kanji_id' => $kanji24->id,
                'kanji' => '年後',
                'romaji' => 'nen go',
                'arti' => 'Tahun kemudian',
                'voice_record' => 'assets/voice/nengo.mp3',
            ],
        ]);

        $kanji25 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '今',
            'nama' => 'Sekarang',
            'kunyomi' => 'いま',
            'onyomi' => 'こん',
            'voice_record' => 'assets/voice/ima.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji25->id,
                'kanji' => '今',
                'romaji' => 'ima',
                'arti' => 'Sekarang',
                'voice_record' => 'assets/voice/ima.mp3',
            ],
            [
                'kanji_id' => $kanji25->id,
                'kanji' => '今日',
                'romaji' => 'kyou',
                'arti' => 'Hari ini',
                'voice_record' => 'assets/voice/kyou.mp3',
            ],
            [
                'kanji_id' => $kanji25->id,
                'kanji' => '今週',
                'romaji' => 'konshuu',
                'arti' => 'Minggu ini',
                'voice_record' => 'assets/voice/konshuu.mp3',
            ],
            [
                'kanji_id' => $kanji25->id,
                'kanji' => '今年',
                'romaji' => 'kotoshi',
                'arti' => 'Tahun ini',
                'voice_record' => 'assets/voice/kotoshi.mp3',
            ],
        ]);

        $kanji26 = Kanji::create([
            'kategori' => 'tandoku',
            'judul' => '週',
            'nama' => 'Minggu',
            'kunyomi' => '',
            'onyomi' => 'しゅう',
            'voice_record' => 'assets/voice/shuu.mp3',
            'level_id' => $levelN5->id,
        ]);

        DetailKanji::insert([
            [
                'kanji_id' => $kanji26->id,
                'kanji' => '今週',
                'romaji' => 'konshuu',
                'arti' => 'Minggu ini',
                'voice_record' => 'assets/voice/konshuu.mp3',
            ],
            [
                'kanji_id' => $kanji26->id,
                'kanji' => '先週',
                'romaji' => 'senshuu',
                'arti' => 'Minggu lalu',
                'voice_record' => 'assets/voice/senshuu.mp3',
            ],
            [
                'kanji_id' => $kanji26->id,
                'kanji' => '来週',
                'romaji' => 'raishuu',
                'arti' => 'Minggu depan',
                'voice_record' => 'assets/voice/raishuu.mp3',
            ],
            [
                'kanji_id' => $kanji26->id,
                'kanji' => '一週間',
                'romaji' => 'isshuukan',
                'arti' => 'Satu minggu',
                'voice_record' => 'assets/voice/isshuukan.mp3',
            ],
        ]);

        $kanji27 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '通',
            'nama' => 'PP, lewat',
            'kunyomi' => 'とお',
            'onyomi' => 'ツウ',
            'voice_record' => 'assets/voice/kayo.mp3',
            'level_id' => $levelN4->id,
        ]);

        DetailKanji::insert([
            ['kanji_id' => $kanji27->id, 'kanji' => '通学', 'romaji' => 'tsuugaku', 'arti' => 'Pergi ke sekolah', 'voice_record' => 'assets/voice/tsuugaku.mp3'],
            ['kanji_id' => $kanji27->id, 'kanji' => '通行', 'romaji' => 'tsuukou', 'arti' => 'Lalu lintas', 'voice_record' => 'assets/voice/tsuukou.mp3'],
            ['kanji_id' => $kanji27->id, 'kanji' => '通勤', 'romaji' => 'tsuukin', 'arti' => 'Pergi kerja', 'voice_record' => 'assets/voice/tsuukin.mp3'],
            ['kanji_id' => $kanji27->id, 'kanji' => '通話', 'romaji' => 'tsuuwa', 'arti' => 'Panggilan suara', 'voice_record' => 'assets/voice/tsuuwa.mp3'],
        ]);

        $kanji28 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '降',
            'nama' => 'Turun',
            'kunyomi' => 'お',
            'onyomi' => 'コウ',
            'voice_record' => 'assets/voice/oriru.mp3',
            'level_id' => $levelN4->id,
        ]);
        
        DetailKanji::insert([
            ['kanji_id' => $kanji28->id, 'kanji' => '降車', 'romaji' => 'kousha', 'arti' => 'Turun dari kendaraan', 'voice_record' => 'assets/voice/kousha.mp3'],
            ['kanji_id' => $kanji28->id, 'kanji' => '降雨', 'romaji' => 'kouu', 'arti' => 'Turun hujan', 'voice_record' => 'assets/voice/kouu.mp3'],
            ['kanji_id' => $kanji28->id, 'kanji' => '以降', 'romaji' => 'ikou', 'arti' => 'Setelah itu', 'voice_record' => 'assets/voice/ikou.mp3'],
            ['kanji_id' => $kanji28->id, 'kanji' => '降下', 'romaji' => 'kouka', 'arti' => 'Penurunan', 'voice_record' => 'assets/voice/kouka.mp3'],
        ]);
        
        $kanji29 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '着',
            'nama' => 'Memakai',
            'kunyomi' => 'き',
            'onyomi' => 'チャク',
            'voice_record' => 'assets/voice/kiru.mp3',
            'level_id' => $levelN4->id,
        ]);
        
        DetailKanji::insert([
            ['kanji_id' => $kanji29->id, 'kanji' => '着物', 'romaji' => 'kimono', 'arti' => 'Pakaian tradisional', 'voice_record' => 'assets/voice/kimono.mp3'],
            ['kanji_id' => $kanji29->id, 'kanji' => '到着', 'romaji' => 'touchaku', 'arti' => 'Kedatangan', 'voice_record' => 'assets/voice/touchaku.mp3'],
            ['kanji_id' => $kanji29->id, 'kanji' => '着陸', 'romaji' => 'chakuriku', 'arti' => 'Pendaratan', 'voice_record' => 'assets/voice/chakuriku.mp3'],
            ['kanji_id' => $kanji29->id, 'kanji' => '着席', 'romaji' => 'chakuseki', 'arti' => 'Duduk di kursi', 'voice_record' => 'assets/voice/chakuseki.mp3'],
        ]);
        
        $kanji30 = Kanji::create([
            'kategori' => 'okurigana',
            'judul' => '動',
            'nama' => 'Bergerak',
            'kunyomi' => 'うご',
            'onyomi' => 'ドウ',
            'voice_record' => 'assets/voice/ugo.mp3',
            'level_id' => $levelN4->id,
        ]);
        
        DetailKanji::insert([
            ['kanji_id' => $kanji30->id, 'kanji' => '運動', 'romaji' => 'undou', 'arti' => 'Olahraga', 'voice_record' => 'assets/voice/undou.mp3'],
            ['kanji_id' => $kanji30->id, 'kanji' => '自動車', 'romaji' => 'jidousha', 'arti' => 'Mobil', 'voice_record' => 'assets/voice/jidousha.mp3'],
            ['kanji_id' => $kanji30->id, 'kanji' => '動物', 'romaji' => 'doubutsu', 'arti' => 'Hewan', 'voice_record' => 'assets/voice/doubutsu.mp3'],
            ['kanji_id' => $kanji30->id, 'kanji' => '作動', 'romaji' => 'sadou', 'arti' => 'Pengoperasian (mesin)', 'voice_record' => 'assets/voice/sadou.mp3'],
        ]);
        
        $kanji31 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '物',
            'nama' => 'Barang',
            'kunyomi' => 'もの',
            'onyomi' => 'ブツ / モツ',
            'voice_record' => 'assets/voice/mono.mp3',
            'level_id' => $levelN4->id,
        ]);
        
        DetailKanji::insert([
            [
                'kanji_id' => $kanji31->id,
                'kanji' => '動物',
                'romaji' => 'doubutsu',
                'arti' => 'Hewan',
                'voice_record' => 'assets/voice/doubutsu.mp3',
            ],
            [
                'kanji_id' => $kanji31->id,
                'kanji' => '食べ物',
                'romaji' => 'tabemono',
                'arti' => 'Makanan',
                'voice_record' => 'assets/voice/tabemono.mp3',
            ],
        ]);
        
        $kanji32 = Kanji::create([
            'kategori' => 'jukugo',
            'judul' => '品',
            'nama' => 'Barang dagang',
            'kunyomi' => 'しな',
            'onyomi' => 'ヒン',
            'voice_record' => 'assets/voice/shina.mp3',
            'level_id' => $levelN4->id,
        ]);
        
        DetailKanji::insert([
            [
                'kanji_id' => $kanji32->id,
                'kanji' => '商品',
                'romaji' => 'shouhin',
                'arti' => 'Produk / barang dagangan',
                'voice_record' => 'assets/voice/shouhin.mp3',
            ],
            [
                'kanji_id' => $kanji32->id,
                'kanji' => '品物',
                'romaji' => 'shinamono',
                'arti' => 'Barang / benda',
                'voice_record' => 'assets/voice/shinamono.mp3',
            ],
        ]);
        
    }
}