$(function() {
	
	//remove upload file
	$("#remove_photo, #remove_specsheet, #remove_salesheet, #remove_docother").on('click',function(e){
		e.preventDefault();
		var res = confirm('ลบเอกสารแนบ ?');
		var element = $(this);
		
		if(!res){
			return false;
		}
		
		var field = $(this).data('remove');
		var autoid = $("#Product_AutoID").val();
		
		$.ajax({
			type: 'GET',
			url: '/inventory/product/delete_upload_file/'+ autoid + "/" + field,
			dataType: 'html',
			success: function(data){
				if(data=='true'){
					element.prev("a").remove();
					element.remove();
					
				}else{
					alert('ไม่สามารถลบข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ');
				}
			}
		});
	});
	
	//remove premium upload file
	$("body").on("click","td a#remove_premium",function(e){
		e.preventDefault();
		var res = confirm('ลบสินค้าประกอบ ?');
		var element = $(this);
		
		if(!res){
			return false;
		}
		
		var id = $(this).data('remove');
		
		$.ajax({
			type: 'GET',
			url: '/inventory/product/delete_premium_upload_file/'+ id,
			dataType: 'html',
			success: function(data){
				if(data=='true'){
					$("tr[id="+ id +"]").remove();
					
				}else{
					alert('ไม่สามารถลบข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ');
				}
			}
		});
	});
	

	$("#Product_ID").blur(function() {
		var str = $(this).val();
		str = str.toUpperCase();
		$(this).val(str);
	});
	
	$("#Manufact_StartDate, #Manufact_EndDate").datetimepicker({
		pickTime: false
	});
	
	$("#Manufact_StartDate, #Manufact_EndDate").mask('00/00/0000',{clearIfNotMatch: true});

	
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
		$("form#form_product").submit();
	});
	
	$("#btn_save_premium").on('click',function(e){	
		$("form#form_premium").submit();
	});
	
	jQuery.validator.messages.required = "";
	jQuery.validator.messages.min = "";
	jQuery.validator.messages.digits = "";
	
	$("form#form_product").validate({
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
			Product_ID:{
				required:true
			},
			Product_Name:{
				required:true
			},
			Product_Vol:{
				required:true,
				number: true
			},
			ProCate_ID:{
				required:true,
				min:1
			},
			ProGroup_ID:{
				required:true,
				min:1
			},
			ProType_ID:{
				required:true,
				min:1
			},
			ProFreq_ID:{
				required:true,
				min:1
			},
			Price:{
				required:true,
				number:true
			},
			Main_Inventory:{
				required:true,
				min:1
			},
			Barcode_Main:{
				required:true
			},
			Width:{
				number:true
			},
			Height:{
				number:true
			},
			Bold:{
				number:true
			},
			Weight:{
				number:true
			},
			Manufact_Num:{
				number:true
			},
			Age_AverageReturn:{
				required:true,
				min:1
			},
			Age_Inventory:{
				required:true,
				min:1
			},
			Order_Num:{
				required:true,
				number:true
			},
			Manufact_Num:{
				number:true
			},
			QTY_Reserve:{
				number:true
			},
			Manufact_EndDate:{
				required:true
			},
			QTY_Production:{
				required:true,
				number:true
			},
			QTY_ReceiveInventory:{
				number:true
			},
			QTY_Sample:{
				number:true
			},
			QTY_Distribution:{
				number:true
			},
			Product_Photo:{
				extension: "jpg|jpeg|png"
			},
			Product_SpecSheet:{
				extension: "pdf"
			},
			Product_SaleSheet:{
				extension: "pdf"
			},
			Product_DocOther:{
				extension: "pdf"
			}
			
		},
		messages: {
			
		}
	});
	
	$("form#form_premium").validate({
		errorPlacement: function(error, element){
		
		},
		//ignore: null,
		invalidHandler: function(e, validator){
			$("#error_premium_msg").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			$("#error_premium_msg").noty({
				// layout: 'top',
				text: "กดยื่นยันการบันทึกข้อมูล",
				type: 'confirm',
				dismissQueue: false,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						//alert("big");
						//$("#form_product").submit();
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
			Premium_ID:{
				required:true,
				number: true
			},
			Premium_Name:{
				required:true
			},
			Premium_QTY:{
				required:true,
				number: true
			},
			Premium_Photo:{
				extension: "jpg|jpeg|png"
			}
			
		},
		messages: {
			
		}
	});
	
	
		

}); 