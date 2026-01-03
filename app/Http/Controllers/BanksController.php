<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use Illuminate\Http\Request;

// load validation
use App\Http\Requests\BanksFormRequest;

use Session;

class BanksController extends Controller
{
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
		Session::flash('success', 'Data successfully edited!');
		return redirect(route('banks.index'));
	}

	public function show(Banks $bank)
	{
		//
	}

	public function edit(Banks $bank)
	{
		return view('banks.edit', ['bank' => $bank]);
	}

	public function update(BanksFormRequest $request, Banks $bank)
	{
		// dd(request()->all());
		$duit = $bank->update(request([
						'bank', 'city', 'swift_code', 'account',
					]));
		$bank->touch();
		// info when update success
		Session::flash('success', 'Data successfully edited!');
		return redirect(route('banks.index'));
	}

	public function destroy(Banks $bank)
	{
		//
	}

	public function active(Banks $bank)
	{
		// get active value
		if($bank->active == 1) {
			$bank->update([
					'active' => 0,
				]);
			// info when update success
			Session::flash('success', 'Successfully deactivate '.$bank->bank);
		} else {
			$bank->update([
					'active' => 1,
				]);
			// info when update success
			Session::flash('success', 'Successfully activate '.$bank->bank);
		}
		return redirect()->back();
	}
}
