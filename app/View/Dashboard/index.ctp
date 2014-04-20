<?php 
$planned = 0;
$inProgress = 0;
$completed = 0;
$canceled = 0;
$paid = 0;
$due = 0;

foreach ($projects as $value) {
	switch (intval($value['Project']['status'])) {
		case 0: // Planned
			$planned++;
			break;
		case 1: // In progress
			$inProgress++;
			break;
		case 2: // Completed
			$completed++;
			break;
		case 3: // Canceled
			$canceled++;
			break;
	}
} 

foreach ($invoices as $value) {
	switch (intval($value['Invoice']['status'])) {
		case 3: // due
		case 4: // due
			$due++;
			break;
		case 5: // paid
			$paid++;
			break;
	}
} ?>

<div class="row" style="margin-top: 40px;">
	<div class="large-3 columns">
		<?php echo $this->element('tiles/time'); ?>
	</div>
	<div class="large-6 columns">
		<?php echo $this->element('tiles/chart', array('planned' => $planned, 'inProgress' => $inProgress, 'completed' => $completed, 'canceled' => $canceled)); ?>
	</div>
	<div class="large-3 columns">
		<?php echo $this->element('tiles/due', array('paid' => $paid, 'due' => $due)); ?>
	</div>
</div>
<div class="row">
	<div class="large-6 columns">
		<?php echo $this->element('tiles/lines'); ?>
	</div>
	<div class="large-6 columns">
		<div class="row">
			<div class="large-6 columns"><?php echo $this->element('tiles/users_status'); ?></div>
			<div class="large-6 columns"><?php echo $this->element('tiles/vcard'); ?></div>
		</div>
		<div class="row">
			<div class="large-6 columns"><?php echo $this->element('tiles/time'); ?></div>
			<div class="large-6 columns"><?php echo $this->element('tiles/time'); ?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-3 columns">
		<?php echo $this->element('tiles/time'); ?>
	</div>
	<div class="large-6 columns">
		<?php echo $this->element('tiles/chart', array('planned' => $planned, 'inProgress' => $inProgress, 'completed' => $completed, 'canceled' => $canceled)); ?>
	</div>
	<div class="large-3 columns">
		<?php echo $this->element('tiles/time'); ?>
	</div>
</div>
<div style="margin-top: 50px;"></div>