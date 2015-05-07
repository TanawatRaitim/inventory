$(function() {
		$("#Reject_Remark").attr('disabled','disabled');
		
		$("#accept").on('change',function(){
				// alert('accept');
			$("#Reject_Remark").val("");	
			$("#Reject_Remark").attr('disabled', 'disabled');	
		});
		
		$("#reject").on('change',function(){
			$("#Reject_Remark").removeAttr('disabled');	
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
				e.preventDefault();
				
				var rejected = $("input:radio:checked").val();
				
				if(rejected == 1)
				{
					//yes i'm reject
					if($("#Reject_Remark").val() == ""){
						$("#message").noty({
							text:'ต้องระบุหมายเหตุที่ปฎิเสธก่อน',
							type:'error',
							timeout: 4000
							
						});
					}else{
						$("#message").noty({
							text: "ยืนยันการปฏิเสธ",
							type: 'confirm',
							// dismissQueue: true,
							buttons     : [
								{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
									
									$(this).attr('disabled','disabled');
									
									$.ajax({
										type: 'POST',
										url: BASE_URL+'return_p/set_reject',
										data: {
											reject: $("#form_reject").serialize()
											},
										dataType: 'html',
										success: function(data){
											// alert(data);
											if(data == 'true'){
												alert('ปฎิเสธเรียบร้อยแล้ว');
												window.location.href = BASE_URL+'return_p/no_appv';
											}else{
												alert('มีข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ');
												
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
					
					
					
				}else if(rejected == 0){
					//it had i'm ok
					$("#message").noty({
						text: "ยืนยัน",
						type: 'confirm',
						// dismissQueue: true,
						buttons     : [
							{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
								// $("form").submit();
								$(this).attr('disabled','disabled');
								
								$.ajax({
										type: 'POST',
										url: BASE_URL+'return_p/set_reject',
										data: {
											reject: $("#form_reject").serialize()
											},
										dataType: 'html',
										success: function(data){
											// alert(data);
											if(data == 'true'){
												alert('อนุมัติเรียบร้อยแล้ว');
												window.location.href = BASE_URL+'return_p/no_appv';
											}else{
												alert('มีข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ');
												
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
					
				}else{
					//not check
					$("#message").noty({
						text:'กรุณาเลือกรายการก่อน',
						type:'error',
						timeout: 4000
						
					});
				}
				
				
			});
			
			$("#btn_cancel").on("click",function(e){
				$("#message").noty({
						text: "คุณต้องการยกเลิกการอนุมัติ ?",
						type: 'confirm',
						// dismissQueue: true,
						buttons     : [
							{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
								
								window.location.href = BASE_URL+'return_p/no_appv';
											
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
	


