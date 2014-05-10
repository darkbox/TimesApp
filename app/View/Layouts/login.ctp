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
	<div class="row">
    	<div class="large-12 columns">
    	<?php echo $this->Session->flash(); ?>
    	<?php echo $this->Session->flash('auth'); ?>
		</div>
	</div>

	<!-- Página principal -->
    <?php echo $this->fetch('content'); ?>         

    <!-- Scripts -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('foundation.min'); ?>
    <?php echo $this->Html->script('app'); ?>
     <script type="text/javascript">
      $(document).ready(function() {
           $("#login").fadeIn(500);
      });
    </script>
</body>
</html>