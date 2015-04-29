<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
    	return view('login');
    }


    public function postLogin(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))) {
    		return redirect('/');
    	}
    	return redirect()->back()->withInput();
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}