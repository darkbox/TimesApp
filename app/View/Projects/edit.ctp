<div class="page-wrapper">
	<div class="row">
		<div class="large-12 columns">
			<div class="page-content">
			<h1><?php echo __('Edit Project'); ?></h1>
			<?php echo $this->Form->create('Project'); ?>
			<div class="row">
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Code'); ?> <small>required</small>
						<input type="text" name="data[Project][code]" maxlength="60" placeholder="My project" value="<?php echo $project['Project']['code'] ?>" required/>
					</label>
					<small class="error">Code is required and must be a string.</small>
				</div>
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Status'); ?> <small>required</small>
						<select name="data[Project][status]" data-invalid required>
							<option value="0"><?php echo __('Planned'); ?></option>
							<option value="1"><?php echo __('In progress'); ?></option>
							<option value="2"><?php echo __('Completed'); ?></option>
							<option value="3"><?php echo __('Canceled'); ?></option>
						</select>
					</label>
					<small class="error">Status is required.</small>
				</div>
			</div>
			
			<?php echo $this->Form->input('id'); ?>
			<input type="submit" class="button tiny radius success" value="<?php echo __('Save Changes'); ?>" />
			</div>
		</div>
	</div>
</div>


<?php 			
				echo $this->Form->input('code');
				echo $this->Form->input('status');
				echo $this->Form->input('description');
				echo $this->Form->input('client_id');
				echo $this->Form->input('starting_date');
				echo $this->Form->input('finishing_date');
				echo $this->Form->input('estimate_time');
				echo $this->Form->input('estimate_price');
				echo $this->Form->input('billeable');
			?>