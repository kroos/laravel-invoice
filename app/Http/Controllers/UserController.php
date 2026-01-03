<?php
namespace App\Http\Controllers;

// load model
use App\Models\User;
use App\Models\UserGroup;

// load session
use Session;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('users.index');
	}

	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('users.create');
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
			'name' => request('name'),
			'username' => $request->username,
			'email' => request('email'),
			'password' => bcrypt(request('password')),
			'id_group' => request('id_group'),
			'color' => request('color'),
			]);
		return redirect()->back()->with('success', 'Success added data');
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
		return view('users.edit', ['user' => $user]);
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
		$user-> update([
						'name' => request('name'),
						'username' => $request->username,
						'email' => request('email'),
						'password' => bcrypt(request('password')),
						'id_group' => request('id_group'),
						'color' => request('color'),
					]);
		// $user->touch();
		// info when update success
		Session::flash('success', 'Data successfully edited!');

		return redirect(route('users.edit', $user->slug));      // redirect back to original route
	}

	 /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		$user->delete();
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
