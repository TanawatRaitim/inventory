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
	
	$("#Transaction_AutoID").val("");
	
	$("#DocRef_Date").datetimepicker({
		pickTime: false
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
			url: 'product_list',
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
			url: 'get_product',
			data: {id: e.val},
			dataType: 'json',
			success: function(data){
				//load product information
				$("#table_qty").load('table_qty/'+data.Product_ID);
				//load premium information
				$("#table_premium").load('table_premium/'+data.Product_ID);
				//set default stock
				$("#Effect_Stock_AutoID").val(data.Main_Inventory);
				
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
				
				$("form#ticket_detail").submit();
				
			},
			rules:{
				TK_ID:{
					required:true
				},
				TK_Code:{
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
			url: 'check_new_data',
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
						url: 'insert_transaction',
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
							$("#TK_Code").attr('readonly','readonly');
							
							//alert('big');
							
							var product_name = $("#Product_ID").val();
							var Effect_Stock_AutoID = $("#Effect_Stock_AutoID option:selected").text();
							var QTY_Good = parseInt($("#QTY_Good").val());
							var QTY_Waste = parseInt($("#QTY_Waste").val());
							var QTY_Damage = parseInt($("#QTY_Damage").val());
							var total = parseInt($("#product_receive").val());
							
							var row_data = '<tr><td>'+product_name+'</td><td class="text-center">';
							row_data += Effect_Stock_AutoID+'</td><td class="text-center">'+QTY_Good;
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
						url: 'delete_ticket_detail',
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
		
		var tkid = $("#TK_ID").val();
		
			if(tkid == "")
			{
				$("#message").noty({
					text: "ไม่่สามารถบันทึกข้อมูลได้ เนื่อง่จากยังไม่มีรายละเอียดการจอง",
					type: 'error',
					dismissQueue: true,
					//killer: true,
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
						
						$.ajax({
							type: 'POST',
							url: 'save_in',
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
									window.location.href = 'add';
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
		var autoid = $("#Transaction_AutoID").val();
		
		if(autoid=="")
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
			text: "กดยื่นยันเการบันทึกแบบร่าง",
			type: 'confirm',
			dismissQueue: false,
			force: true,
			maxVisible: 1,
			buttons     : [
				{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					$noty.close();
					
					$.ajax({
						type: 'GET',
						url: 'save_draft/'+ autoid,
						dataType: 'html',
						success: function(data){
							
							},
						beforeSend: function(){
							$("#message").noty({
								text: "บันทึกแบบร่างเรียบร้อยแล้ว",
								type: 'success',
								dismissQueue: true,
								//killer: true,
								timeout: 4000
							});
						},
						complete: function(){
							btn_save_draft.removeAttr('disabled');
							
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
					$noty.close();
					$(this).attr('disabled','disabled');
					
					$.ajax({
						type: 'GET',
						url: 'cancel_all/'+autoid,
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
							window.location.href = 'add';
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
	
	
	
	

