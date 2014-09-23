$(function(){
	$('input').keydown( function (event) { //event==Keyevent
		    if(event.which == 13) {
		        var inputs = $(this).closest('form').find(':input:visible');
		        inputs.eq( inputs.index(this)+ 1 ).focus();
		        event.preventDefault(); //Disable standard Enterkey action
		    }
		    // event.preventDefault(); <- Disable all keys  action
		});
	
	$(document).on('blur',"#QTY_Good, #QTY_Damage, #QTY_Waste",function(e) {
		var element = $(this).parents('tr');
		var good = parseInt(element.find($("input#QTY_Good")).val());
		var waste = parseInt(element.find($("input#QTY_Waste")).val());
		var damage = parseInt(element.find($("input#QTY_Damage")).val());
		var total = good + waste + damage;
		element.find($("td#total")).html(total);
		
	});
	
	
		$("#btn_save").on('click',function(e){
			
			e.preventDefault();
			var result = true;
			
			//validation			
			$("input#QTY_Good, input#QTY_Waste, input#QTY_Damage").each(function(){

				var val = $(this).val();
				var max = $(this).data('max');
				
				if(val=="" || $.isNumeric(val) == false || val<0 || val>max){
					result = false;
					$(this).focus();
					return false;
				}
			});
			
			$("td#total").each(function(){
				var total = parseInt($(this).html());
				var checked = $(this).parents('tr').find('input:checkbox').is(':checked');
				
				//alert(checked);
				
				if(checked == false && total<=0){	
					result = false;
					return false;
				}
			});
			
			
			if(result)
			{
				$("#message").noty({
				text: "คุณต้องการแก้ไขรายการ ?",
				type: 'confirm',
				// dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						
						$.ajax({
						type: 'POST',
						url: '/inventory/reserve/edit_detail',
						data: {
							detail_data: $("#form_detail").serialize(),
							},
						dataType: 'json',
						success: function(data){
							
						},
						beforeSend: function(){
							var loading = noty({
								layout: 'center',
								text: "<h1>กำลังดำเนินการ....</h1>",
								type: 'information',
								dismissQueue: false,
								modal: true,
								closeWith: ['']
							});
							},
						complete: function(){

							alert('บันทึกข้อมูลเรียบร้อยแล้ว');
							window.location.href = '/inventory/reserve/all';
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
				$("#message").noty({
						text: "คุณไม่สามารถ่ใส่ค่าว่าง ,ค่าน้อยกว่า 0, ยอดการจองรวมแต่ละรายการเท่ากับ 0,  ค่าอื่นที่ไม่ใช่ตัวเลข, หรือค่ามากกว่าที่คุณได้ทำการจองไปได้",
						type: 'error',
						dismissQueue: true,
						//killer: true,
						timeout: 10000
					});
			}
			
		});
		
		$("#btn_cancel").on("click",function(e){
			$("#message").noty({
				text: "คุณต้องการยกเลิกการแก้ไข ?",
				type: 'confirm',
				// dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						
						window.location.href = '/inventory/reserve/all';
									
					}
					},
					{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {

						$noty.close();
						}
					}
				]
			});
		});
		
		$(":checkbox").on('change',function(){
			
			if($(this).is(':checked')){
				//alert('checked');
				$(this).parents('tr').addClass('danger');
			}else{
				$(this).parents('tr').removeClass('danger');
			}
		});
			
			
}); 
	


