<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function dasboard()
	{
		return view('users.dasboard');
	}
}
