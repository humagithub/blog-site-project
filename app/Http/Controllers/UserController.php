<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users or writers based on your logic
        $users = User::where('usertype', 'user')->get(); // Example: Fetch all users
        return view('users.index', compact('users'));
    }
    public function Writerindex()
    {
        $writers = User::where('usertype', 'writer')->get(); // Fetch only users with usertype 'user'
        return view('Writers.index', compact('writers'));
    }


    public function create()
    {
        return view('writers.create');
    }
    public function usercreate()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'usertype' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->usertype = $request->usertype;
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile_images'), $imageName);
            $user->image = $imageName;
        }
    
        $user->save();
    
        // Redirect based on usertype
        if ($user->usertype === 'user') {
            return redirect()->route('users.index')->with('success', 'User added successfully.');
        } elseif ($user->usertype === 'writer') {
            return redirect()->route('writers.index')->with('success', 'Writer added successfully.');
        }
    
        // Default redirection if usertype is not recognized
        return redirect()->route('dashboard')->with('success', 'User added successfully.');
    }
    

    public function show(User $writer)
    {
        return view('writers.show', compact('writer'));
    }

    public function edit(User $writer)
    {
        return view('writers.edit', compact('writer'));
    }

    public function update(Request $request, User $writer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $writer->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $writer->name = $request->name;
        $writer->email = $request->email;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile_images'), $imageName);
            $writer->image = $imageName;
        }

        $writer->save();
        return redirect()->route('writers.index')->with('success', 'Writer updated successfully.');
    }

    public function destroy(User $writer)
    {
        $writer->delete();
        return redirect()->route('writers.index')->with('success', 'Writer deleted successfully.');
    }
 
    public function userLogout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('message', 'User logged out successfully.');
    }


    
public function profile()
{
    $user = Auth::user();
    return view('user-panel.layouts.profile', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('profile_images'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
}


}

