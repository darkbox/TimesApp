<form action="<?php Router::url(array('controller' => 'log', 'action' => 'in')); ?>" method="post">
	<input type="text" name="data[User][email]" required/>
	<input type="password" name="data[User][password]" required/>
	<input type="submit" class="button tiny radius primary" value="<?php echo __('Login'); ?>" />
</form>