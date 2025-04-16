<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Bloglarni olish
    public function index()
    {
        return Blog::all();  // Yoki paginatsiya qo'shish mumkin
    }

    // Yangi blog qo'shish
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'required|file|mimes:jpeg,png,jpg,gif,mp4|max:10240', // 10MB
        ]);

        $mediaPath = $request->file('media')->store('blogs', 'public');

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'media' => $mediaPath,
        ]);

        return response()->json($blog, 201); // Yangi blogni qaytarish
    }

    // Blog o'chirish
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json(null, 204);  // O'chirishni tasdiqlash
    }
}
