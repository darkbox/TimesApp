<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav" style="height: 500px">
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
				<?php echo $this->Html->link('<i class="fi-plus"></i> ' . __('New Client'), array('action' => 'add'), array('class' => 'button tiny success radius right', 'style' => 'margin-top: 20px', 'escape' => false)); ?>
			</header>
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
				<?php if($client['Client']['status']==1): ?>
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
				<?php endif; ?>
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
