<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);
    
        // Check if the user is authenticated
        if (Auth::check()) {
            // Prepare the post data
            $postData = [
                'user_id' => Auth::id(),
                'usertype' => Auth::user()->usertype,
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status
            ];
    
            // Handle image upload if an image is provided
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts', 'public');
                $postData['image'] = $imagePath;
            }
    
            // Create the post
            Post::create($postData);
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Post created successfully!');
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        }
    }

    public function edit(Post $post)
{
    return view('Admin.posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:draft,published',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('postimage'), $imageName);
        $post->image = $imageName;
    }

    $post->title = $request->title;
    $post->content = $request->content;
    $post->status = $request->status;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
}

public function destroy(Post $post)
{
    if ($post->image) {
        $imagePath = public_path('postimage/' . $post->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}




    

}
