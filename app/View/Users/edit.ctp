<div class="page-wrapper">
	<div class="row">
		
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit User'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'index')) ?>" class="button tiny secondary radius right" style="margin-top: 20px" ><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="users form">
			<form action="<?php echo Router::url(array('controller' => 'users', 'action' => 'edit', $this->request->data['User']['id'])) ?>" id="UserEditForm" method="post" accept-charset="utf-8" data-abide>
				<div style="display:none;"><input name="_method" value="PUT" type="hidden"></div>
				<input name="data[User][id]" value="<?php echo $this->request->data['User']['id'] ?>" id="UserId" type="hidden">
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
				<div class="row">
					<div class="medium-6 large-6 columns">
						<label><?php echo __('Role') ?> <small>Required</small></label>
						<select name="data[User][role]" required>
							<option value=""><?php echo __('Select an option') ?></option>
							<option value="overlord" <?php if($this->request->data['User']['role'] == 'overlord') echo 'selected'; ?>>Overlord</option>
							<option value="minion" <?php if($this->request->data['User']['role'] == 'minion') echo 'selected'; ?>>Minion</option>
						</select>
						<small class="error">Please, select a role.</small>
					</div>
					<div class="medium-6 large-6 columns">
						<label><?php echo __('Status') ?> <small>Required</small></label>
						<select name="data[User][status]" required>
							<option value=""><?php echo __('Select an option') ?></option>
							<option value="0" <?php if($this->request->data['User']['status'] == 0) echo 'selected'; ?>><?php echo __('Inactive') ?></option>
							<option value="1" <?php if($this->request->data['User']['status'] == 1) echo 'selected'; ?>><?php echo __('Active') ?></option>
						</select>
						<small class="error">Please, select a status.</small>
					</div>
				</div>
				<input type="submit" class="button tiny success radius right" value="<?php echo __('Save Changes') ?>">
			</form>
			</div>

			</div>
		</div>
	</div>
</div>
