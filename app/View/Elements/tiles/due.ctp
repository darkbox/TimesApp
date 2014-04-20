<script type="text/javascript">
$(document).ready(function(){

	var data = [
		{
			value: <?php echo $due; ?>,
			color: "#e25440"
		},
		{
			value: <?php echo $paid; ?>,
			color: "#9fbb58"
		}		
	];

	var ctx = document.getElementById("pie").getContext("2d");
	var chart = new Chart(ctx).Pie(data);
});
</script>
<section class="dash-tile" id="chart-tile">
	<div class="row">
		<?php if($paid>0 || $due>0): ?>
			<center>
				<p style="margin-bottom: 5px;">
					<span class="success radius label">Paid: <?php echo $paid; ?></span>
					<span class="alert radius label">Due: <?php echo $due; ?></span>
				<p>
				<canvas id="pie" height="139" width="200" data-type="Pie" style="width: 109px; height: 200px;"></canvas>
			</center>
		<?php else: ?>
			<p>
				<?php echo __('There are no dued nor paid invoices.') ?>
			<p>
		<?php endif ?>
	</div>
</section>