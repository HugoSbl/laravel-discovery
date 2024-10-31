<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::with('comments')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $request->user()->blogs()->create($request->only('title', 'message'));

        return redirect()->route('blog.index');
    }

    public function destroy(Request $request, Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
