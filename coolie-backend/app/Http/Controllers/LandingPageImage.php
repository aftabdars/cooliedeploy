<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageImage extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'link' => 'required|string',
        ]);
    
        // $imageName = time().'.'.$request->image->extension();  
        $imageName = 'LandingPageImage.jpg';  
        $request->image->move(public_path('images'), $imageName);
    
        // $single = Single::create([
        //     'image' => $imageName,
        //     'link' => $request->link,
        // ]);
    
        return response()->json($imageName, 201);
    }
}
