<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use App\Models\DetailKamus;
use Illuminate\Http\Request;

class KamusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data kamus beserta detail_kamuses
        $kamuses = Kamus::with('detailKamuses')->get();
        return response()->json($kamuses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string',
            'nama' => 'required|string',
            'baca' => 'required|string',
        ]);

        // Simpan data kamus
        $kamus = Kamus::create($request->only(['judul', 'nama', 'baca']));

        // Jika ada data detail_kamuses, simpan juga
        if ($request->has('detail_kamuses')) {
            foreach ($request->detail_kamuses as $detail) {
                DetailKamus::create([
                    'kamus_id' => $kamus->id,
                    'kanji' => $detail['kanji'],
                    'arti' => $detail['arti'],
                    'voice_record' => $detail['voice_record'],
                ]);
            }
        }

        return response()->json($kamus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kamus = Kamus::with('detailKamuses')->findOrFail($id);
        return response()->json($kamus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamus $kamus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamus $kamus)
    {
        // Validasi input
        $request->validate([
            'judul' => 'sometimes|required|string',
            'nama' => 'sometimes|required|string',
            'baca' => 'sometimes|required|string',
        ]);

        // Perbarui data kamus
        $kamus->update($request->only(['judul', 'nama', 'baca']));

        // Jika ada data detail_kamuses, perbarui juga
        if ($request->has('detail_kamuses')) {
            // Hapus detail_kamuses yang lama
            $kamus->detailKamuses()->delete();

            // Simpan detail_kamuses yang baru
            foreach ($request->detail_kamuses as $detail) {
                DetailKamus::create([
                    'kamus_id' => $kamus->id,
                    'kanji' => $detail['kanji'],
                    'arti' => $detail['arti'],
                    'voice_record' => $detail['voice_record'],
                ]);
            }
        }

        return response()->json($kamus, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamus $kamus)
    {
        // Hapus data kamus beserta detail_kamuses (karena ada onDelete cascade)
        $kamus->delete();
        return response()->json(null, 204);
    }
}