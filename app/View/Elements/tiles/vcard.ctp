<section class="dash-tile" id="chart-tile" >
	<ul class="vcard" style="border: none !important">
		<li class="fn"><?php echo h($appSettings['companyName']) ?></li>
		<li class="street-address"><?php echo h($appSettings['address']) ?></li>
		<li class="locality"><?php echo h($appSettings['city']) ?></li>
		<li><span class="state"><?php echo h($appSettings['stateProvince']) ?></span>, <span class="zip"><?php echo h($appSettings['zipCode']) ?></span></li>
		<li class="email"><a href="#"><?php echo h($appSettings['email']) ?></a></li>
	</ul>
	<footer>
		<ul>
			<li>settings</li>
			<li class="btn"><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'index')); ?>"><i class="fi-widget"></i></a></li>
		</ul>
	</footer>
</section>