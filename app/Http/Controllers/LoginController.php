<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
	{
		return view ('login.index');
	}

	public function login(Request $request)
	{
		if(!Auth::attempt($request->except(['_token']))) {
			return redirect()->back()->withErrors("User or password incorrect");
		}
	}
}
