<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
    	return view('Registration.create');
    }


    public function store(){
        $this->validate(request(), [

            'name' => 'required',

            'email'  => 'required',

            'password' => 'required|confirmed',

            'password_confirmation' => 'required'
        ]);

       	$user = User::create([
            'name' => request('name'),

            'email'  => request('email'),

            'password' =>  bcrypt(request('password')),
        ]);


        auth()->login($user);

        
        \Mail::to($user)->send(new Welcome($user));

        session()->flash('message', 'you are signed up');
        return redirect()->home();
    }


}
