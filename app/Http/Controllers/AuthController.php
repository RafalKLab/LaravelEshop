<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getRegister(){
        return view('auth.register');
    }
    public function postRegister(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:users|alpha_dash|max:255',
            'email' => 'email|required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->input('email'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('home');
    }
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'email|required|max:255',
            'password' => 'required|min:6',
        ]);
        if(!Auth::attempt($request->only(['email','password']))){
            session()->flash('warning', 'Wrong email or password!');
            return redirect()->back();
        }
        session()->flash('success', 'Login was successful');
        return redirect()->route('home');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
