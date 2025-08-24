<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class WriterPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();

        return view('Writer-Dashboard.Writer_post.writer_post',compact('posts'));
    }


   
    

    public function create(){
        return view('Writer-Dashboard.Writer_post.create'); // Ensure the correct path
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // 'user_id' => 'nullable|exists:users,id', 
            'status' => 'required|in:draft,published',
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->status = $request->status;
        $post->post_type = 'writer';
        $post->user_id = Auth::id(); 

        
    
        // Store image if uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('posts_images'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();
    
            return redirect()->route('writer.posts.index')->with('success', 'Post created successfully.');
    
      }

        public function edit($slug)
{
    
    $post = Post::findOrFail($slug);
    


    return view('Writer-Dashboard.Writer_post.edit',compact('post'));
}
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:draft,published',
    ]);

    $post->title = $request->title;
    $post->slug = Str::slug($request->title);
    $post->content = $request->content;
    $post->status = $request->status;
    $post->user_id = Auth::id();  // Store the authenticated user ID
    $post->post_type = 'writer';  // Set post type to writer

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($post->image && file_exists(public_path('posts_images/' . $post->image))) {
            unlink(public_path('posts_images/' . $post->image));
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('posts_images'), $imageName);
        $post->image = $imageName;
    }

    $post->save();

    return redirect()->route('writer.posts.index')->with('success', 'Post updated successfully.');
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
        return redirect()->route('writer.posts.index')->with('success', 'Post deleted successfully.');
    }
    public function show($id)
    {
        
        $post = Post::with('user')->findOrFail($id); // Fetch post with user details
    
        return view('Front.show', compact('post'));
    }
    

}
