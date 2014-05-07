<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
					<li class="current"><a href=""><?php echo __('General'); ?></a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'invoices')) ?>"><?php echo __('Invoices'); ?></a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'settings', 'action' => 'email')) ?>"><?php echo __('Email'); ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<div class="row">
				<div class="large-12 columns" style="padding: 20px">
					<form action="<?php echo Router::url(array('controller' => 'Settings', 'action' => 'index')); ?>" method="post">
						<h2><?php echo __('Profile'); ?></h2>
						 <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Company name') ?>
						      	<small>Required</small>
						        <input type="text" name="data[Settings][companyName]" value="<?php echo $s['companyName']; ?>" required/>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('NIF/CIF') ?>
						      	<small>Required</small>
						        <input type="text" name="data[Settings][cif]" value="<?php echo $s['cif']; ?>" required/>
						      </label>
						    </div>
						  </div>
						  <h2><?php echo __('Address'); ?></h2>
						  <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Country') ?>
						      	<small>Required</small>
						        <input type="text" name="data[Settings][country]" value="<?php echo $s['country']; ?>" required/>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('State/Province') ?>
						        <input type="text" name="data[Settings][stateProvince]" value="<?php echo $s['stateProvince']; ?>" required/>
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="large-12 columns">
						      <label><?php echo __('Address') ?>
						        <textarea name="data[Settings][address]"><?php echo $s['address']; ?></textarea>
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('City') ?>
						        <input type="text" name="data[Settings][city]" value="<?php echo $s['city']; ?>"/>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Postal/Zip code') ?>
						        <input type="text" name="data[Settings][zipCode]" value="<?php echo $s['zipCode']; ?>" />
						      </label>
						    </div>
						  </div>
						   <h2><?php echo __('Contact'); ?></h2>
						   <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Email') ?>
						      	<small>Required</small>
						        <input type="text" name="data[Settings][email]" value="<?php echo $s['email']; ?>" required/>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Fax') ?>
						        <input type="text" name="data[Settings][fax]" value="<?php echo $s['fax']; ?>" />
						      </label>
						    </div>
						  </div>
						  <div class="row">
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Phone') ?>
						        <input type="text" name="data[Settings][phone]" value="<?php echo $s['phone']; ?>" />
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Mobile') ?>
						        <input type="text" name="data[Settings][mobile]" value="<?php echo $s['mobile']; ?>" />
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