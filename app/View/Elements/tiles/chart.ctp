
<script type="text/javascript">
$(document).ready(function(){
		var data = [
	{
		value: <?php echo $planned; ?>,
		color: "#4A4A4A"
	},
	{
		value : <?php echo $inProgress; ?>,
		color : "#5ba4e5"
	},
	{
		value : <?php echo $completed; ?>,
		color : "#9fbb58"
	},
	{
		value : <?php echo $canceled; ?>,
		color : "#e25440"
	}
];
	var ctx = document.getElementById("doughnut").getContext("2d");
	var chart = new Chart(ctx).Doughnut(data);
});
</script>
<section class="dash-tile" id="chart-tile">
	<center>
	<canvas id="doughnut" height="200" width="200" data-type="Doughnut" style="width: 200px; height: 200px;"></canvas>
	</center>
	<p><span class="secondary radius label">Planned: <?php echo $planned; ?></span>
	<span class="radius label">In progress: <?php echo $inProgress; ?></span>
	<span class="success radius label">Completed: <?php echo $completed; ?></span>
	<span class="alert radius label">Canceled: <?php echo $canceled; ?></span><p>
</section>