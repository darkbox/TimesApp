<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'index')) ?>"><?php echo __('General'); ?></a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'invoices')) ?>"><?php echo __('Invoices'); ?></a></li>
					<li class="current"><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'email')) ?>"><?php echo __('Email'); ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<div class="row">
				<div class="large-12 columns" style="padding: 20px">
					<form action="<?php echo Router::url(array('controller' => 'Settings', 'action' => 'email')); ?>" method="post">
						  <h2><?php echo __('Email options'); ?></h2>
						  <div class="row">
						    <div class="medium-12 large-12 columns">
						      <label><?php echo __('Default subject') ?>
						      	<small>Visible to client</small>
						       	<input type="text" length="25" name="data[Settings][email_subject]" value="<?php echo h($s['email_subject']) ?>">
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-12 large-12 columns">
						      <label><?php echo __('Default message') ?>
						       	<textarea rows="6" name="data[Settings][email_message]"><?php echo h($s['email_message']) ?></textarea>
						      </label>
						    </div>
						  </div>
						<input type="submit" class="button tiny radius success" value="<?php echo __('Save'); ?>"/>
					</form>
				</div>
			</div>
		</div>
		</div> <!-- Fin contenido -->
	</div>
</div>