<?php

namespace Database\Seeders;

use App\Models\DetailUjian;
use App\Models\Level;
use App\Models\Ujian;
use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    public function run()
    {
        // Buat data level jika belum ada
        $levels = [
            ['id' => 1, 'level_name' => 'Pemula'],
            ['id' => 2, 'level_name' => 'N5'],
            ['id' => 3, 'level_name' => 'N4']
        ];
        
        foreach ($levels as $level) {
            Level::updateOrCreate(['id' => $level['id']], $level);
        }

        // Ujian Pemula (20 soal)
        $ujianPemula = Ujian::updateOrCreate(
            ['level_id' => 1],
            [
                'judul' => 'Ujian Bahasa Jepang Pemula',
                'jumlah_soal' => 20
            ]
        );
        $this->createQuestions($ujianPemula, 20, 'Pemula');

        // Ujian N5 (20 soal)
        $ujianN5 = Ujian::updateOrCreate(
            ['level_id' => 2],
            [
                'judul' => 'Ujian JLPT N5',
                'jumlah_soal' => 20
            ]
        );
        $this->createQuestions($ujianN5, 20, 'N5');

        // Ujian N4 (40 soal)
        $ujianN4 = Ujian::updateOrCreate(
            ['level_id' => 3],
            [
                'judul' => 'Ujian JLPT N4',
                'jumlah_soal' => 40
            ]
        );
        $this->createQuestions($ujianN4, 40, 'N4');
    }

    private function createQuestions($ujian, $count, $level)
    {
        // Hapus soal lama jika ada
        DetailUjian::where('ujian_id', $ujian->id)->delete();

        // Buat soal baru
        for ($i = 1; $i <= $count; $i++) {
            $correctAnswer = chr(rand(65, 68)); // Random A-D
            
            DetailUjian::create([
                'ujian_id' => $ujian->id,
                'soal' => "Contoh soal {$i} ujian {$level}: Manakah terjemahan yang benar?",
                'jawaban_benar' => $correctAnswer,
                'pilihan_jawaban' => json_encode([
                    'A' => $this->generateAnswerOption($correctAnswer, 'A', $level),
                    'B' => $this->generateAnswerOption($correctAnswer, 'B', $level),
                    'C' => $this->generateAnswerOption($correctAnswer, 'C', $level),
                    'D' => $this->generateAnswerOption($correctAnswer, 'D', $level)
                ])
            ]);
        }
    }

    private function generateAnswerOption($correct, $option, $level)
    {
        if ($option === $correct) {
            return "Jawaban benar untuk level {$level}";
        }
        
        $wrongOptions = [
            "Jawaban salah 1 level {$level}",
            "Jawaban salah 2 level {$level}",
            "Jawaban salah 3 level {$level}"
        ];
        
        return $wrongOptions[array_rand($wrongOptions)];
    }
}