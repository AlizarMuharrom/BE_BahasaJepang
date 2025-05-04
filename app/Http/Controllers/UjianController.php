<?php

namespace App\Http\Controllers;

use App\Models\DetailUjian;
use App\Models\Ujian;
use App\Models\HasilUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    // Mendapatkan daftar ujian berdasarkan level
    public function index($levelId)
    {
        $ujians = Ujian::withCount('questions')
            ->where('level_id', $levelId)
            ->get();

        return response()->json($ujians);
    }

    // Mendapatkan soal ujian
    // Di UjianController, method getSoal:
    public function getSoal($ujianId)
    {
        $soal = DetailUjian::where('ujian_id', $ujianId) // Pastikan nama kolom sesuai
            ->inRandomOrder()
            ->take(20) // Ambil 20 soal acak untuk pemula
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'soal' => $item->soal,
                    'pilihan_jawaban' => json_decode($item->pilihan_jawaban, true),
                    'jawaban_benar' => $item->jawaban_benar
                ];
            });

        return response()->json($soal);
    }

    // Submit jawaban ujian
    public function submitUjian(Request $request, $ujianId)
    {
        $request->validate([
            'jawaban' => 'required|array',
            'jawaban.*.soal_id' => 'required|exists:detail_ujians,id',
            'jawaban.*.jawaban_user' => 'required|string'
        ]);

        $ujian = Ujian::findOrFail($ujianId);
        $jawabanUser = $request->jawaban;

        // Hitung jumlah jawaban benar
        $jumlahBenar = 0;
        $detailJawaban = [];

        foreach ($jawabanUser as $jawaban) {
            $soal = DetailUjian::find($jawaban['soal_id']);
            $isCorrect = $soal->jawaban_benar === $jawaban['jawaban_user'];

            if ($isCorrect) {
                $jumlahBenar++;
            }

            $detailJawaban[] = [
                'soal_id' => $jawaban['soal_id'],
                'jawaban_user' => $jawaban['jawaban_user'],
                'correct' => $isCorrect
            ];
        }

        // Hitung score (0-100)
        $score = ($jumlahBenar / $ujian->jumlah_soal) * 100;

        // Simpan hasil ujian
        $hasil = HasilUjian::create([
            'user_id' => Auth::id(),
            'ujian_id' => $ujianId,
            'jumlah_benar' => $jumlahBenar,
            'score' => $score,
            'detail_jawaban' => json_encode($detailJawaban)
        ]);

        return response()->json([
            'success' => true,
            'score' => $score,
            'jumlah_benar' => $jumlahBenar,
            'total_soal' => $ujian->jumlah_soal,
            'hasil_id' => $hasil->id
        ]);
    }

    // Di Controller
    public function getHasilByUser($userId)
    {
        if (auth()->id() != $userId) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access'
            ], 403);
        }

        $hasilUjian = HasilUjian::with('ujian')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $hasilUjian
        ]);
    }

    // Mendapatkan hasil ujian user
    public function getHasil($hasilId)
    {
        $hasil = HasilUjian::with('ujian')
            ->where('user_id', Auth::id())
            ->findOrFail($hasilId);

        return response()->json($hasil);
    }
}