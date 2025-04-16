<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class PageController extends Controller
{
    public function blogs()
    {
        $blog_main = Blog::orderBy('created_at', 'desc')->first();
        $blogs = Blog::where('id', '!=', optional($blog_main)->id)->get();

        return view('blog', compact('blog_main', 'blogs'));
    }

    public function showBlog($id)
    {
        $blog_main = Blog::findOrFail($id);
        $blogs = Blog::where('id', '!=', $id)->get();

        return view('blog', compact('blog_main', 'blogs'));
    }

    public function main()
    {
        $title_site = "Travel webSayti";

        return view('main')
            ->with('title_site', $title_site);
    }
}
