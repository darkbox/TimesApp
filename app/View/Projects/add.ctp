<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Projects'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'projects', 'action' => 'index')); ?>" class="button tiny radius secondary right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
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
			</div>
		</div>
	</div>
</div>