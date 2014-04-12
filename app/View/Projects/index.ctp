<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<?php
			// Esto está en pruebas...
			echo $this->element('side_navbar', array(
				'sideBar' => array(
					'titles' => array(
						__('Projects'), 
						__('List Hours'), 
						__('New Project'), 
						__('List Clients'), 
						__('New Client'), 
						__('List Hours'), 
						__('New Hour'), 
					),
					'links' => array(
						array('controller' => 'projects', 'action' => 'index'),
						array('controller' => 'hours', 'action' => 'index'),
						array('controller' => 'project', 'action' => 'add'),
						array('controller' => 'clients', 'action' => 'index'),
						array('controller' => 'clients', 'action' => 'add'),
						array('controller' => 'hours', 'action' => 'index'),
						array('controller' => 'hours', 'action' => 'add')
					),
					'active' => array('controller' => 'projects', 'action' => 'index')
				)
			)); ?>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Projects'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addProjectModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Project'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('code'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('client_id'); ?></th>
					<th><?php echo $this->Paginator->sort('init_date'); ?></th>
					<th><?php echo $this->Paginator->sort('deadline'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($projects as $project): ?>
			<tr>
				<td><?php echo h($project['Project']['code']); ?>&nbsp;</td>
				<td><?php 

					switch($project['Project']['status']){
						case 0:
							echo '<span class="secondary radius label">' . __('Planned') . '</span>';
							break;
						case 1:
							echo '<span class="radius label">' . __('In progress') . '</span>';
							break;
						case 2:
							echo '<span class="success radius label">' . __('Completed') . '</span>';
							break;
						case 3:
							echo '<span class="alert radius label">' . __('Canceled') . '</span>';
							break;
					}

				?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
				</td>
				<td><?php echo h($project['Project']['init_date']); ?>&nbsp;</td>
				<td><?php
					if(h($project['Project']['deadline']) != "") 
						echo h($project['Project']['deadline']);
					else
						echo '&#8734;';
					?>&nbsp;</td>
				<td class="actions">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $project['Project']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $project['Project']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $project['Project']['id']), array('action' => 'delete', $project['Project']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $project['Project']['id']); 
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
<!-- Modal add project -->
<div id="addProjectModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add Project'); ?></h2>
	<div class="projects form">
	<form id="addProjectForm" method="post" action="<?php echo Router::url(array('controller' => 'Projects', 'action' => 'add')); ?>" data-abide>
		<div class="row">
		<div class="medium-6 large-6 columns">
			<label><?php echo __('Code'); ?> <small>required</small>
				<input type="text" name="data[Project][code]" maxlength="60" placeholder="My project" required/>
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
		<div>
			<label><?php echo __('Description'); ?>
				<textarea name="data[Project][description]"></textarea>
			</label>
		</div>
		<div class="row">
		<div class="medium-6 large-6 columns">
			<label><?php echo __('Client'); ?> <small>required</small>
				<select name="data[Project][client_id]" data-invalid required>
					<option value=""><?php echo __('Select a client'); ?></option>
					<?php foreach ($clients as $id => $client): ?>
						<option value="<?php echo $id; ?>"><?php echo $client; ?></option>
					<?php endforeach; ?>
				</select>
			</label>
			<small class="error">A client is required.</small>
		</div>
		<div class="medium-6 large-6 columns">
			<label><?php echo __('Billable'); ?>
				<input type="checkbox" name="data[Project][billable]"/>
			</label>
		</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Start'); ?>
				<input type="date" name="data[Project][init_date]" />
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('End'); ?>
				<input type="date" name="data[Project][deadline]" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Time estimate (hours) '); ?>
				<input type="text" name="data[Project][estimate_time]" />
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Cost estimate (USD)'); ?>
				<input type="text" name="data[Project][estimate_price]" />
				</label>
			</div>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>