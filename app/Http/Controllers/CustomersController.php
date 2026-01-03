<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

use App\Http\Requests\CustomersFormRequest;
use Session;

class CustomersController extends Controller
{
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


	public function show(Customers $customer)
	{
	//
	}

	public function edit(Customers $customer)
	{
		return view('customers.edit', ['customer' => $customer]);
	}

	public function update(CustomersFormRequest $request, Customers $customer)
	{
		$duit = Customers::find($customer->id)
				->update(request([
						'client', 'client_address', 'client_poskod', 'client_phone', 'client_email', 'updated_at',
				]));
		// $customer->touch();
		// info when update success
		Session::flash('success', 'Data successfully edited!');
		return redirect(route('customers.index'));
	}

	public function destroy(Customers $customer)
	{

		return response()->json([
									'message' => 'Data deleted',
									'status' => 'success'
								]);
	}

}
