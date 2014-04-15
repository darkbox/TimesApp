<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Taxes'), array('controller' => 'taxes', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Services') ?></a></li>
				<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Services'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addServiceModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Service'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('code'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('rate'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($services as $service): ?>
			<tr>
				<td><?php echo h($service['Service']['code']); ?>&nbsp;</td>
				<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
				<td><?php echo $this->Fn5->drawStatus($service['Service']['status']); ?>&nbsp;</td>
				<td><?php echo number_format(h($service['Service']['rate']), 2); ?>&nbsp;</td>
				<td class="actions">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $service['Service']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $service['Service']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $service['Service']['id']), array('action' => 'delete', $service['Service']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $service['Service']['id']); 
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
<!-- Modal add service -->
<div id="addServiceModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add service'); ?></h2>
	<div class="Services form">
	<form id="addServiceForm" method="post" action="<?php echo Router::url(array('controller' => 'services', 'action' => 'add')); ?>" data-abide>
		<div class="row">
			<div class="medium-6 columns">
			<label><?php echo __('Code'); ?> <small>required</small>
				<input type="text" name="data[Service][code]" required>
			</label>
			<small class="error">Code is required.</small>
			</div>
			<div class="medium-6 columns">
			<label><?php echo __('Status'); ?> <small>required</small>
				<select name="data[Service][status]" data-invalid required>
					<option value="1"><?php echo __('Active'); ?></option>
					<option value="0"><?php echo __('Inactive'); ?></option>
				</select>
			</label>
			<small class="error">Status is required.</small>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns">
			<label><?php echo __('Description'); ?> <small>required</small>
				<input type="text" name="data[Service][description]" required>
			</label>
			<small class="error">Description is required and must be a string.</small>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 columns">
			<label><?php echo __('Rate'); ?> <small>required</small>
				<input type="number" name="data[Service][rate]" required>
			</label>
			<small class="error">Rate is required and must be a number.</small>
			</div>
			<div class="medium-6 columns">
			<label><?php echo __('Tax'); ?> <small>required</small>
				<select name="data[Service][tax_id]" data-invalid required>
					<option value=""><?php echo __('No tax') ?></option>
					<?php foreach ($taxes as $key => $tax): ?>
					<option value="<?php echo $key ?>"><?php echo $tax ?></option>
					<?php endforeach; ?>
				</select>
			</label>
			<small class="error">Tax is required.</small>
			</div>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>