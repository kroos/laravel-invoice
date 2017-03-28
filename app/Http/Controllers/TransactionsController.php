<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

// load model
use App\Transactions;
use App\Product;
use App\Categories;
use App\Users;

// load email
use App\Mail\Commission;

// load session
use Session;

// load file manager
use File;

// load request validation
use App\Http\Requests\TransactionsFormRequest;
use App\Http\Requests\TransactionsAdminRequest;

class TransactionsController extends Controller
{
	public function __construct() {
		// only authorise user can access this controller
		$this->middleware('auth');
	}

	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		return view('home');
	}
	
	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// retrieve all data from product that is active
		$pro = Product::where(['active' => 1])->get();
		$cate = Categories::where(['active' => 1])->get();
		$trans = Transactions::where(['id_user' => auth()->user()->id, 'deleted_at' => NULL])->orderBy('commision_on')->get();
		// dd($cate);
		return view('transactions.create', compact(['pro', 'cate', 'trans']));
	}
	
	 /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(TransactionsFormRequest $request)
	{
		Transactions::create(request(['id_user', 'id_product', 'commission_on', 'retail', 'commission', 'quantity']));

		Session::flash('flash_message', 'Data successfully added!');
	
		return redirect()->back();		// redirect back to original route

	}

	public function print()
	{
		// $t = Users::where('id_group', '<>', 1)->get();
		$search = NULL;
		return view('transactions.print', compact(['search']));
	}
	
	 /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function printstore(TransactionsAdminRequest $request)
	{
		$search = Transactions::where([
				'id_user' => request('id_user'),
				'commission_on' => request('commission_on'),
				'deleted_at' => NULL
			])->get();

		$users = \App\Users::findOrFail(request('id_user'));

		$pdf = view('transactions.fpdf', compact(['search']));

		echo $pdf;

		// sending mail
		Mail::to($users)->send(new Commission($search));

		Session::flash('flash_message', 'Data searching completed and we have emailed you a copy of report!');

		$files = File::allFiles(storage_path().'/uploads/pdf');

		// clean up
		foreach ($files as $l){
			// echo File::extension($l).'<br />';
			if (File::extension($l) == 'pdf') {
				// echo $l.'<br />';
				File::delete($l);
			}
		}
		return redirect(route('transactions.print'));
	}

	 /**
	 * Display the specified resource.
	 *
	 * @param  \App\Transactions  $transactions
	 * @return \Illuminate\Http\Response
	 */
	public function show(Transactions $transactions)
	{
		//
	}
	
	 /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Transactions  $transactions
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Transactions $transactions)
	{
		$pro = Product::where(['active' => 1])->get();
		$cate = Categories::where(['active' => 1])->get();
		$trans = Transactions::findOrFail($transactions->id);
		$procate = Product::findOrFail($transactions->id_product);
		// dd($transactions->id_product);
		return view('transactions.edit', compact(['transactions', 'trans', 'pro', 'cate', 'procate']));
	}
	
	 /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Transactions  $transactions
	 * @return \Illuminate\Http\Response
	 */
	public function update(TransactionsFormRequest $request, Transactions $transactions)
	{
		// return $users;
		// form process for id - update database
		Transactions::where('id', $transactions->id)
					-> update([
						'id_product' => request('id_product'),
						'commission_on' => request('commission_on'),
						'retail' => request('retail'),
						'commission' => request('commission'),
						'quantity' => request('quantity'),
					]);
		$transactions->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
	
		return redirect(route('transactions.create'));      // redirect back to original route
	}
	
	 /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Transactions  $transactions
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Transactions $transactions)
	{
		Transactions::destroy($transactions->id);
		Session::flash('flash_message', 'Data successfully deleted!');
	
		return redirect()->back();		// redirect back to original route
	}
}
