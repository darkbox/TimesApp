<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
				<!-- Cabecera -->
				<header>
					<h1><?php echo __('Hours'); ?></h1>
					<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addHoursModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Hour'); ?></a>
				</header>
				<!-- Contenido -->
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
								<th><?php echo $this->Paginator->sort('project_id'); ?></th>
								<th><?php echo $this->Paginator->sort('user_id'); ?></th>
								<th><?php echo $this->Paginator->sort('hours'); ?></th>
								<th><?php echo $this->Paginator->sort('billed'); ?></th>
								<th><?php echo $this->Paginator->sort('note'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<?php foreach ($hours as $hour): ?>
						<tr>
							<td>
								<?php echo $this->Html->link($hour['Project']['code'], array('controller' => 'projects', 'action' => 'view', $hour['Project']['id'])); ?>
							</td>
							<td>
								<?php echo $this->Html->link($hour['User']['name'], array('controller' => 'users', 'action' => 'view', $hour['User']['id'])); ?>
							</td>
							<td><?php echo h($hour['Hour']['hours']); ?>&nbsp;</td>
							<td><?php echo h($hour['Hour']['billed']); ?>&nbsp;</td>
							<td><?php echo h($hour['Hour']['note']); ?>&nbsp;</td>
							<td class="actions">
								<?php 
									$links = array(
										$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $hour['Hour']['id']), array('escape' => false)),
										$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $hour['Hour']['id']), array('escape' => false)),
										$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $hour['Hour']['id']), array('action' => 'delete', $hour['Hour']['id']))
									);

									echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $hour['Hour']['id']); 
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<!-- Paginación -->
				<?php echo $this->element('paginator'); ?>
				<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>

<!-- Modal add hour -->
