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


			<!-- Servicios -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px"><i class="fi-plus"></i>&nbsp;<?php echo __('Service'); ?></a>
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
				<a href="#" class="button tiny success radius" style="margin-top: 20px"><i class="fi-plus"></i>&nbsp;<?php echo __('Product'); ?></a>
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