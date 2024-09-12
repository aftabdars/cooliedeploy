<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $album = Album::create([
            'image' => $imageName,
            'link' => $request->link,
        ]);

        return response()->json($album, 201);
    }

    public function show($id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }
        return response()->json($album, 200);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $validated = $request->validate([
            'image' => 'required|string',
            'link' => 'required|string',
        ]);

        $album->update($validated);
        return response()->json($album, 200);
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $album->delete();
        return response()->json(['message' => 'Album deleted'], 200);
    }
}
