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
			<form id="addUserForm" action="<?php echo Router::url(array('controller' => 'users', 'action' => 'add')) ?>" method="post" data-abide>
				<div>
			<label><?php echo __('Name'); ?> <small>required</small>
				<input type="text" name="data[User][name]" maxlength="80" id="UserName" required="required" placeholder="Jhon Doe"/>
			</label>
			<small class="error">Name is required and must be a string.</small>
		</div>
		<div>
			<label><?php echo __('Email'); ?> <small>required</small>
				<input type="email" name="data[User][email]" maxlength="80" id="UserEmail" required="required" placeholder="jhonSmith@example.com"/>
			</label>
			<small class="error">Email is required.</small>
		</div>
		<div>
			<label><?php echo __('Password'); ?> <small>required</small>
				<input type="password" name="data[User][password]" pattern="pass" maxlength="25" id="UserPassword" required="required" />
			</label>
			<small class="error">A password is required and must have at least 3 lowercase letter, 2 uppercase letter, 1 special case letter, and 2 digit. The length should be greater than 8 characters.</small>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Role'); ?> <small>required</small>
					<select name="data[User][role]" data-invalid required>
						<option value=""><?php echo __('Select an option'); ?></option>
						<option value="overlord"><?php echo __('Overlord'); ?></option>
						<option value="minion"><?php echo __('Minion'); ?></option>
					</select>
				</label>
				<small class="error">Please select a role.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Status'); ?> <small>required</small>
					<select name="data[User][status]" data-invalid required>
						<option value="1"><?php echo __('Active'); ?></option>
						<option value="0"><?php echo __('Inactive'); ?></option>
					</select>
				</label>
				<small class="error">Status is required.</small>
			</div>
		</div>
			<input type="submit" class="button tiny success radius right" value="<?php echo __('Add user') ?>">
			</form>
			</div>
			</div>
		</div>
	</div>
</div>