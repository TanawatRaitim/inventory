$(function() {
	
	$("#Cust_ID").blur(function() {
		var str = $(this).val();
		str = str.toUpperCase();
		$(this).val(str);
	});
	
	$("#Cust_ID").mask('SS-00-0000',{clearIfNotMatch: true});

	
	$('input').keydown( function (event) { //event==Keyevent
	    if(event.which == 13) {
	        var inputs = $(this).closest('form').find(':input:visible');
	        inputs.eq( inputs.index(this)+ 1 ).focus();
	        event.preventDefault(); //Disable standard Enterkey action
	    }
	    // event.preventDefault(); <- Disable all keys  action
	});
	// if is not work search on google PlusAs Tab****
	
	$("#btn_save").on('click',function(e){
		
		//check duplicate product_ID
		var customer_id = $("#Cust_ID").val();
		
		$.ajax({
			type: 'GET',
			url: 'check_customer_id/'+ customer_id,
			dataType: 'html',
			success: function(data){
				if(data=='true'){
					$("form#form_customer").submit();
				}else{
					$("#error_msg").noty({
						text: 'รหัสลูกค้านี้มีการใช้ไปแล้ว',
						type: 'error',
						dismissQueue: true,
						//killer: true,
						timeout: 4000
					});
				}
			}
		});	
	});
	
	jQuery.validator.messages.required = "";
	jQuery.validator.messages.min = "";
	jQuery.validator.messages.digits = "";
	
	$("form#form_customer").validate({
		errorPlacement: function(error, element){
		
		},
		//ignore: null,
		invalidHandler: function(e, validator){
			$("#error_msg").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			$("#error_msg").noty({
				// layout: 'top',
				text: "กดยื่นยันการบันทึกข้อมูล",
				type: 'confirm',
				dismissQueue: false,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						form.submit();
						}
					},
					{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
						$noty.close();
						}
					}
				]
				
			});
			
		},
		rules:{
			Cust_ID:{
				required:true
			},
			Cust_Name:{
				required:true
			},
			Cust_Contact:{
				required:true
			},
			Cust_Tel:{
				required:true
			},
			CustLine_ID:{
				required:true,
				min:1
			},
			Cust_Photo:{
				extension: "jpg|jpeg|png"
			},
			Cust_Map:{
				extension: "jpg|jpeg|png"
			}
			
		},
		messages: {
			
		}
	});
		

}); 