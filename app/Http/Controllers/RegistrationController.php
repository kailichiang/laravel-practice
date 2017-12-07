<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        // Create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]);

        // Sign them in
        // \Auth::login($user); 
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        // Redirect to the home page
        return redirect()->home();
    }
}
