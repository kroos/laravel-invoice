<?php

namespace App\Http\Controllers;

use Session;

// for form request
use Illuminate\Http\Request;

// load model
use App\Categories;

// form validation
use App\Http\Requests\CategoryFormRequest;

class CategoriesController extends Controller
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
		// display home
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		// show the form to store the data
		$cate = Categories::all();
	
		// return view('tasks.index')->withTasks($tasks);
		return view('catecreate', compact('cate'));
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(CategoryFormRequest $request)
	{
		// storing the data into database Categories
		Categories::create([
			'category' => title_case(request('category')),
			'active' => request('active'),
			// 'id_user' => auth()->user()->id,	or u can make it shortcut like below
			'id_user' => auth()->id(),
		]);
	
		Session::flash('flash_message', 'Data successfully added!');

		return redirect()->back();		// redirect back to original route
	}
	
	/**
	* Display the specified resource.
	*
	* @param  \App\Categories  $categories
	* @return \Illuminate\Http\Response
	*/
	public function show(Categories $categories)
	{
		// display data identifier (id)
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Categories  $categories
	* @return \Illuminate\Http\Response
	*/
	public function edit(Categories $categories)
	{
		// display form for 1 category for editing
		// $cate = Categories::findOrFail($categories);
		return view('cateshow', compact('categories'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Categories  $categories
	* @return \Illuminate\Http\Response
	*/
	public function update(CategoryFormRequest $request, Categories $categories)
	{
		// return $categories;
		// form process for id - update database
		Categories::where('id', $categories->id)
					-> update([
						'category' => title_case(request('category')),
						'active' => request('active'),
						'id_user' => auth()->user()->id,
						// 'updatsed_at' => Carbon::now(),
					]);
		$categories->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
	
		return redirect(route('categories.create'));      // redirect back to original route
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Categories  $categories
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Categories $categories)
	{
		//
		Categories::destroy($categories->id);
		// info when update success
		Session::flash('flash_message', 'Data successfully deleted!');
	
		return redirect(route('categories.create'));		// redirect back to original route
	}
}
