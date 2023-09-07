<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    var $_folder = "frontend/";
    public function login()
    {
        return view($this->_folder.'login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->route('dashboard')
                ->withSuccess('Welcome to Teacher Dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login')->withSuccess('Login details are not valid');
    }
}
