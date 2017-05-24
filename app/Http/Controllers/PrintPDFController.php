<?php

namespace App\Http\Controllers;


// load model
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;

// load mail
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoice;

// for manipulating image
// http://image.intervention.io/
// use Intervention\Image\Facades\Image as Image;		<-- ajaran sesat depa... hareeyyyyy!!
use Intervention\Image\ImageManagerStatic as Image;

use Session;

use File;

class PrintPDFController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('notowned');
	}

	public function print(Sales $sales)
	{
		echo view('printpdf.invoice', compact(['sales']));
		
		// clean up
		$files = File::allFiles(storage_path().'/uploads/pdf');
		foreach ($files as $l){
			// echo File::extension($l).'<br />';
			if (File::extension($l) == 'pdf') {
				// echo $l.'<br />';
				File::delete($l);
			}
		}
		$files2 = File::allFiles(storage_path('uploads/pdfimages'));
		foreach($files2 as $h) {
			if (File::extension($h) != 'txt') {
				// echo $l.'<br />';
				File::delete($h);
			}
		}
	}

	public function email_invoice(Sales $sales)
	{
		// check weather client got email
		$scust = SalesCustomers::where(['id_sales' => $sales->id])->first();
		$client = Customers::findOrFail($scust->id_customer);
		// dd($client);
		if ($client->client_email != NULL) {

			// generate pdf
			echo view('printpdf.emailpdf', compact(['sales']));
	
			// start sending email
			Mail::to(['to' => [
					'name' => $client->client,
					'email' => $client->client_email
				]])
    		// ->cc($moreUsers)
    		// ->bcc($evenMoreUsers)
			->send(new SendInvoice($sales));
	
			// clean up
			$files = File::allFiles(storage_path().'/uploads/pdf');
			foreach ($files as $l){
				// echo File::extension($l).'<br />';
				if (File::extension($l) == 'pdf') {
					// echo $l.'<br />';
					File::delete($l);
				}
			}
			$files2 = File::allFiles(storage_path('uploads/pdfimages'));
			foreach($files2 as $h) {
				if (File::extension($h) != 'txt') {
					// echo $l.'<br />';
					File::delete($h);
				}
			}
			Session::flash('flash_message', 'Done send email.');
			return redirect()->back();		// redirect back to original route
		} else {
			Session::flash('flash_message', 'Sorry, cant send email. Customer\'s email havent been set.');
			return redirect()->back();		// redirect back to original route
		}
	}
}
