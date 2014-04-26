<div id="login-wrapper" class="row" style="padding-top: 100px;">
     <div id="login" class="small-12 medium-6 large-4 small-centered columns page-wrapper" style="padding: 20px; display:none; min-height: 0 !important;">
		<h2>Sing up as Minion!</h2>
		<form action="<?php echo Router::url(array('action' => 'signup')) ?>" method="post" data-abide>
			<div>
				<label>Name <small>Required</small>
				<input type="text" name="data[User][name]" length="80" placeholder="Jhon Smith" required>
				</label>
				<small class="error">Name is required and must be a string.</small>
			</div>
			<div>
				<label>Email <small>Required</small>
				<input type="email" name="data[User][email]" length="80" placeholder="example@timesapp.com" required>
				</label>
				<small class="error">Name is required and must be a string.</small>
			</div>
			<div>
				<label>Password <small>Required</small>
				<input type="password" id="password" pattern="pass" maxlength="25" name="data[User][password]" length="25" required>
				</label>
				<small class="error">A password is required.</small>
			</div>
			<div>
				<label>Repeat password <small>Required</small>
				<input type="password" id="password2" maxlength="25" length="25" data-abide-validator="equalTo" required>
				</label>
				<small class="error">A password is required and must be equals.</small>
			</div>
			<input type="submit" class="button tiny success radius" value="<?php echo __('Signup') ?>">
			<a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'index')) ?>" class="button tiny secondary radius right" ><?php echo __('Login') ?></a>
		</form>
	</div>
</div>
