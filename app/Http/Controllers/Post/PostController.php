<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Models\Blogcategory;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function admin_post()
    {
        $posts = Post::where('post_type', 'admin')->get(); // Fetch posts where post_type is 'writer'
       
        return view('post.Admin_post', compact('posts'));
    }


    public function index()
    {
        $posts = Post::where('post_type', 'writer')->with('user')->get(); // Fetch posts where post_type is 'writer'
       
        return view('post.index', compact('posts'));
    }
    

    public function create()
    {
        $writers = User::where('usertype', 'writer')->get();
        return view('post.create', compact('writers')); // Ensure the correct path
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:draft,published',
            'category_id' => 'required|exists:blogcategories,id',
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->content = $request->content;
        $post->status = $request->status;
        $post->post_type = 'writer';
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('posts_images'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    

        public function edit($slug)
{
    $post = Post::findOrFail($slug);
    
    // Get users with user_type 'writer'
    $writers = User::where('usertype', 'writer')->get();

    return view('post.edit', compact('post', 'writers'));
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'user_id' => 'nullable|exists:users,id', // Ensure user exists
        'status' => 'required|in:draft,published',
    ]);

    $post->title = $request->title;
    $post->slug = Str::slug($request->title);
    $post->content = $request->content;
    $post->status = $request->status;

    // Update user_id and post_type
    if ($request->user_id) {
        $post->user_id = $request->user_id;
        $post->post_type = 'writer'; 
    } else {
        $post->user_id = null; // Ensure admin posts have no user_id
        $post->post_type = 'admin'; 
    }

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

    // Redirect based on user_id presence
    if ($request->user_id) {
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    } else {
        return redirect()->route('admin.posts')->with('success', 'Post updated successfully.');
    }
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
    public function show($slug)
{
    $post = Post::with(['user', 'comments.user', 'comments.replies.user'])
                ->where('slug', $slug)
                ->firstOrFail();

    // Count comments
    $commentCount = $post->comments->count();
// dd($post);
    return view('Front.show', compact('post', 'commentCount'));
}

    


    
    
    public function postsByCategory($name)
    {
        // Find the category by name
        $category = Blogcategory::where('name', $name)->firstOrFail();
    
        // Fetch posts that belong to the category
        $posts = Post::where('category_id', $category->id)->latest()->get();
    
        return view('blogcategorypost.posts_by_category', compact('category', 'posts'));
    }
    
    


}
