<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'user_id', 'reply'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function show($id)
{
    $post = Post::with(['comments.replies', 'comments.user', 'comments.replies.user'])->findOrFail($id);
    return view('Front.post', compact('post'));
}

}
