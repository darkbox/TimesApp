<div class="services index">
	<h2><?php echo __('Services'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($services as $service): ?>
	<tr>
		<td><?php echo h($service['Service']['id']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['code']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['status']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['rate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($service['Tax']['description'], array('controller' => 'taxes', 'action' => 'view', $service['Tax']['id'])); ?>
		</td>
		<td><?php echo h($service['Service']['created']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $service['Service']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['Service']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $service['Service']['id']), null, __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
