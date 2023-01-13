<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        // Hash pass
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        // Login
        auth()->login($user);
        return 'user created';
//        return redirect('/')->with('message', 'user created');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
//            $request->session()->regenerate();
            return 'user logged in';
//        return redirect('/')->with('message', 'user logged in');
        } else {
            return 'user not logged in';
//        return back()->withErrors(['email' => 'InvalidCredentials])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        auth()->logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();

        return 'user logged out';
//        return redirect('/')->with('message', 'user logget out');

    }
}
