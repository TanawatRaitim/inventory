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
		pickTime: false,
		useCurrent: false
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
			/*
			Manufact_Num:{
				number:true
			},
			*/
			// Age_AverageReturn:{
				// required:true,
				// min:1
			// },
			// Age_Inventory:{
				// required:true,
				// min:1
			// },
			// Age_Sale:{
				// required:true,
				// min:1
			// },
			/*
			Order_Num:{
				required:true
			},
			Manufact_Num:{
				number:true
			},
			QTY_Reserve:{
				number:true
			},
			*/
			// Manufact_EndDate:{
				// required:true
			// },
			/*
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
			*/
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
		invalidHandler: function(e, validator){
			$("#error_premium_msg").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
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
	
	$("form#form_extend_age_inventory").validate({
		errorPlacement: function(error, element){
		
		},
		invalidHandler: function(e, validator){
			$("#error_extend_inventory").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			$("#error_extend_inventory").noty({
				text: "กดยืนยันการบันทึกข้อมูล",
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
			New_Age_Inventory:{
				required:true,
				min:1
			}
			
		}
	});
	
	$("form#form_extend_age_sale").validate({
		errorPlacement: function(error, element){
		
		},
		invalidHandler: function(e, validator){
			$("#error_extend_sale").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			$("#error_extend_sale").noty({
				text: "กดยืนยันการบันทึกข้อมูล",
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
			New_Age_Sale:{
				required:true,
				min:1
			}
			
		}
	});
	
	$("form#form_extend_age_return").validate({
		errorPlacement: function(error, element){
		
		},
		invalidHandler: function(e, validator){
			$("#error_extend_return").noty({
					text: 'กรุณากรอกข้อมูล หรือใส่ข้อมูลให้ถูกต้อง',
					type: 'error',
					dismissQueue: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			$("#error_extend_return").noty({
				text: "กดยืนยันการบันทึกข้อมูล",
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
			New_Age_AverageReturn:{
				required:true,
				min:1
			}
			
		}
	});
	
	$("#Age_Inventory").on('change',function(e){
		
		var calculated_date;
		var end_date = $("#Manufact_EndDate").val();
		var age = $(this).val();
		var label = $("#age_inventory_result");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		
		calculated_date = moment(end_date, "DD/MM/YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	$("#Age_Sale").on('change',function(e){
		var calculated_date;
		var end_date = $("#Manufact_EndDate").val();
		var age = $(this).val();
		var label = $("#age_sale_result");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		calculated_date = moment(end_date, "DD/MM/YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	$("#Age_AverageReturn").on('change',function(e){
		var calculated_date;
		var end_date = $("#Manufact_EndDate").val();
		var age = $(this).val();
		var label = $("#age_return_result");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		calculated_date = moment(end_date, "DD/MM/YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	$("#Manufact_EndDate").on('blur', function(e){
		//
		var calculated_date;
		var end_date = $(this).val();
		var age_sale = $("#Age_Sale").val();
		var age_inventory = $("#Age_Inventory").val();
		var age_return = $("#Age_AverageReturn").val();
		
		//end date is empty
		if(end_date == '')
		{
			//remove label value
			$("#age_return_result").val('');
			$("#age_sale_result").val('');
			$("#age_inventory_result").val('');
			
			return false;
			
		}else{
			
			//calculate_date() from global.js
			$("#age_return_result").val(calculate_date(end_date, age_return));
			$("#age_sale_result").val(calculate_date(end_date, age_sale));
			$("#age_inventory_result").val(calculate_date(end_date, age_inventory));
		}
		
	});
	
	// extend age inventory form
	
	$("#btn_extend_age_inventory").on('click',function(e){	
		$("form#form_extend_age_inventory").submit();
	});
	
	$("#New_Age_Inventory").on('change',function(e){
		var calculated_date;
		var end_date = $("#Old_Age_ExpireInventory").val();
		var age = $(this).val();
		var label = $("#New_Age_ExpireInventory");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		calculated_date = moment(end_date, "DD-MM-YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	// end extend age inventory form
	
	
	// extend age sale form
	
	$("#btn_extend_age_sale").on('click',function(e){	
		$("form#form_extend_age_sale").submit();
	});
	
	$("#New_Age_Sale").on('change',function(e){
		var calculated_date;
		var end_date = $("#Old_Age_ExpireSale").val();
		var age = $(this).val();
		var label = $("#New_Age_ExpireSale");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		calculated_date = moment(end_date, "DD-MM-YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	// end extend age sale form
	
	// extend age return form
	
	$("#btn_extend_age_return").on('click',function(e){	
		$("form#form_extend_age_return").submit();
	});
	
	$("#New_Age_AverageReturn").on('change',function(e){
		var calculated_date;
		var end_date = $("#Old_Age_ExpireReturn").val();
		var age = $(this).val();
		var label = $("#New_Age_ExpireReturn");
		
		if(end_date == '')
		{
			label.val('');
			return false;
		}
		
		calculated_date = moment(end_date, "DD-MM-YYYY").add('days', age).format('DD/MM/YYYY');
		label.val(calculated_date);
	});
	
	// end extend age return form
	
		

}); 