<?php

namespace App\Http\Controllers;

use App\Models\DetailKamus;
use App\Models\DetailKanji;
use App\Models\Kamus;
use App\Models\Kanji;
use App\Models\Level;
use App\Models\Materi;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
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

            // Hapus terlebih dahulu detail kamus yang terkait
            $kamus->detailKamuses()->delete();

            // Hapus data kamus utama
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
        $data = Ujian::all();
        return view('admin.ujian', compact('data'));
    }

    public function tambahUjian()
    {
        return view('admin.tambah.tambahUjian');
    }
    public function user()
    {
        $data = User::all();
        return view('admin.user', compact('data'));
    }
}
