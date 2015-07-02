$(function() {
	$('input, select').not('#submit').keydown( function (event) { //event==Keyevent
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
	
	//add new record form
	$("form#form_add").validate({
		errorPlacement: function(error, element){
		
		},
		//ignore: null,
		invalidHandler: function(e, validator){
			$("#error_msg").noty({
					text: 'คุณไม่ได้กรอกข้อมูล หรือกรอกข้อมูลซ้ำกับข้อมูลที่มีอยู่ในระบบ',
					type: 'error',
					dismissQueue: true,
					killer: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			var result = confirm('ยืนยันการบันทึกข้อมูล ?');
			
			if(result)
			{
				//alert('confirm');
				form.submit();
			}
			
		},
		rules:{
			Trans_Name:{
				required:true,
				remote: {
					url: BASE_URL + 'setting/check_transport_name',
					type: 'post',
					data: {
						name: function(){
							return $("#Trans_Name").val();
						}
					}
				}
			}
			
		},
		messages: {
			
		}
	}); //end validate
	
	
	//add new record form
	$("form#form_edit").validate({
		errorPlacement: function(error, element){
		
		},
		//ignore: null,
		invalidHandler: function(e, validator){
			$("#error_msg").noty({
					text: 'คุณไม่ได้กรอกข้อมูล หรือกรอกข้อมูลซ้ำกับข้อมูลที่มีอยู่ในระบบ',
					type: 'error',
					dismissQueue: true,
					killer: true,
					timeout: 4000
				});
		},submitHandler: function(form){
			
			var result = confirm('ยืนยันการแก้ไขข้อมูล ?');
			
			if(result)
			{
				form.submit();
			}
			
		},
		rules:{
			Trans_Name:{
				required:true,
				remote: {
					url: BASE_URL + 'setting/check_transport_name/edit',
					type: 'post',
					data: {
						name: function(){
							return $("#Trans_Name").val();
						},
						id: function(){
							return $("#Trans_ID").val();
						}
					}
				}
			}
			
		},
		messages: {
			
		}
	}); //end validate
	
	
	//data table
	//table id for datatable
		var table_id = 'example';
		
		//Set up - add a text input to each footer cell
		$("#example tfoot th#filter").each(function(){
			var title = $("#example thead th").eq($(this).index()).text();
			$(this).html( '<input type="text" class="form-control input-sm" style="width:100%;" placeholder="Search '+title+'" />' );
		});
		
		
		//Datatable
		var table = $("#"+table_id).DataTable( {
			// "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
			"language": {
				"lengthMenu": "แสดง  _MENU_ แถวต่อหน้า",
				"search":"ค้นหา ",
				"info": "แสดงผล _START_ ถึง _END_ จาก _TOTAL_ แถว",
				"paginate": {
			        "first":      "หน้าแรก",
			        "last":       "หน้าสุดท้าย",
			        "next":       "ถัดไป",
			        "previous":   "ก่อนหน้า"
			    }
			},
			"order": [],
			"dom": 'T<"clear">lfrtip',
	        "ajax": BASE_URL+'setting/get_transport_datatable',
	        "stateSave": true,
	        "tableTools": {
	        	"aButtons": [
	        		{
	        			"sExtends": "text",
	        			"sButtonText": "Clear Filtering",
	        			"fnClick": function(nButton, oConfig, oFlash){
	        				var confirmation = confirm('Do you want to reset this table?');
	        				
						    if(confirmation) { 
						        localStorage.removeItem( 'DataTables_'+table_id+'_'+window.location.pathname );
						        location.reload();
						    }
	        			}
	        		}
	        	]
	        },
	        "columns": [
	        	{"data": "Trans_Name"},
	        	{
	        		"render": function(data, type, row){
	        			return "<a title='แก้ไข' class='btn btn-xs btn-warning' href='"+BASE_URL+"setting/transport_get/"+row.Trans_ID+"'>แก้ไข</a> "; 
	        		}
	        	}	
	        ],
	        
	    } );//data table
	    
	    // Apply the filter
    	table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        	} );
    	} );
    
}); 