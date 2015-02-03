$(function(){
		
	//table id
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
        "ajax": 'get_sale_used',
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
        	
        	{"data":"DocRef_No"},
        	{"data":"count"},
        	{
        		"data":"Cust_Name"
        		
        	},
        	{
        		"data":"Transport_Date",
        		"render": function(data, type, row){
        			if(data == '1900-01-01'){
        				return "N/A";
        			}
        			
        			return data;
        		}
        		
        	},
        	{
        		"data":"sale_date"
        		
        	},
        	
        	
        	{"data":"Emp_FnameTH"},
        	{
        		"data":"IsApproved",
        		"render": function(data, type, meta){
        			if(meta.IsUsed == 1){
        				return "ออกใบสั่งขายแล้ว";
        			}else{
        				return "N/A";
        			}
        		}
        	},
        	{
        		// "width": "10%",
        		"render": function(data, type, row){
        			return "<a data-toggle='tooltip' title='ดูรายละเอียด' class='btn btn-xs btn-danger' href='view_used_detail/"+row.TK_Code+"/"+row.TK_ID+"'>View Detail</a>&nbsp;<a data-toggle='tooltip' class='btn btn-xs btn-success' target='_blank' href='/inventory/report/packing_info/"+row.Transact_AutoID+"'>Print ใบส่งของ</a>";
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
	
	//select row
	$('#example tbody').on( 'click', 'tr', function () {
    	$(this).toggleClass('danger');
    } );
});
