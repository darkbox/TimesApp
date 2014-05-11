<div id="login-wrapper" class="row" style="padding-top: 100px;">
      <div id="login" class="small-12 medium-6 large-4 small-centered columns page-wrapper" style="padding: 20px; display:none; min-height: 0 !important;">
        <h3>Log in to Your Account</h3>
        <form action="<?php Router::url(array('controller' => 'login', 'action' => 'index')); ?>" method="post" data-abide>
        <div class="email-field">
          <label>Email
            <small>Required</small>
            <input type="email" name="data[User][email]" placeholder="example@timesapp.com" pattern="email" required/>
          </label>
          <small class="error">An email address is required.</small>
        </div>
        <div class="password-field">
          <label>Password
            <small>Required</small>
            <input type="password" name="data[User][password]" placeholder="Password" required/>
          </label>
          <small class="error">A password is required.</small>
        </div>
          <div class="row">
            <div class="small-4 medium-4 large-4 columns"><input type="submit" value="<?php echo __('Login'); ?>" class="tiny radius secondary button"/></div>
            <div class="small-8 medium-8 large-8 columns">
              <a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'signup')) ?>"><small>Sing up</small></a><br>
              <a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'forgetpwd')) ?>"><small>Forgotten password?</small></a>
            </div>
          </div>
         </form>
      </div>
    </div>