<?php if(isset($service)){ ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($service['Service']['code']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($service['Service']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" value="0.00"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" value="<?php echo h($service['Service']['rate']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][tax_id]" value="<?php echo h($service['Service']['tax_id']); ?>"></td>
	<td><input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="1">0.00</td>
<?php } else if(isset($product)) { ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($product['Product']['code']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($product['Product']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" value="0.00"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" value="<?php echo h($product['Product']['unit_price']); ?>"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][tax_id]" value="<?php echo h($product['Product']['tax_id']); ?>"></td>
	<td><input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="2">0.00</td>
<?php } ?>