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
				<div class="large-3 columns">
					<script type="text/javascript">
						$(document).ready(function(){
								var data = [
							{
								value: <?php if($daysLeft < 1){ echo 1; }else{ echo $daysLeft; } ?>,
								color: "#4A4A4A"
							},
							{
								value : <?php echo $daysSpent; ?>,
								color : "#9FBB58"
							},
						];
							var ctx = document.getElementById("doughnut").getContext("2d");
							var chart = new Chart(ctx).Doughnut(data);
						});
						</script>
					<center>
						<span style="position: absolute; top: 80px; left: 110px"><?php echo $daysLeft; ?> <span style="font-size: 0.7em">left</span></span>
						<span style="position: absolute; top: 100px; left: 110px"><?php echo $daysSpent; ?> <span style="font-size: 0.7em">spent</span></span>
					<canvas id="doughnut" height="200" width="200" data-type="Doughnut" style="width: 200px; height: 200px;">
						
					</canvas>
					</center>
				</div>
				<div class="large-3 columns">
					<p><?php echo __('Status: ') ?> 
					<?php 
					switch(h($project['Project']['status'])){
						case 0:
							echo '<span class="secondary radius label" style="margin: 0 !important; text-align: center">' . __('Planned') . '</span>';
							break;
						case 1:
							echo '<span class="radius label" style="margin: 0 !important; text-align: center">' . __('In progress') . '</span>';
							break;
						case 2:
							echo '<span class="success radius label" style="margin: 0 !important; text-align: center">' . __('Completed') . '</span>';
							break;
						case 3:
							echo '<span class="alert radius label" style="margin: 0 !important; text-align: center">' . __('Canceled') . '</span>';
							break;
					}?><br>
					<?php echo __('Client: ') . $this->Html->link(h($project['Client']['name']), array('controller' => 'clients', 'action' => 'edit', $project['Client']['id'])) ?><br>
					<?php echo __('Start date: ') . h($project['Project']['init_date']) ?><br>
					<?php echo __('Deadline: ') . h($project['Project']['deadline']) ?><br>
					<?php echo __('Billable: '); if(h($project['Project']['billable'])) { echo __('YES'); }else{ echo 'NO'; } ?><br>
					<?php echo __('Estimated time: ') . h($project['Project']['estimate_time']) ?><br>
					<?php echo __('Estimated price: ') . h($project['Project']['estimate_price']) ?><br>
					</p>
				</div>
				<div class="large-6 columns">
					<h3><?php echo h($project['Project']['code']) ?></h3>
					<p><?php echo h($project['Project']['description']) ?></p>
				</div>
			</section>
			<section class="row">
				<div class="large-12 columns">
					<h2><?php echo __('Hours') ?></h2>
					<table ellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th><?php echo __('Note') ?></th>
							<th><?php echo $this->Paginator->sort('hours', __('Hours')) ?></th>
							<th><?php echo $this->Paginator->sort('billed', __('Billed')) ?></th>
							<th><?php echo $this->Paginator->sort('date', __('Date')) ?></th>
							<th><?php echo __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($hours) < 1): ?>
							<tr>
								<td colspan="5"><?php echo __('There are not related hours in this project'); ?></td>
							</tr>
						<?php endif; ?>
						<?php foreach ($hours as $hour): ?>
						<tr>
							<td><?php echo $hour['Hour']['note']; ?></td>
							<td><?php echo $hour['Hour']['hours']; ?></td>
							<td><?php echo $this->Fn5->drawStatusBillable($hour['Hour']['billed']); ?></td>
							<td><?php echo $hour['Hour']['created']; ?></td>
							<td class="action">
								<?php 
								$links = array(
									$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $hour['Hour']['id']), array('controller' => 'hours', 'action' => 'delete', $hour['Hour']['id'], $hour['Hour']['project_id']))
								);
								echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ', $links, $hour['Hour']['id']); 
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
			<div class="medium-5 large-5 columns">
				<label><?php echo __('Hours'); ?> <small>required</small>
					<div id="hoursConverter" class="has-tip tip-top" style="float: right;" data-tooltip title="Click me if you need help converting hours!" data-dropdown="formConverter" data-options="align:left">Need help?</div>
						<div id="formConverter" data-dropdown-content class="content f-dropdown">
							<label><?php echo __('Hours'); ?><input id="inputHoursConverter" type="number" value="0" min="0"></label>
							<label><?php echo __('Minutes'); ?><input id="inputMinutesConverter" type="number" value="0" min="0" max="60"></label>
							<label><?php echo __('Seconds'); ?><input id="inputSecondsConverter" type="number" value="0" min="0" max="60"></label>
							<div><b><span id="resultConverter">0.00</span> hours</b><a id="addHoursConverter" class="button tiny success radius" style="float: right; display: block; margin: 0;">Add</a></div>
						</div>
					<input type="text" id="hours" name="data[Hour][hours]" maxlength="60" placeholder="Hours" required/>
				</label>
				<small class="error">Hours is required and must be a number.</small>
			</div>
			<div class="medium-5 large-5 columns">
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
			<div class="medium-2 large-2 columns">
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
<?php echo $this->Html->script('Chart.min'); ?>
<?php echo $this->Html->script('hoursConverter'); ?>
