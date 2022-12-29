<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    public function loginGet()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = \App\Models\admins::where('email', $email)->first();
        if ($admin && $admin->password == md5(md5($password))) {
            $request->session()->put('admin', $admin);
            return redirect()->route('dashboard');
        }
        return redirect()->route('login-get')->withErrors('Email veya şifreniz hatalı');
    }
}
