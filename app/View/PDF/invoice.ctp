<?php
App::import('Vendor','xtcpdf');

$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setParameters($appSettings['companyName'], $appSettings['country'], $invoice['Invoice']['title'],
					 $invoice['Invoice']['invoice_date'], $invoice['Invoice']['due_date'], $invoice['Client']['name'],
					 $invoice['Client']['address'], $invoice['Client']['city'], $invoice['Client']['state'],
					 $invoice['Client']['zip_code'], $invoice['Client']['city'], $invoice['Client']['country']);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->AddPage();

$pdf->lastPage();

// Nombre del pdf
$date = date('m/-d/-Y_h:i:s', time());
$name = "Invoice";
$name .= "_" . $date;

echo $pdf->Output($name . '.pdf', 'D');