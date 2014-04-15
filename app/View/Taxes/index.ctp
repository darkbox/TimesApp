<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li class="current"><a href=""><?php echo __('Taxes'); ?></a></li>
				<li><?php echo $this->Html->link(__('Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Taxes'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addTaxModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Tax'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('rate'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($taxes as $tax): ?>
			<tr>
				<td><?php echo h($tax['Tax']['description']); ?>&nbsp;</td>
				<td><?php echo $this->Fn5->drawStatus($tax['Tax']['status']); ?>&nbsp;</td>
				<td><?php echo number_format(h($tax['Tax']['rate']), 2); ?>&nbsp;</td>
				<td class="actions">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $tax['Tax']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $tax['Tax']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $tax['Tax']['id']), array('action' => 'delete', $tax['Tax']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $tax['Tax']['id']); 
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
<!-- Modal add tax -->
<div id="addTaxModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add tax'); ?></h2>
	<div class="taxes form">
	<form id="addTaxForm" method="post" action="<?php echo Router::url(array('controller' => 'Taxes', 'action' => 'add')); ?>" data-abide>
		<div>
			<label><?php echo __('Description'); ?> <small>required</small>
				<input type="text" name="data[Tax][description]" required>
			</label>
			<small class="error">Description is required and must be a string.</small>
		</div>
		<div>
			<label><?php echo __('Status'); ?> <small>required</small>
				<select name="data[Tax][status]" data-invalid required>
					<option value="0"><?php echo __('Active'); ?></option>
					<option value="1"><?php echo __('Inactive'); ?></option>
				</select>
			</label>
			<small class="error">Status is required.</small>
		</div>
		<div>
			<label><?php echo __('Rate'); ?> <small>required</small>
				<input type="number" name="data[Tax][rate]" required>
			</label>
			<small class="error">Rate is required and must be a number.</small>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>