<?php

namespace App\Http\Controllers;

use App\Banks;
use Illuminate\Http\Request;

// load validation
use App\Http\Requests\BanksFormRequest;

use Session;

class BanksController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	public function index()
	{
		return view('banks.index');
	}
	
	public function create()
	{
		return view('banks.create');
	}
	
	public function store(BanksFormRequest $request)
	{
		if ($request->active == NULL) {
			$request->active = 0;
		}
		$ban = Banks::create([
				'bank' => $request->bank,
				'city' => $request->city,
				'swift_code' => $request->swift_code,
				'account' => $request->account,
				'active' => $request->active,
			]);
		Session::flash('flash_message', 'Data successfully edited!');
		return redirect(route('banks.index'));
	}
	
	public function show(Banks $banks)
	{
		//
	}
	
	public function edit(Banks $banks)
	{
		return view('banks.edit', compact(['banks']));
	}
	
	public function update(BanksFormRequest $request, Banks $banks)
	{
		// dd(request()->all());
		$duit = Banks::find($banks->id)
				->update(request([
						'bank', 'city', 'swift_code', 'account',
					]));
		$banks->touch();
		// info when update success
		Session::flash('flash_message', 'Data successfully edited!');
		return redirect(route('banks.index'));
	}
	
	public function destroy(Banks $banks)
	{
		//
	}

	public function active(Banks $banks)
	{
		// toggle
		$act = Banks::find($banks->id);

		// get active value
		$act->active;
		if($act->active == 1) {
			$act->update([
					'active' => 0,
				]);
			// info when update success
			Session::flash('flash_message', 'Successfully deactivate '.$banks->bank);
		} else {
			$act->update([
					'active' => 1,
				]);
			// info when update success
			Session::flash('flash_message', 'Successfully activate '.$banks->bank);
		}
		$banks->touch();
		return redirect()->back();
	}
}
