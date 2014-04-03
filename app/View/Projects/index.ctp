<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav" style="height: 500px">
				<ul>
					<li class="current"><a href=""><?php echo __('Projects'); ?></a></li>
					<li><?php echo $this->Html->link(__('List Hours'), array('controller' => 'hours', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('List Hours'), array('controller' => 'hours', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Hour'), array('controller' => 'hours', 'action' => 'add')); ?> </li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Projects'); ?></h1>
				<?php echo $this->Html->link('<i class="fi-plus"></i> ' . __('New Project'), array('action' => 'add'), array('class' => 'button tiny success radius right', 'style' => 'margin-top: 20px', 'escape' => false)); ?>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('code'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('client_id'); ?></th>
					<th><?php echo $this->Paginator->sort('starting_date'); ?></th>
					<th><?php echo $this->Paginator->sort('finishing_date'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($projects as $project): ?>
			<tr>
				<td><?php echo h($project['Project']['code']); ?>&nbsp;</td>
				<td><?php echo h($project['Project']['status']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
				</td>
				<td><?php echo h($project['Project']['starting_date']); ?>&nbsp;</td>
				<td><?php echo h($project['Project']['finishing_date']); ?>&nbsp;</td>
				<td class="actions">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $project['Project']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $project['Project']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $project['Project']['id']), array('action' => 'delete', $project['Project']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links); 
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