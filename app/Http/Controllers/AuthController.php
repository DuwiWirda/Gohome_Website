<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.layouts.login');
    }

    public function login_process(Request $request)
    { 
        //Get input
        $input = $request->only(['email','password']);
        // dd($input);
        $user = User::find(1);
        // dd(Hash::check($input['password'],$user->password));
        // dd(Auth::attempt(array('email'=>$input['email'], 'password'=>$input['password'])));
        if (Auth::attempt(['email'=>$input['email'], 'password'=>$input['password']])) {
            return redirect()->route('dashboard');
        }else{
           return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
