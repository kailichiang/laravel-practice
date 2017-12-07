<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
        $form->persist();

        // request()->session();
        // session('message', 'Here is a default message');
        session()->flash('message', 'Thanks so much for signing up!');
        
        // Redirect to the home page
        return redirect()->home();
    }
}
