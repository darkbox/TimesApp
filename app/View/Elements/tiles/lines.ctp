
<script type="text/javascript">

$(document).ready(function(){
	var data = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				data : [65,59,90,81,56,55,40]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : [28,48,40,19,96,27,100]
			}
		]
	};
	var ctx = document.getElementById("lines").getContext("2d");
	var Line = new Chart(ctx).Line(data);
});
</script>
<section class="dash-tile" id="chart-tile">
	<center>
	<canvas id="lines" height="200" width="500" data-type="Lines" style="width: 500px; height: 200px;"></canvas>
	</center>
</section>