<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

use App\Http\Requests\CustomersFormRequest;
use Session;

class CustomersController extends Controller
{
	function __construct()
	{
	    $this->middleware('auth');
	}
	
	public function index()
	{
		return view('customers.index');
	}
	
	public function create()
	{
	//
	}
	
	public function store(CustomersFormRequest $request)
	{
	//
	}
	
	
	public function show(Customers $customers)
	{
	//
	}
	
	public function edit(Customers $customers)
	{
		return view('customers.edit', compact(['customers']));
	}
	
	public function update(CustomersFormRequest $request, Customers $customers)
	{
		$duit = Customers::find($customers->id)
				->update(request([
						'client', 'client_address', 'client_poskod', 'client_phone', 'client_email', 'updated_at',
				]));
		// $customers->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
		return redirect(route('customers.index'));
	}
	
	public function destroy(Customers $customers)
	{
		
		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}

	public function search(Request $request)
	{
		$valid = TRUE;
		$cust = Customers::where('client', $request->client)->count();
		$cust_email = Customers::where('client_email', $request->client_email)->count();
		$cust_phone = Customers::where('client_phone', $request->client_phone)->count();
		// dd($cust);

		if ($cust == 1) 
		{
			$valid = FALSE;
		}
		else 
		{
			if ($cust_phone == 1)
			{
				$valid = FALSE;
			}
			else
			{
				if ($cust_email == 1)
				{
					$valid = FALSE;
				} else {
					$valid = TRUE;
				}
			}
		}

		return response()->json(['valid' => $valid]);
	}
}
