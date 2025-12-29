<?php

namespace App\Http\Controllers;

// load model
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthenticateRequest;

// load session
use Session;

class AuthenticateController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function index()
	{
		return view('auth.index');
	}

	public function create()
	{
		return view('auth.create');
	}

	public function store(AuthenticateRequest $request)
	{
		$remember = $request->boolean('remember');

		if (!auth('web')->attempt($request->only('username', 'password'), $remember)) {
			return back()->with('flash_message', 'Please check your credential');
		}

    $user = auth()->user(); // should NOT be null
    $user->touch();
    return redirect()->route('homeauth.home');
  }

	public function destroy()
	{
		// logout
		auth()->logout();
		return redirect(route('auth.index'));
	}

	public function forgot() {
		return view('auth.forgot');
	}

	public function pastore(AuthenticateRequest $request)
	{
		return view('auth.remember');
	}
}
