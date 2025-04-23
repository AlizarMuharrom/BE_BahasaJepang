<?php

namespace Database\Seeders;

use App\Models\Materi;
use App\Models\DetailMateri;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    public function run()
    {
        $materi1 = Materi::create([
            'judul' => 'Materi 1 : Hiragana Dasar'
        ]);

        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'a i u e o',
            'isi' => 'Huruf-huruf ini merupakan vokal dasar dalam bahasa Jepang yang sangat penting, karena mereka membentuk dasar dari hampir seluruh kata dalam bahasa Jepang. Masing-masing vokal ini memiliki bunyi yang konsisten dan tidak berubah meskipun dikombinasikan dengan konsonan. Berikut adalah contoh kata-kata yang menggunakan vokal ini:

あお (ao): berarti biru, di mana vokal "a" diikuti oleh vokal "o."

いえ (ie): berarti rumah, menggabungkan vokal "i" dan "e."

うえ (ue): berarti atas, menggabungkan vokal "u" dan "e."

え (e): berarti gambar, hanya menggunakan vokal "e."

おおきい (ookii): berarti besar, dengan pengulangan vokal "o" dan diakhiri dengan "i."'
        ]);

        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ka ki ku ke ko',
            'isi' => 'Pada deretan ini, konsonan k ditambahkan pada setiap vokal dasar. Proses ini menciptakan suara yang lebih keras dan tegas dibandingkan dengan vokal dasar. Sebagai contoh:

かお (kao): berarti wajah, di mana konsonan "k" bergabung dengan vokal "a."

きく (kiku): berarti mendengar, dengan konsonan "k" yang menggabungkan vokal "i" dan "u."

くち (kuchi): berarti mulut, menggabungkan konsonan "k" dengan vokal "u" dan "i."

け (ke): berarti rambut, hanya menggabungkan konsonan "k" dengan vokal "e."

こえ (koe): berarti suara, menggabungkan "k" dengan "o" dan diakhiri dengan "e."

'
        ]);

        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'sa shi su se so',
            'isi' => 'Konsonan s pada deretan ini mengubah vokal dasar menjadi lebih tertekan dan lebih tajam. Hal ini menambah variasi dalam pengucapan dan membentuk kata-kata yang berbeda:

さかな (sakana): berarti ikan, dengan konsonan "s" yang mengikuti vokal "a" dan "a."

しろ (shiro): berarti putih, di mana "s" digabungkan dengan vokal "i" dan "o."

すし (sushi): berarti sushi, dengan pengulangan vokal "u" yang memberikan kesan lebih lembut.

せん (sen): berarti seribu, di mana "s" diikuti oleh vokal "e" dan berakhir dengan "n."

そら (sora): berarti langit, di mana konsonan "s" menggabungkan vokal "o" dan "a."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ta chi tsu te to',
            'isi' => 'Deretan ini menggunakan konsonan t, yang memberikan kesan lebih keras dibandingkan dengan konsonan sebelumnya. Kombinasi ini membuat kata-kata menjadi lebih berirama:

たこ (tako): berarti gurita, menggabungkan "t" dengan vokal "a" dan "o."

ちかい (chikai): berarti dekat, dengan konsonan "t" yang diikuti oleh "i" dan diakhiri dengan "a."

つき (tsuki): berarti bulan, menggunakan kombinasi unik "ts" dengan vokal "u" dan "i."

て (te): berarti tangan, hanya menggunakan "t" diikuti oleh "e."

とり (tori): berarti burung, di mana "t" diikuti oleh vokal "o" dan "i."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'na ni nu ne no',
            'isi' => 'Konsonan n pada deretan ini menghasilkan bunyi yang lebih lembut dan lebih nasal. Kata-kata yang dibentuk dengan kombinasi ini sering kali lebih berfokus pada keakraban atau kealamian dalam pengucapan:

なつ (natsu): berarti musim panas, di mana "n" diikuti oleh "a" dan berakhir dengan "u."

にほん (nihon): berarti Jepang, di mana "n" menggabungkan vokal "i" dan "o."

ぬの (nuno): berarti kain, dengan pengulangan vokal "u."

ねこ (neko): berarti kucing, menggabungkan "n" dengan vokal "e" dan "o."

のむ (nomu): berarti minum, di mana "n" mengikuti vokal "o" dan berakhir dengan "u."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ha hi fu he ho',
            'isi' => 'Konsonan h ditambahkan pada vokal dasar untuk menciptakan suara yang lebih halus namun tetap jelas. Ini menciptakan variasi pengucapan yang lebih ringan:

はな (hana): berarti bunga, menggabungkan "h" dengan vokal "a" dan "a."

ひく (hiku): berarti menarik, menggabungkan "h" dengan vokal "i" dan "u."

ふく (fuku): berarti pakaian, dengan pengulangan vokal "u."

へや (heya): berarti ruangan, di mana "h" diikuti oleh vokal "e" dan "a."

ほし (hoshi): berarti bintang, di mana "h" diikuti oleh vokal "o" dan diakhiri dengan "i."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ma mi mu me mo',
            'isi' => 'Konsonan m pada deretan ini menghasilkan bunyi yang lebih terhubung dan lembut, sering kali terdengar seperti pengulangan atau kepastian:

まど (mado): berarti jendela, menggabungkan "m" dengan vokal "a" dan "o."

みみ (mimi): berarti telinga, dengan pengulangan vokal "i" yang memberikan kesan simetris.

むし (mushi): berarti serangga, di mana "m" digabungkan dengan vokal "u" dan "i."

め (me): berarti mata, hanya menggabungkan "m" dengan vokal "e."

もも (momo): berarti persik, dengan pengulangan vokal "o."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ya yu yo',
            'isi' => 'Konsonan y dalam deretan ini ditambahkan ke vokal dasar untuk menciptakan suara yang lebih ringan dan melodis, cocok untuk menggambarkan elemen alam atau kehidupan sehari-hari:

やま (yama): berarti gunung, menggabungkan "y" dengan vokal "a" dan "a."

ゆき (yuki): berarti salju, menggabungkan "y" dengan vokal "u" dan "i."

よる (yoru): berarti malam, menggabungkan "y" dengan vokal "o" dan diakhiri dengan "u."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'ra ri ru re ro',
            'isi' => 'Konsonan r dalam deretan ini memberikan suara yang lebih bergetar, yang sering kali digunakan untuk menggambarkan gerakan atau keadaan yang dinamis:

らく (raku): berarti mudah, menggabungkan "r" dengan vokal "a" dan "u."

りんご (ringo): berarti apel, di mana "r" diikuti oleh vokal "i" dan "o."

るす (rusu): berarti tidak ada di rumah, dengan pengulangan vokal "u."

れきし (rekishi): berarti sejarah, di mana "r" diikuti oleh vokal "e" dan berakhir dengan "i."

ろく (roku): berarti enam, menggabungkan "r" dengan vokal "o" dan diakhiri dengan "u."

'
        ]);
        DetailMateri::create([
            'materi_id' => $materi1->id,
            'judul' => 'wa wo n',
            'isi' => 'Konsonan r dalam deretan ini memberikan suara yang lebih bergetar, yang sering kali digunakan untuk menggambarkan gerakan atau keadaan yang dinamis:

らく (raku): berarti mudah, menggabungkan "r" dengan vokal "a" dan "u."

りんご (ringo): berarti apel, di mana "r" diikuti oleh vokal "i" dan "o."

るす (rusu): berarti tidak ada di rumah, dengan pengulangan vokal "u."

れきし (rekishi): berarti sejarah, di mana "r" diikuti oleh vokal "e" dan berakhir dengan "i."

ろく (roku): berarti enam, menggabungkan "r" dengan vokal "o" dan diakhiri dengan "u."

'
        ]);

        $materi2 = Materi::create([
            'judul' => 'Materi 2 : Katakana Dasar'
        ]);

        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'a i u e o',
            'isi' => 'Katakana vokal dasar terdiri dari lima huruf: ア (a), イ (i), ウ (u), エ (e), dan オ (o). Huruf-huruf ini adalah dasar dari sistem katakana dan menjadi komponen penting dalam pengucapan bahasa Jepang. Katakana sering digunakan untuk menuliskan kata-kata serapan dari bahasa asing, nama-nama ilmiah, dan onomatope (kata tiruan bunyi).

アオ (ao) = biru

イエ (ie) = rumah

ウエ (ue) = atas

エ (e) = gambar, lukisan

オオキイ (ookii) = besar'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ka ki ku ke ko',
            'isi' => 'Huruf-huruf ini dibentuk dengan menambahkan konsonan "k" ke masing-masing vokal.

カ (ka), キ (ki), ク (ku), ケ (ke), コ (ko)

Contoh kata:

カオ (kao) = wajah

キク (kiku) = mendengar

クチ (kuchi) = mulut

ケ (ke) = rambut

コエ (koe) = suara'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'sa shi su se so',
            'isi' => 'Konsonan "s" ditambahkan ke vokal, tetapi perhatikan bahwa シ (shi) bukan si, dan pelafalannya berbeda.

サ (sa), シ (shi), ス (su), セ (se), ソ (so)

Contoh kata:

サカナ (sakana) = ikan

シロ (shiro) = putih

スシ (sushi) = sushi

セン (sen) = seribu

ソラ (sora) = langit'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ta chi tsu te to',
            'isi' => 'Mirip dengan baris sebelumnya, チ (chi) dan ツ (tsu) bukan pelafalan langsung dari "ti" dan "tu".

タ (ta), チ (chi), ツ (tsu), テ (te), ト (to)

Contoh kata:

タコ (tako) = gurita

チカイ (chikai) = dekat

ツキ (tsuki) = bulan

テ (te) = tangan

トリ (tori) = burung'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'na ni nu ne no',
            'isi' => 'Baris ini cukup konsisten dengan pelafalan vokalnya.

ナ (na), ニ (ni), ヌ (nu), ネ (ne), ノ (no)

Contoh kata:

ナツ (natsu) = musim panas

ニホン (nihon) = Jepang

ヌノ (nuno) = kain

ネコ (neko) = kucing

ノム (nomu) = minum'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ha hi fu he ho',
            'isi' => 'Perhatikan bahwa フ (fu) memiliki pelafalan unik—bukan "hu", tetapi lebih mendekati antara fu dan hu.

ハ (ha), ヒ (hi), フ (fu), ヘ (he), ホ (ho)

Contoh kata:

ハナ (hana) = bunga

ヒク (hiku) = menarik

フク (fuku) = pakaian

ヘヤ (heya) = ruangan

ホシ (hoshi) = bintang'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ma mi mu me mo',
            'isi' => 'Baris "m" sangat umum dalam kata-kata Jepang maupun kata serapan.

マ (ma), ミ (mi), ム (mu), メ (me), モ (mo)

Contoh kata:

マド (mado) = jendela

ミミ (mimi) = telinga

ムシ (mushi) = serangga

メ (me) = mata

モモ (momo) = buah persik'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ya yu yo',
            'isi' => 'Hanya terdiri dari tiga huruf, digunakan juga dalam kombinasi seperti キャ (kya), シュ (shu), ミョ (myo), dsb.

ヤ (ya), ユ (yu), ヨ (yo)

Contoh kata:

ヤマ (yama) = gunung

ユキ (yuki) = salju

ヨル (yoru) = malam'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'ra ri ru re ro',
            'isi' => 'Suara "r" dalam bahasa Jepang berada di antara "r" dan "l", dengan lidah menyentuh langit-langit mulut secara ringan.

ラ (ra), リ (ri), ル (ru), レ (re), ロ (ro)

Contoh kata:

ラク (raku) = mudah, nyaman

リンゴ (ringo) = apel

ルス (rusu) = tidak di rumah

レキシ (rekishi) = sejarah

ロク (roku) = enam'
        ]);
        DetailMateri::create([
            'materi_id' => $materi2->id,
            'judul' => 'wa wo n',
            'isi' => 'ワ (wa) digunakan dalam kata biasa.

ヲ (wo) digunakan sebagai partikel gramatikal, meski sering diucapkan "o".

ン (n) adalah satu-satunya konsonan mandiri dalam bahasa Jepang.

Contoh kata:

ワニ (wani) = buaya

ヲ (wo) = partikel objek langsung

オンガク (ongaku) = musik (mengandung ン)'
        ]);

        $materi3 = Materi::create([
            'judul' => 'Materi 3 : Tanda Baca'
        ]);

        DetailMateri::create([
            'materi_id' => $materi3->id,
            'judul' => 'Dakuten',
            'isi' => 'Dakuten adalah tanda kutip dua kecil yang ditempatkan di kanan atas karakter katakana. Tanda ini mengubah bunyi konsonan dari suara tidak bersuara (voiceless) menjadi suara bersuara (voiced).

✅ Contoh perubahan dengan dakuten:

カ (ka)	ガ (ga)	ガッコウ (gakkou)	sekolah
キ (ki)	ギ (gi)	ギター (gitaa)	gitar
ク (ku)	グ (gu)	グラス (gurasu)	gelas
ケ (ke)	ゲ (ge)	ゲーム (geemu)	game
コ (ko)	ゴ (go)	ゴミ (gomi)	sampah'
        ]);
        DetailMateri::create([
            'materi_id' => $materi3->id,
            'judul' => 'Handakuten',
            'isi' => 'Handakuten adalah tanda bulat kecil seperti lingkaran (゜) di kanan atas karakter katakana. Tanda ini khusus untuk baris H, dan mengubah konsonan menjadi bunyi "p" yang tidak bersuara (voiceless plosive).

✅ Contoh perubahan dengan handakuten:

Tanpa Handakuten	Dengan Handakuten	Contoh Kata (Katakana)	Arti
ハ (ha)	パ (pa)	パン (pan)	roti
ヒ (hi)	ピ (pi)	ピアノ (piano)	piano
フ (fu)	プ (pu)	プール (puuru)	kolam renang
ヘ (he)	ペ (pe)	ペン (pen)	pena
ホ (ho)	ポ (po)	ポケット (poketto)	saku (pocket)'
        ]);

    }
}