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
									<option value="Afghanistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Bouvet Island">Bouvet Island</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote D Ivoire">Cote D Ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
									<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakstan">Kazakstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea, Republic Of">Korea, Republic Of</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macau">Macau</option>
									<option value="Macedonia">Macedonia</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia, Federated States Of">Micronesia, Federated States Of</option>
									<option value="Moldova, Republic Of">Moldova, Republic Of</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montenegro">Montenegro</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Northern Mariana Islands">Northern Mariana Islands</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Pitcairn">Pitcairn</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russian Federation">Russian Federation</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Helena">Saint Helena</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
									<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia">Serbia</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Suriname">Suriname</option>
									<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Taiwan">Taiwan</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania, United Republic Of">Tanzania, United Republic Of</option>
									<option value="Thailand">Thailand</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States" selected="selected">United States</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands, British">Virgin Islands, British</option>
									<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
									<option value="Wallis and Futuna">Wallis and Futuna</option>
									<option value="Yemen">Yemen</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
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
							<label><?php echo __('Vat number'); ?>
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