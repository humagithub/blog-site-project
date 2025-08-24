<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    


    public function Commentstore(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required|integer', // or exists:posts,id
            'post_type' => 'required|string',
            'owner_id' => 'required|integer', // Add validation for owner_id
        ]);
    
        $user = auth()->user();
    
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->post_type = $request->post_type;
        $comment->owner_id = $request->owner_id; // Store owner_id
        $comment->user_id = $user->id;
    
        $comment->save();
    
        return back()->with('success', 'Comment added successfully!');
    }
    
    public function myComments()
    {
        $comments = Comment::where('user_id', Auth::id())
        ->with(['post', 'owner'])
        ->get();
    
        return view('user-panel.layouts.my-comments', compact('comments'));
    }
    public function Comment()
    {
        $comments = Comment::with(['user', 'post'])
            ->where('owner_id', Auth::id())
            ->get();
    //  dd($comments);
        return view('Writer-Dashboard.comment', compact('comments'));
    }
    

    
    public function AdminComment()
    {
        // dd('ok');
        $comments = Comment::with(['post', 'owner', 'user'])->get();
   
        return view('Admin.Admin_post.admincomment', compact('comments'));
    }
    

}

