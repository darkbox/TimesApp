<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Payments'); ?></a></li>
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
					<th><?php echo __('Invoice') ?></th>
					<th><?php echo $this->Paginator->sort('amount'); ?></th>
					<th><?php echo $this->Paginator->sort('date'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($payments as $payment): ?>
			<tr>
				<td><?php echo $this->Html->link(h($payment['Invoice']['title']), array('controller' => 'invoices', 'action' => 'view', ($payment['Payment']['invoice_id'] * $seed)), array('target' => '_blank')); ?>&nbsp;</td>
				<td><?php echo h($payment['Payment']['amount']); ?>&nbsp;</td>
				<td><?php echo h($payment['Payment']['date']); ?>&nbsp;</td>
				<td class="action">
					<?php 
					$links = array(
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $payment['Payment']['id']), array('action' => 'delete', $payment['Payment']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ', $links, $payment['Payment']['id']); 
					?>
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
				<input name="data[Payment][date]" id="dpPaymentDate" type="text" placeholder="YYYY-MM-DD" required>
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

<?php echo $this->Html->script('zebra_datepicker'); ?>
<?php echo $this->Html->script('datepicker'); ?>
