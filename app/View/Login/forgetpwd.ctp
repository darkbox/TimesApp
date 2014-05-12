<div id="login-wrapper" class="row" style="padding-top: 100px;">
     <div id="login" class="small-12 medium-6 large-4 small-centered columns page-wrapper" style="padding: 20px; display:none; min-height: 0 !important;">
		<h2>Reset password</h2>
		<form action="<?php echo Router::url(array('action' => 'forgetpwd')) ?>" method="post" data-abide>
			<div class="email-field">
			  <p>Enter your email address and we'll send you the instructions to reset your password.</p>
	          <label>Email
	            <small>Required</small>
	            <input type="email" name="data[User][email]" placeholder="example@timesapp.com" pattern="email" required/>
	          </label>
	          <small class="error">An email address is required and must be valid.</small>
	        </div>
			<input type="submit" class="button tiny success radius" value="<?php echo __('Reset password') ?>">
			<a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'index')) ?>" class="button tiny secondary radius right" ><?php echo __('Login') ?></a>
		</form>
	</div>
</div>
