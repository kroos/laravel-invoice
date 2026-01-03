<?php

namespace App\Http\Controllers;

// load model
use App\Models\Sales;
use App\Models\SalesItems;
use App\Models\SlipPostage;
use App\Models\Customers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Payments;
use App\Models\SlipNumbers;
use App\Models\SalesTax;
use App\Models\SalesCustomers;
use App\Models\User;

use File;

use Illuminate\Http\Request;

class PrintReportController extends Controller
{
    public function index()
    {
    	return view('printreport.index');
    }

    public function store(Request $request)
    {
    	$request->validate([
    			'from' => 'required|date_format:Y-m-d|before_or_equal:to',
    			'to' => 'required|date_format:Y-m-d|after_or_equal:from',
    			'user' => 'required',
    			'user.*' => 'integer',
    		]);
    	echo view('printpdf.salesreport', compact(['request']));
    }

    public function audit(Request $request)
    {
        $this->validate($request, [
                'from1' => 'required|date_format:Y-m-d|before_or_equal:to1',
                'to1' => 'required|date_format:Y-m-d|after_or_equal:from1',
                'user1' => 'required',
                'user1.*' => 'integer',
        ]);
        echo view('printpdf.auditreport', compact(['request']));

        $files2 = File::allFiles(storage_path('uploads/pdfimages'));
        foreach($files2 as $h) {
            if (File::extension($h) != 'txt') {
                // echo $l.'<br />';
                File::delete($h);
            }
        }
    }

    public function payment(Request $request)
    {
        $this->validate($request, [
                'from2' => 'required|date_format:Y-m-d|before_or_equal:to2',
                'to2' => 'required|date_format:Y-m-d|after:from2',
                'user2' => 'required',
                'user2.*' => 'integer',
        ]);
        echo view('printpdf.payment', compact(['request']));
        $files2 = File::allFiles(storage_path('uploads/pdfimages'));
        foreach($files2 as $h) {
            if (File::extension($h) != 'txt') {
                // echo $l.'<br />';
                File::delete($h);
            }
        }
    }
}
