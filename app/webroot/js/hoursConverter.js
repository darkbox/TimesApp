$(function(){
	$('#hoursConverter').on('click', function(event){
		event.preventDefault();
	});

	$('#inputHoursConverter, #inputMinutesConverter, #inputSecondsConverter').on('change keyup', function(event){
		if($('#inputMinutesConverter').val()>60 || $('#inputSecondsConverter').val()>60) {
			$(this).val(60);
		} else if(isNaN(parseInt($('#inputMinutesConverter').val())) || isNaN(parseInt($('#inputSecondsConverter').val())) || isNaN(parseInt($('#inputHoursConverter').val()))) {
			$(this).val(0);
		}

		totalHours = parseInt(($('#inputHoursConverter').val() * 3600)) + parseInt(($('#inputMinutesConverter').val() * 60)) + parseInt($('#inputSecondsConverter').val());
    	totalHours /= 3600;
		$('#resultConverter').html(roundToTwo(totalHours).toFixed(2));
	});
});

function roundToTwo(num) {    
	return +(Math.round(num + "e+2")  + "e-2");
}