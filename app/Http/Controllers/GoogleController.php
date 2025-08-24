<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();

    // Try to find a user by Google ID
    $user = User::where('google_id', $googleUser->getId())->first();

    // If not found, try by email
    if (!$user) {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // User exists by email — update with Google ID
            $user->google_id = $googleUser->getId();
            $user->save();
        } else {
            // User not found — create a new one
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'usertype' => 'writer',
            ]);
        }
    }

    Auth::login($user);

    return redirect('/writer-dashboard'); // Or use a route name like route('writer.dashboard')
}

}
