<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('detail_materis')->get();
        return response()->json($materis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'detail_materis' => 'nullable|array',
            'detail_materis.*.judul' => 'required|string',
            'detail_materis.*.isi' => 'required|string'
        ]);

        $materi = Materi::create($request->only('judul'));

        if ($request->has('detail_materis')) {
            foreach ($request->detail_materis as $detail) {
                $materi->detail_materis()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load('detail_materis'), 201);
    }

    public function show($id)
    {
        $materi = Materi::with('detail_materis')->findOrFail($id);
        return response()->json($materi);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'sometimes|required|string',
            'detail_materis' => 'nullable|array',
            'detail_materis.*.judul' => 'sometimes|required|string',
            'detail_materis.*.isi' => 'sometimes|required|string'
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update($request->only('judul'));

        if ($request->has('detail_materis')) {
            $materi->detail_materis()->delete();
            foreach ($request->detail_materis as $detail) {
                $materi->detail_materis()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load('detail_materis'));
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return response()->json(null, 204);
    }
}