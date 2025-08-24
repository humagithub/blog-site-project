<?php

namespace App\Http\Controllers\Front;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShutController extends Controller
{
    public function index()
{
    // dd('ok');
    $posts = Post::where('status', 'published')
                 ->with('user') // Eager load user data
                 ->latest()
                
                 ->get();
// dd($posts);
    return view('Front.index', compact('posts'));
}

}
