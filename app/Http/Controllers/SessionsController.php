<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SessionFormRequest;

use App\Users;

use Session;

class SessionsController extends Controller
{
	public function __construct() {
		$this->middleware('guest', ['except' => 'destroy']);
	}
/*	auth login command
	using class : \Auth::login()
	this method need to load the class : use Auth;

	using helper : auth()->login($user)
	while using this technic, no need to load the class
*/



	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		//
		return view('home');
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		//
		return view('sessions.login');
	}
	
	public function forgot()
	{
		//
		return view('sessions.login');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(SessionFormRequest $request)
	{
		$remember_me = $request->has('remember_me') ? true : false;
		// attempt to authenticate the user
		if( !auth()->attempt(request(['email', 'password']), $remember_me) ) {
			Session::flash('flash_message', 'Please check your credential');
			return back();
		}

		$users = \App\Users::findOrFail(auth()->user()->id);
		$users->touch();
		// info when update success
		// Session::flash('flash_message', '');
	
		return redirect(route('transactions.index'));      // redirect back to original route

	}
	
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		//
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
		//
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy()
	{
		// logout
		auth()->logout();

		return redirect(route('sessions.index'));
	}
}
