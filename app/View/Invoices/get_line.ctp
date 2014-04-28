<?php if(isset($service)){ ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($service['Service']['code']); ?>">
		<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="1"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($service['Service']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="0.00"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($service['Service']['rate']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" value="<?php echo h($service['Service']['tax_id']); ?>"></td>
	<td class="value">0</td>
<?php } else if(isset($product)) { ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($product['Product']['code']); ?>">
	<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="2"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($product['Product']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="0.00"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($product['Product']['unit_price']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" value="<?php echo h($product['Product']['tax_id']); ?>"></td>
	<td class="value">0</td>
<?php } ?>