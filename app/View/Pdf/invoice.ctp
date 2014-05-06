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

$html = '<table cellpadding="10" cellspacing="0">
		<thead>
			<tr style="background-color: #ccc;">
				<th style="border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Qty</th>
				<th style="border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Description</th>
				<th style="text-align: right; border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Price</th>
				<th style="text-align: right; border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Subtotal</th>
				<th style="text-align: right; border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Tax</th>
				<th style="text-align: right; border-top: 1px solid #aaa; border-bottom: 1px solid #aaa;">Total</th>
			</tr>
		</thead>
		<tbody>';

$subtotal = 0;
$taxSubtotal = 0;
$stripped = 1;

foreach($invoice['Line'] as $line) {

	$taxRate = getTaxRate($taxes, h($line['tax_id']));
	$subtotalLine = $line['amount_hours'] * $line['rate'];
	$taxtotalLine = (($taxRate / 100) * $subtotalLine);
	$totalLine = $subtotalLine + $taxtotalLine;

	$subtotal += $subtotalLine;
	$taxSubtotal += $taxtotalLine;
	
	if($stripped%2==0) {
		$html .= '<tr style="background-color: #eee;">';
	} else {
		$html .= '<tr>';
	}
	
		$html .= '<td style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . h($line['amount_hours']) . " " . labels($line['type'], $line['amount_hours']) . '</td>
		<td style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . h($line['description']) . '</td>
		<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . number_format(h($line['rate']), 2) . '</td>
		<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . number_format($subtotalLine, 2) . '</td>
		<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . number_format($taxRate, 2) . ' %</td>
		<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . number_format($totalLine, 2) . '</td>
	</tr>';

	$stripped++;
}

$html .= '<tr>
			<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;" colspan="5">Subtotal:<br>Tax:<br><b>Total:</b></td>
			<td style="text-align: right; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">' . number_format($subtotal, 2) . '<br>' . number_format($taxSubtotal, 2) . '<br><b>' . number_format(($subtotal + $taxSubtotal), 2) . $invoice['Invoice']['currency_symbol'] . '</b></td>
		</tr>
		<tr style="background-color: #eee;">
			<td colspan="6" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;"><b>Notes</b><br>' . $invoice['Invoice']['note'] . '</td>
		</tr>
		</tbody>
	</table>';

$pdf->writeHTMLCell('', '', '', 80, $html, '', '', false, true, '', true);

$pdf->lastPage();

// Nombre del pdf
$date = date('m/-d/-Y_h:i:s', time());
$name = "Invoice";
$name .= "_" . $date;

echo $pdf->Output($name . '.pdf', 'D');

function getTaxRate($taxes, $id){
	foreach ($taxes as $tax) {
		if($tax['Tax']['id'] == $id){
			return h($tax['Tax']['rate']);
		}
	}
	return 0;
}

function labels($type, $qty){
	$label = "";
	if($type == 1){ // hours
		$label = __('hours');
	}else{ // Products
		if(intval($qty) < 2){
			$label = __('product');
		}else{
			$label = __('products');
		}
	}
	return $label;
}