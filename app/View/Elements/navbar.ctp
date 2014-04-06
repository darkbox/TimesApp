<?php
  $menuItems = array(
    'Dashboard' => __('Dashboard'),
    'Invoices' => __('Invoices'),
    'Projects' => __('Projects'),
    'Clients' => __('Clients'),
    'Taxes' => __('Taxes'),
    'Users' => __('Users'),
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
          <?php if($activeLink == $controller){
              $class ="class='active'";
          }else{
              $class="";
          }
          ?>
      <li <?php echo $class; ?>><?php echo $this->Html->link($title, array('controller' => $controller, 'action' => 'index')); ?></li>
      <?php endforeach; ?>

      <?php if($logged_in): ?>
        <li><a href="<?php echo Router::url(array('controller' => 'login', 'action' => 'out')); ?>" ><?php echo $current_user['name']; ?></a></li>
      <?php endif; ?>
    </ul>
  </section>
</nav>