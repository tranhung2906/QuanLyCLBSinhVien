<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            if($user->role === 1){
                return redirect('/dashboard');
            }else{
                return redirect('/');
            }
        }
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
