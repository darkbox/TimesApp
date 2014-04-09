<div class="lines index">
	<h2><?php echo __('Lines'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('amount_hours'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lines as $line): ?>
	<tr>
		<td><?php echo h($line['Line']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($line['Invoice']['name'], array('controller' => 'invoices', 'action' => 'view', $line['Invoice']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($line['Tax']['description'], array('controller' => 'taxes', 'action' => 'view', $line['Tax']['id'])); ?>
		</td>
		<td><?php echo h($line['Line']['type']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['code']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['description']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['rate']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['amount_hours']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['created']); ?>&nbsp;</td>
		<td><?php echo h($line['Line']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $line['Line']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $line['Line']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $line['Line']['id']), null, __('Are you sure you want to delete # %s?', $line['Line']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Line'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice'), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
