<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Project'); ?></h1>
				<ul class="button-group radius right">
					<li><a href="<?php echo Router::url(array('controller' => 'projects', 'action' => 'index')); ?>" class="button tiny secondary" style="margin-top: 20px"><i class="fi-arrow-left"></i>&nbsp;<?php echo __('Go back'); ?></a></li>
					<li><a href="#" class="button tiny success" style="margin-top: 20px" data-reveal-id="addHoursModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Add hours'); ?></a></li>
				</ul>
			</header>
			<!-- Contenido -->
			<section class="row">
				<div class="large-12 columns">
					<h3><?php echo h($project['Project']['code']) ?></h3>
					<blockquote><?php echo h($project['Project']['description']) ?></blockquote>
				</div>				
			</section>
			<section class="row">
				<div class="large-12 columns">
					<h2><?php echo __('Hours') ?></h2>
					<table ellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo __('Note') ?></th>
							<th><?php echo __('Hours') ?></th>
							<th><?php echo __('Billed') ?></th>
							<th><?php echo __('Date') ?></th>
							<th><?php echo __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($project['Hour']) < 1): ?>
							<tr>
								<td colspan="5"><?php echo __('There are not related hours in this project'); ?></td>
							</tr>
						<?php endif; ?>
						<?php foreach ($project['Hour'] as $hour): ?>
						<tr>
							<td><?php echo $hour['note']; ?></td>
							<td><?php echo $hour['hours']; ?></td>
							<td><?php echo $this->Fn5->drawStatus($hour['billed']); ?></td>
							<td><?php echo $hour['created']; ?></td>
							<td></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
				</div>				
			</section>
			</div>
		</div>
	</div>
</div>
<!-- Modal add project -->
<div id="addHoursModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add Hours'); ?></h2>
	<div class="hours form">
	<form id="addHoursForm" method="post" action="<?php echo Router::url(array('controller' => 'Hours', 'action' => 'add')); ?>" data-abide>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label><?php echo __('Hours'); ?> <small>required</small>
					<input type="text" name="data[Hour][hours]" maxlength="60" placeholder="Hours" required/>
				</label>
				<small class="error">Hours is required and must be a number.</small>
			</div>
			<div class="medium-6 large-6 columns">
				<div class="divToggle toggle-push">
	                <input type="checkbox" id="showBilled" name="data[Hour][billed]">
	                <label class="firstLabel" for="showBilled"><i></i></label>
	                <label class="toggleLabel" for="showBilled"><?php echo __('Bill'); ?></label>
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label><?php echo __('Note'); ?><small>Required</small>
					<textarea name="data[Hour][note]" required></textarea>
				</label>
				<small class="error">Please, write a note.</small>
			</div>
		</div>

		<input type="hidden" name="data[Hour][project_id]" value="<?php echo $project['Project']['id'] ?>"/>
		<input type="hidden" name="data[Hour][user_id]" value="<?php echo $current_user['id'] ?>"/>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>