<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public function create()
	{
		return view('users.create');
	}

	public function store(Request $request)
	{

		$request->validate(
			[
				'name' => ['required', 'min:5'],
				'email' => ['required', 'email:rfc,dns'],
				'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()]
			]
		);

		$request->password = Hash::make($request->password);
		$user = User::create($request->except('_token'));

		Auth::login($user);

		return to_route('series.index');
	}
}
