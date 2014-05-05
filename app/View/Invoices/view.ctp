<?php
	$subtotal = 0;
	$taxSubtotal = 0;
?>
<header class="row">
	<div class="medium-8 columns">
		<h1><?php echo h($appSettings['companyName']) ?></h1>
	</div>
	<div class="medium-4 columns">
		<h3>Invoice <?php echo h($invoice['Invoice']['title']) ?></h3>
		<p><?php echo "<strong>" . __('Date Of Invoice') . "</strong> " . h($invoice['Invoice']['invoice_date']) ?><br><?php echo "<strong>" . __('Payment Is Due') . " </strong>" . h($invoice['Invoice']['due_date']) . " (" . $dueDays . " days)" ?></p>
	</div>
</header>
<section id="address" class="row">
	<div class="medium-4 columns">
		<h4>To</h4>
		<p><strong><?php echo h($invoice['Client']['name']) ?></strong><br><?php echo h($invoice['Client']['address']) ?><br><?php echo h($invoice['Client']['city']) .  " " . h($invoice['Client']['city']) . " " . h($invoice['Client']['zip_code']) ?><br><?php echo h($invoice['Client']['country']) ?></p>
	</div>
	<div class="medium-4 columns">
		<h4>From</h4>
		<p><strong><?php echo h($appSettings['companyName']) ?></strong><br><?php echo h($appSettings['country']) ?></p>
	</div>
	<div class="medium-4 columns"></div>
</section>
<section id="body">
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Description</th>
				<th style="text-align: right">Price</th>
				<th style="text-align: right">Subtotal</th>
				<th style="text-align: right">Tax</th>
				<th style="text-align: right">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($invoice['Line'] as $line): ?>
			<?php 
				$taxRate = getTaxRate($taxes, h($line['tax_id']));
				$subtotalLine = $line['amount_hours'] * $line['rate'];
				$taxtotalLine = (($taxRate / 100) * $subtotalLine);
				$totalLine = $subtotalLine + $taxtotalLine;

				$subtotal += $subtotalLine;
				$taxSubtotal += $taxtotalLine;
			?>
			<tr>
				<td><?php echo h($line['amount_hours']) . " " . labels($line['type'], $line['amount_hours']) ?></td>
				<td><?php echo h($line['description']) ?></td>
				<td style="text-align: right"><?php echo number_format(h($line['rate']), 2) ?></td>
				<td style="text-align: right"><?php echo number_format($subtotalLine, 2); ?></td>
				<td style="text-align: right"><?php echo number_format($taxRate, 2); ?> %</td>
				<td style="text-align: right"><?php echo number_format($totalLine, 2); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>
<section class="row">
	<div class="medium-6 medium-offset-6 columns">
		<div class="row">
			<div class="medium-6 columns" style="text-align: right;">
				Subtotal:<br>
				Tax:<br>
				<strong>Total:</strong>
			</div>
			<div class="medium-6 columns" style="text-align: right;">
				<?php echo number_format($subtotal, 2); ?><br>
				<?php echo number_format($taxSubtotal, 2); ?><br>
				<strong><?php echo number_format(($subtotal + $taxSubtotal), 2) . $invoice['Invoice']['currency_symbol'] ?></strong>
			</div>
		</div>
	</div>
</section>
<section style="min-height: 200px">
	<hr>
	<h3>Notes</h3>
	<p><?php echo h($invoice['Invoice']['note']) ?></p>
</section>
<?php
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

function getTaxRate($taxes, $id){
	foreach ($taxes as $tax) {
		if($tax['Tax']['id'] == $id){
			return h($tax['Tax']['rate']);
		}
	}
	return 0;
}
?>