<?php

namespace App\Http\Controllers;

// load model
use App\User;
use App\UserGroup;

// load session
use Session;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['only' => ['create', 'store', 'destroy']]);
		$this->middleware('userown', ['only' => ['edit', 'update', 'show']]);
	}
	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// echo auth()->user()->id_group;
		$user = User::all();
		return view('user.index', compact('user'));
	}
	
	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$us = User::all();
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
		User::create([
			'name' => title_case(request('name')),
			'username' => $request->username,
			'email' => strtolower(request('email')),
			'password' => bcrypt(request('password')),
			'id_group' => request('id_group'),
			'color' => request('color'),
			]);
	
		// message to confirm storing data
		Session::flash('flash_message', 'Data successfully added!');
	
		// redirect back to original route
		return redirect()->back();
	}
	
	 /**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $User
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		//
	}
	
	 /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$gr = UserGroup::all();
		//just show straight to the form
		return view('user.edit', compact(['user', 'gr']));
	}
	
	 /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserFormRequest $request, User $user)
	{
		// return $user;
		// form process for id - update database
		User::where('id', $user->id)
					-> update([
						'name' => title_case(request('name')),
						'username' => $request->username,
						'email' => strtolower(request('email')),
						'password' => bcrypt(request('password')),
						'id_group' => request('id_group'),
						'color' => request('color'),
						'updated_at' => $request->updated_at
					]);
		// $user->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
	
		return redirect(route('user.edit', $user->slug));      // redirect back to original route
	}
	
	 /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		//
		User::destroy($user->id);
		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');
	
		// return redirect(route('user.create'));		// redirect back to original route
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
