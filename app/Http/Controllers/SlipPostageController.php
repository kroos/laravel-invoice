<?php

namespace App\Http\Controllers;

use App\SlipPostage;
use Illuminate\Http\Request;

use Session;

class SlipPostageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SlipPostage  $slipPostage
     * @return \Illuminate\Http\Response
     */
    public function show(SlipPostage $slipPostage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlipPostage  $slipPostage
     * @return \Illuminate\Http\Response
     */
    public function edit(SlipPostage $slipPostage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlipPostage  $slipPostage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlipPostage $slipPostage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlipPostage  $slipPostage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = SlipPostage::destroy($request->id);
        // info when update success
        // Session::flash('flash_message', 'Data successfully deleted!');
    
        // return redirect()->back();      // redirect back to original route
        if ($result) {
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
