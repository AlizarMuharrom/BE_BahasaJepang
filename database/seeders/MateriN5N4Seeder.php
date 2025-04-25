<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\MateriN5N4;
use App\Models\DetailMateriN5N4;
use Illuminate\Database\Seeder;

class MateriN5N4Seeder extends Seeder
{
    public function run()
    {
        $levelN5 = Level::where('level_name', 'N5')->first();
        $levelN4 = Level::where('level_name', 'N4')->first();
        // Materi N5
        $materiN5 = MateriN5N4::create([
            'judul' => 'Pembelajaran 1',
            'level_id' => $levelN5->id
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Terjemahan',
            'isi' => 'Pola Kalimat
1.	Saya Mike Miller 
2.	Sdr. Santos bukan mahasiswa 
3.	Apakah Sdr. Miller pegawai perusahaan?
4.	Sdr. Santos juga pegawai perusahaan
Contoh Kalimat
1.	[Apakah Anda] Sdr. Mike Miller?
….. Ya, [saya] Mike Miller.
2.	Apakah Sdr. Miller mahasiswa?
….. Bukan, [saya] bukan mahasiswa.
3.	Apakah Sdr. Wang pegawai bank?
….. Bukan, [Sdr. Wang] bukan pegawai bank.
Dokter
4.	Beliau siapa?
….. Sdr. Wat Dosen Universitas Sakura.
5.	Apakah Sdr. Gupta pegawai perusahaan?
….. Ya, pegawai perusahaan.
Apakah Sdr. Karina juga pegawai perusahaan?
….. Bukan, [Sdr. Karina ] mahasiswi
6.	Berapa usia Teresa?
….. Sembilan tahun
Percakapan
                                    Salam Kenal!
Sato:                 Selamat pagi.
Yamada:           Selamat pagi. Sdr. Sato, ini Sdr. Mike Miller.
Miller:               Salam kenal! Saya Mike Miller. Saya datang dari Amerika Serikat. Senang berkenalan dengan anda
Sato:                  Saya Keiko Sato, senang berkenalan dengan anda
'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Kata-Kata Referensi dan Informasi',
            'isi' => 'No	, Negara ,	Orang ,	Bahasa 
1	Jepang	 にほんじん	...にほんご
2	Amerika Serikat	アメリカじん...	えいご
3	Inggris	 イギリスじん	...えいご
4	Italia	 イタリアじん	...イタリアご
5	Iran	 イランじん	...ペルシャご
6	India	 インドじん	...ヒンディーご
7	Indonesia	 インドネシアじん	...インドネシアご
8	Mesir	 エジプトじん	...アラビアご
9	Australia	 オーストラリアじん	...えいご
10	Kanada	 カナダじん	...えいご / フランスご
11	Korea Selatan	 かんこくじん	...かんこくご
12	Arab Saudi	 サウジアラビアじん	...アラビアご
13	Singapura	 シンガポールじん	...えいご / ちゅうごくご など
14	Spanyol	 スペインじん	...スペインご
15	Thailand	 タイじん	...タイご
16	China	 ちゅうごくじん	...ちゅうごくご
17	Jerman	 ドイツじん	...ドイツご
18	Prancis	 フランスじん	...フランスご
19	Filipina	 フィリピンじん	...タガログご / フィリピンご
20	Brazil	 ブラジルじん	...ポルトガルご
21	Vietnam	  ベトナムじん	...ベトナムご
22	Malaysia	 マレーシアじん	...マレーご
23	Meksiko  	 メキシコじん	...スペインご
24	Rusia	 ロシアじん	...ロシアご

'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Keterangan Tata Bahasa',
            'isi' => '1.	Kata Benda, は Kata Benda, です 
1)	Partikel は
Partikel ini menunjukkan bahwa kata sebelumnya adalah topik kalimat. Si pembicara memakai partikel tersebut untuk hal yang mau dibicarakannya kemudian selanjutnya membuat kalimat dengan menambahkan berbagai deskripsi. 

私はマイク・ミラーです      Saya Mike Miller

2)	です
Kata benda yang diikuti oleh です menjadi predikat. Menyatakan maksud penilaian dan kepastian juga menunjukkan sikap sopan terhadap lawan bicara.

私は会社員です      Saya pegawai perusahaan

2.	Kata Benda 1 は,  Kata Benda 2 じゃ (では) ありません
じゃ (では) ありません adalah bentuk negatif dari desu. Dalam percakapan sehari hari sering digunakan. Dalam pidato resmi atau bahasa tertulis digunakan では ありません

サントスさんは ダイガクセイ ではありません。  Sdr. Santos bukan mahasiswa
3.	Kata Benda 1 は, Kata Benda 2 ですか (Kalimat Tanya)
1)	Partikel Ka
Partikel Ka menyatakan perasaan ketidakpastian atau heran si pembicara. Dengan memakai ka pada akhir kalimat, maka dapat membuat kalimat tanya. Kalimat tanya biasanya disertai intonasi naik pada akhir kalimat.
2)	Kalimat tanya untuk menyatakan ya atau tidak tentang isi kalimat.
Tanpa mengubah susunan kata kata, membuat kalimat dengan membubuhi ka pada akhir kalimat. Kalimat tanya ini menanyakan apakah benar atau tidak isi kalimat, dan jika benar menjawab dengan memakai “hai”, jika salah menjawab dengan “iie”.

ミラーさんはアメリカじんですか？    Apakah sdr Miller orang Amerika?
はい、アメリカじんです。   Ya, orang Amerika

3)	Kalimat tanya dengan kata tanya
Bagian isi yang ingin ditanyakan diganti dengan kata tanya, dan dibubuhkan ka pada akhir kalimat. 

それはだれですか？      Siapakah orang itu
かれはミラーさんです。   Belaiu sdr Miller
4.	Kata Benda Mo (も)
Mo digunakan apablia menyatakan predikatnya dianggap sama dengan predikat sebelumnya. 

ミラーさんはカイシャのシャインです。グプタさんもカイシャのシャインです。

Sdr. Miller pegawai perusahaan, sdr Gupta (juga) pegawai perusahaan.
5.	Kata Benda 1 No (の) Kata Benda 2
Jika kata benda 1 didepan menerangkan kata benda 2 di belakangnya, maka kedua kata benda disambung dengan no.

ミラーさんはIMCのかいしゃのしゃいんです。Sdr Miller pegawai perusahaan IMC
6.	– San (さん)
Dalam bahasa Jepang memakai san dibelakang marga atau nama lawan bicara atau orang pihak ketiga. Karena san menunjukkan kesopanan, tidak dipakai untuk marga atau nama si pembicara sendiri. Sebagai pengganti san, untuk anak kecil dengan rasa akrab dipakai chan (ちゃん). Ketika memanggil lawan bicara, jika telah mengenal namanya maka anata tidak dipakai lagi, tetapi memanggil marga atau namanya dan dibubuhi dengan san. [perhatian] anata digunakan tergadap orang yang berhubungan sangat dekat (suami, istri, pacar, dll.). Perlu berhati-hati bahwa jika menggunakannya kepada lawan bicara yang hubungan tidak dekat, maka akan memberi kesan yang kurang sopan.
'
        ]);

        $materiN5 = MateriN5N4::create([
            'judul' => 'Pembelajaran 2',
            'level_id' => $levelN5->id
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Terjemahan',
            'isi' => 'Pola Kalimat
1.	Ini kamus.
2.	Itu payung saya.
3.	Buku ini punya saya.
Contoh Kalimat
1.	Ini bolpoin?
….. Ya, betul.
2.	Ini buku tulis?
….. Bukan, [ini] buku agenda.
3.	Apa itu?
….. Kartu nama.
4.	Ini “9” atau “7”?
….. “9”
5.	Itu majalah apa?
….. Majalah komputer.
6.	Itu tas siapa?
….. Tas Sdr. Sato.
7.	Ini punya Sdr. Miller?
….. Bukan, bukan punya saya.
8.	Kunci ini punya siapa?
….. Punya saya.
Percakapan
Mohon bantuan anda
Ichiro Yamada:         Ya! Siapa?
Santos:             Saya Santos di kamar 408
…………………………………………………………….
Santos:             Selamat siang, saya Santos. Mulai sekarang saya akan meminta bantuannya. Mohon bantuan Anda.
Ichiro Yamada:         Sama-sama.
Santos:             Pak, ini kopi, silahkan.
Ichiro Yamada:         Terima kasih banyak.
'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Kata-Kata Referensi dan Informasi',
            'isi' => '名前 (Namae)    Nama Keluarga

佐藤 (Satō)	吉田 (Yoshida)
鈴木 (Suzuki)	山田 (Yamada)
高橋 (Takahashi)	佐々木 (Sasaki)
田中 (Tanaka)	斎藤 (Saitou)
渡辺 (Watanabe)	山口 (Yamaguchi)
伊藤 (Itō)	松本 (Matsumoto)
山本 (Yamamoto)	井上 (Inoue)
中村 (Nakamura)	木村 (Kimura)
小林 (Kobayashi)	林 (Hayashi)
加藤 (Katō)	清水 (Shimizu)
'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN5->id,
            'judul' => 'Keterangan Tata Bahasa',
            'isi' => '1.	これ (kore), それ (sore), dan あれ (are).
Kore, sore dan are menunjukkan benda dan berfungsi sebagai Kata benda. Kore menunjukkan benda yang ada di dekat si pembicara. Sore menunjukkan benda uang ada di dekat lawan bocara. Are menunjukkan benda yang jauh dari pembicara dan lawan bicara.

これは辞書ですか？      Apakah ini kamus?
これはだれのかさですか？          Ini payung siapa?

2.	この (kono) , その (sono), dan あの (ano).
Kono digunakan untuk menunjukkan benda yang dekat dengan pembicara, diikuti kata benda.  Sono digunakan untuk menunjukkan benda yang dekat dengan lawan bicara, diikuti kata benda. Dan ano Digunakan untuk menunjukkan benda yang jauh dari pembicara dan lawan bicara, diikuti kata benda.

3.	そうです (soudesu)
Dalam kaliamt nominal yang menyatakan positif atau negatif, sering digunakan sou dalam jawaban positif, dan dapat menjawab dengan kalimat hai, soudesu.

それは辞書ですか？        Apakah itu kamus?
….. はい、そうです。      Ya, betul.

Untuk bentuk negatif, tidak lazim menjawab dengan sou, tetapi sebagai gantinya digunakan ちがいます (Chigaimasu) yang artinya bukan, atau menyatakan jawaban yang sebenarnya. 

それはミラーさんのですか？          Apakah itu punya Sdr. Miller
….. いいえ、ちがいます。         Bukan.

4.	~か, ~か
Dengan kalimat tanya ini memberi pilihan yang lebih dari dua, kemudian lawan bicara memilih yang tepat. Untuk jawaban, tidak dibubuhi hai, iie, tetapi menyatakan langsung kalimat uang dipilih.

これは「9」ですか「7」ですか？      Apakah ini “9” atau “7”?
….. 「9」です。          “9”

5.	Kata Benda 1 の Kata Benda 2
Pada pelajaran 1 telah dipelajari bahwa jika Kata Benda2, maka digunakan no diantara Kata benda 1 dan kata benda 2. Pada pelajaran ini belajar cara penggunaan no sebagai berikut dibawah ini:
1)	Kata benda 1, menerangkan sesuatu dari kata benda 2
これはコンピュータの本です。           Ini buku komputer.
2)	Kata benda1, menyatakan pemilik kata benda 2
これは私の本です。             Ini buku saya.
6.	の yang berfungsi sebagai pengganti Kata Benda
No digunakan untuk mengganti Kata Benda yang terdapat sebelumnya. Seperti contoh dibawah ini, jika diletakkan di belakang Kata Benda Satou-san, maka bentuk kalimat menjadi sama maknanya dengan dihilangkannya Kata Benda2 dari kaliamt Kata Benda1 No Kata Benda2. No digunakan sebagai pengganti kata benda, tetapi tidak digunakan sebagai pengganti orang.

それは誰のかばんですか？              Itu tas siapa?
….. 佐藤さんのかばんです。            Kepunyaan sdr. Satou.

これはあなたのかばんですか？         Apakah tas ini tas anda?
….. いいえ、私のではありません。       Bukan, bukan kepunyaan saya.

7.	お~
お dibutuhkan pada Kata Benda dan berfungsi untuk menyatakan kesopanan (Contoh: [お]みやげ, [お]さけ) 

8.	そうですか
Ketika mendapatkan informasi baru, ekspresi ini digunakan untuk menyatakan telah mengerti. Diucapkan dengan intonasi menurun.

このかさはあなたのですか？             Apakah payung ini punya anda?
いいえ、ちがいます。シュミットさんのです。  Bukan, salah, punya sdr. Schmidt.
そうですか。           Oo, begitu.
'
        ]);

        $materiN4 = MateriN5N4::create([
            'judul' => 'Pembelajaran 1',
            'level_id' => $levelN4->id
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Tata Bahasa N4',
            'isi' => 'Penjelasan tata bahasa level N4...'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Kosakata N4',
            'isi' => 'Daftar kosakata penting untuk N4...'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Kosakata N4',
            'isi' => 'Daftar kosakata penting untuk N4...'
        ]);

        $materiN4 = MateriN5N4::create([
            'judul' => 'Pembelajaran 2',
            'level_id' => $levelN4->id
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Tata Bahasa N4',
            'isi' => 'Penjelasan tata bahasa level N4...'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Kosakata N4',
            'isi' => 'Daftar kosakata penting untuk N4...'
        ]);

        DetailMateriN5N4::create([
            'materi_n5_n4_id' => $materiN4->id,
            'judul' => 'Kosakata N4',
            'isi' => 'Daftar kosakata penting untuk N4...'
        ]);
    }
}