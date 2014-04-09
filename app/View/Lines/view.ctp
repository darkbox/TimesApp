<div class="lines view">
<h2><?php echo __('Line'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($line['Line']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invoice'); ?></dt>
		<dd>
			<?php echo $this->Html->link($line['Invoice']['name'], array('controller' => 'invoices', 'action' => 'view', $line['Invoice']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo $this->Html->link($line['Tax']['description'], array('controller' => 'taxes', 'action' => 'view', $line['Tax']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($line['Line']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($line['Line']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($line['Line']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($line['Line']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount Hours'); ?></dt>
		<dd>
			<?php echo h($line['Line']['amount_hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($line['Line']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($line['Line']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Line'), array('action' => 'edit', $line['Line']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Line'), array('action' => 'delete', $line['Line']['id']), null, __('Are you sure you want to delete # %s?', $line['Line']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice'), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
