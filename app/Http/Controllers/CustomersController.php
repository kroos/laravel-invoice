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
						'client', 'client_address', 'client_poskod', 'client_phone', 'client_email',
				]));
		$customers->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
		return redirect(route('customers.index'));
	}
	
	public function destroy(Customers $customers)
	{
	//
	}
}
