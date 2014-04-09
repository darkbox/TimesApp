<div class="invoices form">
<?php echo $this->Form->create('Invoice'); ?>
	<fieldset>
		<legend><?php echo __('Edit Invoice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('title');
		echo $this->Form->input('status');
		echo $this->Form->input('due');
		echo $this->Form->input('currency_symbol');
		echo $this->Form->input('currency_code');
		echo $this->Form->input('discount');
		echo $this->Form->input('terms');
		echo $this->Form->input('note');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('contact_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Invoice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Invoice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lines'), array('controller' => 'lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('controller' => 'lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
