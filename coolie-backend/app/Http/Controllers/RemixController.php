<?php

namespace App\Http\Controllers;

use App\Models\Remix;
use Illuminate\Http\Request;

class RemixController extends Controller
{
    public function index()
    {
        $remixes = Remix::all();
        return response()->json($remixes, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $remix = Remix::create([
            'image' => $imageName,
            'link' => $request->link,
        ]);

        return response()->json($remix, 201);
    }

    public function show($id)
    {
        $remix = Remix::find($id);
        if (!$remix) {
            return response()->json(['message' => 'Remix not found'], 404);
        }
        return response()->json($remix, 200);
    }

    public function update(Request $request, $id)
    {
        $remix = Remix::find($id);
        if (!$remix) {
            return response()->json(['message' => 'Remix not found'], 404);
        }

        $validated = $request->validate([
            'image' => 'required|string',
            'link' => 'required|string',
        ]);

        $remix->update($validated);
        return response()->json($remix, 200);
    }

    public function destroy($id)
    {
        $remix = Remix::find($id);
        if (!$remix) {
            return response()->json(['message' => 'Remix not found'], 404);
        }

        $remix->delete();
        return response()->json(['message' => 'Remix deleted'], 200);
    }
}
