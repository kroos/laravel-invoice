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

// echo Request::segment(2);

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

	// dd($sales);

// invoice number
$lo = Preferences::find(1);



// Instanciation of inherited class
$pdf = new PDF('P','mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTitle('Invoice ');

// echo $pdf->GetPageWidth();		// 210.00155555556
// echo $pdf->GetPageHeight();		// 297.00008333333

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(145, 0, 181);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0, 7, 'Invoice Number : '.$sales->id, 1, 1, 'C', true);

// reset font
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
// $pdf->SetFillColor(200,220,255);

// $pdf->Cell(95, 5, 'test', 0, 0, 'C');
// $pdf->Cell(95, 5, 'Invoice to : ', 0, 1, 'C');
$pdf->Ln(5);

// customer section
$pdf->SetRightMargin(105);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0, 5, 'Invoice to : ', 0, 'L');

$sacust = SalesCustomers::where(['id_sales' => $sales->id])->get();
foreach ($sacust as $key) {
	$cust = Customers::findOrFail($key->id_customer);
	$pdf->MultiCell(0, 5, $cust->client, 0, 'L');
	$pdf->SetFont('Arial','',8);
	$pdf->MultiCell(0, 5, 'Address : '.ucwords(strtolower($cust->client_address)).' '.$cust->client_poskod, 0, 'L');
	$pdf->MultiCell(0, 5, 'Phone : '.$cust->client_phone, 0, 'L');
	$pdf->MultiCell(0, 5, 'Email : '.$cust->client_email, 0, 'L');
}


$pdf->SetFont('Arial','B',10);
// tracking number column
$pdf->SetRightMargin(55);
$pdf->SetLeftMargin(105);
$pdf->SetY(47);
$pdf->MultiCell(0, 5, 'Invoice Date : ', 0, 'R');
$pdf->MultiCell(0, 5, 'Tracking/Receipt Number : ', 0, 'R');


$pdf->SetFont('Arial','',8);
// tracking number list
$pdf->SetRightMargin(10);
$pdf->SetLeftMargin(155);
$pdf->SetY(47);
$pdf->MultiCell(0, 5, my(Sales::find($sales->id)->date_sale), 0, 'R');
foreach ( SlipNumbers::where(['id_sales' => $sales->id])->get() AS $key ) {
	$pdf->MultiCell(0, 5, $key->tracking_number, 0, 'R');
}

$pdf->Ln(30);






// reset margin
$pdf->SetX(10);
$pdf->SetRightMargin(10);
$pdf->SetLeftMargin(10);





// invoice section item
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(145, 0, 181);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0, 7, 'Invoice Item', 1, 1, 'C', true);

// reset font
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(5);

// header
$pdf->Cell(70, 7, 'Product', 1, 0, 'C');
$pdf->Cell(30, 7, 'Retail (RM)', 1, 0, 'C');
$pdf->Cell(30, 7, 'Quantity', 1, 0, 'C');
$pdf->Cell(30, 7, 'Total retail (RM)', 1, 0, 'C');
$pdf->Cell(30, 7, 'Image', 1, 1, 'C');

// list of product
$pdf->SetFont('Arial','',8);
$lipro = SalesItems::where(['id_sales' => $sales->id])->get();
$gt = 0;
foreach ($lipro as $ke) {
	$pdf->Cell(70, 27, App\Product::findOrFail($ke->id_product)->product, 1, 0, 'C');
	$pdf->Cell(30, 27, number_format($ke->retail, 2), 1, 0, 'C');
	$pdf->Cell(30, 27, $ke->quantity, 1, 0, 'C');
	$pdf->Cell(30, 27, number_format(($ke->retail * $ke->quantity), 2), 1, 0, 'C');
	$gt += $ke->retail * $ke->quantity;

	$img = ProductImage::where(['id_product' => $ke->id_product])->get();
	foreach ($img as $imu) {
		$pdf->Cell(30, 27, $pdf->Image(base64ToImage($imu->image, $imu->mime), $pdf->GetX()+1, $pdf->GetY()+0), 1, 2, 'C');
	}
	$pdf->Cell(0, 0, '', 0, 1, 'C');
}
// list of taxes
$taxes = SalesTax::where(['id_sales' => $sales->id])->get();
$rp = 0;
if ($taxes->count() > 0) {
	foreach ($taxes as $tx) {
		$txd = Taxes::find($tx->id_tax);
		$pdf->Cell(70, 7, 'Taxes : ', 1, 0, 'C');
		$pdf->Cell(30, 7, $txd->tax, 1, 0, 'C');
		$pdf->Cell(30, 7, $txd->amount.'%', 1, 0, 'C');
		$pdf->Cell(30, 7, number_format( ($txd->amount / 100) * $gt , 2), 1, 0, 'C');
		$rp += ($txd->amount / 100) * $gt;
		$pdf->Cell(30, 7, '', 1, 1, 'C');
	}
}

// footer
$pdf->SetFont('Arial','B',10);
$pdf->Cell(130, 7, 'Grand Total', 1, 0, 'C');
$pdf->Cell(30, 7, number_format($gt + $rp, 2), 1, 0, 'C');
$pdf->Cell(30, 7, '', 1, 1, 'C');
$pdf->Ln(5);





// payment section item
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(145, 0, 181);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0, 7, 'Payment', 1, 1, 'C', true);

// reset font
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(5);

$lipay = Payments::where(['id_sales' => $sales->id])->get();
$py = 0;

if ($lipay->count() > 0) {

	// header
	$pdf->Cell(130, 7, 'Bank', 1, 0, 'C');
	$pdf->Cell(30, 7, 'Date Payment', 1, 0, 'C');
	$pdf->Cell(30, 7, 'Amount', 1, 1, 'C');
	
	// list of payment
	$pdf->SetFont('Arial','',8);
	foreach ($lipay as $k) {
		$pdf->Cell(130, 7, Banks::findOrFail($k->id_bank)->bank, 1, 0, 'C');
		$pdf->Cell(30, 7, my($k->date_payment), 1, 0, 'C');
		$pdf->Cell(30, 7, number_format($k->amount, 2), 1, 1, 'C');
		$py += $k->amount;
	
	}
	
	// footer
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160, 7, 'Grand Total', 1, 0, 'C');
	$pdf->Cell(30, 7, number_format($py, 2), 1, 1, 'C');
} else {
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(0, 7, 'Sorry, no payment yet.', 0, 1, 'C');
}
$pdf->Ln(5);



// for ($i=0; $i < 100; $i++) { 
// 	$pdf->Cell(0,5,'asd', 1,1,'C');
// }


$pdf->SetFont('Arial','',6);
$pdf->SetY(-31);
$pdf->Cell(0, 4, 'Invoice was created on a computer and is valid without the signature and seal.', 0,1,'L');
$pdf->Cell(0, 4, 'NOTICE: A finance charge of 1.5% will be made on unpaid balances after 30 days from the date of the invoice.', 0,1,'L');

$filename = 'Invoice for '.$cust->client.'.pdf';

// $pdf->Output('I', $filename);		// <-- kalau nak bukak secara direct saja
// $pdf->Output('D');			// <-- semata mata 100% download
$pdf->Output('F', storage_path().'/uploads/pdf/'.$filename);			// <-- send through email

?>