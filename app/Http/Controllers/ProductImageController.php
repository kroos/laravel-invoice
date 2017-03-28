<?php

namespace App\Http\Controllers;

// load session
use Session;

// load form request
use Illuminate\Http\Request;

// load model
use App\ProductImage;

// form validation
use App\Http\Requests\ProductImageFormRequest;

class ProductImageController extends Controller
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
		//
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(ProductImageFormRequest $request)
	{
		//
		// ProductImage::create([
				
		// 	]);
	}
	
	/**
	* Display the specified resource.
	*
	* @param  \App\ProductImage  $productImage
	* @return \Illuminate\Http\Response
	*/
	public function show(ProductImage $productImage)
	{
		//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\ProductImage  $productImage
	* @return \Illuminate\Http\Response
	*/
	public function edit(ProductImage $productImage)
	{
		//
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\ProductImage  $productImage
	* @return \Illuminate\Http\Response
	*/
	public function update(ProductImageFormRequest $request, ProductImage $productImage)
	{
		//
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\ProductImage  $productImage
	* @return \Illuminate\Http\Response
	*/
	public function destroy(ProductImage $productImage)
	{
		//
	}
}
