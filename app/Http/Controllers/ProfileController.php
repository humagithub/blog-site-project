<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Display the profile page
    public function index()
    {
        $user = Auth::user(); // Get authenticated user
        return view('profile.index', compact('user'));
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

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile_images'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');

}

}