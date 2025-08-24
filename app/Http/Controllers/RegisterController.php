<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RegistrationNotification;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Load register view
    }

public function register(Request $request)
{
    $this->validator($request->all())->validate();

    $user = $this->create($request->all());

    // Send registration notification
    $user->notify(new RegistrationNotification($user));

    Auth::login($user);

    return $this->redirectTo($user);
}

   

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'in:user,writer'], // Added 'admin'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype'], // Store usertype
        ]);
        
    }


    protected function redirectTo($user)
    {
        if ($user->usertype === 'admin') {
            return redirect('/admin-dashboard'); // Redirect admin to admin dashboard
        } elseif ($user->usertype === 'writer') {
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }
}
