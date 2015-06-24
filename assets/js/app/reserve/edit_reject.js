function format_product(state){
	return state.present;
}

function format_customer(state){
	return state.text;
}

function format(state)
{
	return state.id;
}

$(function() {
	
	$.ajaxSetup({
		cache: false
	});

	$("#DocRef_Date, #Transport_Date").datetimepicker({
		pickTime: false,
		useCurrent: false
		// useStrict: "strict"
	});
	
	$("#DocRef_Date, #Transport_Date").mask('00/00/0000',{clearIfNotMatch: true});
	
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
				$("#table_qty").load(BASE_URL+'product/table_qty/'+data.Product_ID);
				$("#table_premium").load(BASE_URL+'product/table_premium/'+data.Product_ID);
				$("#Effect_Stock_AutoID").val(data.Main_Inventory);
				$("#btn_add_detail").removeAttr('disabled');
			},
			beforeSend: function(){
				
			},
			complete: function(){
				$("#btn_add_detail").removeAttr('disabled');
			}
		});

	});
		
	$("#Cust_ID").select2({
		
		placeholder: 'Customer ID',
		openOnEnter: false,
		dropdownAutoWidth: true,
		minimumInputLength: 2,
		ajax: {
			url: BASE_URL+'customer/select2_customer',
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
			
			var id = $(element).data("init-text");
			var text = $(element).data("init-text");
			callback({id:id, text:text});
		}
	}).select2('val', []).on('select2-selecting',function(e){
		$.ajax({
			type: 'POST',
			url: BASE_URL+'customer/get_customer_json',
			data: {id: e.val},
			dataType: 'json',
			success: function(data){
				var detail = data.Cust_Name + "("+data.Cust_Contact+") <br />";
				detail += data.Cust_Addr;
				$("#customer_detail").html(detail);
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
			
			//check product id
			if($("#Product_ID").val()==""){
				//alert("กรุณาเลือกสินค้าก่อน");
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
					text: 'คุณไม่สามารถจองสินค้ารวม น้อยกว่าหรือเท่ากับ 0 ได้',
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				
				return false;
			}
			
			$.ajax({
			type: 'POST',
			url: BASE_URL+'transaction/check_new_rs_data',
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
						url: BASE_URL+'transaction/insert_transaction',
						data: {
							main_ticket: $("#main_ticket").serialize(),
							ticket_detail: $("#ticket_detail").serialize()
							},
						dataType: 'json',
						success: function(data){
							$("#TK_ID").val(data.TK_ID);
							$("#TK_ID_Present").html(data.TK_ID);
							$("#Transact_AutoID").html(data.Transact_AutoID);
							
							//console.log(data);
							
							var product_name = $("#Product_ID").val();
							var Effect_Stock_AutoID = $("#Effect_Stock_AutoID option:selected").text();
							var QTY_Good = parseInt($("#QTY_Good").val());
							var QTY_Waste = parseInt($("#QTY_Waste").val());
							var QTY_Damage = parseInt($("#QTY_Damage").val());
							var total = parseInt($("#product_receive").val());
							
							var row_data = '<tr title="'+data.Product_Name+'"><td>'+product_name+'</td><td class="text-center">';
							row_data += Effect_Stock_AutoID+'</td><td class="text-center">'+QTY_Good;
							row_data += '</td><td class="text-center">'+QTY_Waste+'</td><td class="text-center">';
							row_data += ''+QTY_Damage+'</td><td class="text-center" id="record_toal">'+total;
							row_data += '</td><td><span id="btn_delete_record" data-productid="'+ data.Product_ID +'" data-autoid="'+ data.Transact_AutoID +'" data-stock="'+ data.Effect_Stock_AutoID +'" class="glyphicon glyphicon-remove cursor-pointer" style="color: red;"></span></tr>';
							
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
				$("#btn_add_detail").attr('disabled','disabled');
				
			},
			complete: function(){
				$("#btn_add_detail").removeAttr('disabled');
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
			},
			
			
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
					
					$(this).attr('disabled','disabled');
					
					$.ajax({
						type: 'POST',
						url: BASE_URL+'transaction/delete_detail',
						data: {
							stock: element.data('stock'),
							product_id: element.data('productid'),
							autoid: element.data('autoid')
							},
						dataType: 'html',
						success: function(data){
							
							$noty.close();
							$("#delete_confirm").noty({
								text:'ลบรายการ ' + product + 'เรียบร้อยแล้ว',
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
			
		},submitHandler: function(form){
			var tkid = $("#TK_ID").val();
		
			if(tkid == "")
			{
				$("#message").noty({
					text: "ไม่พบรายการที่ต้องการส่งขออนุมัติ กรุณาตรวจสอบข้อมูลอีกครั้ง !!!",
					type: 'error',
					dismissQueue: true,
					//killer: true,
					timeout: 4000
				});
				return false;
			}
			
			$("#message").noty({
				// layout: 'top',
				text: "กดยื่นยันการจองสินค้า",
				type: 'confirm',
				dismissQueue: false,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						
						$(this).attr('disabled','disabled');
						
						$noty.close();
						var tkid = $("#TK_ID").val();
						
						$.ajax({
							type: 'GET',
							url: BASE_URL+'transaction/check_save_rs/'+ tkid,		//check before save
							data: {
								},
							dataType: 'json',
							// async: false,
							success: function(data){
								if(data.status == true){
									$.ajax({
										type: 'POST',
										url: BASE_URL+'transaction/save_edit_reject',
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
												window.location.href = BASE_URL+'reserve/reject';
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
		
		},
		rules:{
			Transaction_For:{
				required:true
			},
			DocRef_AutoID:{
				min:1
			},
			Transport_By:{
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
	
	$("#btn_save_rs").click(function(e){
		$("form#main_ticket").submit();
	});
	
	
	
	$("#btn_cancel_all").click(function(){

		var btn_cancel = $(this);
		var tkid = $("#TK_ID").val();
		
		if(tkid == '')
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
			text: "กดยื่นยันเพื่อยกเลิกการจองสินค้า",
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
						url: BASE_URL+'transaction/cancel_all/'+tkid,
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
							window.location.href = BASE_URL+'reserve/reject';
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
	
	
	
	

