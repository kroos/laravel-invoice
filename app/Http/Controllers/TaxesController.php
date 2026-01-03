<?php

namespace App\Http\Controllers;

use App\Models\Taxes;
use Illuminate\Http\Request;

use App\Http\Requests\TaxesFormRequest;

use Session;

class TaxesController extends Controller
{
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
        Taxes::create(request(['tax', 'amount']));
        Session::flash('success', 'Data successfully added!');
        return redirect(route('taxes.index'));      // redirect back to original route
    }

    public function show(Taxes $tax)
    {
        //
    }

    public function edit(Taxes $tax)
    {
        return view('taxes.edit', ['tax' => $tax]);
    }

    public function update(TaxesFormRequest $request, Taxes $tax)
    {
        $tax->update(request(['tax', 'amount']));
        Session::flash('success', 'Data successfully update!');

        return redirect(route('taxes.index'));      // redirect back to original route
    }

    public function destroy(Taxes $tax)
    {
        $tax->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Success Delete',
        ]);
    }
}
