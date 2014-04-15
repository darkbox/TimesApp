<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Tax'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'taxes', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<section>
				<ul class="no-bullet">
				  <li><?php echo __('Created: ') . $this->request->data['Tax']['created'] ?></li>
				  <li><?php echo __('Modified: ') . $this->request->data['Tax']['modified'] ?></li>
				</ul>
			</section>
			<div class="taxes form">
			<?php echo $this->Form->create('Tax'); ?>

				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('description');
					echo $this->Form->input('status');
					echo $this->Form->input('rate');
				?>
			<input type="submit" class="button tiny radius success" value="<?php echo __('Save changes') ?>" />
			<?php echo $this->Form->end(); ?>
			</div>
			</div>
		</div>
	</div>
</div>