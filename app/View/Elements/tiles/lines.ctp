
<script type="text/javascript">

$(document).ready(function(){
	var data = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				data : [$('#January').val(),
						$('#February').val(),
						$('#March').val(),
						$('#April').val(),
						$('#May').val(),
						$('#June').val(),
						$('#July').val(),
						$('#August').val(),
						$('#September').val(),
						$('#October').val(),
						$('#November').val(),
						$('#December').val()]
			}
		]
	};

	var options = {
				
	//Boolean - If we show the scale above the chart data			
	scaleOverlay : false,
	
	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,
	
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The scale starting value
	scaleStartValue : null,

	//String - Colour of the scale line	
	scaleLineColor : "rgba(0,0,0,0)",
	
	//Number - Pixel width of the scale line	
	scaleLineWidth : 1,

	//Boolean - Whether to show labels on the scale	
	scaleShowLabels : true,
	
	//Interpolated JS string - can access value
	scaleLabel : "<%=value%>",
	
	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",
	
	//Number - Scale label font size in pixels	
	scaleFontSize : 12,
	
	//String - Scale label font weight style	
	scaleFontStyle : "normal",
	
	//String - Scale label font colour	
	scaleFontColor : "#666",	
	
	///Boolean - Whether grid lines are shown across the chart
	scaleShowGridLines : false,
	
	//String - Colour of the grid lines
	scaleGridLineColor : "rgba(0,0,0,0)",
	
	//Number - Width of the grid lines
	scaleGridLineWidth : 1,	
	
	//Boolean - Whether the line is curved between points
	bezierCurve : true,
	
	//Boolean - Whether to show a dot for each point
	pointDot : true,
	
	//Number - Radius of each point dot in pixels
	pointDotRadius : 5,
	
	//Number - Pixel width of point dot stroke
	pointDotStrokeWidth : 1,
	
	//Boolean - Whether to show a stroke for datasets
	datasetStroke : true,
	
	//Number - Pixel width of dataset stroke
	datasetStrokeWidth : 2,
	
	//Boolean - Whether to fill the dataset with a colour
	datasetFill : true,
	
	//Boolean - Whether to animate the chart
	animation : true,

	//Number - Number of animation steps
	animationSteps : 60,
	
	//String - Animation easing effect
	animationEasing : "easeOutQuart",

	//Function - Fires when the animation is complete
	onAnimationComplete : null
	
}

	var ctx = document.getElementById("lines").getContext("2d");
	var Line = new Chart(ctx).Line(data, options);
});
</script>
<section class="dash-tile" id="chart-tile" style="height: 490px;">
	<header>
		<h1>Total hours <small>(per month)</small></h1>
	</header>
	<center style="margin-top: 30px">
	<canvas id="lines" height="300" width="500" data-type="Lines" style="width: 500px; height: 300px;"></canvas>
	</center>
	<?php foreach ($hoursByMonth as $index => $hours): ?>
		<input type="hidden" id="<?php echo $index; ?>" value="<?php echo $hours; ?>">
	<?php endforeach; ?>
</section>