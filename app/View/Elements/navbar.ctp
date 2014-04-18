<?php
  $menuItems = array(
    'dashboard' => __('Dashboard'),
    'invoices' => __('Invoices'),
    'projects' => __('Projects'),
    'clients' => __('Clients'),
    'taxes' => __('Presets'),
    'users' => __('Users'),
    );
  $activeLink = $this->params['controller'];
?>

<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
    <h1><a href="#"><?php echo $this->Html->image('TimesApp_logo.png', array('style' => 'width: 30px')); ?> TimesApp</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <?php foreach ($menuItems as $controller => $title): ?>
          <?php 
          $class="";
          if($activeLink == 'taxes' || $activeLink == 'products' || $activeLink == 'services'){
            if($controller == 'taxes' || $controller == 'products' || $controller == 'services')
              $class ="class='active'";
          }else if($activeLink == 'projects' || $activeLink == 'hours'){
            if($controller == 'projects' || $controller == 'hours')
              $class ="class='active'";
          }else if($activeLink == 'invoices' || $activeLink == 'payments'){
            if($controller == 'invoices' || $controller == 'payments')
              $class ="class='active'";
          }else if($activeLink == 'dashboard' || $activeLink == 'settings'){
            if($controller == 'dashboard' || $controller == 'settings')
              $class ="class='active'";
          }else{
            if($activeLink == $controller){
              $class ="class='active'";
            }else{
              $class="";
            }
          }
          
          ?>
      <li <?php echo $class; ?>><?php echo $this->Html->link($title, array('controller' => $controller, 'action' => 'index')); ?></li>
      <?php endforeach; ?>
      <?php if($logged_in): ?>
        <li  class="has-dropdown">
          <a href="#"><?php echo $current_user['name']; ?></a>
          <ul class="dropdown">
            <?php if($current_user['role'] == 'overlord'): ?>
            <li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'index')); ?>" ><i class="fi-widget"></i> <?php echo __('Settings'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'out')); ?>" ><i class="fi-power"></i> <?php echo __('Logout'); ?></a></li>
          </ul>
        </li>
      <?php endif; ?>
    </ul>
  </section>
</nav>
