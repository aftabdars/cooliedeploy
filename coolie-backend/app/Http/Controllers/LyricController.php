<?php

namespace App\Http\Controllers;

use App\Models\Lyric;
use Illuminate\Http\Request;

class LyricController extends Controller
{
    public function index()
    {
        $lyrics = Lyric::all();
        return response()->json($lyrics, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string',
            'lyrics' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $lyric = Lyric::create([
            'image' => $imageName,
            'title' => $request->title,
            'lyrics' => $request->lyrics,
        ]);

        return response()->json($lyric, 201);
    }

    public function show($id)
    {
        $lyric = Lyric::find($id);
        if (!$lyric) {
            return response()->json(['message' => 'Lyric not found'], 404);
        }
        return response()->json($lyric, 200);
    }

    public function update(Request $request, $id)
    {
        $lyric = Lyric::find($id);
        if (!$lyric) {
            return response()->json(['message' => 'Lyric not found'], 404);
        }

        $validated = $request->validate([
            'image' => 'required|string',
            'title' => 'required|string',
            'lyrics' => 'required|string',
        ]);

        $lyric->update($validated);
        return response()->json($lyric, 200);
    }

    public function destroy($id)
    {
        $lyric = Lyric::find($id);
        if (!$lyric) {
            return response()->json(['message' => 'Lyric not found'], 404);
        }

        $lyric->delete();
        return response()->json(['message' => 'Lyric deleted'], 200);
    }
}
