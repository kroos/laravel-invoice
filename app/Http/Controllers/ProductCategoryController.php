<?php

namespace App\Http\Controllers;

// load model
use App\ProductCategory;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\ProductCategoryFormRequest;

use Session;

class ProductCategoryController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['except' => ['create', 'store']]);
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
		return view('category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductCategoryFormRequest $request)
	{
		// storing the data into database Categories
		ProductCategory::create([
			'product_category' => request('category'),
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
	 * @param  \App\ProductCategory  $productCategory
	 * @return \Illuminate\Http\Response
	 */
	public function show(ProductCategory $productCategory)
	{
	    //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\ProductCategory  $productCategory
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ProductCategory $productCategory)
	{
		return view('category.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ProductCategory  $productCategory
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductCategoryFormRequest $request, ProductCategory $productCategory)
	{
		// return $categories;
		// form process for id - update database
		ProductCategory::where('id', $productCategory->id)
					-> update([
						'product_category' => request('category'),
						'active' => request('active'),
						'id_user' => auth()->user()->id,
					]);
		// $productCategory->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');

		return redirect(route('category.index'));      // redirect back to original route
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ProductCategory  $productCategory
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ProductCategory $productCategory)
	{
		ProductCategory::destroy($productCategory->id);
		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');

		// return redirect(route('category.create'));		// redirect back to original route
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
