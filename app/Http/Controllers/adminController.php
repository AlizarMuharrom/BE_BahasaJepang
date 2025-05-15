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
use Hash;
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

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('not_admin', 'Akun bukan role admin!');
            }
        }

        // Jika autentikasi gagal
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
        $jumlahUser = User::count();
        $jumlahKanji = Kanji::count();
        $jumlahKamus = Kamus::count();

        return view('admin.dashboard', compact('jumlahUser', 'jumlahKanji', 'jumlahKamus'));
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

            return redirect()->route('materi')->with('success_adding', 'Materi berhasil disimpan!');

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

            return redirect()->route('materi')->with('success_update', 'Materi berhasil diperbarui!');
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

            return redirect()->route('materi')->with('success_delete', 'Materi berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus materi: ' . $e->getMessage());
        }
    }

    public function kamus()
    {
        $data = Kamus::with(['detailKamuses', 'level'])->get();
        $levels = Level::all();
        return view('admin.kamus', compact('data', 'levels'));
    }

    public function tambahKamus()
    {
        return view('admin.tambah.tambahKamus');
    }

    public function kamusStore(Request $request)
    {
        // Add proper validation
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'baca' => 'required|string|max:255',
            'level_id' => 'required|string|in:N5,N4', // Ensure only these values
            'detail_kanji' => 'required|array|min:1',
            'detail_arti' => 'required|array|min:1',
            'detail_voice' => 'required|array|min:1',
            'detail_kanji.*' => 'required|string|max:255',
            'detail_arti.*' => 'required|string|max:255',
            'detail_voice.*' => 'required|file|mimes:mp3,wav|max:2048', // 2MB max
        ]);

        // Start transaction
        DB::beginTransaction();

        try {
            $levelMapping = [
                'N5' => 2,
                'N4' => 3
            ];

            // Create main Kamus record
            $kamus = Kamus::create([
                'judul' => $request->judul,
                'nama' => $request->nama,
                'baca' => $request->baca,
                'level_id' => $levelMapping[$request->level_id],
            ]);

            // Create detail records
            foreach ($request->detail_kanji as $i => $kalimat) {
                DetailKamus::create([
                    'kamus_id' => $kamus->id,
                    'kanji' => $kalimat,
                    'arti' => $request->detail_arti[$i],
                    'voice_record' => $request->file('detail_voice')[$i]->store('assets/voice'),
                ]);
            }

            DB::commit();
            return redirect()->route('kamus')->with('success_adding', 'Data kamus berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    // AdminController.php

    public function kamusUpdate(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $kamus = Kamus::findOrFail($id);

            $request->validate([
                'judul' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'baca' => 'required|string|max:255',
                'level_id' => 'required|exists:levels,id', // Ubah validasi untuk memeriksa ID level
                'detail_id' => 'required|array',
                'detail_kanji' => 'required|array',
                'detail_arti' => 'required|array',
                'detail_kanji.*' => 'required|string|max:255',
                'detail_arti.*' => 'required|string|max:255',
                'detail_voice' => 'nullable|array',
                'detail_voice.*' => 'nullable|file|mimes:mp3,wav|max:2048',
                'existing_voice' => 'nullable|array',
                'existing_voice.*' => 'nullable|string',
            ]);

            // Update data utama kamus
            $kamus->update([
                'judul' => $request->judul,
                'nama' => $request->nama,
                'baca' => $request->baca,
                'level_id' => $request->level_id, // Langsung gunakan level_id dari request
            ]);

            $detailIdsToKeep = [];

            // Update atau buat detail kamus
            foreach ($request->detail_id as $index => $detailId) {
                $detailData = [
                    'kanji' => $request->detail_kanji[$index],
                    'arti' => $request->detail_arti[$index],
                ];

                // Handle file upload
                if (isset($request->detail_voice[$index])) {
                    $detailData['voice_record'] = $request->file('detail_voice')[$index]->store('assets/voice');
                } elseif (isset($request->existing_voice[$index])) {
                    $detailData['voice_record'] = $request->existing_voice[$index];
                }

                if ($detailId === 'new') {
                    $detail = $kamus->detailKamuses()->create($detailData);
                    $detailIdsToKeep[] = $detail->id;
                } else {
                    $detail = DetailKamus::where('id', $detailId)
                        ->where('kamus_id', $kamus->id)
                        ->firstOrFail();

                    $detail->update($detailData);
                    $detailIdsToKeep[] = $detail->id;
                }
            }

            // Hapus detail yang tidak ada dalam request
            $kamus->detailKamuses()
                ->whereNotIn('id', $detailIdsToKeep)
                ->delete();

            DB::commit();
            return redirect()->route('kamus')->with('success_update', 'Data kamus berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    public function kamusDelete($id)
    {
        try {
            // Temukan data kamus yang akan dihapus
            $kamus = Kamus::findOrFail($id);

            $kamus->detailKamuses()->delete();

            $kamus->delete();

            return redirect()->route('kamus')->with('success_delete', 'Data kamus berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data kamus: ' . $e->getMessage());
        }
    }

    public function kanji()
    {
        $data = Kanji::with('detailKanji')->get();
        return view('admin.kanji', compact('data'));
    }

    public function tambahKanji()
    {
        return view('admin.tambah.tambahKanji');
    }

    public function kanjiStore(Request $request)
    {
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

        $level = Level::find($request->level_id);
        if (!$level) {
            return back()->with('error', 'Level tidak ditemukan.')->withInput();
        }

        // Simpan file utama dengan nama asli
        $voiceRecord = $request->file('voice_record');
        $voiceRecordPath = $voiceRecord->storeAs(
            'public/assets/voice',
            $voiceRecord->getClientOriginalName()
        );

        $kanji = Kanji::create([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'kunyomi' => $request->kunyomi,
            'onyomi' => $request->onyomi,
            'kategori' => $request->kategori,
            'level_id' => $level->id,
            'voice_record' => str_replace('public/', '', $voiceRecordPath),
        ]);

        // Simpan Detail Kanji
        foreach ($request->detail_kanji as $i => $kanjiDetail) {
            $detailVoice = $request->file('detail_voice')[$i];
            $detailVoicePath = $detailVoice->storeAs(
                'public/assets/voice',
                $detailVoice->getClientOriginalName()
            );

            DetailKanji::create([
                'kanji_id' => $kanji->id,
                'kanji' => $kanjiDetail,
                'romaji' => $request->detail_romaji[$i],
                'arti' => $request->detail_arti[$i],
                'voice_record' => str_replace('public/', '', $detailVoicePath),
            ]);
        }

        return redirect()->route('kanji')->with('success_adding', 'Data kanji berhasil ditambahkan!');
    }

    public function kanjiUpdate(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Validasi data utama
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kunyomi' => 'required|string|max:255',
                'onyomi' => 'required|string|max:255',
                'kategori' => 'required|string|in:tandoku,okurigana,jukugo',
                'detail_id' => 'sometimes|array',
                'detail_kanji' => 'sometimes|array',
                'detail_arti' => 'sometimes|array',
                'detail_romaji' => 'sometimes|array',
                'detail_voice_record' => 'sometimes|array'
            ]);

            // Update data utama kanji
            $kanji = Kanji::findOrFail($id);
            $kanji->update($validated);

            // Proses update detail yang ada saja
            if ($request->has('detail_id')) {
                foreach ($request->detail_id as $index => $detailId) {
                    $detailData = [
                        'kanji' => $request->detail_kanji[$index],
                        'arti' => $request->detail_arti[$index],
                        'romaji' => $request->detail_romaji[$index],
                        'voice_record' => $request->detail_voice_record[$index] ?? null
                    ];

                    $detail = DetailKanji::where('id', $detailId)
                        ->where('kanji_id', $kanji->id)
                        ->first();

                    if ($detail) {
                        $detail->update($detailData);
                    }
                }
            }

            DB::commit();

            return redirect()->route('kanji')->with('success_update', 'Data kanji berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui data kanji: ' . $e->getMessage());
        }
    }

    public function kanjiDelete($id)
    {
        $kanji = Kanji::findOrFail($id);

        // Optional: hapus juga file suara jika ingin
        if ($kanji->voice_record) {
            Storage::delete($kanji->voice_record);
        }

        $kanji->delete();

        return redirect()->route('kanji')->with('success_delete', 'Data kanji berhasil dihapus!');
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

            return redirect()->route('ujian')->with('success_adding', 'Ujian berhasil dibuat!');

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

            return redirect()->route('ujian')->with('success_update', 'Data ujian berhasil diperbarui.');

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

            return redirect()->route('ujian')->with('success_delete', 'Data ujian berhasil dihapus.');

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
