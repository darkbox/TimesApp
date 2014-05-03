<?php 
$planned = 0;
$inProgress = 0;
$completed = 0;
$canceled = 0;
$paid = 0;
$due = 0;
$hoursByMonth = array("January" => 0,
					  "February" => 0,
					  "March" => 0,
					  "April" => 0,
					  "May" => 0,
					  "June" => 0,
					  "July" => 0,
					  "August" => 0,
					  "September" => 0,
					  "October" => 0,
					  "November" => 0,
					  "December" => 0
					  );

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
		case 2: // due
		case 3: // due
			$due++;
			break;
		case 4: // paid
			$paid++;
			break;
	}
} 

foreach ($hours as $hour) {
	if($hour['Hour']['billed'] == '1') {
		$timestamp = date_parse_from_format("Y-m-d", $hour['Hour']['created']);

		switch ($timestamp['month']) {
			case 1: 
				$hoursByMonth['January'] += $hour['Hour']['hours'];
				break;
			case 2: 
				$hoursByMonth['February'] += $hour['Hour']['hours'];
				break;
			case 3: 
				$hoursByMonth['March'] += $hour['Hour']['hours'];
				break;
			case 4: 
				$hoursByMonth['April'] += $hour['Hour']['hours'];
				break;
			case 5: 
				$hoursByMonth['May'] += $hour['Hour']['hours'];
				break;
			case 6: 
				$hoursByMonth['June'] += $hour['Hour']['hours'];
				break;
			case 7: 
				$hoursByMonth['July'] += $hour['Hour']['hours'];
				break;
			case 8: 
				$hoursByMonth['August'] += $hour['Hour']['hours'];
				break;
			case 9: 
				$hoursByMonth['September'] += $hour['Hour']['hours'];
				break;
			case 10: 
				$hoursByMonth['October'] += $hour['Hour']['hours'];
				break;
			case 11: 
				$hoursByMonth['November'] += $hour['Hour']['hours'];
				break;
			case 12: 
				$hoursByMonth['December'] += $hour['Hour']['hours'];
				break;
		}
	}
} echo debug($hoursByMonth); ?>

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
		<?php echo $this->element('tiles/lines', array('hoursByMonth' => $hoursByMonth)); ?>
	</div>
	<div class="large-6 columns">
		<div class="row">
			<div class="large-6 columns"><?php echo $this->element('tiles/users_status'); ?></div>
			<div class="large-6 columns"><?php echo $this->element('tiles/vcard'); ?></div>
		</div>
		<div class="row">
			<div class="large-6 columns"><?php echo $this->element('tiles/payments'); ?></div>
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