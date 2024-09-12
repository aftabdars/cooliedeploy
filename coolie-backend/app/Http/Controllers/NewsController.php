<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'details' => 'required|string',
            'live' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $liveBool = ($request->live == 'true')? true : false;

        $news = News::create([
            'title' => $request->title,
            'details' => $request->details,
            'live' => $request->live,
            'image' => $imageName,
        ]);

        return response()->json($news, 201);
    }

    public function show($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }
        return response()->json($news, 200);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string',
            'details' => 'required|string',
            'live' => 'required|boolean',
            'image' => 'required|string',
        ]);

        $news->update($validated);
        return response()->json($news, 200);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $news->delete();
        return response()->json(['message' => 'News deleted'], 200);
    }
}
