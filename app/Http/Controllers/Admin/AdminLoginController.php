<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }

    public function showLoginForm()
    {
    	return view('admin.admin-login');
    }

    public function login(Request $request)
    {
    	//Login Form Validtion
    	$request->validate([
    		'email' => 'required|email',
    		'password' => 'required|min:6',
			]);

    	//attampt Login
    	$credentials = ['email' => $request->email, 'password' => $request->password];

    	if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    		//if login success
    		return redirect()->intended(route('admin'));
    	}
    	//if not success
    	return redirect()->back();
	}

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
