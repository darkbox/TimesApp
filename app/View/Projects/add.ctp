<div class="projects form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('status');
		echo $this->Form->input('description');
		echo $this->Form->input('client_id');
		echo $this->Form->input('starting_date');
		echo $this->Form->input('finishing_date');
		echo $this->Form->input('estimate_time');
		echo $this->Form->input('estimate_price');
		echo $this->Form->input('billeable');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
