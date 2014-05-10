<section class="dash-tile" id="chart-tile" >
	<header>
		<h1><?php echo __('Payments') ?></h1>
		<ul>
			<?php foreach($payments as $payment): ?>
			<li><?php echo __('Amount: ') . $payment['Payment']['amount'] . " (" . $payment['Payment']['date'] . ")" ?></li>
			<?php endforeach; ?>
		</ul>
	</header>
	
	<footer>
		<ul>
			<li>Payments</li>
			<li class="btn"><a href="<?php echo Router::url(array('controller' => 'payments', 'action' => 'index')); ?>"><i class="fi-widget"></i></a></li>
		</ul>
	</footer>
</section>