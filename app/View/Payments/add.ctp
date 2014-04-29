<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Payments'), array('controller' => 'payments', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Add Payment'); ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Add Payment'); ?></h1>
			</header>
			<!-- Contenido -->
			<div class="payments form">
				<form action="<?php echo Router::url(array('controller' => 'payments', 'action' => 'add')) ?>" id="PaymentAddForm" method="post" accept-charset="utf-8" data-abide>
					<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
					<div class="row">
					<div class="medium-6 large-6 columns">
						<label><?php echo __('Invoice') ?><small>Required</small>
							<select name="data[Payment][invoice_id]" required>
								<option value=""><?php echo __('Select an invoice') ?></option>
								<?php foreach($invoices as $key => $invoice): ?>
								<option value="<?php echo $key ?>"><?php echo $invoice ?></option>
								<?php endforeach; ?>
							</select>
						</label>
						<small class="error">Please, select an invoice.</small>
					</div>
					<div class="medium-6 large-6 columns">
						<label><?php echo __('Amount') ?><small>Required</small>
							<input type="number" step="any" min="0.01" name="data[Payment][amount]" placeholder="0.00" required>
						</label>
						<small class="error">Please, add an amount greater than 0.00.</small>
					</div>
					</div>
					<div class="row">
					<div class="medium-6 large-6 columns">
						<label><?php echo __('Date') ?><small>Required</small>
							
						</label>
						<small class="error">Date is required.</small>
					</div>
					<div class="medium-12 large-12 columns">
						<input type="submit" class="button tiny success radius right" value="<?php echo __('Add Payment') ?>">
					</div>
					</div>
				</form>
			</div>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>