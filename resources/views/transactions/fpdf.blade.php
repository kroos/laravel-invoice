<?php

use App\Users;
use App\Product;
use Crabbly\FPDF\FPDF as Fpdf;
use Carbon\Carbon;
// use File;
class PDF extends Fpdf
{



	// Page header
	function Header()
	{
		$nam = App\Users::findOrFail(request('id_user'));
		// Logo
		// $this->Image('logo.png',10,6,30);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		// $this->Cell(80);
		// Title
		$this->Cell(0, 10, $nam->name.' Commission\'s on '.my(request('commission_on')), 1, 0, 'C');
		// Line break
		$this->Ln(20);
	}
	
	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

function my($string) {
	$rt = Carbon::createFromFormat('Y-m', $string);
	return date('F', mktime(0, 0, 0, $rt->month, 1)).'_'.$rt->year;
}


// load image
function base64ToImage($base64_string, $output_file) {
	$ext = explode('/', $output_file);
	$filename = storage_path().'/uploads/pdfimages/'.mt_rand().'.'.$ext[1];
	file_put_contents($filename, base64_decode($base64_string));
	return $filename;
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 6);

// header
$pdf->Cell(10, 9, 'id', 1, 0, 'C');
$pdf->Cell(35, 9, 'product', 1, 0, 'C');
$pdf->Cell(20, 9, 'month', 1, 0, 'C');
$pdf->Cell(20, 9, 'retail (RM)', 1, 0, 'C');
$pdf->Cell(20, 9, 'commission (RM)', 1, 0, 'C');
$pdf->Cell(10, 9, 'quantity', 1, 0, 'C');
$pdf->Cell(20, 9, 'total retail (RM)', 1, 0, 'C');
$pdf->Cell(30, 9, 'total commission (RM)', 1, 0, 'C');
$pdf->Cell(0, 9, 'image', 1, 1, 'C');
// $pdf->Ln();

// body
$iret = 0;
$icomm = 0;
$pdf->SetFont('Arial', '', 6);
foreach ($search as $k) :
	$pdf->Cell(10, 15, $k->id, 1, 0,'C');
	$pdf->Cell(35, 15, App\Product::findOrFail($k->id_product)->product, 1, 0,'C');
	$pdf->Cell(20, 15, $k->commission_on, 1, 0,'C');
	$pdf->Cell(20, 15, number_format($k->retail, 2), 1, 0,'C');
	$pdf->Cell(20, 15, number_format($k->commission, 2), 1, 0,'C');
	$pdf->Cell(10, 15, $k->quantity, 1, 0,'C');
	$pdf->Cell(20, 15, number_format($k->quantity*$k->retail, 2), 1, 0, 'C');	$iret = $iret + ($k->quantity*$k->retail);
	$pdf->Cell(30, 15, number_format($k->quantity*$k->commission, 2), 1, 0, 'C');	$icomm = $icomm + ($k->quantity*$k->commission);

	$imge = App\Product::findOrFail($k->id_product)->productimage;
	foreach ($imge as $imu ) {
		$pdf->Cell(0, 15, $pdf->Image(base64ToImage($imu->image, $imu->mime), $pdf->GetX()+4, $pdf->GetY()+1), 1, 2, 'C');
	}

	$pdf->Cell(0, 0, '', 1, 1, 'C');
endforeach;



// footer
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(10, 9, 'id', 1, 0, 'C');
$pdf->Cell(35, 9, 'product', 1, 0, 'C');
$pdf->Cell(20, 9, 'month', 1, 0, 'C');
$pdf->Cell(20, 9, 'retail (RM)', 1, 0, 'C');
$pdf->Cell(20, 9, 'commission (RM)', 1, 0, 'C');
$pdf->Cell(10, 9, 'quantity', 1, 0, 'C');
$pdf->Cell(20, 9, 'RM '.number_format($iret, 2), 1, 0, 'C');
$pdf->Cell(30, 9, 'RM '.number_format($icomm, 2), 1, 0, 'C');
$pdf->Cell(0, 9, 'image', 1, 1, 'C');
// $pdf->Ln();

$nam = App\Users::findOrFail(request('id_user'));

$filename = $nam->name.'_'.my(request('commission_on')).'.pdf';

// $pdf->Output('I', $filename);		// <-- kalau nak bukak secara direct saja
// $pdf->Output('D', $filename);			// <-- semata mata 100% download
$pdf->Output('F', storage_path().'/uploads/pdf/'.$filename);			// <-- send through email

$files = File::allFiles(storage_path('uploads/pdfimages'));
// dd($files);
File::delete($files);
?>