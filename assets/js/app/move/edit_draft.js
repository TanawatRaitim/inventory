function format_product(state){
	return state.present;
}


function format(state)
{
	return state.id;
}

$(function() {
	
	$.ajaxSetup({
		cache: false
	});
	
	
	//comfirm change inventory
	$("#Effect_Stock_AutoID").on('blur',function(e){
		
		var return_inventory = 5;
		
		if($(this).val() != return_inventory)
		{
			if(!confirm('กดยืนยันเพื่อเปลียนคลังต้นทาง'))
			{
				$(this).val(return_inventory);
			}
		}
		
	});
	
	$("#Effect_Stock_Des").on('blur',function(e){
		
		var main_inventory = $(this).data('main_inventory');
		
		if($(this).val() != main_inventory)
		{
			if(!confirm('กดยืนยันเพื่อเปลียนคลังปลายทาง'))
			{
				$(this).val(main_inventory);
			}
		}
		
	});
	//end confirm change
	
	$("#DocRef_Date").datetimepicker({
		pickTime: false,
		useCurrent: false
		// useStrict: "strict"
	});
	
	$("#DocRef_Date").mask('00/00/0000',{clearIfNotMatch: true});
	$("#TK_ID").mask('00-00-0000',{clearIfNotMatch: true});
	
	$("#Product_ID").select2({
		placeholder: 'Product ID',
		openOnEnter: false,
		dropdownAutoWidth: true,
		minimumInputLength: 2,
		ajax: {
			url: BASE_URL+'product/select2_product',
			type: 'POST',
			dataType: 'json',
			data: function(term, page){
				return {
					q: term
				};
			},
			results: function(data, page){
				return {
					results: data
				};
			}
		},
		formatSelection: format,
		initSelection: function(element, callback){
			var id = $(element).data("Product_ID");
			var text = $(element).data("product_text");
			callback({id:id, text:text});
		}
	}).select2('val', []).on('select2-selecting',function(e){
		$.ajax({
			type: 'POST',
			url: BASE_URL+'product/get_product_json',
			data: {id: e.val},
			dataType: 'json',
			success: function(data){
				//load product information
				$("#table_qty").load(BASE_URL+'product/table_qty/'+data.Product_ID);
				//load premium information
				$("#table_premium").load(BASE_URL+'product/table_premium/'+data.Product_ID);
				//set default stock
				$("#Effect_Stock_AutoID").val(5);
				$("#Effect_Stock_Des").val(data.Main_Inventory);
				$("#Effect_Stock_Des").data('main_inventory', data.Main_Inventory);
				
			},
			beforeSend: function(){
				
			},
			complete: function(){
				
			}
		});

	});
	

	$("#QTY_Good, #QTY_Damage, #QTY_Waste").blur(function(e) {
		var total_receive = parseInt($("#QTY_Good").val()) + parseInt($("#QTY_Waste").val()) + parseInt($("#QTY_Damage").val());
		$("#product_receive").val(total_receive);
	});
	
	
	$("input:text").keydown( function (event) { //event==Keyevent
		    if(event.which == 13) {
		        var inputs = $(this).closest('form').find(':input:visible');
		        inputs.eq( inputs.index(this)+ 1 ).focus();
		        event.preventDefault(); //Disable standard Enterkey action
		    }
		    // event.preventDefault(); <- Disable all keys  action
		});
		// if is not work search on google PlusAs Tab****
		
	jQuery.validator.messages.required = "";
	jQuery.validator.messages.min = "";
	jQuery.validator.messages.digits = "";
	
	
	$("#btn_add_detail").on('click',function(e){
		
		e.preventDefault();
		
		$("form#main_ticket").submit();
	});
	
	$("form#main_ticket").validate({
		errorPlacement: function(error, element){
			
		},
		ignore: null,
		invalidHandler: function(e, validator){
			
			$("#main_ticket_msg").noty({
				text: "กรุณาใส่ข้อมูลให้ครบถ้วน",
				type: 'error',
				dismissQueue: true,
				//killer: true,
				timeout: 4000
			});
			return false;
			
		},submitHandler: function(form){
			/*
			if($("#Cust_ID").val()==""){
				$("#main_ticket_msg").noty({
					text: 'กรุณาใส่รหัสลูกค้าก่อน',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				
				return false;
			*/	
				
			//}else{
				$("form#ticket_detail").submit();	
			//}
		},
		rules:{
			TK_ID:{
				required:true
			},
			DocRef_AutoID:{
				min:1
			},
			DocRef_No:{
				required:true
			},
			DocRef_Date:{
				required:true
			}
			
		},
		messages: {
			
			
		}
	});
	
	$("form#ticket_detail").validate({
		errorPlacement: function(error, element){
			
		},
		ignore: null,
		invalidHandler: function(e, validator){
			
			$("#ticket_detail_msg").noty({
					text: 'กรุณาใส่ข้อมูลให้ครบถ้วน',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			if($("#Product_ID").val()==""){
				$("#ticket_detail_msg").noty({
					text: 'กรุณาใส่รหัสสินค้าก่อน',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				
				return false;
			}
			
			if($("#Effect_Stock_AutoID").val() == $("#Effect_Stock_Des").val()){
				$("#ticket_detail_msg").noty({
					text: 'ไม่สามารถโอนย้ายไปคลังเดียวกันได้',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				
				return false;
			}
			
			if($("#product_receive").val()<=0){
				//alert("กรุณาเลือกสินค้าก่อน");
				$("#ticket_detail_msg").noty({
					text: 'คุณไม่สามารถใสยอดสินค้ารวม น้อยกว่าหรือเท่ากับ 0 รายการได้',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				
				return false;
			}
			
			
			$.ajax({
			type: 'POST',
			url: BASE_URL+'move/check_edit_data',
			data: {
				main_ticket: $("#main_ticket").serialize(),
				ticket_detail: $("#ticket_detail").serialize()
				},
			dataType: 'json',
			// async: false,
			success: function(data){
				if(data.status == true){
					$.ajax({
						type: 'POST',
						url: BASE_URL+'move/insert_transaction',
						data: {
							main_ticket: $("#main_ticket").serialize(),
							ticket_detail: $("#ticket_detail").serialize()
							},
						dataType: 'json',
						success: function(data){
							
							$("#TK_ID").val(data.TK_ID);
							$("#TK_ID_Present").html(data.TK_ID);
							$("#Transaction_AutoID").val(data.Transact_AutoID);
							
							
							$("#TK_ID").attr('readonly','readonly');
							// $("#TK_Code").attr('readonly','readonly');
							
							var product_name = $("#Product_ID").val();
							var Effect_Stock_AutoID = $("#Effect_Stock_AutoID option:selected").text();
							var Effect_Stock_Des = $("#Effect_Stock_Des option:selected").text();
							var QTY_Good = parseInt($("#QTY_Good").val());
							var QTY_Waste = parseInt($("#QTY_Waste").val());
							var QTY_Damage = parseInt($("#QTY_Damage").val());
							var total = parseInt($("#product_receive").val());
							
							var row_data = '<tr title="'+data.Product_Name+'"><td>'+product_name+'</td><td class="text-center">';
							row_data += Effect_Stock_AutoID+'=>'+Effect_Stock_Des+'</td><td class="text-center">'+QTY_Good;
							row_data += '</td><td class="text-center">'+QTY_Waste+'</td><td class="text-center">';
							row_data += ''+QTY_Damage+'</td><td class="text-center" id="record_toal">'+total;
							row_data += '</td><td><span id="btn_delete_record" data-productid="'+ data.Product_ID +'" data-autoid="'+ data.Transact_AutoID +'" data-stock="'+ data.Effect_Stock_AutoID +'" class="glyphicon glyphicon-remove cursor-pointer" style="color: red; ;"></span></tr>';
							
							$("#record_saved > tbody").append(row_data);
							
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
							$("#Effect_Stock_Des").val(0);
							$("#QTY_Good").val(0);
							$("#QTY_Waste").val(0);
							$("#QTY_Damage").val(0);
							$("#product_receive").val(0);
							$("#Product_ID").select2('focus');
							
							$("#btn_add_detail").removeAttr('disabled');
		
						},
						beforeSend: function(){
							$("#btn_add_detail").attr('disabled','disabled');
							},
						complete: function(){
							}
						});
				}else{
					
					$("#ticket_detail_msg").noty({
						text: data.valid,
						type: 'error',
						dismissQueue: true,
						//killer: true,
						timeout: 4000
					});
				}
			},
			beforeSend: function(){
			},
			complete: function(){
				}
			});
		},
		rules:{
			Effect_Stock_AutoID:{
				min:1
			},
			Effect_Stock_Des:{
				min:1
			},
			QTY_Good:{
				digits:true
			},
			QTY_Waste:{
				digits:true	
			},QTY_Damage:{
				digits:true
			}
			
		},
		messages: {
			
			
		}
	});
	
	$("body").on('click',"#btn_delete_record",function(e){
		
		var element = $(this);
		var product = $(this).data('productid');
		var autoid = element.data('autoid');

		$("#delete_confirm").data('autoid',autoid).parents('tr').remove();
		$(element).data('autoid',autoid).parents('tr').after("<tr id='row_confirm'><td colspan='8' id='delete_confirm'><td></tr>");
		$("#delete_confirm").noty({
			text: "ต้องการลบรายการ"+product,
			type: 'confirm',
			// dismissQueue: true,
			buttons     : [
				{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					

					
					$.ajax({
						type: 'POST',
						url: BASE_URL+'move/delete_ticket_detail',
						data: {
							stock: element.data('stock'),
							product_id: element.data('productid'),
							autoid: element.data('autoid')
							},
						dataType: 'html',
						success: function(data){
							
							$noty.close();
							$("#delete_confirm").noty({
								text:'ลยรายการ ' + product + 'เรียบร้อยแล้ว',
								type:'success',
								timeout: 4000,
								callback:{
									onShow: function(){
										element.parents("tr").remove();
										
									},afterClose: function(){
										$("#delete_confirm").data('autoid',autoid).parents('tr').remove();
										
										var rows = $("#record_saved > tbody >tr").size();
							
										if(rows != 0){
											$("#total_record").html("บันทึกไปแล้วจำนวน <strong>"+rows+"</strong> รายการ");
										}else{
											$("#total_record").html("ยังไม่มีรายการที่ถูกบันทึก");
										}
									}
								}
							});
							

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
					$("#delete_confirm").noty({
						text:'ยกเลิกลยรายการ ' + product + 'เรียบร้อยแล้ว',
						type:'success',
						timeout: 4000,
						callback:{
							onShow: function(){

								
							},afterClose: function(){
											
								$("#delete_confirm").data('autoid',autoid).parents('tr').remove();
							}
						}
					});
					
					}
				}
			]
		});
		
	});
	

	
	
	$("#btn_save_rs").click(function(e){
		
		//var tkid = $("#TK_ID").val();
		var autoid =$("#Transaction_AutoID").val();
		//alert(autoid);
		//return false;
		
		if(autoid == "")
		{
			$("#message").noty({
				text: "ไม่พบรายการที่ต้องการส่งขออนุมัติ กรุณาตรวจสอบข้อมูลอีกครั้ง !!!",
				type: 'error',
				dismissQueue: false,
				killer: true,
				timeout: 4000
			});
			return false;
		}
		
			
		$("#message").noty({
			// layout: 'top',
			text: "กดยื่นยันการนำข้อมูลเข้า",
			type: 'confirm',
			dismissQueue: false,
			buttons     : [
				{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					
					$(this).attr('disabled','disabled');
					
					$noty.close();

					var autoid =$("#Transaction_AutoID").val();
					
					$.ajax({
						type: 'GET',
						url: BASE_URL+'move/check_save/'+ autoid,		//check before save
						data: {
							},
						dataType: 'json',
						// async: false,
						success: function(data){
							if(data.status == true){
								
								$.ajax({
									type: 'POST',
									url: BASE_URL+'move/save',
									data: {
										main_ticket: $("#main_ticket").serialize(),
										ticket_detail: $("#ticket_detail").serialize()
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
											window.location.href = BASE_URL+'move/reject';
										}
									});
							}else{
								$("#message").noty({
									text: data.valid,
									type: 'error',
									dismissQueue: true,
									//killer: true,
									timeout: 4000
								});
							}
						},
						beforeSend: function(){
							//load indicator
							},
						complete: function(){
							//remove indicator
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
		
		
		
	});
	
	$(document).on('click',"#btn_save_draft", function(){
		
		var btn_save_draft = $(this);
		var tkid = $("#TK_ID").val();
		
		if(tkid=="")
		{
			$("#message").noty({
				text: "ไม่มีข้อมูลที่จะบันทึกแบบร่างได้",
				type: 'error',
				dismissQueue: true,
				//killer: true,
				timeout: 4000
			});
			return false;
		}
		btn_save_draft.attr('disabled','disabled');
		
		$("#message").noty({
			// layout: 'top',
			text: "กดยืนยันเการบันทึกแบบร่าง",
			type: 'confirm',
			dismissQueue: false,
			force: true,
			maxVisible: 1,
			buttons     : [
				{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					$noty.close();
					
					$.ajax({
						type: 'POST',
						url: BASE_URL+'transaction/save_draft_move',
						data: {
							main_ticket: $("#main_ticket").serialize()
							// ticket_detail: $("#ticket_detail").serialize()
						},
						dataType: 'json',
						success: function(data){
							if(data.result == true){
								btn_save_draft.removeAttr('disabled');
								alert('บันทึกแบบร่างเรียบร้อยแล้ว');
								window.location.href = BASE_URL+'transaction/draft_list';
							}else{
								btn_save_draft.removeAttr('disabled');
								alert('ไม่สามารถบันทึกแบบร่างได้ โปรดติดต่อผู้ดูแลระบบ');
								
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
						btn_save_draft.removeAttr('disabled');

					}
				}
			]
			
		});
		

	});
	
	$("#btn_cancel_all").click(function(){

		var btn_cancel = $(this);
		var tkid = $("#TK_ID").val();
		var autoid = $("#Transaction_AutoID").val();
		
		if(autoid == '')
		{
			$("#message").noty({
				text: "ไม่มีรายการที่สามารถยกเลิกได้",
				type: 'error',
				dismissQueue: true,
				//killer: true,
				timeout: 4000
			});
			return false;
		}
		btn_cancel.attr('disabled','disabled');
		
		$("#message").noty({
			// layout: 'top',
			text: "กดยื่นยันเพื่อยกเลิก",
			type: 'confirm',
			dismissQueue: false,
			force: true,
			maxVisible: 1,
			buttons     : [
				{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					
					$(this).attr('disabled','disabled');
					$noty.close();
					
					$.ajax({
						type: 'GET',
						url: BASE_URL+'move/cancel_all/'+autoid,
						dataType: 'html',
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
							alert('ยกเลิกการจองสินค้าทั้งหมดเรียบร้อยแล้ว');
							window.location.href = BASE_URL+'move/add';
						}
						});
					}
				},
				{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
						$noty.close();
						btn_cancel.removeAttr('disabled');
					}
				}
			]
			
		});
	});
	
	
		
}); //document.ready
	
	
	
	

