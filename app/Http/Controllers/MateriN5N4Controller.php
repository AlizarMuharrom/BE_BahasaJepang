<?php

namespace App\Http\Controllers;

use App\Models\MateriN5N4;
use Illuminate\Http\Request;

class MateriN5N4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = MateriN5N4::with(['details', 'level'])->get();
        return response()->json($materi);
    }

    /**
     * Get materi by level name
     */
    public function getByLevel($levelName)
    {
        // Validasi dan normalisasi input
        $levelName = strtoupper(trim($levelName));

        if (!in_array($levelName, ['N5', 'N4'])) {
            return response()->json([
                'error' => 'Level tidak valid',
                'message' => 'Hanya level N5 dan N4 yang tersedia'
            ], 400);
        }

        try {
            $materi = MateriN5N4::with(['details', 'level'])
                ->whereHas('level', function ($query) use ($levelName) {
                    $query->where('level_name', $levelName);
                })
                ->get();

            if ($materi->isEmpty()) {
                return response()->json([
                    'message' => 'Tidak ada materi tersedia untuk level ini'
                ], 404);
            }

            return response()->json($materi);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'level_id' => 'required|exists:levels,id',
            'details' => 'nullable|array',
            'details.*.judul' => 'required|string',
            'details.*.isi' => 'required|string'
        ]);

        $materi = MateriN5N4::create($request->only(['judul', 'level_id']));

        if ($request->has('details')) {
            foreach ($request->details as $detail) {
                $materi->details()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load(['details', 'level']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = MateriN5N4::with(['details', 'level'])->findOrFail($id);
        return response()->json($materi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'sometimes|required|string',
            'level_id' => 'sometimes|required|exists:levels,id',
            'details' => 'nullable|array',
            'details.*.judul' => 'sometimes|required|string',
            'details.*.isi' => 'sometimes|required|string'
        ]);

        $materi = MateriN5N4::findOrFail($id);
        $materi->update($request->only(['judul', 'level_id']));

        if ($request->has('details')) {
            $materi->details()->delete();
            foreach ($request->details as $detail) {
                $materi->details()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load(['details', 'level']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materi = MateriN5N4::findOrFail($id);
        $materi->delete();
        return response()->json(null, 204);
    }
}