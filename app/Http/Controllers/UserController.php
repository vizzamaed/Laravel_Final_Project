<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(){
        return view('Users.LogIn');
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()-regenerate();

            return redirect('/');
        }
    }

    public function register(){
        return view('Users.Register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "username" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6'
        ]);

        $validated['password'] = bycrypt($validated['password']);

        $user = User::create($validated);

       auth()->login($user);
    }
}
