<div class="lines form">
<?php echo $this->Form->create('Line'); ?>
	<fieldset>
		<legend><?php echo __('Add Line'); ?></legend>
	<?php
		echo $this->Form->input('invoice_id');
		echo $this->Form->input('tax_id');
		echo $this->Form->input('type');
		echo $this->Form->input('code');
		echo $this->Form->input('description');
		echo $this->Form->input('rate');
		echo $this->Form->input('amount_hours');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lines'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice'), array('controller' => 'invoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('controller' => 'taxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
