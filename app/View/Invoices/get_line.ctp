<?php if(isset($service)){ ?>
	<td><input type="text" value="<?php echo h($service['Service']['code']); ?>"></td>
	<td><input type="text" value="<?php echo h($service['Service']['description']); ?>"></td>
	<td><input type="number" value="0.00"></td>
	<td><input type="number" value="<?php echo h($service['Service']['rate']); ?>"></td>
	<td><input type="text" value="<?php echo h($service['Service']['tax_id']); ?>"></td>
	<td><input type="number" value="0"></td>
<?php } else if(isset($product)) { ?>
	<td><input type="text" value="<?php echo h($product['Product']['code']); ?>"></td>
	<td><input type="text" value="<?php echo h($product['Product']['description']); ?>"></td>
	<td><input type="number" value="0.00"></td>
	<td><input type="number" value="<?php echo h($product['Product']['unit_price']); ?>"></td>
	<td><input type="text" value="<?php echo h($product['Product']['tax_id']); ?>"></td>
	<td><input type="number" value="0"></td>
<?php } ?>