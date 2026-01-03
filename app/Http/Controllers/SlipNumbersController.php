<?php

namespace App\Http\Controllers;

use App\Models\SlipNumbers;
use Illuminate\Http\Request;

use Session;

class SlipNumbersController extends Controller
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
     * @param  \App\SlipNumbers  $slipNumbers
     * @return \Illuminate\Http\Response
     */
    public function show(SlipNumbers $slipNumbers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlipNumbers  $slipNumbers
     * @return \Illuminate\Http\Response
     */
    public function edit(SlipNumbers $slipNumbers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlipNumbers  $slipNumbers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlipNumbers $slipNumbers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlipNumbers  $slipNumbers
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlipNumbers $slipNumbers)
    {
        $slipNumbers->delete();
        return response()->json([
                                    'message' => 'Data deleted',
                                    'status' => 'success'
                                ]);
    }

}
