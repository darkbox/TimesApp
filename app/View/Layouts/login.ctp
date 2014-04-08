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
		</div>
	</div>

	 <!-- Página principal -->
    <div id="login-wrapper" class="row" style="padding-top: 200px;">
      <div id="login" class="small-12 medium-6 large-4 small-centered columns page-wrapper" style="padding: 20px; display:none;">
        <?php echo $this->fetch('content'); ?>         
      </div>
    </div>

     <!-- My footer -->
    <footer id="body-footer" class="fixed-bottom">
      <div class="row">
        <div class="large-12 medium-12 columns">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, magnam, quis, nisi eaque voluptates molestias mollitia reiciendis veniam esse odio libero quisquam cupiditate dolor aliquam facilis magni repellat excepturi. Totam!</p>
        </div>
      </div>
    </footer>

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