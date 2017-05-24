<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load mail
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

// load model
use App\Preferences;

// load session
use Session;

class ContactUsController extends Controller
{
	public function email(Request $request)
	{
		$re = \App\Preferences::find(1);

		// validation
		$this->validate($request, [
			'name' => 'required|min:4',
			'email' => 'required|email',
			'subject' => 'required|min:4',
			'message' => 'required',
		]);


		// start sending email
		Mail::to(['to' => [
				'email' => request('email'),
				'name' => request('name'),
			]])
    	->cc(['cc' => [
    			'email' => $re->company_email,
    			'name' => $re->company_name,
    		]])
    	// ->bcc($evenMoreUsers)
		->send(new ContactUs($request));

		Session::flash('flash_message', 'Done send email.');
		return redirect()->back();		// redirect back to original route
	}
}
