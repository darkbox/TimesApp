<?php 
	$currency_symbol = array("", "$", "€", "£", "¥");
	$currency_code = array("", "USD", "EUR", "GBP", "JPY", "AUD", "CAD", "BRL", "CZK", "DKK", "HKD", "HUF", "ILS", "MYR", "MXN", "NZD", "NOK", "PHP", "PLN", "SGD", "SEK", "CHF", "TWD", "HTB");
?>
<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Invoice'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'index')); ?>" class="button tiny alert radius right" style="margin-top: 20px"><i class="fi-x"></i>&nbsp;<?php echo __('Cancel'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="invoices form">
			<form action="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'edit', $this->request->data['Invoice']['id'])); ?>" id="InvoiceEditForm" method="post" accept-charset="utf-8" data-abide>
				<input type="hidden" name="data[Invoice][id]" value="<?php echo  $this->request->data['Invoice']['id'] ?>">
				<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
			<!-- Formulario básico -->	
			<div class="row">
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Client') ?> <small>Required</small>
						<select name="data[Invoice][client_id]" required id="clientsList">
							<option value=""><?php echo __('Select a client') ?></option>
							<?php foreach($clients as $key => $client): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Client']['id'] == $key){ echo 'selected="selected"';} ?>><?php echo h($client) ?></option>
							<?php endforeach; ?>
						</select>
						</label>
						<small class="error">Please, select a client</small>
						
					</div>
					<div>
						<label><?php echo __('Project') ?>
						<select name="data[Invoice][project_id]" id="projectsByClient">
							<option value=""><?php echo __('Select a client before') ?></option>
							<?php foreach($projects as $key => $project): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Project']['id'] == $key){ echo 'selected="selected"';} ?>><?php echo h($project) ?></option>
							<?php endforeach; ?>
						</select>
						</label>
						
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Invoice title/number') ?> <small>Required</small>
							<input name="data[Invoice][title]" type="text" length="25" value="<?php echo $this->request->data['Invoice']['title'] ?>" required>
						</label>
						<small class="error">This field is required</small>
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div class="dateError">
						<label><?php echo __('Invoice date') ?> <small>Required</small>
							<input name="data[Invoice][invoice_date]" id="dpInvoiceDate" type="text" placeholder="YYYY-MM-DD" required data-abide-validator="dateValidate" value="<?php echo $this->request->data['Invoice']['invoice_date'] ?>">
						</label>
						<small class="error">Please, select Invoice date that fall on or before Due date</small>
					</div>
					<div class="dateError">
						<label><?php echo __('Due date') ?> <small>Required</small>
							<input name="data[Invoice][due_date]" id="dpDueDate" type="text" placeholder="YYYY-MM-DD" required data-abide-validator="dateValidate" value="<?php echo $this->request->data['Invoice']['due_date'] ?>">
						</label>
						<small class="error">Please, select a due date that fall on or after Invoice date</small>
					</div>
				</div>
			</div>

			<!-- Mostrar más -->			
			<dl class="accordion" data-accordion>
				<dd>
					<a href="#showMorePanel"><i class="fi-widget"></i> <?php echo __('Invoice Settings') ?></a>
				    <div id="showMorePanel" class="content">
				    	<div class="row">
				    		<div class="medium-12 large-12 columns">
				    			<div class="row">
				    			<div class="medium-4 large-4 columns">
				    				<label><?php echo __('Currency Symbol') ?></label>
				    				<select name="data[Invoice][currency_symbol]">
										<?php foreach($currency_symbol as $symbol): ?>
										<option value="<?php echo $symbol; ?>" <?php if($symbol == $this->request->data['Invoice']['currency_symbol']){ echo 'selected'; } ?>><?php echo $symbol; ?></option>
										<?php endforeach; ?>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
				    				<label><?php echo __('Currency Code') ?></label>
				    				<select name="data[Invoice][currency_code]">
										<?php foreach($currency_code as $code): ?>
										<option value="<?php echo $code; ?>" <?php if($code == $this->request->data['Invoice']['currency_code']){ echo 'selected'; } ?>><?php echo $code; ?></option>
										<?php endforeach; ?>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
					    			<div class="divToggle" style="margin-top: 22px">
					                	<input name="data[Invoice][display_country]" type="checkbox" id="displayCountry" <?php if($this->request->data['Invoice']['display_country']){ echo 'checked'; } ?>>
				                		<label class="firstLabel" for="displayCountry"><i></i></label>
				                		<label class="toggleLabel" for="displayCountry"><?php echo __('Display country') ?></label>
			              			</div>
			              		</div>
		              			</div>		    			
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="medium-6 large-6 columns">
				    			<label><?php echo __('Notes visible to client') ?>
								<textarea name="data[Invoice][note]" id="" cols="30" rows="5"><?php echo h($this->request->data['Invoice']['note']); ?></textarea>
				    			</label>
				    		</div>
				    		<div class="medium-6 large-6 columns">
				    			<label><?php echo __('Terms') ?>
								<textarea name="data[Invoice][terms]" id="" cols="30" rows="5"><?php echo h($this->request->data['Invoice']['terms']); ?></textarea>
				    			</label>
				    		</div>
				    	</div>
				    </div>
				</dd>
			</dl>

			<!-- Servicios -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addServiceLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Service'); ?></a>
				<table  cellpadding="0" cellspacing="0" id="tableServiceLine">
					<thead>
						<tr>
							<th><?php echo __('Service') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Hours') ?></th>
							<th><?php echo __('Rate') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($this->request->data['Line'])): ?>
							<?php $index = 999; ?>
							<?php foreach($this->request->data['Line'] as $line): ?>
							<?php if($line['type'] == 1): ?>
							<?php $index++; ?>
							<tr class="trService">
								<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($line['code']); ?>">
								<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="1"></td>
								<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($line['description']); ?>"></td>
								<td><input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="<?php echo h($line['amount_hours']) ?>"></td>
								<td>
									<input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($line['rate']); ?>"></td>
								<td>
									<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
										<?php foreach($taxes as $tax): ?>
											<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $line['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td class="value">0.00</td>
								<td><span class="remove-line"><i class="fi-minus"></i></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php else: ?>
						<tr id="emptyListService">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<!-- Productos -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addProductLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Product'); ?></a>
				<table  cellpadding="0" cellspacing="0" id="tableProductLine">
					<thead>
						<tr>
							<th><?php echo __('Product') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Quantity') ?></th>
							<th><?php echo __('Unit price') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($this->request->data['Line'])): ?>
							<?php $index = 9999; ?>
							<?php foreach($this->request->data['Line'] as $line): ?>
							<?php if($line['type'] == 2): ?>
							<?php $index++; ?>
							<tr class="trProduct">
								<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($line['code']); ?>">
								<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="2"></td>
								<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($line['description']); ?>"></td>
								<td><input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="<?php echo h($line['amount_hours']) ?>"></td>
								<td>
									<input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($line['rate']); ?>"></td>
								<td>
									<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
										<?php foreach($taxes as $tax): ?>
											<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $line['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td class="value">0.00</td>
								<td><span class="remove-line"><i class="fi-minus"></i></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php else: ?>
						<tr id="emptyListProduct">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<!-- Total -->
			<div class="row">
				<div class="medium-12 large-12 columns">
					<h3 class="right"><small><?php echo __('Services') ?>: <span id="subServices">0.00</span> + <?php echo __('Products') ?>: <span id="subProducts">0.00</span> = </small><?php echo __('Total') ?> <span id="total">0.00</span></h3>
				</div>
			</div>
			<br><br>

			<!-- Submit -->
			<input type="hidden" id="invoice_amount" name="data[Invoice][amount]" value="0">
			<input type="submit" class="button tiny success radius right" value="<?php echo __('Save invoice') ?>">
			</form>
			</div>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>
<!-- Modal add service line -->
<div id="addServiceLineModal" class="reveal-modal small" data-reveal>
	<h2><?php echo __('Add service'); ?></h2>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<label> <small>Required</small>
				<select name="" id="serviceLine">
					<option value=""><?php echo __('Select an option') ?></option>
					<?php foreach($services as $key => $service): ?>
					<option value="<?php echo $key ?>"><?php echo h($service) ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
	</div>
	<a href="#" class="button tiny success radius right" id="btnInsertService"><?php echo __('Insert') ?></a>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<!-- Modal add product line -->
<div id="addProductLineModal" class="reveal-modal small" data-reveal>
	<h2><?php echo __('Add product'); ?></h2>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<label> <small>Required</small>
				<select name="" id="productLine">
					<option value=""><?php echo __('Select an option') ?></option>
					<?php foreach($products as $key => $product): ?>
					<option value="<?php echo $key ?>"><?php echo h($product) ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
	</div>
	<a href="#" class="button tiny success radius right" id="btnInsertProduct"><?php echo __('Insert') ?></a>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<?php echo $this->Html->script('invoices'); ?>
<?php echo $this->Html->script('zebra_datepicker'); ?>
<?php echo $this->Html->script('datepicker'); ?>

