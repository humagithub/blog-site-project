<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Blogcategory; 

class AdminPostController extends Controller
{
    public function admin_post()
    {
        $posts = Post::where('post_type', 'admin')->get(); // Fetch posts where post_type is 'writer'
       
        return view('Admin.Admin_post.Admin_post', compact('posts'));
    }


   
    

    
public function create()
{
    $categories = Blogcategory::all();
    return view('Admin.Admin_post.create', compact('categories'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             // Ensure user exists
             'category_id' => 'required|exists:blogcategories,id', // add this line
            'status' => 'required|in:draft,published',
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->status = $request->status;
        $post->post_type = 'admin'; 
        $post->category_id = $request->category_id;

        
    
        // Store image if uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('posts_images'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();
        return redirect()->route('admin.posts')->with('success', 'Post created successfully.');
           }
        

        public function edit($id)
{
    $post = Post::findOrFail($id);
    
    // Get users with user_type 'writer'
   

    return view('Admin.Admin_post.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        
        'category_id' => 'required|exists:blogcategories,id',

        'status' => 'required|in:draft,published',
        
    ]);

    $post->title = $request->title;
    $post->slug = Str::slug($request->title);
    $post->content = $request->content;
    $post->status = $request->status;
    $post->post_type = 'admin';
    $post->category_id = $request->category_id;

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

    return redirect()->route('admin.posts')->with('success', 'Post updated successfully.');
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
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully.');
    }
    public function show($id)
    {
        
        $post = Post::with('user')->findOrFail($id); // Fetch post with user details
    
        return view('Front.show', compact('post'));
    }
    

}
