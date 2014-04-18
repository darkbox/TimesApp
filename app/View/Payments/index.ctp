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
				<td class="actions">
					
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