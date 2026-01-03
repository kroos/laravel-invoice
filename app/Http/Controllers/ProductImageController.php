<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;

use Illuminate\Http\Request;

// load validation
use App\Http\Requests\ProductImageFormRequest;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

// load session
use Session;

// load file manipulating
use File;

class ProductImageController extends Controller
{
	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(ProductImageFormRequest $request)
	{
		//
	}


	public function show(ProductImage $productimage)
	{
		//
	}

	public function edit(ProductImage $productimage)
	{
		return view('productimages.edit', ['productimage' => $productimage]);
	}

	public function update(ProductImageFormRequest $request, ProductImage $productimage)
	{
		$file = $request->file('image');
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
				$img = ProductImage::where(['id' => $productimage->id])
				->update([
					'image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
					'mime' => $mime,
				]);
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
		Session::flash('success', 'Image successfully updated!');
		return redirect(route('product.edit', $productimage->id_product));		// redirect back to original route
	}

	public function destroy(Request $request, ProductImage $productimage)
	{
		$prod = ProductImage::destroy($request->id);

		// info when update success
		// Session::flash('flash_message', 'Image successfully deleted!');

		// return redirect()->back();		// redirect back to original route
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}
}
