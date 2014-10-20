$(function() {
	
	$("#TK_ID").val("");
	$("#Transact_AutoID").val("");
		
		
	$("#Product_ID").select2({
		placeholder: 'Product ID',
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
				$("#table_qty").load('table_qty/'+data.Product_ID);
				$("#Effect_Stock_AutoID").val(data.Main_Inventory);
				
			},
			beforeSend: function(){
			},
			complete: function(){
			}
		});

	});
		
	$("#Cust_ID").select2({
		
		placeholder: 'Customer ID',
		dropdownAutoWidth: true,
		minimumInputLength: 2,
		ajax: {
			url: 'customer_list',
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
			var id = $(element).data("customer_id");
			var text = $(element).data("customer_text");
			callback({id:id, text:text});
		}
	}).select2('val', []).on('select2-selecting',function(e){
		$.ajax({
			type: 'POST',
			url: 'get_customer',
			data: {id: e.val},
			dataType: 'json',
			success: function(data){
				var detail = data.custname + "("+data.custtype+") <br />";
				detail += data.custdetail+" "+data.tumbon+" "+data.amphur+" "+data.province;
				$("#customer_detail").html(detail);
			},
			beforeSend: function(){
			},
			complete: function(){
			}
		});

	});
	
	$("#DocRef_Date, #Transport_Date").datetimepicker({
		pickTime: false,
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
		},submitHandler: function(form){
			
			//check product id
			if($("#Product_ID").val()==""){
				alert("กรุณาเลือกสินค้าก่อน");
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
							
							alert("บันทึกรายการสินค้า"+product_name+"เรียบร้อยแล้ว");
							
							var rows = $("#record_saved > tbody >tr").size();
							$("#total_record").html("บันทึกไปแล้วจำนวน <strong>"+rows+"</strong> รายการ");
							
							$("#Product_ID").select2("val","");
							$("#Effect_Stock_AutoID").val(0);
							$("#QTY_Good").val(0);
							$("#QTY_Waste").val(0);
							$("#QTY_Damage").val(0);
							$("#product_receive").val(0);
							$("#Product_ID").select2('focus');
		
						},
						beforeSend: function(){
							
							},
						complete: function(){
							}
						});
				}else{
					alert(data.valid);
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
		var result = confirm("ต้องการลบรายการ "+ product +"");
		
		if(result == false){
			return false;
		}
		
		$.ajax({
			type: 'POST',
			url: 'delete_ticket_detail',
			data: {
				stock: $(this).data('stock'),
				product_id: $(this).data('productid'),
				autoid: $(this).data('autoid')
				},
			dataType: 'html',
			success: function(data){
				element.parents("tr").remove();
				var rows = $("#record_saved > tbody >tr").size();
				
				if(rows != 0){
					$("#total_record").html("บันทึกไปแล้วจำนวน <strong>"+rows+"</strong> รายการ");
				}else{
					$("#total_record").html("ยังไม่มีรายการที่ถูกบันทึก");
				}
				
				
			},
			beforeSend: function(){
			},
			complete: function(){
			}
		});
	});
	
	//validate save rs
	$("form#main_ticket").validate({
		errorPlacement: function(error, element){
			
		},
		ignore: null,
		invalidHandler: function(e, validator){
			alert('invalidHandler');
			return false;
		},submitHandler: function(form){
			var tkid = $("#TK_ID").val();
		
			if(tkid == "")
			{
				alert('ไม่่สามารถบันทึกข้อมูลได้ เนื่อง่จากยังไม่มีรายละเอียดการจอง');
				return false;
			}
			
			$("#message").noty({
				// layout: 'top',
				text: "กดยื่นยันการจองสินค้า",
				type: 'confirm',
				dismissQueue: false,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
						$noty.close();
						var tkid = $("#TK_ID").val();
						
						$.ajax({
							type: 'GET',
							url: 'check_save_rs/'+ tkid,		//check before save
							data: {
								},
							dataType: 'json',
							// async: false,
							success: function(data){
								if(data.status == true){
									$.ajax({
										type: 'POST',
										url: 'save_rs',
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
								}else{
									alert('valid');
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
				min:1
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
	
	$("#btn_save_rs").click(function(e){
		$("form#main_ticket").submit();
	});
	
	$("#btn_save_draft").click(function(){
		
		var btn_save_draft = $(this);
		var tkid = $("#TK_ID").val();
		
		if(tkid=="")
		{
			alert('ไม่มีข้อมูลที่จะบันทึกแบบร่างได้');
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
						url: 'save_draft/'+ tkid,
						dataType: 'html',
						success: function(data){
							
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
		
		if(tkid == '')
		{
			alert("ไม่มีรายการที่สามารถยกเลิกได้");
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
					$noty.close();
					
					$.ajax({
						type: 'GET',
						url: 'cancel_all/'+tkid,
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
	
	
	
	

