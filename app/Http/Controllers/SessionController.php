<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);;
    }

    public function create()
    {
        $title = 'Admin login';

        return view('admin.login', compact('title'));
    }

    public function store()
    {
        $this->validate(request(), [
            'login' => 'required',
            'password' => 'required'
        ]);

        if( ! auth()->attempt(request(['login', 'password'])) ) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return redirect()->intended('admin.panel');
    }

    public function destroy() 
    {
    	auth()->logout();

        return redirect()->route('home');
    }

}
