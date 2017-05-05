<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
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
    
    
    public function show(Customers $customers)
    {
    //
    }
    
    public function edit(Customers $customers)
    {
    //
    }
    
    public function update(Request $request, Customers $customers)
    {
    //
    }
    
    public function destroy(Customers $customers)
    {
    //
    }
}
