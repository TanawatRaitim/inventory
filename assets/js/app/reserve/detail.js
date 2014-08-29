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
					
					//$(this).focus();
					result = false;
					$(this).focus();
					return false;
				}
			});
			
			if(result)
			{
				//$("form").submit();
				$("#message").noty({
				text: "คุณต้องการแก้ไขรายการ ?",
				type: 'confirm',
				// dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						
						// $("#form_detail").submit();
						//window.location.href = '/inventory/reserve/all';
						$.ajax({
						type: 'POST',
						url: '/inventory/reserve/edit_detail',
						data: {
							detail_data: $("#form_detail").serialize(),
							//ticket_detail: $("#ticket_detail").serialize()
							},
						dataType: 'json',
						success: function(data){
							/*
							$("#TK_ID").val(data.TK_ID);
							$("#TK_ID_Present").html(data.TK_ID);
							$("#Transact_AutoID").html(data.Transact_AutoID);
							
							var product_name = $("#Product_ID").val();
							var Effect_Stock_AutoID = $("#Effect_Stock_AutoID option:selected").text();
							var QTY_Good = parseInt($("#QTY_Good").val());
							var QTY_Waste = parseInt($("#QTY_Waste").val());
							var QTY_Damage = parseInt($("#QTY_Damage").val());
							var total = parseInt($("#product_receive").val());
							
							var row_data = '<tr><td>'+product_name+'</td><td class="text-center">';
							row_data += Effect_Stock_AutoID+'</td><td class="text-center"><a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Good+'</a>';
							row_data += '</td><td class="text-center"><a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Waste+'</a></td><td class="text-center">';
							row_data += '<a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Damage+'</a></td><td class="text-center" id="record_toal">'+total;
							row_data += '</td><td><span id="btn_delete_record" data-productid="'+ data.Product_ID +'" data-autoid="'+ data.Transact_AutoID +'" data-stock="'+ data.Effect_Stock_AutoID +'" class="glyphicon glyphicon-remove cursor-pointer" style="color: red; ;"></span></tr>';
							
							$("#record_saved > tbody").append(row_data);
							
							//alert("บันทึกรายการสินค้า"+product_name+"เรียบร้อยแล้ว");
							$("#ticket_detail_msg").noty({
								text: "บันทึกรายการสินค้า"+product_name+" เรียบร้อยแล้ว",
								type: 'success',
								dismissQueue: true,
								//killer: true,
								timeout: 4000
							});
							
							var rows = $("#record_saved > tbody >tr").size();
							$("#total_record").html("บันทึกไปแล้วจำนวน <strong>"+rows+"</strong> รายการ");
							
							$("#Product_ID").select2("val","");
							$("#Effect_Stock_AutoID").val(0);
							$("#QTY_Good").val(0);
							$("#QTY_Waste").val(0);
							$("#QTY_Damage").val(0);
							$("#product_receive").val(0);
							$("#Product_ID").select2('focus');
							*/
		
						},
						beforeSend: function(){
							//$("#message").html('loading..');
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
							//$("#message").html('');
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
						text: "คุณไม่สามารถ่ใส่ค่าว่าง ,ค่าน้อยกว่า 0 , ค่าอื่นที่ไม่ใช่ตัวเลข, หรือค่ามากกว่าที่คุณได้ทำการจองไปได้",
						type: 'error',
						dismissQueue: true,
						//killer: true,
						timeout: 10000
					});
			}
			//alert('what the hell');
			
			
			
		});
		
		
		
		
		
		$("#btn_cancel").on("click",function(e){
			$("#message").noty({
				text: "คุณต้องการยกเลิกการอนุมัติ ?",
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
			
			
}); 
	


