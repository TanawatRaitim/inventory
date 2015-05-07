$(function() {
		
		$("#DocRef_Date").datetimepicker({
			pickTime: false,
			useCurrent: false
			// useStrict: "strict"
		});
		
		$("#DocRef_Date").mask('00/00/0000',{clearIfNotMatch: true});
		
		
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
				
				// var rejected = $("input:radio:checked").val();
				var docref_no = $("#DocRef_No").val();
				var docref_date = $("#DocRef_Date").val();
				var description = $("#description").val();
				
				if(docref_no == "" || docref_date == "" || description == "")
				{
					//alert
					$("#message").noty({
						text:'กรุณากรอกข้อมูลให้ครบถ้วน',
						type:'error',
						timeout: 4000
						
					});
				}else{
					//submit
					$("#message").noty({
							text: "ยืนยันการ  Rollback",
							type: 'confirm',
							// dismissQueue: true,
							buttons     : [
								{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
									
									$(this).attr('disabled','disabled');
									
									$.ajax({
										type: 'POST',
										url: BASE_URL+'manage/rollback_post',
										data: {
											rollback: $("#form_rollback").serialize()
											},
										dataType: 'json',
										success: function(data){
											// alert(data);
											if(data.status == true){
												alert('Rollback เรียบร้อยแล้ว');
												window.location.href = BASE_URL+'manage/rollback';
											}else{
												alert('มีข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ');
												console.log(data.description);
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
						}); //end noty
					}
			}); //end save
			
			$("#btn_cancel").on("click",function(e){
				$("#message").noty({
						text: "คุณต้องการยกเลิกการ Rollback ?",
						type: 'confirm',
						// dismissQueue: true,
						buttons     : [
							{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
								
								window.location.href = BASE_URL+'manage/rollback';
											
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
	


