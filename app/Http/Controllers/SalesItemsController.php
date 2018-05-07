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

    public function destroy(Request $request)
    {
        $si = SalesItems::destroy($request->id);

        // info when update success
        // Session::flash('flash_message', 'Data successfully deleted!');
    
        // return redirect()->back();      // redirect back to original route
        if ($si) {
            return response()->json([
                                    'message' => 'Data deleted',
                                    'status' => 'success'
                                ]);
        } else {
            return response()->json([
                                    'message' => 'Data cant be deleted, Please try again later.',
                                    'status' => 'error'
                                ]);
        }
    }
}
