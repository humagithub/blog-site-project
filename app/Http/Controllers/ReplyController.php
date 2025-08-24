<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'reply' => 'required|string',
        ]);

        Reply::create([
            'comment_id' => $request->comment_id,
            'user_id' => Auth::id(),
            'reply' => $request->reply,
        ]);

        return back()->with('success', 'Reply added successfully.');
    }

    public function show($id)
{
    $post = Post::with(['comments.replies', 'comments.user', 'comments.replies.user'])->findOrFail($id);
    return view('Front.post', compact('post'));
}

}
