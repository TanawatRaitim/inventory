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
	        "ajax": 'product/get_data',
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
	        	{"data": "Product_ID"},
	        	{
	        		"data":"Product_Name",
	        		"render": function(data, type, meta){
	        			var img_path = meta.prod_images;
	        			var tooltip = "<a href='#' class='text-danger' title='"+data+" # "+meta.book_num+"' data-trigger='hover' data-content='<img height=250 src=assets/images/product_test/"+img_path+">' >"+data+" # "+meta.book_num+"</a>";
	        			return tooltip;
	        		},
	        		"fnCreatedCell": function(nTd, sData, oData, iRow, iCol){
			        	$("a", nTd).popover({
			        		html: 'false'
			        	});
			        }
			        // "width": "auto"
	        		
	        	},
	        	{"data":"Product_Vol"},
	        	{"data":"ProCate_ID"},
	        	{"data":"ProGroup_ID"},
	        	{"data":"ProType_ID"},
	        	{"data":"ProFreq_ID"},
	        	{
	        		// "width": "10%",
	        		"render": function(data, type, row){
	        			return "<a data-toggle='tooltip' title='ดูรายละเอียด' class='btn btn-xs btn-primary' href='product/show/"+row.Product_AutoID+"'>ดู</a> <a data-toggle='tooltip' title='แก้ไข' class='btn btn-xs btn-warning' href='product/edit/"+row.Product_AutoID+"'>แก้ไข</a> <a data-toggle='tooltip' title='ลบ'  class='btn btn-xs btn-danger' href='product/delete/"+row.Product_AutoID+"'>ลบ</a>";
	        		},
	        		"fnCreatedCell": function(nTd, sData, oData, iRow, iCol){
			        	$("a", nTd).tooltip({
			        		html: 'false'
			        	});
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
	    
	    //prevent default product link
	    $('body').on('click','a#product_tooltip',function(e){
	    	e.preventDefault();
	    });
	    
	 
	});