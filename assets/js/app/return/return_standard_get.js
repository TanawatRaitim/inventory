$(function() {
	$('input, select').not('#submit').keydown( function (event) { //event==Keyevent
	    if(event.which == 13) {
	        var inputs = $(this).closest('form').find(':input:visible');
	        inputs.eq( inputs.index(this)+ 1 ).focus();
	        event.preventDefault(); //Disable standard Enterkey action
	    }
	    // event.preventDefault(); <- Disable all keys  action
	});
	// if is not work search on google PlusAs Tab****
	
	
	$("#return_standard a").editable({
		type: 'select',
		name: 'Period_Val',
		url: BASE_URL+'return_p/standard_post',
		title: 'ระบุระยะเวลา',
		source: BASE_URL+'return_p/source_return_period'
	});
	
	
}); 