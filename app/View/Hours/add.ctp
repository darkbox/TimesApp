<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
				<li class="current"><a href=""><?php echo __('Add hours') ?></a></li>
				<li><?php echo $this->Html->link(__('Timer'), array('controller' => 'hours', 'action' => 'timer')); ?></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Add hours to project'); ?></h1>
				
			</header>
			<!-- Contenido -->
			<div class="hours form">
			<form id="addHourForm" action="<?php echo Router::url(array('controller' => 'hours', 'action' => 'add')); ?>" method="post" data-abide>
				<div>
					<label><?php echo __('Project'); ?> <small>required</small>
						<select name="data[Hour][project_id]" required>
							<option value=""><?php echo __('Select a project') ?></option>
							<?php foreach($projects as $key => $project): ?>
							<option value="<?php echo $key ?>"><?php echo h($project) ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<small class="error">A project is required.</small>
				</div>
				<div>
					<label><?php echo __('Service'); ?> <small>required</small>
						<select name="data[Hour][service_id]" required>
							<option value=""><?php echo __('Select a service') ?></option>
							<?php foreach($services as $key => $service): ?>
							<option value="<?php echo $key ?>"><?php echo h($service) ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<small class="error">A service is required.</small>
				</div>
				<div>
					<label><?php echo __('User'); ?> <small>required</small>
						<select name="data[Hour][user_id]" required>
							<option value=""><?php echo __('Select a user') ?></option>
							<?php foreach($users as $key => $user): ?>
							<option value="<?php echo $key ?>"><?php echo h($user) ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<small class="error">A user is required.</small>
				</div>
				<div>
					<label><?php echo __('Hours'); ?> <small>required</small>
						<div id="hoursConverter" class="has-tip tip-top" style="float: right;" data-tooltip title="Click me if you need help converting hours!" data-dropdown="formConverter" data-options="align:left">Need help?</div>
						<div id="formConverter" data-dropdown-content class="content f-dropdown">
							<label><?php echo __('Hours'); ?><input id="inputHoursConverter" type="number" value="0" min="0"></label>
							<label><?php echo __('Minutes'); ?><input id="inputMinutesConverter" type="number" value="0" min="0" max="60"></label>
							<label><?php echo __('Seconds'); ?><input id="inputSecondsConverter" type="number" value="0" min="0" max="60"></label>
							<div><b><span id="resultConverter"></span> hours</b></div>
						</div>
						<input type="number" name="data[Hour][hours]" placeholder="0.00" required>
					</label>
					<small class="error">Hours are required and must be a number.</small>
				</div>
				<div class="divToggle">
	                <input type="checkbox" id="showBilled" name="data[Hour][billed]">
	                <label class="firstLabel" for="showBilled"><i></i></label>
	                <label class="toggleLabel" for="showBilled"><?php echo __('Bill'); ?></label>
          		</div>
				<div>
					<label><?php echo __('Note'); ?> <small>required</small>
						<input type="text" name="data[Hour][note]" placeholder="Example: Fixing errors or building a better world" required>
					</label>
					<small class="error">A note is required and must be a string.</small>
				</div>

				<input type="submit" class="button tiny success radius" value="<?php echo __('Submit') ?>">
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('hoursConverter'); ?>