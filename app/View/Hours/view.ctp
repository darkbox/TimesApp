<div class="hours view">
<h2><?php echo __('Hour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hour['Project']['code'], array('controller' => 'projects', 'action' => 'view', $hour['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hour['User']['name'], array('controller' => 'users', 'action' => 'view', $hour['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hours'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['hours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Billed'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['billed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($hour['Hour']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hour'), array('action' => 'edit', $hour['Hour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hour'), array('action' => 'delete', $hour['Hour']['id']), null, __('Are you sure you want to delete # %s?', $hour['Hour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hour'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
