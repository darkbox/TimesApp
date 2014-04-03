<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav" style="height: 500px">
				<ul>
				<li class="current"><a href="">Taxes</a></li>
				<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Taxes'); ?></h1>
				<?php echo $this->Html->link('<i class="fi-plus"></i> ' . __('New Tax'), array('action' => 'add'), array('class' => 'button tiny success radius right', 'style' => 'margin-top: 20px', 'escape' => false)); ?>
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