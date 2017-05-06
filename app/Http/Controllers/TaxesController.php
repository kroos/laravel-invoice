<?php

namespace App\Http\Controllers;

use App\Taxes;
use Illuminate\Http\Request;

use App\Http\Requests\TaxesFormRequest;

use Session;

class TaxesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
   }

    public function index()
    {
        return view('taxes.index');
    }

    public function create()
    {
        return view('taxes.create');
    }

    public function store(TaxesFormRequest $request)
    {
        Taxes::create(request([
                    'tax', 'amount',
            ]));
        Session::flash('flash_message', 'Data successfully added!');

        return redirect(route('taxes.index'));      // redirect back to original route
    }

    public function show(Taxes $taxes)
    {
        //
    }

    public function edit(Taxes $taxes)
    {
        return view('taxes.edit', compact('taxes'));
    }

    public function update(TaxesFormRequest $request, Taxes $taxes)
    {
        Taxes::find($taxes->id)
                -> update(request([
                                'tax', 'amount'
                        ]));
        Session::flash('flash_message', 'Data successfully update!');

        return redirect(route('taxes.index'));      // redirect back to original route
    }

    public function destroy(Taxes $taxes)
    {
        Taxes::destroy($taxes->id);
        Session::flash('flash_message', 'Data successfully delete!');

        return redirect(route('taxes.index'));      // redirect back to original route
    }
}
