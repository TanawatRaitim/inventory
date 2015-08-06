$(function(){
	//table id
	var customer_id = $("#customer_id").val();
	var table_id = 'datatable';
	
	//Set up - add a text input to each footer cell
	$("#datatable tfoot th#filter").each(function(){
		var title = $("#datatable thead th").eq($(this).index()).text();
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
		"lengthChange": true,
		"pageLength":5,
		"order": [],
		"dom": 'T<"clear">lfrtip',
		// 'filter': false,
        "ajax": BASE_URL+'customer/get_customer_transaction/'+ customer_id,
        "stateSave": false,
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
        	{
        		"data":"TK_ID",
        		"render": function(data, type, meta){
        			return meta.tkcode+meta.TK_ID;
        		}
        	},
        	{
        		"data":"tkdescription",
        		"render": function(data, type, meta){
        			return meta.tkdescription + " (" + meta.tkfor + ")";
        		}
        	},
        	// {"data":"count"},
        	{"data":"QTY_Good"},
        	{"data":"QTY_Waste"},
        	{"data":"QTY_Damage"},
        	{"data":"reserve_date"},
        	/*
        	{
        		"data":"reserve_date"
        		
        	},
        	*/
        	/*
        	{
        		"data":"Transport_Date",
        		"render": function(data, type, row){
        			//return data;
        			if(data == '1900-01-01'){
        				return "N/A";
        			}
        			
        			return data;
        		}
        		
        	},
        	*/
        	
        	{"data":"Emp_FnameTH"},
        	
        	/*
        	{
        		"data":"IsApproved",
        		"render": function(data, type, meta){
        			if(meta.IsApproved == 0 && meta.IsReject == 0){
        				return "รอการอนุมัติ";
        				//return "อนุมัติแล้ว";
        			}else if(meta.IsApproved == 1 && meta.IsReject == 0){
        				return "อนุมัติแล้ว";
        			}else if(meta.IsApproved == 0 && meta.IsReject == 1){
        				return "ปฎิเสธการจอง";
        			}
        		}
        	},
        	{
        		// "width": "10%",
        		"render": function(data, type, row){
        			//return "button";
        			console.log(row);
        			return "<a data-toggle='tooltip' title='ดูรายละเอียด' class='btn btn-xs btn-danger' href='view_detail/"+row.TK_ID+"'>View Detail</a>";
        		}
        	}
        	
        	*/
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
	
	//select row
	$('#datatable tbody').on( 'click', 'tr', function () {
    	$(this).toggleClass('danger');
    } );
});