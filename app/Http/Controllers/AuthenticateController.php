<?php

namespace App\Http\Controllers;

// load model
use App\User;

use Illuminate\Http\Request;

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
		$remember_me = $request->has('remember') ? true : false;
		// attempt to authenticate the user
		if( !auth()->attempt(request(['username', 'password']), $remember_me) ) {
			Session::flash('flash_message', 'Please check your credential');
			return back();
		}
		$users = \App\User::find(auth()->user()->id);
		$users->touch();
		return redirect(route('homeauth.home'));      // redirect back to original route
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
