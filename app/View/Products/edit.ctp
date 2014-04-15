<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Product'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'products', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="products form">
			<?php echo $this->Form->create('Product'); ?>

				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('code');
					echo $this->Form->input('status');
					echo $this->Form->input('description');
					echo $this->Form->input('unit_price');
					echo $this->Form->input('tax_id');
				?>
			<input type="submit" class="button tiny radius success" value="<?php echo __('Save changes') ?>" />
			<?php echo $this->Form->end(); ?>
			</div>
			</div>
		</div>
	</div>
</div>