$(function() {
	
	$("#start_date").pickadate({
		format: 'dd-mm-yyyy',
		formatSubmit: 'yyyy-mm-dd',
		onClose: function()
		{
			
			
			
			$("#end_date").focus();
		}
		//min: $('#start_date').val()	
	});
	
	$("#end_date").pickadate({
		format: 'dd-mm-yyyy',
		formatSubmit: 'yyyy-mm-dd'
	});
	
	

}); 