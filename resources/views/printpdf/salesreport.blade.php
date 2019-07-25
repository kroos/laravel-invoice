<?php

// load model
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;
use App\Preferences;
use App\Taxes;
use App\Banks;
use App\User;

use Crabbly\FPDF\FPDF as Fpdf;
use Carbon\Carbon;


function my($string)
{
	$rt = Carbon::createFromFormat('Y-m-d', $string);
	return date('d F Y', mktime(0, 0, 0, $rt->month, $rt->day, $rt->year));
}


// load image
function base64ToImage($base64_string, $output_file)
{
	$ext = explode('/', $output_file);
	$filename = storage_path().'/uploads/pdfimages/'.mt_rand().'.'.$ext[1];
	file_put_contents($filename, base64_decode($base64_string));
	return $filename;
}

class PDF extends Fpdf
{
	// Page header
	function Header()
	{
		// invoice number
		$lo1 = Preferences::find(1);
		
		// Logo
		$this->Image(base64ToImage($lo1->company_logo_image, $lo1->company_logo_mime),50,9,30);
		// Arial bold 15
		$this->SetFont('arial','B',15);
		// Move to the right
		// $this->Cell(80);
		// Title
		$this->SetTextColor(128);
		$this->Cell(0, 5, $lo1->company_name, 0, 1, 'C');
		$this->SetFont('arial','',6);
		$this->Cell(0, 5, $lo1->company_registration, 0, 1, 'C');
		$this->SetFont('arial','B',8);
		$this->Cell(0, 5, $lo1->company_tagline, 0, 1, 'C');
		$this->SetFont('arial','',7);
		$this->Cell(0, 5, 'Phone : '.$lo1->company_fixed_line.'  Mobile : '.$lo1->company_mobile.' Email : '.strtolower($lo1->company_email), 0, 1, 'C');
		// Line break
		$this->Ln(5);
	}
	
	// Page footer
	function Footer()
	{
		// invoice number
		$lo2 = Preferences::find(1);

		// due to multicell setLeftMargin from the body of the page
		$this->SetLeftMargin(10);
		$this->SetTextColor(128);
		// Position at 3.0 cm from bottom
		$this->SetY(-23);
		$this->SetFont('arial','I',6);
		$this->Cell(0, 5, $lo2->company_address.' '.$lo2->company_postcode, 0, 1, 'C');
		// Arial italic 5
		$this->SetFont('Arial','I',5);
		// Page number
		$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,1,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTitle('Sales Report');

// echo $pdf->GetPageWidth();		// 210.00155555556
// echo $pdf->GetPageHeight();		// 297.00008333333

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(145, 0, 181);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0, 7, 'Sales Report', 1, 1, 'C', true);

// set font
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 255);
// $pdf->SetFillColor(200,220,255);

// $pdf->Cell(95, 5, 'test', 0, 0, 'C');
// $pdf->Cell(95, 5, 'Invoice to : ', 0, 1, 'C');
$pdf->Ln(5);

// header
foreach ($request->user as $l) {

	// set font
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(0, 0, 255);

	$nm = User::find($l);
	$pdf->Cell(0, 7, $nm->name.' Sale\'s', 0, 1, 'C');

	// reset font
	$pdf->SetFont('Arial','',8);
	$pdf->SetTextColor(0, 0, 0);

	// search for invoice
	$inv = Sales::where('id_user', $l)->whereBetween('date_sale', [$request->from, $request->to])->get();
	if ($inv->count() < 1) {
		$pdf->Cell(0, 7, 'Sorry, no invoice found.', 0, 2, 'C');
		$pdf->Ln(5);

	} else {

		// set font
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0, 0, 255);

		$pdf->Cell(30, 7, 'Invoice #', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Date Sale', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Commission (RM)', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Amount (RM)', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Payment (RM)', 1, 1, 'C');

		$gcomm = 0;
		$gret = 0;
		$gpay = 0;
		foreach ($inv as $in) {

			///////////////////////////////////////////////////////////////////////////////////////////////
			$ttax = App\SalesTax::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
			$tcharge = 0;
			foreach ($ttax as $k) {
				$tcharge += App\Taxes::findOrFail($k->id_tax)->amount;
			}
			///////////////////////////////////////////////////////////////////////////////////////////////
			$tinv = App\SalesItems::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
			$tamo = 0;
			foreach ($tinv as $tin) {
				// echo $tin->retail.'&nbsp;'.$tin->quantity.'<br />';
				$tamo += $tin->retail * $tin->quantity;
				// echo $tamo.' total amount<br />';
			}
			//total amount
			$tamo = $tamo + ( $tamo * ($tcharge / 100) );
			///////////////////////////////////////////////////////////////////////////////////////////////
			$tcomm = 0;
			foreach ($tinv as $tinc) {
				// echo $tinc->commission.'&nbsp;'.$tinc->quantity.'<br />';
				$tcomm += $tinc->commission * $tinc->quantity;
				// echo $tcomm.' total amount<br />';
			}
			///////////////////////////////////////////////////////////////////////////////////////////////
			$pay = App\Payments::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
			$paya = 0;
			foreach ($pay as $py) {
				$paya += $py->amount;
			}
			$re = $paya - $tamo;
			///////////////////////////////////////////////////////////////////////////////////////////////

			// reset font
			$pdf->SetFont('Arial','',8);
			$pdf->SetTextColor(0, 0, 0);

			$pdf->Cell(30, 7, $in->id, 1, 0, 'C');
			$pdf->Cell(40, 7, my($in->date_sale), 1, 0, 'C');
			$pdf->Cell(40, 7, number_format($tcomm, 2), 1, 0, 'C');
			$gcomm += $tcomm;
			$pdf->Cell(40, 7, number_format($tamo, 2), 1, 0, 'C');
			$gret += $tamo;
			if($re < 0) {
				$pdf->SetFont('Arial','B',8);
				$pdf->SetTextColor(255, 0, 0);
			}
			$pdf->Cell(40, 7, number_format($paya, 2), 1, 1, 'C');
			$gpay += $paya;
			$pdf->SetFont('Arial','',8);
			$pdf->SetTextColor(0, 0, 0);
		}
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(70, 7, 'Grand Total', 1, 0, 'C');
		$pdf->Cell(40, 7, number_format($gcomm, 2), 1, 0, 'C');
		$pdf->Cell(40, 7, number_format($gret, 2), 1, 0, 'C');
		$pdf->Cell(40, 7, number_format($gpay, 2), 1, 1, 'C');
		$pdf->Ln(5);
	}
}


















$pdf->Output('I', 'Sales Report from '.my($request->from).' to '.my($request->to).'.pdf');		// <-- kalau nak bukak secara direct saja
// $pdf->Output('D');			// <-- semata mata 100% download
// $pdf->Output('F', storage_path().'/uploads/pdf/'.$filename);			// <-- send through email
?>