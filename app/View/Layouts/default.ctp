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
    echo $this->Html->script('jquery.min'); 
	?>
</head>
<body>
	<!-- Header -->
	<header class="top-bar-wrapper">
	    <div class="row">
		    <div class="large-12 columns">
		    	<?php echo $this->element('navbar'); ?>
		   	</div>
		</div>
	</header>


	<!-- Content -->
	<div class="row">
    	<div class="large-12 columns">
    	<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

		</div>
	</div>

	<!-- Footer -->
    <footer class="global-footer">
      <nav class="footer-nav" role="navigation">
        <ul class="footer-menu">
          <li class="backToTop"><a href=""><i class="fi-arrow-up"></i><span class="hidden">TimesApp</span></a></li>
          <li class="footerList"><a href="">Dashboard</a></li>
          <li class="footerList"><a href="">Invoices</a></li>
          <li class="footerList"><a href="">Projects</a></li>
          <li class="footerList"><a href="">Clients</a></li>
          <li class="footerList"><a href="">Taxes</a></li>
          <li class="footerList"><a href="">Users</a></li>
          <li class="footerList"><a href="">Whatever</a></li>
        </ul>
        <div class="clearfix"></div>
        <ul class="social-menu">
          <li class="socialList"><a href="https://github.com/darkbox/TimesApp"><i class="fi-social-github"></i><span class="hidden">Github</span></a></li>
          <li class="socialList"><a href=""><i class="fi-paw"></i><span class="hidden">HTML5</span></a></li>
          <li class="socialList"><a href=""><i class="fi-paw"></i></i><span class="hidden">CSS3</span></a></li>
          <li class="socialList"><a href=""><i class="fi-paw"></i><span class="hidden">Icon</span></a></li>
          <li class="socialList"><a href=""><i class="fi-paw"></i><span class="hidden">Icon</span></a></li>
        </ul>
      </nav>
      <div class="clearfix"></div>
    </footer>

    <!-- Scripts -->
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('foundation.min'); ?>
    <?php echo $this->Html->script('foundation-datepicker'); ?>
    <?php echo $this->Html->script('app'); ?>
    <?php echo $this->Html->script('listClients'); ?>
</body>
</html>