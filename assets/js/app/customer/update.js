$(function() {
	
	//remove upload file
	$("#remove_photo, #remove_map").on('click',function(e){
		e.preventDefault();
		var res = confirm('ลบเอกสารแนบ ?');
		var element = $(this);
		
		if(!res){
			return false;
		}
		
		var field = $(this).data('remove');
		var autoid = $("#Cust_AutoID").val();
		
		$.ajax({
			type: 'GET',
			url: '/inventory/customer/delete_upload_file/'+ autoid + "/" + field,
			dataType: 'html',
			success: function(data){
				if(data=='true'){
					element.prev("a").remove();
					element.remove();
					
				}else{
					alert('ไม่สามารถลบข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ');
					
				}
			},
			beforeSend: function(){
				
				},
			complete: function(){
				}
			});
	});

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
		$("form#form_customer").submit();
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
					//killer: true,
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
						//alert("big");
						$("#form_product").submit();
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