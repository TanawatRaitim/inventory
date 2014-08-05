function format(state){
	return state.id;
}

$(function() {
	
		$("#test_noty").click(function(){
			
			$("#message").noty({
				// layout: 'top',
				text: "Do you want to continue?",
				type: 'error',
				dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {

						// this = button element
						// $noty = $noty element

						$noty.close();
						$("#message").noty({force: true, text: 'You clicked "Ok" button', type: 'success'});
					}
					},
					{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
						$noty.close();
						$("#message").noty({force: true, text: 'You clicked "Cancel" button', type: 'error'});
					}
					}
				]
				
			});
			
			noty({
				layout: 'top',
				text: "hello noty",
				type: 'warning',
				dismissQueue: true
			});
		});

	
		// alert('hello ims');
		$("#product_id").blur(function() {
			var str = $(this).val();
			str = str.toUpperCase();
			$(this).val(str);
		});
		
		//$("#ticket_type, #product_list").select2();
		
		$("#test_select2").select2({
			placeholder: 'please select',
			minimumInputLength: 2,
			ajax: {
				url: 'product_list',
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
			formatSelection: format
			
		});
		
		$("#customer_id").select2({
			placeholder: 'please select',
			minimumInputLength: 2,
			ajax: {
				url: 'customer_list',
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
			formatSelection: format
			
		});
		
		
		
		$("#refer_date").datetimepicker({
			pickTime: false,
			// keyboardNavigation: true
		});


		$("#product_good, #product_unusable, #product_deteriorate").blur(function(e) {
			// alert('on blur');
			var total_receive = parseInt($("#product_good").val()) + parseInt($("#product_deteriorate").val()) + parseInt($("#product_unusable").val());

			$("#product_receive").val(total_receive);
		});
		
		
		$("input, select").keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****
	}); 
	
	
	
	

