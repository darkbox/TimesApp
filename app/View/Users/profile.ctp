<div class="page-wrapper">
	<div class="row">
		
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit your profile'); ?></h1>
			</header>
			<!-- Contenido -->
			<div class="users form">
			<form action="<?php echo Router::url(array('controller' => 'users', 'action' => 'profile', $this->request->data['User']['id'])) ?>" id="UserEditForm" method="post" accept-charset="utf-8" data-abide>
				<div style="display:none;"><input name="_method" value="PUT" type="hidden"></div>
				<input name="data[User][id]" value="<?php echo $this->request->data['User']['id'] ?>" id="UserId" type="hidden">

				<div class="row">
					<div class="medium-4 columns">	
						<center>
					<?php echo $this->Gravatar->image(h($this->request->data['User']['email']),
						array(
							'default' => 'identicon',
							'size' => 200
							)); ?>
						</center>
					</div>
					<div class="medium-8 columns">		
						<div class="row">
							<div class="medium-6 large-6 columns">
								<label><?php echo __('Name') ?> <small>Required</small></label>
								<input type="text" name="data[User][name]" value="<?php echo $this->request->data['User']['name'] ?>" placeholder="User name" required>
								<small class="error">A name is required.</small>
							</div>
							<div class="medium-6 large-6 columns">
								<label><?php echo __('Email') ?> <small>Required</small></label>
								<input type="email" name="data[User][email]" value="<?php echo $this->request->data['User']['email'] ?>" placeholder="" required>
								<small class="error">An email is required and must be unique.</small>
							</div>
						</div>
						<div class="row">
							<div class="medium-12 large-12 columns">
								<label><?php echo __('Password') ?> <small>Leave password field in blank if you don't want to change it</small></label>
								<input type="password" name="data[User][password]" value="" placeholder="Password: Leave password field in blank if you don't want to change it">
							</div>
						</div>
					</div>
				</div>
				<input type="submit" class="button tiny success radius right" value="<?php echo __('Save Changes') ?>">
			</form>
			</div>

			</div>
		</div>
	</div>
</div>
