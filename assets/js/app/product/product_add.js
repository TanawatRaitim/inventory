$(function() {
		// alert('hello ims');
		$("#Product_ID").blur(function() {
			var str = $(this).val();
			str = str.toUpperCase();
			$(this).val(str);
		});
		
		$("#Manufact_StartDate, #Manufact_EndDate").datetimepicker({
			pickTime: false
		});

		
		$('input, select').keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****

	}); 