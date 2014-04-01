<div class="projects view">
<h2><?php echo __('Project'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($project['Project']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($project['Project']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($project['Project']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($project['Project']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starting Date'); ?></dt>
		<dd>
			<?php echo h($project['Project']['starting_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finishing Date'); ?></dt>
		<dd>
			<?php echo h($project['Project']['finishing_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estimate Time'); ?></dt>
		<dd>
			<?php echo h($project['Project']['estimate_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estimate Price'); ?></dt>
		<dd>
			<?php echo h($project['Project']['estimate_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Billeable'); ?></dt>
		<dd>
			<?php echo h($project['Project']['billeable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($project['Project']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($project['Project']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hours'), array('controller' => 'hours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hour'), array('controller' => 'hours', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hours'); ?></h3>
	<?php if (!empty($project['Hour'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Hours'); ?></th>
		<th><?php echo __('Billed'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Hour'] as $hour): ?>
		<tr>
			<td><?php echo $hour['id']; ?></td>
			<td><?php echo $hour['project_id']; ?></td>
			<td><?php echo $hour['user_id']; ?></td>
			<td><?php echo $hour['hours']; ?></td>
			<td><?php echo $hour['billed']; ?></td>
			<td><?php echo $hour['note']; ?></td>
			<td><?php echo $hour['created']; ?></td>
			<td><?php echo $hour['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hours', 'action' => 'view', $hour['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hours', 'action' => 'edit', $hour['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hours', 'action' => 'delete', $hour['id']), null, __('Are you sure you want to delete # %s?', $hour['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hour'), array('controller' => 'hours', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
