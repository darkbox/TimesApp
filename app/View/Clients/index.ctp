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
					<h1><?php echo __('Clients'); ?></h1>
					<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addClientModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Client'); ?></a>
				</header>

				<div class="row">
					<div class="large-6 columns">
						<div class="divToggle">
							<?php if(isset($toggleInactive) && $toggleInactive=='true'): ?>
				                <input type="checkbox" id="showInactiveUsers" checked>
				            <?php else: ?>
				            	<input type="checkbox" id="showInactiveUsers">
				            <?php endif ?>
			                <label class="firstLabel" for="showInactiveUsers"><i></i></label>
			                <label class="toggleLabel" for="showInactiveUsers"><?php echo __('Show inactive users') ?></label>
		              	</div>
		        	</div>
		        	<div class="large-6 columns">
		        		<?php echo $this->Html->image('loadingImage.gif', array('class' => 'loadingImage', 'id' => 'loading-image')); ?>
		        	</div>
				</div>
				<div id="listClients"> <!-- lista de clientes -->
					<!-- Contenido -->
					<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th><?php echo $this->Paginator->sort('city'); ?></th>
							<th><?php echo $this->Paginator->sort('state'); ?></th>
							<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($clients as $client):?>
						<?php if($client['Client']['status']==0): ?>
							<tr class="inactiveClient">
						<?php else: ?>
						<tr>
						<?php endif ?>
							<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['city']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['state']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['phone_number']); ?>&nbsp;</td>
							<td class="action">
								<?php 
									$links = array(
									$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $client['Client']['id']), array('escape' => false)),
									$link3 = $this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $client['Client']['id']), array('action' => 'delete', $client['Client']['id'])));

									echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ', $links, $client['Client']['id']); 
								?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					</table>
					<!-- Paginación -->
					<?php echo $this->element('paginator'); ?>
					<!-- Fin contenido -->

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal add tax -->
<div id="addClientModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add Client'); ?></h2>
	<div class="clients form">
	<form id="addClientForm" method="post" action="<?php echo Router::url(array('controller' => 'Clients', 'action' => 'add')); ?>" data-abide>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Name'); ?> <small>required</small>
					<input type="text" name="data[Client][name]" required>
				</label>
				<small class="error">Name is required and must be a string.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Status'); ?> <small>required</small>
					<select name="data[Client][status]" required>
						<option value="1"><?php echo __('Active'); ?></option>
						<option value="0"><?php echo __('Inactive'); ?></option>
					</select>
				</label>
				<small class="error">Status is required.</small>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Email'); ?> <small>required</small>
					<input type="email" name="data[Client][email]" required>
				</label>
				<small class="error">Email is required and must be valid.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Contact name'); ?>
					<input type="text" name="data[Client][contact_name]">
				</label>
			</div>
		</div>
		<div>
			<label><?php echo __('Adress'); ?>
				<textarea name="data[Client][address]"></textarea>
			</label>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('City'); ?>
					<input type="text" name="data[Client][city]">
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Zip code'); ?>
					<input type="number" name="data[Client][zip_code]">
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
							<option value="<?php echo $country ?>" <?php if($country==$appSettings['country']) echo "selected" ?>><?php echo $country ?></option>
			        	<?php endforeach ?>
			        </select>
				</label>
			</div>
			<div class="medium-6 columns">
				<label><?php echo __('State'); ?>
					<input type="text" name="data[Client][state]">
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Phone number'); ?>
					<input type="text" name="data[Client][phone_number]">
				</label>
				<small class="error">Phone number must be a number.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Mobile number'); ?>
					<input type="text" name="data[Client][mobile_number]">
				</label>
				<small class="error">Mobile number must be a number.</small>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Tax'); ?> <small>required</small>
					<select name="data[Client][tax_id]" data-invalid required>
					<?php foreach ($taxes as $id => $tax): ?>
						<option value="<?php echo $id; ?>"><?php echo h($tax); ?></option>
					<?php endforeach; ?>
					</select>
				</label>
			</div>

			<div class="medium-6 large-6 columns">
				<label><?php echo __('Language'); ?>
					<select name="data[Client][language]">
						<option value="">Pick a language</option>
						<option value="english">English</option>
						<option value="spanish" selected="selected">Spanish</option>
						<option value="portuguese">Portuguese</option>
						<option value="german">German</option>
						<option value="french">French</option>
						<option value="italian">Italian</option>
						<option value="dutch">Dutch</option>
						<option value="czech">Czech</option>
						<option value="swedish">Swedish</option>
						<option value="danish">Danish</option>
						<option value="norwegian">Norwegian</option>
					</select>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 column">
				<label><?php echo __('CIF, NIF or equivalent'); ?>
					<input type="text" name="data[Client][vat_number]">
				</label>
			</div>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
<script type="text/javascript">
$(function() {
    var listClients = $('#listClients');
    var URLBase = "<?php echo Router::url(array('controller' => 'clients', 'action' => 'index')); ?>";
    $('#showInactiveUsers').on('click', function() {
        
        if($(this).prop('checked')==true) {
            window.location.href= URLBase + '?var=true';
        } else {
            window.location.href= URLBase + '?var=false';
        }
        
    });
});
</script>

