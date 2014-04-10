<div class="page-wrapper">
<div class="row">
	<div class="large-12 columns">
	<dl class="tabs vertical" data-tab>
		<dd class="active"><a href="#panel1a">General</a></dd>
		<dd><a href="#panel2a">Invoices</a></dd>
		<dd><a href="#panel3a">More stuff</a></dd>
		<dd><a href="#panel4a">Others</a></dd> 
	</dl> 
	<div class="tabs-content vertical"> 
		<div class="content active" id="panel1a">
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
						      <label><?php echo __('Currency') ?>
						        <input type="text" name="data[Settings][currency]" value="<?php echo $s['currency']; ?>" required/>
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
		<div class="content" id="panel2a"> 
			<div class="row">
				<div class="large-12 columns">
					<form action="">
						 <div class="row">
						    <div class="large-12 columns">
						      <label><?php echo __('Default terms') ?>
						        <textarea></textarea>
						      </label>
						    </div>
						  </div>
						   <div class="row">
						    <div class="large-12 columns">
						      <label>Input Label
						        <input type="text" placeholder="large-12.columns" />
						      </label>
						    </div>
						  </div>
					</form>
				</div>
			</div>
		</div> <div class="content" id="panel3a"> 
			<p>Panel 3 content goes here.</p> 
		</div> 
		<div class="content" id="panel4a"> 
			<p>Panel 4 content goes here.</p> 
		</div> 
	</div>
	</div>
</div>
</div>