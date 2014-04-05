<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav" style="height: 500px">
				<ul>
					<li class="current"><a href=""><?php echo __('Users'); ?></a></li>
					<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Users'); ?></h1>
				<?php echo $this->Html->link('<i class="fi-plus"></i> ' . __('New User'), array('action' => 'add'), array('class' => 'button tiny success radius right', 'style' => 'margin-top: 20px', 'escape' => false)); ?>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
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
				<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['status']); ?>&nbsp;</td>
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