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
	
	$("#btn_gen_id").tooltip();
	$("#TK_ID").val("");
	$("#Transact_AutoID").val("");
// 	
	// $(window).on("beforeunload", function(){
		// alert('before unload');
	// });
// 	
	// window.onbeforeunload = function(){
		// alert('big');
	// };
	
	
	/*
	$(document).on('click','#test_edit',function(e){
		e.preventDefault();
		// e.stopPropagation();
		$(this).editable({
			success: function(response, newValue){
			}
		});
	});
	*/
	
	
		$("#test_noty").click(function(){
			
			$("#message").noty({
				// layout: 'top',
				text: "Do you want to continue?",
				type: 'error',
				dismissQueue: true,
				buttons     : [
					{addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {

						// this = button element
						// $noty = $noty element

						$noty.close();
						$("#message").noty({force: true, text: 'You clicked "Ok" button', type: 'success'});
					}
					},
					{addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
							$noty.close();
							$("#message").noty({force: true, text: 'You clicked "Cancel" button', type: 'error'});
						}
					}
				]
				
			});
			
			noty({
				layout: 'top',
				text: "hello noty",
				type: 'warning',
				dismissQueue: true
			});
		});
		
		
		
		$("#Product_ID").select2({
			
			placeholder: 'Product ID',
			dropdownAutoWidth: true,
			minimumInputLength: 2,
			ajax: {
				url: 'product_list',
				type: 'POST',
				dataType: 'json',
				data: function(term, page){
					// console.log(page);
					return {
						q: term
					};
				},
				results: function(data, page){
					// console.log(data.id);
					return {
						results: data
					};
				}
			},
			formatSelection: format,
			initSelection: function(element, callback){
				//console.log(element);
				var id = $(element).data("Product_ID");
				var text = $(element).data("product_text");
				callback({id:id, text:text});
			}
		}).select2('val', []).on('select2-selecting',function(e){
			// console.log(e);
			// alert(e.val);
			$.ajax({
				type: 'POST',
				url: 'get_product',
				data: {id: e.val},
				dataType: 'json',
				success: function(data){

					$("#p_img").attr("src","../assets/images/product_test/"+ data.prod_images);
					$("#Effect_Stock_AutoID").val(data.prod_st);
				},
				beforeSend: function(){
					// alert('before_send');
					//load indicator
				},
				complete: function(){
					//remove indicator
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
					// console.log(page);
					return {
						q: term
					};
				},
				results: function(data, page){
					// console.log(data.id);
					return {
						results: data
					};
				}
			},
			formatSelection: format,
			initSelection: function(element, callback){
				//console.log(element);
				var id = $(element).data("customer_id");
				var text = $(element).data("customer_text");
				callback({id:id, text:text});
			}
		}).select2('val', []).on('select2-selecting',function(e){
			// console.log(e);
			// alert(e.val);
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
					// alert('before_send');
					//load indicator
				},
				complete: function(){
					//remove indicator
				}
			});

		});
		
		$("#DocRef_Date, #Transport_Date").datetimepicker({
			pickTime: false,
			// keyboardNavigation: true
		});


		$("#QTY_Good, #QTY_Damage, #QTY_Waste").blur(function(e) {
			// alert('on blur');
			var total_receive = parseInt($("#QTY_Good").val()) + parseInt($("#QTY_Waste").val()) + parseInt($("#QTY_Damage").val());

			$("#product_receive").val(total_receive);
		});
		
		
		$("input, select").keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****
			
		$("#btn_add_detail").on("click keydown",function(e){
			
			//validate here
				
			if(e.type == 'keydown')
			{
				if(e.keyCode != 13){
					return false;
				}
			}
			
			
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
					
					
					
					var append_row = '<tr><td>'+product_name+'</td><td class="text-center">'+Effect_Stock_AutoID+'</td><td class="text-center">'+QTY_Good+'</td><td class="text-center">'+QTY_Waste+'</td><td class="text-center">'+QTY_Damage+'</td><td class="text-center">'+total+'</td><td><span id="btn_delete_record" class="glyphicon glyphicon-remove" style="color: red;"></span></tr>';
					
					var row_data = '<tr><td>'+product_name+'</td><td class="text-center">';
					row_data += Effect_Stock_AutoID+'</td><td class="text-center"><a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Good+'</a>';
					row_data += '</td><td class="text-center"><a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Waste+'</a></td><td class="text-center">';
					row_data += '<a href="#" id="test_edit" data-type="text" data-pk="3" data-url="editable" data-title="">'+QTY_Damage+'</a></td><td class="text-center" id="record_toal">'+total;
					row_data += '</td><td><span id="btn_delete_record" class="glyphicon glyphicon-remove cursor-pointer" style="color: red; ;"></span></tr>';
					
					$("#record_saved > tbody").append(row_data);
					
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

					//load indicator
				},
				complete: function(){
					//remove indicator
				}
			});
			
			
			

		});	
		
		
		
		$("body").on('click',"#btn_delete_record",function(e){
			
			$.ajax({
				type: 'POST',
				url: 'delete_ticket_detail',
				data: {
					main_ticket: $("#main_ticket").serialize(),
					ticket_detail: $("#ticket_detail").serialize()
					},
				dataType: 'json',
				success: function(data){
					
				},
				beforeSend: function(){

					//load indicator
				},
				complete: function(){
					//remove indicator
				}
			});
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			// alert('deleted');
			$(this).parents("tr").remove();
			var rows = $("#record_saved > tbody >tr").size();
			// console.log(rows);
			
			if(rows != 0){
				$("#total_record").html("บันทึกไปแล้วจำนวน <strong>"+rows+"</strong> รายการ");
			}else{
				$("#total_record").html("ยังไม่มีรายการที่ถูกบันทึก");
			}
			

		});
		
		
			
			
	}); //document.ready
	
	
	
	

