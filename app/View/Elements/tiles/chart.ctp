
<script type="text/javascript">
$(document).ready(function(){
		var data = [
	{
		value: 30,
		color:"#F7464A"
	},
	{
		value : 50,
		color : "#E2EAE9"
	},
	{
		value : 100,
		color : "#D4CCC5"
	},
	{
		value : 40,
		color : "#949FB1"
	},
	{
		value : 120,
		color : "#4D5360"
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
</section>