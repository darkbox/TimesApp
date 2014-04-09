<div class="invoices index">
	<h2><?php echo __('Invoices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('due'); ?></th>
			<th><?php echo $this->Paginator->sort('currency_symbol'); ?></th>
			<th><?php echo $this->Paginator->sort('currency_code'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
			<th><?php echo $this->Paginator->sort('terms'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($invoices as $invoice): ?>
	<tr>
		<td><?php echo h($invoice['Invoice']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($invoice['Project']['code'], array('controller' => 'projects', 'action' => 'view', $invoice['Project']['id'])); ?>
		</td>
		<td><?php echo h($invoice['Invoice']['title']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['status']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['due']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['currency_symbol']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['currency_code']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['discount']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['terms']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['note']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['name']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['email']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['address']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['phone']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['contact_name']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['created']); ?>&nbsp;</td>
		<td><?php echo h($invoice['Invoice']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invoice['Invoice']['id']), null, __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Invoice'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lines'), array('controller' => 'lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('controller' => 'lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
