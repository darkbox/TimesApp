<section class="dash-tile" id="chart-tile" >
	<header>
		<h1><?php echo $users['active'] + $users['inactive'] . " " . __('Users') ?></h1>
	</header>
	<span class="label success round"><?php echo $users['active'] ?></span><?php echo " " . __('user/s actives') ?>
	<br><br>
	<?php if($users['inactive'] < 1): ?>
	<?php echo __('There are no users waitting to be activated.') ?></p>
	<?php else: ?>
	<span class="label round"><?php echo $users['inactive'] ?></span><?php echo " " . __('user/s waitting to be activated') ?>
	<?php endif; ?>
	<footer>
		<ul>
			<li>users</li>
			<li class="btn"><a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'index')); ?>"><i class="fi-widget"></i></a></li>
		</ul>
	</footer>
</section>