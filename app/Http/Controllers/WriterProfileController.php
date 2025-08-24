<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WriterProfileController extends Controller
{
    // Display the profile page
    public function index()
    {
        $user = Auth::user(); // Get authenticated user
        return view('Writer-Dashboard.Writer_post.profile', compact('user')); // Pass $user to view
    }

    // Update the user profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && File::exists(public_path('profile_images/' . $user->image))) {
                File::delete(public_path('profile_images/' . $user->image));
            }

            // Upload and save new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile_images'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('writer.profile.index')->with('success', 'Profile updated successfully.');
    }
}




