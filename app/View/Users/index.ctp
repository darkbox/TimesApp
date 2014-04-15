<div class="page-wrapper">
	<div class="row">
		
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Users'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addUserModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New User'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('role'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
			<tr>
				<td><?php 
					echo $this->Gravatar->image(h($user['User']['email']),
						array(
							'default' => 'identicon',
							'size' => 40
							));
					echo "&nbsp;" . h($user['User']['name']); 
				?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
				<td><?php echo $this->Fn5->drawStatus($user['User']['status']); ?>&nbsp;</td>
				<td>
					<?php 
						$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $user['User']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $user['User']['id']), array('escape' => false)),
						$link3 = $this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $user['User']['id']), array('action' => 'delete', $user['User']['id'])));

						echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $user['User']['id']); 
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
<!-- Modal add user -->
<div id="addUserModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add User'); ?></h2>
	<div class="users form">
	<form id="addUserForm" method="post" action="<?php echo Router::url(array('controller' => 'Users', 'action' => 'add')); ?>" data-abide>
		<div>
			<label><?php echo __('Name'); ?> <small>required</small>
				<input type="text" name="data[User][name]" maxlength="80" id="UserName" required="required" placeholder="Jhon Smith"/>
			</label>
			<small class="error">Name is required and must be a string.</small>
		</div>
		<div>
			<label><?php echo __('Email'); ?> <small>required</small>
				<input type="email" name="data[User][email]" maxlength="80" id="UserEmail" required="required" placeholder="jhonSmith@example.com"/>
			</label>
			<small class="error">Email is required.</small>
		</div>
		<div>
			<label><?php echo __('Password'); ?> <small>required</small>
				<input type="password" name="data[User][password]" maxlength="80" id="UserPassword" required="required" />
			</label>
			<small class="error">A password is required.</small>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Role'); ?> <small>required</small>
					<select name="data[User][role]" data-invalid required>
						<option value=""><?php echo __('Select an option'); ?></option>
						<option value="overlord"><?php echo __('Overlord'); ?></option>
						<option value="minion"><?php echo __('Minion'); ?></option>
					</select>
				</label>
				<small class="error">Please select a role.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Status'); ?> <small>required</small>
					<select name="data[User][status]" data-invalid required>
						<option value="1"><?php echo __('Active'); ?></option>
						<option value="0"><?php echo __('Inactive'); ?></option>
					</select>
				</label>
				<small class="error">Status is required.</small>
			</div>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>