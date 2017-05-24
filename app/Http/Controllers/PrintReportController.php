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
use App\User;


use Illuminate\Http\Request;

class PrintReportController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('admin', ['except' => ['create', 'store']]);
	}

    public function index()
    {
    	return view('printreport.index');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    			'from' => 'required|date_format:Y-m-d',
    			'to' => 'required|date_format:Y-m-d|after:from',
    			'user' => 'required',
    			'user.*' => 'integer',
    		]);
    	echo view('printpdf.salesreport', compact(['request']));
    }

    public function audit(Request $request)
    {
        $this->validate($request, [
                'from1' => 'required|date_format:Y-m-d',
                'to1' => 'required|date_format:Y-m-d|after:from1',
                'user1' => 'required',
                'user1.*' => 'integer',
        ]);
        echo view('printpdf.auditreport', compact(['request']));
    }
}
