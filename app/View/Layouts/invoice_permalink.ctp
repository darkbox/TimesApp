<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		TimesApp:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('app');
		echo $this->Html->css('foundation-icons');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('modernizr');
	?>
</head>
<body style="height: 100% !important;">

	<!-- Página principal -->
	<div class="row">
		<div class="medium-12 columns">
			<div style="width=700px; margin: 30px; auto;">
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'generatePDF', $invoice['Invoice']['id'])) ?>" class="button tiny success radius right"><?php echo __('Download PDF') ?></a>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="medium-12 columns">
			<div class="page-wrapper" style="width=700px; margin: 0 auto; padding:30px">
			<?php echo $this->fetch('content'); ?>         
			</div>
		</div>
	</div>
	
    <!-- Scripts -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('foundation.min'); ?>
    <?php echo $this->Html->script('app'); ?>
</body>
</html>