<?php

namespace App\Http\Controllers;
 
use App\Product;
use App\Categories;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

use Session;

use File;

class ProductController extends Controller
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
		$pro = Product::all();
		$cate = Categories::all();
		return view('product.create', compact(['pro', 'cate']));
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(ProductFormRequest $request)
	{
		// dd($request->except('image'));
		// insert data 1st part
		$prdt = Product::create(request([
				'id_user', 'product', 'id_category', 'retail', 'commission', 'active'
			]));

		foreach($request->file('image') as $file){

			$mime = $file->getMimeType();

			$filename = $file->store('images');

			$imag = Image::make(storage_path().'/uploads/'.$filename);

			// // resize the image to a height of 100 and constrain aspect ratio (auto width)
			$imag->resize(null, 100, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imag->save();

			$img = ProductImage::create([
				// 'id_user' => auth()->user()->id,
				'id_product' => $prdt->id,
				'image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
				'mime' => $mime
			]);
		}
		$files = File::allFiles(storage_path('uploads/images'));
		File::delete($files);

		Session::flash('flash_message', 'Data successfully added!');
	
		return redirect()->back();		// redirect back to original route
	}
	
	/**
	* Display the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
	public function show(Product $product)
	{
		//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
	public function edit(Product $product)
	{
		// 
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
	public function update(ProductFormRequest $request, Product $product)
	{
		//
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Product $product)
	{
		$prod = Product::find($product->id);
		// delete related model
		$prod->productimage()->delete();
		$prod->delete();

		// info when update success
		Session::flash('flash_message', 'Data successfully deleted!');
	
		return redirect()->back();		// redirect back to original route
	}
}
