function format_product(state){
	return state.present;
}

function format_customer(state){
	return state.text;
}

function format(state)
{
	// console.log(state);
	return state.id + " (" + state.text + ")";
}


$(function() {
	
	$.ajaxSetup({
		cache: false
	});
	
	$("#customer").select2({
		
		placeholder: 'Customer ID',
		openOnEnter: false,
		dropdownAutoWidth: true,
		minimumInputLength: 2,
		ajax: {
			url: BASE_URL+'customer/select2_customer',
			type: 'POST',
			dataType: 'json',
			data: function(term, page){
				return {
					q: term
				};
			},
			results: function(data, page){
				return {
					results: data
				};
			}
		},
		formatSelection: format,
		initSelection: function(element, callback){
			/*
			var id = $(element).data("customer_id");
			var text = $(element).data("customer_text");
			callback({id:id, text:text});
			*/
		}
	});
	
		
	
	/*
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
	*/
	
	

}); 