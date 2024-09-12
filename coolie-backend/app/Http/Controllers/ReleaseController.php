<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    public function index()
    {
        $releases = Release::all();
        return response()->json($releases, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string',
            'details' => 'required|string',
            'date' => 'required|date',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $release = Release::create([
            'image' => $imageName,
            'title' => $request->title,
            'details' => $request->details,
            'date' => $request->date,
        ]);

        return response()->json($release, 201);
    }

    public function show($id)
    {
        $release = Release::find($id);
        if (!$release) {
            return response()->json(['message' => 'Release not found'], 404);
        }
        return response()->json($release, 200);
    }

    public function update(Request $request, $id)
    {
        $release = Release::find($id);
        if (!$release) {
            return response()->json(['message' => 'Release not found'], 404);
        }

        $validated = $request->validate([
            'image' => 'required|string',
            'title' => 'required|string',
            'details' => 'required|string',
            'date' => 'required|date',
        ]);

        $release->update($validated);
        return response()->json($release, 200);
    }

    public function destroy($id)
    {
        $release = Release::find($id);
        if (!$release) {
            return response()->json(['message' => 'Release not found'], 404);
        }

        $release->delete();
        return response()->json(['message' => 'Release deleted'], 200);
    }
}
