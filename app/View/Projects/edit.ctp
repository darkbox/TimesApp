<div class="page-wrapper">
	<div class="row">
		<div class="large-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Project'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'projects', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>

			<form action="<?php echo Router::url(array('controller' => 'projects', 'action' => 'edit')) . '/' . $this->request->data['Project']['id'] ?>" method="post" data-abide>
			<div class="row">
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Code'); ?> <small>required</small>
						<input type="text" name="data[Project][code]" maxlength="60" placeholder="My project" value="<?php echo $this->request->data['Project']['code'] ?>"  required/>
					</label>
					<small class="error">Code is required and must be a string.</small>
				</div>
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Status'); ?> <small>required</small>
						<select name="data[Project][status]" data-invalid required>
							<option value="0" <?php if(0 == $this->request->data['Project']['status']) echo 'selected'; ?>><?php echo __('Planned'); ?></option>
							<option value="1" <?php if(1 == $this->request->data['Project']['status']) echo 'selected'; ?>><?php echo __('In progress'); ?></option>
							<option value="2" <?php if(2 == $this->request->data['Project']['status']) echo 'selected'; ?>><?php echo __('Completed'); ?></option>
							<option value="3" <?php if(3 == $this->request->data['Project']['status']) echo 'selected'; ?>><?php echo __('Canceled'); ?></option>
						</select>
					</label>
					<small class="error">Status is required.</small>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label><?php echo __('Description'); ?>
						<textarea name="data[Project][description]"><?php echo $this->request->data['Project']['description'] ?></textarea>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Client'); ?> <small>required</small>
						<select name="data[Project][client_id]" data-invalid required>
						<?php foreach ($clients as $id => $client): ?>
							<option value="<?php echo $id; ?>" <?php if($id == $this->request->data['Project']['client_id']) echo 'selected'; ?>><?php echo h($client); ?></option>
						<?php endforeach; ?>
						</select>
					</label>
					<small class="error">A client is required.</small>
				</div>
				<div class="medium-6 large-6 columns">
					<div class="divToggle toggle-push">
		                <input type="checkbox" id="showBillable" name="data[Project][billable]" <?php if($this->request->data['Project']['billable']) echo 'checked'; ?>>
		                <label class="firstLabel" for="showBillable"><i></i></label>
		                <label class="toggleLabel" for="showBillable"><?php echo __('Billable'); ?></label>
		          	</div>
				</div>
			</div>
			<div class="row">
				<div class="medium-6 large-6 columns">
					<label><?php echo __('Start'); ?>
						<input type="text" name="data[Project][init_date]" placeholder="MM/DD/YYYY" id="dpProjectStartingDateEdit" value="<?php echo $this->request->data['Project']['init_date'] ?>" />
					</label>
				</div>
				<div class="medium-6 large-6 columns">
					<label><?php echo __('End'); ?>
						<input type="text" name="data[Project][deadline]" placeholder="MM/DD/YYYY" id="dpProjectDeadLineEdit" value="<?php echo $this->request->data['Project']['deadline'] ?>" />
					</label>
				</div>
			</div>
			
			<input type="hidden" name="_method" value="PUT" />
			<input type="hidden" name="data[Project][id]" value="<?php echo $this->request->data['Project']['id']; ?>" />
			<input type="submit" class="button tiny radius success right" value="<?php echo __('Save Changes'); ?>" />
			</form>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('zebra_datepicker'); ?>
<?php echo $this->Html->script('datepicker'); ?>