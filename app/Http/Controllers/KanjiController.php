<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use Illuminate\Http\Request;

class KanjiController extends Controller
{
    public function index()
    {
        $kanji = Kanji::with('detailKanji')->get();
        return response()->json($kanji);
    }

    public function show($id)
    {
        $kanji = Kanji::with('detailKanji')->findOrFail($id);
        return response()->json($kanji);
    }

    public function store(Request $request)
    {
        $kanji = Kanji::create($request->all());
        return response()->json($kanji, 201);
    }

    public function update(Request $request, $id)
    {
        $kanji = Kanji::findOrFail($id);
        $kanji->update($request->all());
        return response()->json($kanji, 200);
    }

    public function destroy($id)
    {
        Kanji::destroy($id);
        return response()->json(null, 204);
    }
}
