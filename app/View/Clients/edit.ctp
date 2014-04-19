<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
				<!-- Cabecera -->
				<header>
					<h1><?php echo __('Edit Client'); ?></h1>
					<a href="<?php echo Router::url(array('controller' => 'clients', 'action' => 'index'))?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
				</header>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('contact_name');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('country');
		echo $this->Form->input('state');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('mobile_number');
		echo $this->Form->input('tax_id');
		echo $this->Form->input('language');
		echo $this->Form->input('vat_number');
		echo $this->Form->input('status');
	?>
<input type="submit" class="button tiny success radius" value="<?php echo __('Save Changes')?>">
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
</div>