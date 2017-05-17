<?php

namespace App\Http\Controllers;

use App\Preferences;
use Illuminate\Http\Request;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

use Session;

use File;

// load validation
use App\Http\Requests\PreferencesFormRequest;

class PreferencesController extends Controller
{
	function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('admin');
	}

	public function index()
	{
	    //
	}

	public function create()
	{
	    //
	}

	public function store(PreferencesFormRequest $request)
	{
	    //
	}

	public function show(Preferences $preferences)
	{
	    //
	}

	public function edit(Preferences $preferences)
	{
	    return view('preferences.edit', compact(['preferences']));
	}

	public function update(PreferencesFormRequest $request, Preferences $preferences)
	{
		$option = Preferences::updateOrCreate(
	    		['id' => $preferences->id],
	    		request([
	    				'company_name', 'company_address', 'company_postcode', 'company_tagline', 'company_fixed_line', 'company_mobile', 'company_registration', 'company_owner', 'company_email', 'company_person_in-charge'
	    			])
	    	);

		if ($request->file('logo') != NULL) {
			foreach($request->file('logo') as $file)
			{
				$mime = $file->getMimeType();
				$filename = $file->store('images');
				$imag = Image::make(storage_path().'/uploads/'.$filename);
	
				// // resize the image to a height of 100 and constrain aspect ratio (auto width)
				$imag->resize
				(
					null, 800, function ($constraint)
					{
						$constraint->aspectRatio();
					}
				);
	
				$imag->save();
	
				$img = Preferences::updateOrCreate(
						['id' => $preferences->id], [
						'company_logo_image' => base64_encode( file_get_contents( storage_path().'/uploads/'.$filename ) ),
						'company_logo_mime' => $mime,
					]);
			}
		}

		// clean up
		$files2 = File::allFiles(storage_path('uploads/images'));
		foreach($files2 as $h)
		{
			if (File::extension($h) != 'txt')
			{
				// echo $l.'<br />';
				File::delete($h);
			}
		}

		// info when update success
		Session::flash('flash_message', 'Data successfully save!');
		return redirect()->back();		// redirect back to original route
	}

	public function destroy(Preferences $preferences)
	{
	    //
	}
}
