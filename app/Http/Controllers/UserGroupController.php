<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\UserGroupFormRequest;

// load model
use App\UserGroup;

// load session
use Session;

class UserGroupController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
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
		// pass database data to view
		$ug = UserGroup::all();
		
		// display form for storing data
		return view('usergroup.create', compact('ug'));
	}
	
	 /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UserGroupFormRequest $request)
	{
		// storing the data into database Categories
		UserGroup::create([
			'group' => title_case(request('group')),
			]);
	
		Session::flash('flash_message', 'Data successfully added!');
	
		return redirect()->back();      // redirect back to original route
	}
	
	 /**
	 * Display the specified resource.
	 *
	 * @param  \App\UserGroup  $userGroup
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserGroup $userGroup)
	{
		//
	}
	
	 /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserGroup  $userGroup
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserGroup $userGroup)
	{
		//
	}
	
	 /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserGroup  $userGroup
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserGroupFormRequest $request, UserGroup $userGroup)
	{
		//
	}
	
	 /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserGroup  $userGroup
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserGroup $userGroup)
	{
		//
	}
}
