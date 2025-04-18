<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json(Blog::latest()->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,avi,webm,mov|max:51200'
        ]);

        $path = $request->file('media')->store('blogs', 'public');

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'media_path' => $path,
            'media_type' => $request->file('media')->getMimeType(),
        ]);

        return response()->json($blog, 201);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        Storage::disk('public')->delete($blog->media_path);
        $blog->delete();

        return response()->json(['message' => 'Deleted']);
    }
}