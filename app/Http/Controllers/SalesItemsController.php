<?php

namespace App\Http\Controllers;

use App\SalesItems;
use Illuminate\Http\Request;

use Session;

class SalesItemsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

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

    public function show(SalesItems $salesItems)
    {
        //
    }

    public function edit(SalesItems $salesItems)
    {
        //
    }

    public function update(Request $request, SalesItems $salesItems)
    {
        //
    }

    public function destroy(SalesItems $salesItems)
    {
        $si = SalesItems::find($salesItems->id);
        // delete related model
        $si->delete();

        // info when update success
        Session::flash('flash_message', 'Data successfully deleted!');
    
        return redirect()->back();      // redirect back to original route
    }
}
