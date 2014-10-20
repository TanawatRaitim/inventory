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
        "ajax": 'get_reject_all',
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
        	{"data":"count"},
        	{
        		"data":"in_date"
        		
        	},
        	{"data":"Emp_FnameTH"},
        	{
        		"data":"IsApproved",
        		"render": function(data, type, meta){
        			if(meta.IsApproved == 0 && meta.IsReject == 0){
        				return "รอการอนุมัติ";
        				//return "อนุมัติแล้ว";
        			}else if(meta.IsApproved == 1 && meta.IsReject == 0){
        				return "อนุมัติแล้ว";
        			}else if(meta.IsApproved == 0 && meta.IsReject == 1){
        				return "ปฎิเสธ";
        			}else{
        				return 'N/A';
        			}
        		}
        	},
        	{
        		// "width": "10%",
        		"render": function(data, type, row){
        			//return "button";
        			//console.log(row);
        			return "<a data-toggle='tooltip' title='ดูรายละเอียด' class='btn btn-xs btn-danger' href='detail/"+row.Transact_AutoID+"'>View Detail(WAR)</a> <a data-toggle='tooltip' title='แก้ไข' class='btn btn-xs btn-info' href='view_detail/"+row.Transact_AutoID+"'>View Detail(ACC)</a>";
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
