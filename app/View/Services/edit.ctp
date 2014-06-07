<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Service'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'services', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="services form">
			<form id="editServiceForm" method="post" action="<?php echo Router::url(array('controller' => 'services', 'action' => 'edit', $this->request->data['Service']['id'])); ?>" data-abide>
				<input type="hidden" name="data[Service][id]" value="<?php echo $this->request->data['Service']['id'] ?>">
				<div class="row">
					<div class="medium-6 columns">
					<label><?php echo __('Code'); ?> <small>required</small>
						<input type="text" name="data[Service][code]" value="<?php echo $this->request->data['Service']['code'] ?>" required>
					</label>
					<small class="error">Code is required.</small>
					</div>
					<div class="medium-6 columns">
					<label><?php echo __('Status'); ?> <small>required</small>
						<select name="data[Service][status]" data-invalid required>
							<option value="1" <?php if($this->request->data['Service']['status'] > 0) echo 'selected'; ?> ><?php echo __('Active'); ?></option>
							<option value="0" <?php if($this->request->data['Service']['status'] < 1) echo 'selected'; ?> ><?php echo __('Inactive'); ?></option>
						</select>
					</label>
					<small class="error">Status is required.</small>
					</div>
				</div>
				<div class="row">
					<div class="medium-12 columns">
					<label><?php echo __('Description'); ?> <small>required</small>
						<input type="text" name="data[Service][description]" value="<?php echo $this->request->data['Service']['description'] ?>" required>
					</label>
					<small class="error">Description is required and must be a string.</small>
					</div>
				</div>
				<div class="row">
					<div class="medium-6 columns">
					<label><?php echo __('Rate'); ?> <small>required</small>
						<input type="number" name="data[Service][rate]" value="<?php echo $this->request->data['Service']['rate'] ?>" required>
					</label>
					<small class="error">Rate is required and must be a number.</small>
					</div>
					<div class="medium-6 columns">
					<label><?php echo __('Tax'); ?> <small>required</small>
						<select name="data[Service][tax_id]" data-invalid required>
							<option value=""><?php echo __('No tax') ?></option>
							<?php foreach ($taxes as $key => $tax): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Service']['tax_id'] == $key) echo 'selected'; ?> ><?php echo $tax ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<small class="error">Tax is required.</small>
					</div>
				</div>
			<input type="submit" class="button tiny radius success" value="<?php echo __('Save changes') ?>" />
			</form>
			</div>
			</div>
		</div>
	</div>
</div>