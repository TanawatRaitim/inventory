$(function(){
	
	$("#TK_ID").mask('00-00-0000',{clearIfNotMatch: true});
	$("#DocSale_Date").mask('00/00/0000',{clearIfNotMatch: true});
	$("#Invoice_Date").mask('00/00/0000',{clearIfNotMatch: true});
	
	$("#DocSale_Date").datetimepicker({
		pickTime: false,
		useCurrent: false
	});
	
	$("#Invoice_Date").datetimepicker({
		pickTime: false,
		useCurrent: false
	});
	
	$("#btn_save").on('click',function(e){
		e.preventDefault();
		
		var tkid = $("input#TK_ID").val();
		var sale_date = $("input#DocSale_Date").val();
		var invoice_no = $("input#Invoice_No").val();
		var invoice_date = $("input#Invoice_Date").val();
		var dup_id = '';
		var dup_invoice = '';
		var tkcode = $("#new_code").val();
		var tkid = $("#TK_ID").val();
		
		
		$.ajax({
			type: 'GET',
			url: BASE_URL+'sale/check_dup_id/'+tkcode+'/'+tkid,
			async: false,
			dataType: 'text',
			success: function(data){
				// alert(data);
				dup_id = data;
			}
		});
		
		$.ajax({
			type: 'GET',
			url: BASE_URL+'sale/check_dup_invoice/'+invoice_no,
			async: false,
			dataType: 'text',
			success: function(data){
				// alert(data);
				dup_invoice = data;
			}
		});
		
		
		
		
		if(tkid == "" || sale_date == "" || invoice_no == "" || invoice_date == ""){
			$("#message").noty({
				text: 'กรุณาใส่ข้อมูลที่มีเครื่องหมาย * ให้ครบถ้วน',
				type: 'error',
				dismissQueue: true,
				//killer: true,
				timeout: 4000
			});
		}else{
			
			
			if(dup_id == 'true')
			{
				$("#message").noty({
					text: 'ไม่สามารถใช้เลขที่นี้ได้ เนื่องจากมีอยู่ในระบบแล้ว',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});	
			}else if(dup_invoice == 'true')
			{
				$("#message").noty({
					text: 'ไม่สามารถใช้เลขที่ Invoice นี้ได้ เนื่องจากมีอยู่ในระบบแล้ว',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
			}else{
				$("#message").noty({
					text: "ยืนยันการออกใบสั่งขาย",
					type: 'confirm',
					// dismissQueue: true,
					buttons     : [
						{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
							
							$(this).attr('disabled','disabled');
							
							$.ajax({
								type: 'POST',
								url: BASE_URL+'sale/set_is_used',
								data: {
									sale: $("#form_sale").serialize()
									},
								dataType: 'html',
								success: function(data){
									// alert(data);
									if(data == 'true'){
										
										alert('บันทึกใบสั่งขายเรียบร้อยแล้ว');
										window.location.href = BASE_URL+'sale/all';
										
									}else{
										
										alert('มีข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ');
										return false;
										
									}
								},
								beforeSend: function(){
									
									},
								complete: function(){
									}
								});
						}
						},
						{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
	
							$noty.close();
							}
						}
					]
				});
			}
			
			
			
			
		}	
	});
	
	
	$("#btn_cancel").on("click",function(e){
		e.preventDefault();
		$("#message").noty({
				text: "คุณต้องการยกเลิก?",
				type: 'confirm',
				// dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						
						window.location.href = BASE_URL+'sale/all';
									
					}
					},
					{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {

						$noty.close();
						}
					}
				]
			});
	});
	
	
			
			
}); 
	


