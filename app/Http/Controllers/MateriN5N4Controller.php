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
        $materi = MateriN5N4::with('details')->get();
        return response()->json($materi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'details' => 'nullable|array',
            'details.*.judul' => 'required|string',
            'details.*.isi' => 'required|string'
        ]);

        $materi = MateriN5N4::create($request->only('judul'));

        if ($request->has('details')) {
            foreach ($request->details as $detail) {
                $materi->details()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load('details'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = MateriN5N4::with('details')->findOrFail($id);
        return response()->json($materi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'sometimes|required|string',
            'details' => 'nullable|array',
            'details.*.judul' => 'sometimes|required|string',
            'details.*.isi' => 'sometimes|required|string'
        ]);

        $materi = MateriN5N4::findOrFail($id);
        $materi->update($request->only('judul'));

        if ($request->has('details')) {
            $materi->details()->delete();
            foreach ($request->details as $detail) {
                $materi->details()->create([
                    'judul' => $detail['judul'],
                    'isi' => $detail['isi']
                ]);
            }
        }

        return response()->json($materi->load('details'));
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