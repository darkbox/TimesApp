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
						        <select name="data[Settings][currency_symbol]">
									<option value="" <?php if("" == h($s['currency_symbol'])) echo 'selected'; ?>><?php echo __(''); ?></option>
									<option value="$" <?php if("$" == h($s['currency_symbol'])) echo 'selected'; ?>><?php echo __('$'); ?></option>
									<option value="€" <?php if("€" == h($s['currency_symbol'])) echo 'selected'; ?>><?php echo __('€'); ?></option>
									<option value="£" <?php if("£" == h($s['currency_symbol'])) echo 'selected'; ?>><?php echo __('£'); ?></option>
									<option value="¥" <?php if("¥" == h($s['currency_symbol'])) echo 'selected'; ?>><?php echo __('¥'); ?></option>
				    			</select>
						      </label>
						    </div>
						    <div class="medium-6 large-6 columns">
						      <label><?php echo __('Currency code') ?>
						        <select name="data[Settings][currency_code]">
									<option value="" <?php if("" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __(''); ?></option>
									<option value="USD" <?php if("USD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('USD'); ?></option>
									<option value="EUR" <?php if("EUR" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('EUR'); ?></option>
									<option value="GBP" <?php if("GBP" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('GBP'); ?></option>
									<option value="JPY" <?php if("JPY" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('JPY'); ?></option>
									<option value="AUD" <?php if("AUD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('AUD'); ?></option>
									<option value="CAD" <?php if("CAD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('CAD'); ?></option>
									<option value="BRL" <?php if("BRL" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('BRL'); ?></option>
									<option value="CZK" <?php if("CZK" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('CZK'); ?></option>
									<option value="DKK" <?php if("DKK" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('DKK'); ?></option>
									<option value="HKD" <?php if("HKD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('HKD'); ?></option>
									<option value="HUF" <?php if("HUF" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('HUF'); ?></option>
									<option value="ILS" <?php if("ILS" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('ILS'); ?></option>
									<option value="MYR" <?php if("MYR" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('MYR'); ?></option>
									<option value="MXN" <?php if("MXN" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('MXN'); ?></option>
									<option value="NZD" <?php if("NZD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('NZD'); ?></option>
									<option value="NOK" <?php if("NOK" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('NOK'); ?></option>
									<option value="PHP" <?php if("PHP" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('PHP'); ?></option>
									<option value="PLN" <?php if("PLN" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('PLN'); ?></option>
									<option value="SGD" <?php if("SGD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('SGD'); ?></option>
									<option value="SEK" <?php if("SEK" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('SEK'); ?></option>
									<option value="CHF" <?php if("CHF" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('CHF'); ?></option>
									<option value="TWD" <?php if("TWD" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('TWD'); ?></option>
									<option value="THB" <?php if("THB" == h($s['currency_code'])) echo 'selected'; ?>><?php echo __('THB'); ?></option>
				    			</select>
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