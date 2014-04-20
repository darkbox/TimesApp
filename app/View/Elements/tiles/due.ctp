<script type="text/javascript">
$(document).ready(function(){
	var data = {
	labels : ["Paid vs Due"],
	datasets : [
		{
			fillColor : "rgba(159,187,88,0.5)",
			strokeColor : "rgba(159,187,88,1)",
			data : [100]
		},
		{
			fillColor : "rgba(226,84,64,0.5)",
			strokeColor : "rgba(226,84,64,1)",
			data : [50]
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
	scaleLineColor : "rgba(255,255,255,1)",
	
	//Number - Pixel width of the scale line	
	scaleLineWidth : 0,

	//Boolean - Whether to show labels on the scale	
	scaleShowLabels : false,
	
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

	//Boolean - If there is a stroke on each bar	
	barShowStroke : true,
	
	//Number - Pixel width of the bar stroke	
	barStrokeWidth : 2,
	
	//Number - Spacing between each of the X value sets
	barValueSpacing : 5,
	
	//Number - Spacing between data sets within X values
	barDatasetSpacing : 1,
	
	//Boolean - Whether to animate the chart
	animation : true,

	//Number - Number of animation steps
	animationSteps : 60,
	
	//String - Animation easing effect
	animationEasing : "easeOutQuart",

	//Function - Fires when the animation is complete
	onAnimationComplete : null
	
}


	var ctx = document.getElementById("bar").getContext("2d");
	var chart = new Chart(ctx).Bar(data,options);
});
</script>
<section class="dash-tile" id="chart-tile">
	<center>
	<canvas id="bar" height="200" width="200" data-type="Bar" style="width: 200px; height: 200px;"></canvas>
	</center>
</section>