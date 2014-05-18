<?php
	//array de países 
	$country_array = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
?>

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
						        <select name="data[Settings][country]" required>
						        	<?php foreach ($country_array as $key => $country): ?>
										<option value="<?php echo $country ?>" <?php if($country==$s['country']) echo "selected" ?>><?php echo $country ?></option>
						        	<?php endforeach ?>
						        </select>
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