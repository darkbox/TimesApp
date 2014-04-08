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
      <div class="remember-field">
        <label>
          <input type="checkbox" name=""/>
           Remember me
        </label>
      </div>
      <a href=""><small>Forgotten password?</small></a>
    </div>
  </div>
  
</form>