<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Tax'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'taxes', 'action' => 'index')); ?>" class="button tiny secondary radius right" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a>
			</header>
			<!-- Contenido -->
			<section>
				<ul class="no-bullet">
				  <li><?php echo __('Created: ') . $this->request->data['Tax']['created'] ?></li>
				  <li><?php echo __('Modified: ') . $this->request->data['Tax']['modified'] ?></li>
				</ul>
			</section>
			<div class="taxes form">
			<form id="editTaxForm" method="post" action="<?php echo Router::url(array('controller' => 'taxes', 'action' => 'edit', $this->request->data['Tax']['id'])); ?>" data-abide>
				<input type="hidden" name="data[Tax][id]" value="<?php echo $this->request->data['Tax']['id'] ?>">
				<div>
					<label><?php echo __('Description'); ?> <small>required</small>
						<input type="text" name="data[Tax][description]" value="<?php echo $this->request->data['Tax']['description'] ?>" required>
					</label>
					<small class="error">Description is required and must be a string.</small>
				</div>
				<div>
					<label><?php echo __('Status'); ?> <small>required</small>
						<select name="data[Tax][status]" data-invalid required>
							<option value="1" <?php if($this->request->data['Tax']['status'] > 0) echo 'selected'; ?> ><?php echo __('Active'); ?></option>
							<option value="0" <?php if($this->request->data['Tax']['status'] < 1) echo 'selected'; ?> ><?php echo __('Inactive'); ?></option>
						</select>
					</label>
					<small class="error">Status is required.</small>
				</div>
				<div>
					<label><?php echo __('Rate'); ?> <small>required</small>
						<input type="number" name="data[Tax][rate]" value="<?php echo $this->request->data['Tax']['rate'] ?>" required>
					</label>
					<small class="error">Rate is required and must be a number.</small>
				</div>
			<input type="submit" class="button tiny radius success" value="<?php echo __('Save changes') ?>" />
			</form>
			</div>
			</div>
		</div>
	</div>
</div>