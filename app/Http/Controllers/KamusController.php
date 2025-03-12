<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use Illuminate\Http\Request;

class KamusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamuses = Kamus::all();
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
        $request->validate([
            'judul' => 'required|string',
            'nama' => 'required|string',
            'baca' => 'required|string',
            'contoh_penggunaan' => 'required|json',
        ]);

        $kamus = Kamus::create($request->all());
        return response()->json($kamus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kamus = Kamus::findOrFail($id);

        if (is_string($kamus->contoh_penggunaan)) {
            $kamus->contoh_penggunaan = json_decode($kamus->contoh_penggunaan, true);
        }

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
        $request->validate([
            'judul' => 'sometimes|required|string',
            'nama' => 'sometimes|required|string',
            'baca' => 'sometimes|required|string',
            'contoh_penggunaan' => 'sometimes|required|json',
        ]);

        $kamus->update($request->all());
        return response()->json($kamus, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamus $kamus)
    {
        $kamus->delete();
        return response()->json(null, 204);
    }
}