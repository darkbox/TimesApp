$('#dpProjectDeadLine').prop('disabled', true);

$('#dpProjectStartingDate').Zebra_DatePicker({
  direction: true,
  pair: $('#dpProjectDeadLine'),

  onChange: function() {
  	$('#dpProjectDeadLine').prop('disabled', false);
  	$('#dpProjectDeadLine + button').removeClass("Zebra_DatePicker_Icon_Disabled");
  }
});

$('#dpProjectDeadLine').Zebra_DatePicker({
  direction: 1
});

$('#dpProjectStartingDateEdit').Zebra_DatePicker({
  direction: true,
  pair: $('#dpProjectDeadLineEdit')
});

$('#dpProjectDeadLineEdit').Zebra_DatePicker({
  direction: 1
});