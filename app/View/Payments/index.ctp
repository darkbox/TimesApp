<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Payments'); ?></a></li>
				<li><?php echo $this->Html->link(__('Add Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Payments'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addPaymentModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Payment'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('invoice_id'); ?></th>
					<th><?php echo $this->Paginator->sort('amount'); ?></th>
					<th><?php echo $this->Paginator->sort('date'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($payments as $payment): ?>
			<tr>
				<td><?php echo h($payment['Payment']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($payment['Invoice']['name'], array('controller' => 'invoices', 'action' => 'view', $payment['Invoice']['id'])); ?>
				</td>
				<td><?php echo h($payment['Payment']['amount']); ?>&nbsp;</td>
				<td><?php echo h($payment['Payment']['date']); ?>&nbsp;</td>
				<td><?php echo h($payment['Payment']['created']); ?>&nbsp;</td>
				<td><?php echo h($payment['Payment']['modified']); ?>&nbsp;</td>
				<td class="action">
					
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
			<!-- Paginación -->
			<?php echo $this->element('paginator'); ?>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>
<!-- Modal add payment -->
<div id="addPaymentModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add Payment'); ?></h2>
	<div class="payments form">
	<form id="addpaymentForm" method="post" action="<?php echo Router::url(array('controller' => 'payments', 'action' => 'add')); ?>" accept-charset="utf-8" data-abide>
		<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
		<div class="row">
		<div class="medium-6 large-6 columns">
			<label><?php echo __('Invoice') ?><small>Required</small>
				<select name="data[Payment][invoice_id]" required>
					<option value=""><?php echo __('Select an invoice') ?></option>
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
				<div class="row">
					<div class="medium-4 columns">
						<select name="data[Payment][day]" required>
							<option></option>
						</select>
					</div>
					<div class="medium-4 columns">
						<select name="data[Payment][month]"  required>
							<option></option>
						</select>
					</div>
					<div class="medium-4 columns">
						<select name="data[Payment][year]"  required>
							<option></option>
						</select>
					</div>
				</div>
			</label>
			<small class="error">Date is required.</small>
		</div>
		<div class="medium-12 large-12 columns">
			<input type="submit" class="button tiny success radius right" value="<?php echo __('Add Payment') ?>">
		</div>
		</div>
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>