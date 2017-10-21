<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        // only guests are allowed tthrough the filter
        // authticated users can't access 
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // Attempt to authenticate the user
        // If not, redirect back
        // If so, sign them in
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Plese check your credentials and try again.'
            ]);
        }
        
        // Redirect to the home page
        return redirect()->intended('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
