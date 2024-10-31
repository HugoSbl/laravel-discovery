<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index () {
        return Comment::all();
    }

    public function store (Request $request) {
        $request->validate([
            'message' => 'required|string',
            'blog_id' => 'required|integer|exists:blogs,id',
        ]);
        $request->user()->comments()->create($request->only('message', 'blog_id'));
        
        return redirect()->route('blog.index');
    }

    public function destroy (Request $request, Comment $comment) {
        $comment->delete();

        return redirect()->route('blog.index');
    }
}
