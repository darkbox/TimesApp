<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Product'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'products', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="products form">
			<form id="editProductForm" method="post" action="<?php echo Router::url(array('controller' => 'products', 'action' => 'edit', $this->request->data['Product']['id'])); ?>" data-abide>
				<input type="hidden" name="data[Product][id]" value="<?php echo $this->request->data['Product']['id'] ?>">
				<div class="row">
					<div class="medium-6 columns">
					<label><?php echo __('Code'); ?> <small>required</small>
						<input type="text" name="data[Product][code]" value="<?php echo $this->request->data['Product']['code'] ?>" required>
					</label>
					<small class="error">Code is required.</small>
					</div>
					<div class="medium-6 columns">
					<label><?php echo __('Status'); ?> <small>required</small>
						<select name="data[Product][status]" data-invalid required>
							<option value="1" <?php if($this->request->data['Product']['status'] > 0) echo 'selected'; ?> ><?php echo __('Active'); ?></option>
							<option value="0" <?php if($this->request->data['Product']['status'] < 1) echo 'selected'; ?> ><?php echo __('Inactive'); ?></option>
						</select>
					</label>
					<small class="error">Status is required.</small>
					</div>
				</div>
				<div class="row">
					<div class="medium-12 columns">
					<label><?php echo __('Description'); ?> <small>required</small>
						<input type="text" name="data[Product][description]" value="<?php echo $this->request->data['Product']['description'] ?>" required>
					</label>
					<small class="error">Description is required and must be a string.</small>
					</div>
				</div>
				<div class="row">
					<div class="medium-6 columns">
					<label><?php echo __('Unit price'); ?> <small>required</small>
						<input type="number" name="data[Product][unit_price]" value="<?php echo $this->request->data['Product']['unit_price'] ?>" required>
					</label>
					<small class="error">Rate is required and must be a number.</small>
					</div>
					<div class="medium-6 columns">
					<label><?php echo __('Tax'); ?> <small>required</small>
						<select name="data[Product][tax_id]" data-invalid required>
							<option value=""><?php echo __('No tax') ?></option>
							<?php foreach ($taxes as $key => $tax): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Product']['tax_id'] == $key) echo 'selected'; ?> ><?php echo $tax ?></option>
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