<?php

namespace App\Http\Controllers;

use App\Models\Single;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index()
    {
        $singles = Single::all();
        return response()->json($singles, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'required|string',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    
        $single = Single::create([
            'image' => $imageName,
            'link' => $request->link,
        ]);
    
        return response()->json($single, 201);
    }

    public function show($id)
    {
        $single = Single::find($id);
        if (!$single) {
            return response()->json(['message' => 'Single not found'], 404);
        }
        return response()->json($single, 200);
    }

    public function update(Request $request, $id)
    {
        $single = Single::find($id);
        if (!$single) {
            return response()->json(['message' => 'Single not found'], 404);
        }

        $validated = $request->validate([
            'image' => 'required|string',
            'link' => 'required|string',
        ]);

        $single->update($validated);
        return response()->json($single, 200);
    }

    public function destroy($id)
    {
        $single = Single::find($id);
        if (!$single) {
            return response()->json(['message' => 'Single not found'], 404);
        }

        $single->delete();
        return response()->json(['message' => 'Single deleted'], 200);
    }
}
