<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Create Invoice'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'index')) ?>" class="button tiny alert radius right" style="margin-top: 20px"><i class="fi-x"></i>&nbsp;<?php echo __('Cancel'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="invoices form">
			<form action="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'add')) ?>" id="InvoiceAddForm" method="post" accept-charset="utf-8" data-abide>
				<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>	

			<!-- Show more -->			
			<dl class="accordion" data-accordion>
				<dd>
					<a href="#showMorePanel"><?php echo __('Other options') ?></a>
				    <div id="showMorePanel" class="content">
				      Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				    </div>
				</dd>
			</dl>

			<!-- Servicios -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addServiceLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Service'); ?></a>
				<table  cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo __('Service') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Hours') ?></th>
							<th><?php echo __('Rate') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th><?php echo __('') ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Productos -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addProductLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Product'); ?></a>
				<table  cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo __('Product') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Quantity') ?></th>
							<th><?php echo __('Unit price') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th><?php echo __('') ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- Submit -->
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
				<select name="" id="">
					<option><?php echo __('Select an option') ?></option>
				</select>
			</label>
		</div>
	</div>	
	<button class="button tiny success radius right" ><?php echo __('Insert') ?></button>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<!-- Modal add product line -->
<div id="addProductLineModal" class="reveal-modal small" data-reveal>
	<h2><?php echo __('Add product'); ?></h2>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<label> <small>Required</small>
				<select name="" id="">
					<option><?php echo __('Select an option') ?></option>
				</select>
			</label>
		</div>
	</div>
	<button class="button tiny success radius right" ><?php echo __('Insert') ?></button>
	<a class="close-reveal-modal">&#215;</a> 
</div>