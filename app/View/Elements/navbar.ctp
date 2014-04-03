<?php
  $menuItems = array(
    'Dashboard' => __('Dashboard'),
    'Invoices' => __('Invoices'),
    'Projects' => __('Projects'),
    'Clients' => __('Clients'),
    'Taxes' => __('Taxes'),
    'Users' => __('Users'),
    );
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
      <li><?php echo $this->Html->link($title, array('controller' => $controller, 'action' => 'index')); ?></li>
      <?php endforeach; ?>
    </ul>
  </section>
</nav>