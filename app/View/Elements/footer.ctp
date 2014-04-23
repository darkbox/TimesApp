<footer class="global-footer">
  <nav class="footer-nav" role="navigation">
    <ul class="footer-menu">
      <li class="backToTop"><a href=""><span id="timesAppIconSmall"></span><span class="hidden">TimesApp</span></a></li>
      <li class="footerList"><?php echo $this->Html->link(__('Dashboard'), array('controller' => 'dashboard', 'action' => 'index')) ?></li>
      <li class="footerList"><?php echo $this->Html->link(__('Invoices'), array('controller' => 'invoices', 'action' => 'index')) ?></li>
      <li class="footerList"><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')) ?></li>
      <li class="footerList"><?php echo $this->Html->link(__('Clients'), array('controller' => 'clients', 'action' => 'index')) ?></li>
      <li class="footerList"><?php echo $this->Html->link(__('Presets'), array('controller' => 'presets', 'action' => 'index')) ?></li>
      <li class="footerList"><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')) ?></li>
      <li class="footerList"><a href="https://github.com/darkbox/TimesApp/blob/master/LICENSE">License</a></li>
    </ul>
    <div class="clearfix"></div>
    <ul class="social-menu">
      <li class="socialList"><a href="https://github.com/darkbox/TimesApp"><i class="fi-social-github"></i><span class="hidden">Github</span></a></li>
    </ul>
  </nav>
  <div class="clearfix"></div>
</footer>