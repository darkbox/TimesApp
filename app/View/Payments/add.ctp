<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Invoices'), array('controller' => 'invoices', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Payments'), array('controller' => 'payments', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Add Payment'); ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Add Payment'); ?></h1>
			</header>
			<!-- Contenido -->
			<div class="payments form">
			<?php echo $this->Form->create('Payment'); ?>
				<?php
					echo $this->Form->input('invoice_id');
					echo $this->Form->input('amount');
					echo $this->Form->input('date');
				?>
			<?php echo $this->Form->end(__('Submit')); ?>
			</div>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>