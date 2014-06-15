<?php
	//array de países 
	$country_array = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
?>

<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
				<!-- Cabecera -->
				<header>
					<h1><?php echo __('Edit Client'); ?></h1>
					<a href="<?php echo Router::url(array('controller' => 'clients', 'action' => 'index'))?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
				</header>

				<form action="<?php echo Router::url(array('controller' => 'clients', 'action' => 'edit')) . '/' . $this->request->data['Client']['id'] ?>" method="post" data-abide>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Name'); ?> <small>required</small>
								<input type="text" name="data[Client][name]" required value="<?php echo $this->request->data['Client']['name'] ?>">
							</label>
							<small class="error">Name is required and must be a string.</small>
						</div>
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Status'); ?> <small>required</small>
								<select name="data[Client][status]" required>
									<option value="1"<?php if("1" == $this->request->data['Client']['status']) echo 'selected'; ?>><?php echo __('Active'); ?></option>
									<option value="0"<?php if("0" == $this->request->data['Client']['status']) echo 'selected'; ?>><?php echo __('Inactive'); ?></option>
								</select>
							</label>
							<small class="error">Status is required.</small>
						</div>
					</div>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Email'); ?> <small>required</small>
								<input type="email" name="data[Client][email]" required value="<?php echo $this->request->data['Client']['email'] ?>">
							</label>
							<small class="error">Email is required and must be valid.</small>
						</div>
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Contact name'); ?>
								<input type="text" name="data[Client][contact_name]" value="<?php echo $this->request->data['Client']['contact_name'] ?>">
							</label>
						</div>
					</div>
					<div>
						<label><?php echo __('Adress'); ?>
							<textarea name="data[Client][address]"><?php echo $this->request->data['Client']['address'] ?></textarea>
						</label>
					</div>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('City'); ?>
								<input type="text" name="data[Client][city]" value="<?php echo $this->request->data['Client']['city'] ?>">
							</label>
						</div>
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Zip code'); ?>
								<input type="number" name="data[Client][zip_code]" value="<?php echo $this->request->data['Client']['zip_code'] ?>">
							</label>
							<small class="error">Zip code must be a number.</small>
						</div>
					</div>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Country'); ?>
								<select name="data[Client][country]">
									<option value="">Pick a country</option>
						        	<?php foreach ($country_array as $key => $country): ?>
										<option value="<?php echo $country ?>" <?php if($country==$this->request->data['Client']['country']) echo "selected" ?>><?php echo $country ?></option>
						        	<?php endforeach ?>
						        </select>
							</label>
						</div>
						<div class="medium-6 columns">
							<label><?php echo __('State'); ?>
								<input type="text" name="data[Client][state]" value="<?php echo $this->request->data['Client']['state'] ?>">
							</label>
						</div>
					</div>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Phone number'); ?>
								<input type="number" name="data[Client][phone_number]" value="<?php echo $this->request->data['Client']['phone_number'] ?>">
							</label>
							<small class="error">Phone number must be a number.</small>
						</div>
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Mobile number'); ?>
								<input type="number" name="data[Client][mobile_number]" value="<?php echo $this->request->data['Client']['mobile_number'] ?>">
							</label>
							<small class="error">Mobile number must be a number.</small>
						</div>
					</div>
					<div class="row">
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Tax'); ?> <small>required</small>
								<select name="data[Client][tax_id]" data-invalid required>
								<?php foreach ($taxes as $id => $tax): ?>
									<option value="<?php echo $id; ?>" <?php if($id == $this->request->data['Client']['tax_id']) echo 'selected'; ?>><?php echo h($tax); ?></option>
								<?php endforeach; ?>
								</select>
							</label>
						</div>
						<div class="medium-6 large-6 columns">
							<label><?php echo __('Language'); ?>
								<select name="data[Client][language]">
									<option value="english" <?php if("english" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('English'); ?></option>
									<option value="spanish" <?php if("spanish" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Spanish'); ?></option>
									<option value="portuguese" <?php if("portuguese" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Portuguese'); ?></option>
									<option value="german" <?php if("german" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('German'); ?></option>
									<option value="french" <?php if("french" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('French'); ?></option>
									<option value="italian" <?php if("italian" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Italian'); ?></option>
									<option value="dutch" <?php if("dutch" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Dutch'); ?></option>
									<option value="czech" <?php if("czech" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Czech'); ?></option>
									<option value="swedish" <?php if("swedish" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Swedish'); ?></option>
									<option value="danish" <?php if("danish" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Danish'); ?></option>
									<option value="norwegian" <?php if("norwegian" == $this->request->data['Client']['language']) echo 'selected'; ?>><?php echo __('Norwegian'); ?></option>
								</select>
							</label>
						</div>
					</div>
					<div class="row">
						<div class="medium-6 large-6 column">
							<label><?php echo __('CIF, NIF or equivalent'); ?>
								<input type="text" name="data[Client][vat_number]" value="<?php echo $this->request->data['Client']['vat_number'] ?>">
							</label>
						</div>
					</div>
					<input type="hidden" name="_method" value="PUT" />
					<input type="hidden" name="data[Client][id]" value="<?php echo $this->request->data['Client']['id']; ?>" />
					<input type="submit" class="button tiny radius success right" value="<?php echo __('Save Changes'); ?>" />
				</form>


</div>
</div>
</div>
</div>
</div>