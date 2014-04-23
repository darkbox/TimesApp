<div class="page-wrapper">
	<div class="row">
		
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Add User'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'index')) ?>" class="button tiny secondary radius right" style="margin-top: 20px" ><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="users form">
			<form action="<?php echo Router::url(array('controller' => 'users', 'action' => 'add')) ?>" method="post">
				<?php
					echo $this->Form->input('name');
					echo $this->Form->input('email');
					echo $this->Form->input('password');
					echo $this->Form->input('role');
					echo $this->Form->input('status');
				?>
			<input type="submit" class="button tiny success radius right" value="<?php echo __('Add user') ?>">
			</form>
			</div>
			</div>
		</div>
	</div>
</div>