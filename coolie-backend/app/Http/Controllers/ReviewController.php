<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'rating' => 'required|integer|between:1,5',
            'link' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $review = Review::create([
            'name' => $request->name,
            'message' => $request->message,
            'image' => $imageName,
            'rating' => $request->rating,
            'link' => $request->link,
        ]);

        return response()->json($review, 201);
    }

    public function show($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review, 200);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'link' => 'required|string',
        ]);

        $review->update($validated);
        return response()->json($review, 200);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deleted'], 200);
    }
}
