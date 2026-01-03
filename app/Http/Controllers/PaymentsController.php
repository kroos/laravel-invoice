<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

use Session;

class PaymentsController extends Controller
{
	public function index()
	{
	    //
	}

	public function create()
	{
	    //
	}

	public function store(Request $request)
	{
	    //
	}

	public function show(Payments $payments)
	{
	    //
	}

	public function edit(Payments $payments)
	{
	    //
	}

	public function update(Request $request, Payments $payments)
	{
	    //
	}

	public function destroy(Payments $payments)
	{
        $payments->delete();
           return response()->json([
                                    'message' => 'Data deleted',
                                    'status' => 'success'
                                ]);
	}
}
