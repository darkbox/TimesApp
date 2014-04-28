<?php if(isset($service)){ ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($service['Service']['code']); ?>">
		<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="1"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($service['Service']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="0.00"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($service['Service']['rate']); ?>"></td>
	<td>
		<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
			<?php foreach($taxes as $tax): ?>
			<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $service['Service']['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
			<?php endforeach; ?>
		</select>
	</td>
	<td class="value">0</td>
<?php } else if(isset($product)) { ?>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($product['Product']['code']); ?>">
	<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="2"></td>
	<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($product['Product']['description']); ?>"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="1"></td>
	<td><input type="number" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($product['Product']['unit_price']); ?>"></td>
	<td>
		<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
			<?php foreach($taxes as $tax): ?>
			<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $product['Product']['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
			<?php endforeach; ?>
		</select>
	</td>
	<td class="value">0</td>
<?php } ?>