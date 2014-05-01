<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'index')) ?>"><?php echo __('General'); ?></a></li>
					<li class="current"><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'invoices')) ?>"><?php echo __('Invoices'); ?></a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'email')) ?>"><?php echo __('Email'); ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<div class="row">
				<div class="large-12 columns" style="padding: 20px">
					<form action="<?php echo Router::url(array('controller' => 'Settings', 'action' => 'invoices')); ?>" method="post">
						<h2><?php echo __('Currency'); ?></h2>
						 <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Currency symbol') ?>
						      	<small>Required</small>
						        <input type="text" name="data[Settings][currency_symbol]" value="<?php echo h($s['currency_symbol']) ?>" required/>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Currency code') ?>
						        <input type="text" name="data[Settings][currency_code]" value="<?php echo h($s['currency_code'])  ?>" required/>
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-6 large-6 columns">
						      <div class="divToggle">
						            <input type="checkbox" name="data[Settings][display_country]" id="displayCountry" <?php if($s['display_country']){ echo 'checked'; } ?>>
					                <label class="firstLabel" for="displayCountry"><i></i></label>
					                <label class="toggleLabel" for="displayCountry"><?php echo __('Display country') ?></label>
		              			</div>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-12 large-12 columns">
						      <label><?php echo __('Notes') ?>
						      	<small>Visible to client</small>
						       	<textarea rows="6" name="data[Settings][note]"><?php echo h($s['note']) ?></textarea>
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-12 large-12 columns">
						      <label><?php echo __('Terms') ?>
						       	<textarea rows="6" name="data[Settings][term]"><?php echo h($s['term']) ?></textarea>
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