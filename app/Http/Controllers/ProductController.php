<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load model
use App\Product;
use App\ProductCategory;
use App\ProductImage;

// load validation
use App\Http\Requests\ProductFormRequest;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

// load session
use Session;

// load file manipulating
use File;

class ProductController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['except' => ['create', 'store']]);
	}

	public function index()
	{
		//
	}
	
	public function create()
	{
		$pro = Product::all();
		$cate = ProductCategory::where(['active' => 1])->get();
		return view('product.create', compact(['pro', 'cate']));
	}
	
	public function store(ProductFormRequest $request)
	{
		// dd($request->all());
		$prdt1 = new Product(request([
				'product', 'id_category', 'retail', 'commission', 'active'
		]));
		$prdt = \Auth::user()->createdby()->save($prdt1);
		// $prdt = Product::create(request([
		// 		'id_user', 'product', 'id_category', 'retail', 'commission', 'active'
		// 	]));

		foreach($request->file('image') as $file){

			$mime = $file->getMimeType();

			$filename = $file->store('images');

			$imag = Image::make(storage_path().'/uploads/'.$filename);

			// // resize the image to a height of 100 and constrain aspect ratio (auto width)
			$imag->resize(null, 100, function ($constraint) {
				$constraint->aspectRatio();
			});

			$imag->save();

			$imh = ProductImage::where('image', base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ));

			// if image already existed in the database
			if($imh->count() < 1) {
				$img = ProductImage::create([
					'id_product' => $prdt->id,
					'image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
					'mime' => $mime,
				]);
			}
		}

		// clean up
		$files2 = File::allFiles(storage_path('uploads/images'));
		foreach($files2 as $h) {
			if (File::extension($h) != 'txt') {
				// echo $l.'<br />';
				File::delete($h);
			}
		}
		// info when update success
		Session::flash('flash_message', 'Data successfully added!');
		return redirect()->back();		// redirect back to original route
	}
	
	public function show(Product $product)
	{
		//
	}
	
	public function edit(Product $product)
	{
		return view('product.edit', compact(['product']));
	}
	
	public function update(ProductFormRequest $request, Product $product)
	{
		Product::where('id', $product->id)
					-> update([
						'id_user' => auth()->user()->id,
						'product' => request('product'),
						'id_category' => request('id_category'),
						'retail' => request('retail'),
						'commission' => request('commission'),
						'active' => request('active'),
						'updated_at' => request('updated_at'),
					]);

		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
	
		return redirect(route('product.edit', $product->slug));      // redirect back to original route
	}
	
	public function destroy(Product $product)
	{
		$prod = Product::find($product->id);
		// delete related model
		$prod->productimage()->delete();
		$prod->delete();

		// info when update success
		// Session::flash('flash_message', 'Data successfully deleted!');
	
		// return redirect()->back();		// redirect back to original route
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
