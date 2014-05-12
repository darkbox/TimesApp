<div id="login-wrapper" class="row" style="padding-top: 100px;">
     <div id="login" class="small-12 medium-6 large-4 small-centered columns page-wrapper" style="padding: 20px; display:none; min-height: 0 !important;">
		<h2>Reset password</h2>
		<form method="post" data-abide>
			<div>
				<label>Password <small>Required</small>
				<input type="password" id="password" pattern="pass" maxlength="25" name="data[User][password]" length="25" required>
				</label>
				<small class="error">
					A password is required and must be valid.<br>
					* It must be 6 to 25 characters in length<br>
					* It must contain characters in two or more of these groups: lower case, upper case, numbers, and punctuation.
				</small>
			</div>
			<div>
				<label>Repeat password <small>Required</small>
				<input type="password" id="password2" maxlength="25" length="25" data-abide-validator="equalTo" required>
				</label>
				<small class="error">A password is required and must be equals.</small>
			</div>
			<input type="submit" class="button tiny success radius" value="<?php echo __('Save password') ?>">
		</form>
	</div>
</div>
