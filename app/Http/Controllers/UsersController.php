<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

		$userCredentials = $request->except('_token');

		$userCredentials['password'] = Hash::make($userCredentials['password']);

		$user = DB::transaction(function () use ($userCredentials) {
			$user = User::create($userCredentials);

			return $user;
		});

		Auth::login($user);

		return to_route('series.index');
	}
}
