<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'usertype', 'title', 'content', 'status', 'image','slug','category_id'];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function comments()
{
    return $this->hasMany(Comment::class);
}


public function blogcategory()
{
    return $this->belongsTo(Blogcategory::class, 'category_id');
} 





}

// app/Models/Post.php


