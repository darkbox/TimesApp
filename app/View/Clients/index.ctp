<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
					<li class="current"><a href=""><?php echo __('Clients'); ?></a></li>
					<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
				<!-- Cabecera -->
				<header>
					<h1><?php echo __('Clients'); ?></h1>
					<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addClientModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Client'); ?></a>
				</header>
				<div id="listClients"> <!-- tabla de clientes -->
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
						<tr>
							<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['city']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['state']); ?>&nbsp;</td>
							<td><?php echo h($client['Client']['phone_number']); ?>&nbsp;</td>
							<td>
								<?php 
									$links = array(
									$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $client['Client']['id']), array('escape' => false)),
									$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $client['Client']['id']), array('escape' => false)),
									$link3 = $this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $client['Client']['id']), array('action' => 'delete', $client['Client']['id'])));

									echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $client['Client']['id']); 
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
			<?php echo $this->Form->checkbox('show'); ?> <label for="show">Show inactive clients</label>
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
					<input type="text" name="data[Client][country]">
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
					<input type="number" name="data[Client][phone_number]">
				</label>
				<small class="error">Phone number must be a number.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Mobile number'); ?>
					<input type="number" name="data[Client][mobile_number]">
				</label>
				<small class="error">Mobile number must be a number.</small>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Tax'); ?>
					<input type="text" name="data[Client][tax_id]">
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Language'); ?>
					<input type="text" name="data[Client][language]">
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 column">
				<label><?php echo __('Vat number'); ?>
					<input type="text" name="data[Client][vat_number]">
				</label>
			</div>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>