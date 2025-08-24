<?php

namespace App\Http\Controllers;
use App\Notifications\LoginNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Load the login view
    }


   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::attempt($request->only('email', 'password'))) {
    $user = Auth::user();

        // Send login email notification
    $user->notify(new LoginNotification($user));

        // Redirect based on user type
        if ($user->usertype == 'writer') {
            return redirect('/writer-dashboard');
        } elseif ($user->usertype == 'user') {
            return redirect('/user/dashboard');
        } else {
            return redirect('/admin/login');
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}


    
    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
