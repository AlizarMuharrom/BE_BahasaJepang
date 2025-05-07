<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use App\Models\Kanji;
use App\Models\Materi;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function tambahKamus() {
        return view('admin.tambah.tambahKamus');
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

    public function ujian()
    {
        $data = Ujian::all();
        return view('admin.ujian', compact('data'));
    }

    public function tambahUjian(){
        return view('admin.tambah.tambahUjian');
    }
    public function user()
    {
        $data = User::all();
        return view('admin.user', compact('data'));
    }
}
