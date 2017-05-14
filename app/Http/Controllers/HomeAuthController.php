<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

use Session;

class HomeAuthController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}

	public function home()
	{
		$graph = Sales::graph();
		// dd($graph);
		return view('homeauth.home', compact(['graph']));
	}
}
