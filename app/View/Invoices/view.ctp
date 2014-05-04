<header class="row">
	<div class="medium-7 columns">
		<h1><?php echo h($appSettings['companyName']) ?></h1>
	</div>
	<div class="medium-5 columns">
		<h3>Invoice <?php echo h($invoice['Invoice']['title']) ?></h3>
		<p><?php echo "<strong>" . __('Date Of Invoice') . "</strong> " . h($invoice['Invoice']['invoice_date']) ?><br><?php echo "<strong>" . __('Payment Is Due') . " </strong>" . h($invoice['Invoice']['due_date']) ?></p>
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
				<th>Price</th>
				<th>Subtotal</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($invoice['Line'] as $line): ?>
			<tr>
				<td><?php echo h($line['amount_hours']) ?></td>
				<td><?php echo h($line['description']) ?></td>
				<td><?php echo h($line['rate']) ?></td>
				<td><?php echo h($line['id']) ?></td>
				<td><?php echo h($line['tax_id']) ?></td>
				<td><?php echo h($line['id']) ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>
<section>
	<h3>Notes</h3>
	<p><?php echo h($invoice['Invoice']['note']) ?></p>
</section>