<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
protected $table='comments';
    protected $fillable = ['user_id', 'post_id', 'post_type', 'comment'];

   // Comment.php

public function post()
{
    return $this->belongsTo(Post::class, 'post_id');
}

public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // Comment.php

// Comment.php
public function user()
{
    return $this->belongsTo(User::class);
}



}
