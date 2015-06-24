$(function() {
	
	$("#select_all").on('click',function(e){
		e.preventDefault();
		$('input[name="sale_code[]"]').prop("checked", 'checked');
	});
	
	$("button#select_none").on('click',function(e){
		e.preventDefault();
		$('input[type="checkbox"]').removeAttr("checked");
	});
	
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
	
	//validate form
	//start date, end date, customer line, customer area
	
	
	$("#packing_list_submit").on('click',function(e){
		
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var customer_line = $("#customer_line").val();
		var customer_area = $("#area").val();
		
		if(start_date == "" || end_date == "" || customer_line == 0 || customer_area == 0)
		{
			alert(start_date+","+end_date+","+customer_line+","+customer_area);
			return false;
		}	
	});
	
	
	

}); 