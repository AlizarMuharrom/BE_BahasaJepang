<?php

namespace App\Http\Controllers;

use App\Models\DetailKamus;
use App\Models\DetailKanji;
use App\Models\DetailMateri;
use App\Models\DetailUjian;
use App\Models\Kamus;
use App\Models\Kanji;
use App\Models\Level;
use App\Models\Materi;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('failed', 'Email atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }
    public function home()
    {
        return view('admin.dashboard');
    }
    public function materi()
    {
        $data = Materi::with('detail_materis')->get(); // perhatikan nama relasi
        return view('admin.materi', compact('data'));
    }

    public function tambahMateri()
    {
        return view('admin.tambah.tambahMateri');
    }

    public function materiStore(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul_materi' => 'required|string|max:255',
            'judul_detail' => 'required|array|min:1',
            'judul_detail.*' => 'required|string|max:255',
            'isi_detail' => 'required|array|min:1',
            'isi_detail.*' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            // Simpan data materi utama
            $materi = Materi::create([
                'judul' => $validated['judul_materi']
            ]);

            // Simpan detail materi
            foreach ($validated['judul_detail'] as $index => $judul) {
                DetailMateri::create([
                    'materi_id' => $materi->id,
                    'judul' => $judul,
                    'isi' => $validated['isi_detail'][$index]
                ]);
            }

            DB::commit();

            return redirect()->route('materi')->with('success', 'Materi berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan materi: ' . $e->getMessage())->withInput();
        }
    }

    // In your AdminController.php

    public function materiUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'detail_judul.*' => 'required|string|max:255',
            'detail_isi.*' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Update main materi
            $materi = Materi::findOrFail($id);
            $materi->update([
                'judul' => $request->judul
            ]);

            // Update detail materi
            foreach ($request->detail_judul as $detailId => $judul) {
                $detail = DetailMateri::findOrFail($detailId);
                $detail->update([
                    'judul' => $judul,
                    'isi' => $request->detail_isi[$detailId]
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Materi berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui materi: ' . $e->getMessage());
        }
    }

    public function materiDelete($id)
    {
        try {
            DB::beginTransaction();

            $materi = Materi::findOrFail($id);

            // Delete detail materi first to maintain referential integrity
            $materi->detail_materis()->delete();

            // Then delete the main materi
            $materi->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Materi berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus materi: ' . $e->getMessage());
        }
    }

    public function kamus()
    {
        $data = Kamus::all();
        return view('admin.kamus', compact('data'));
    }

    public function tambahKamus()
    {
        return view('admin.tambah.tambahKamus');
    }

    public function kamusStore(Request $request)
    {
        // Validasi input (optional, tapi disarankan)
        $request->validate([
            'judul' => 'required|string',
            'nama' => 'required|string',
            'baca' => 'required|string',
            'level_id' => 'required|string',
            'detail_kanji' => 'required|array',
            'detail_arti' => 'required|array',
            'detail_voice' => 'required|array',
            'detail_kanji.*' => 'required|string',
            'detail_arti.*' => 'required|string',
            'detail_voice.*' => 'required|file|mimes:audio/*',
        ]);

        $levelMapping = [
            'N5' => 1,
            'N4' => 2
        ];

        $kamus = Kamus::create([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'baca' => $request->baca,
            'level_id' => $levelMapping[$request->level_id],
        ]);

        foreach ($request->detail_kanji as $i => $kalimat) {
            DetailKamus::create([
                'kamus_id' => $kamus->id,
                'kanji' => $kalimat, // Sesuai dengan kolom di database
                'arti' => $request->detail_arti[$i], // Sesuai dengan kolom di database
                'voice_record' => $request->file('detail_voice')[$i]->store('assets/voice/'),
            ]);
        }

        return redirect()->route('kamus')->with('success', 'Data kamus berhasil disimpan.');
    }

    // AdminController.php

    public function kamusUpdate(Request $request, $id)
    {
        $kamus = Kamus::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'baca' => 'required|string|max:255',
            'level_id' => 'required|string|max:255',
        ]);

        $level = Level::where('level_name', $request->level_id)->first();
        if (!$level) {
            return back()->with('error', 'Level tidak ditemukan.');
        }

        $kamus->update([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'baca' => $request->baca,
            'level_id' => $level->id,
        ]);

        return redirect()->route('kamus')->with('success', 'Data kamus berhasil diperbarui.');
    }

    public function kamusDelete($id)
    {
        try {
            // Temukan data kamus yang akan dihapus
            $kamus = Kamus::findOrFail($id);

            $kamus->detailKamuses()->delete();

            $kamus->delete();

            return redirect()->route('kamus')->with('success', 'Data kamus berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data kamus: ' . $e->getMessage());
        }
    }

    public function kanji()
    {
        $data = Kanji::all();
        return view('admin.kanji', compact('data'));
    }

    public function tambahKanji()
    {
        return view('admin.tambah.tambahKanji');
    }

    public function kanjiStore(Request $request)
    {
        // Validasi input
        $validatorResult = $request->validate([
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kunyomi' => 'required|string|max:255',
            'onyomi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'level_id' => 'required|string',
            'voice_record' => 'required|file|mimes:mp3,wav',
            'detail_kanji' => 'required|array',
            'detail_romaji' => 'required|array',
            'detail_arti' => 'required|array',
            'detail_voice' => 'required|array',
        ]);

        $level = Level::where('level_name', $request->level_id)->first();
        if (!$level) {
            return back()->with('error', 'Level tidak ditemukan.');
        }



        $kanji = Kanji::create([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'kunyomi' => $request->kunyomi,
            'onyomi' => $request->onyomi,
            'kategori' => $request->kategori,
            'level_id' => $level->id,
            'voice_record' => $request->file('voice_record')->store('assets/voice/'),
        ]);

        // Simpan Detail Kanji
        foreach ($request->detail_kanji as $i => $kanjiDetail) {
            DetailKanji::create([
                'kanji_id' => $kanji->id,
                'kanji' => $kanjiDetail,
                'romaji' => $request->detail_romaji[$i],
                'arti' => $request->detail_arti[$i],
                'voice_record' => $request->file('detail_voice')[$i]->store('assets/voice/'), // Simpan file detail
            ]);
        }

        return redirect()->route('kanji')->with('success', 'Kanji berhasil ditambahkan.');
    }

    public function kanjiUpdate(Request $request, $id)
    {
        $kanji = Kanji::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kunyomi' => 'required|string|max:255',
            'onyomi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        $kanji->update([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'kunyomi' => $request->kunyomi,
            'onyomi' => $request->onyomi,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kanji')->with('success', 'Data kanji berhasil diperbarui.');
    }

    public function kanjiDelete($id)
    {
        $kanji = Kanji::findOrFail($id);

        // Optional: hapus juga file suara jika ingin
        if ($kanji->voice_record) {
            Storage::delete($kanji->voice_record);
        }

        $kanji->delete();

        return redirect()->route('kanji')->with('success', 'Data kanji berhasil dihapus.');
    }



    public function ujian()
    {
        // Ambil data ujian beserta relasi questions (detail ujian)
        $data = Ujian::with('questions')->get();

        return view('admin.ujian', compact('data'));
    }


    public function tambahUjian()
    {
        return view('admin.tambah.tambahUjian');
    }

    public function ujianStore(Request $request)
    {
        // Debug data input
        // dd($request->all());

        // Validasi input
        $validatedData = $request->validate([
            'level_id' => 'required|string|in:pemula,n5,n4',
            'judul' => 'required|string|max:255',
            'jumlah_soal' => 'required|integer|min:1',
            'soal' => 'required|array|min:1',
            'soal.*.soal' => 'required|string',
            'soal.*.pilihan_jawaban' => 'required|array',
            'soal.*.pilihan_jawaban.A' => 'required|string',
            'soal.*.pilihan_jawaban.B' => 'required|string',
            'soal.*.pilihan_jawaban.C' => 'required|string',
            'soal.*.pilihan_jawaban.D' => 'required|string',
            'soal.*.jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        // Mapping level
        $levelMap = [
            'pemula' => 1,
            'n5' => 2,
            'n4' => 3
        ];

        DB::beginTransaction();
        try {
            // Buat ujian baru
            $ujian = Ujian::create([
                'level_id' => $levelMap[$validatedData['level_id']],
                'judul' => $validatedData['judul'],
                'jumlah_soal' => $validatedData['jumlah_soal']
            ]);

            // Simpan soal-soal
            foreach ($validatedData['soal'] as $soal) {
                DetailUjian::create([
                    'ujian_id' => $ujian->id,
                    'soal' => $soal['soal'],
                    'pilihan_jawaban' => json_encode($soal['pilihan_jawaban']),
                    'jawaban_benar' => $soal['jawaban_benar']
                ]);
            }

            DB::commit();

            return redirect()->route('ujian')->with('success', 'Ujian berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat ujian: ' . $e->getMessage())->withInput();
        }
    }

    public function ujianUpdate(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah_soal' => 'required|integer|min:1',
            'level_id' => 'required|integer|in:1,2,3' // 1=Pemula, 2=N5, 3=N4
        ]);

        try {
            // Temukan data ujian yang akan diupdate
            $ujian = Ujian::findOrFail($id);

            // Update data ujian
            $ujian->update([
                'judul' => $request->judul,
                'jumlah_soal' => $request->jumlah_soal,
                'level_id' => $request->level_id
            ]);

            return redirect()->route('ujian')->with('success', 'Data ujian berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data ujian: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function ujianDelete($id)
    {
        DB::beginTransaction();
        try {
            $ujian = Ujian::with(['questions', 'results'])->findOrFail($id);

            $ujian->questions()->delete();
            $ujian->results()->delete();

            $ujian->delete();

            DB::commit();

            return redirect()->route('ujian')->with('success', 'Data ujian berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menghapus data ujian: ' . $e->getMessage());
        }
    }

    public function user()
    {
        $data = User::all();
        return view('admin.user', compact('data'));
    }
}
