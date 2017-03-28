<?php

namespace App\Http\Controllers;

// load session`
use Session;

// load model
use App\Users;
use App\UserGroup;

use Illuminate\Http\Request;

// load form request validation
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		//
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$us = Users::all();
		$gr = UserGroup::all();
		// display form for adding user
		return view('user.create', compact(['us', 'gr']));
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(UserFormRequest $request)
	{
		Users::create([
			'name' => title_case(request('name')),
			'email' => strtolower(request('email')),
			'password' => bcrypt(request('password')),
			'id_group' => request('id_group'),
			]);
	
		// message to confirm storing data
		Session::flash('flash_message', 'Data successfully added!');
	
		// redirect back to original route
		return redirect()->back();
	}
	
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show(Users $users)
	{
		//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  User $user
	* @return \Illuminate\Http\Response
	*/
	public function edit(Users $users)
	{
		$gr = UserGroup::all();
		//just show straight to the form
		return view('user.edit', compact(['users', 'gr']));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  User $user
	* @return \Illuminate\Http\Response
	*/
	public function update(UserFormRequest $request, Users $users)
	{
		// return $users;
		// form process for id - update database
		Users::where('id', $users->id)
					-> update([
						'name' => title_case(request('name')),
						'email' => strtolower(request('email')),
						'password' => bcrypt(request('password')),
						'id_group' => request('id_group'),
					]);
		$users->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
	
		return redirect(route('user.create'));      // redirect back to original route
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  User $user
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Users $users)
	{
		//
		Users::destroy($users->id);
		// info when update success
		Session::flash('flash_message', 'Data successfully deleted!');
	
		return redirect(route('user.create'));		// redirect back to original route
	}
}
