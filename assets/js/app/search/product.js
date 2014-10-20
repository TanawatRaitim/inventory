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
	        "ajax": 'get_product_datatable',
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
	        			// console.log(meta);
	        			var img_path = meta.Product_Photo;
	        			var tooltip = "<a href='#' class='' title='"+data+" # "+meta.Product_Vol+"' data-trigger='hover' data-content='<img height=250 src=/inventory/assets/uploads/img/products/"+ img_path +">' >"+data+" # "+meta.Product_Vol+"</a>";
	        			//var tooltip = "<a href='#' class='' title='"+data+" # "+meta.Product_Vol+"' data-trigger='hover' data-content='<img height=250 src=/inventory/assets/uploads/img/products/"+ img_path +">' >"+img_path+"</a>";
	        			return tooltip;
	        			//return img_path;
	        			
	        		},
	        		"fnCreatedCell": function(nTd, sData, oData, iRow, iCol){
			        	$("a", nTd).popover({
			        		html: 'false'
			        	});
			        }
			        // "width": "auto"
	        		
	        	},
	        	{"data":"Product_Vol"},
	        	{"data":"ProCat_Name"},
	        	{"data":"ProGroup_Name"},
	        	{"data":"ProType_Name"},
	        	{"data":"ProFreq_Name"},
	        	{
	        		// "width": "10%",
	        		"render": function(data, type, row){
	        			//return "<a data-toggle='tooltip' title='ดูรายละเอียด' class='btn btn-xs btn-primary' href='product/show/"+row.Product_AutoID+"'>ดู</a> <a data-toggle='tooltip' title='แก้ไข' class='btn btn-xs btn-warning' href='product/edit/"+row.Product_AutoID+"'>แก้ไข</a> <a data-toggle='tooltip' title='ลบ'  class='btn btn-xs btn-danger' href='product/delete/"+row.Product_AutoID+"'>ลบ</a>";
	        			//return "<a title='ดูรายละเอียด' class='btn btn-xs btn-primary' href='product/show/"+row.Product_AutoID+"'>ดู</a> <a title='แก้ไข' class='btn btn-xs btn-warning' href='product/edit/"+row.Product_AutoID+"'>แก้ไข</a> <a title='ลบ'  class='btn btn-xs btn-danger' href='product/delete/"+row.Product_AutoID+"'>ลบ</a>";
	        			// return 'big';
	        			return "<a title='ดูรายละเอียด' target='_blank' class='btn btn-xs btn-primary' href='/inventory/product/show/"+row.Product_AutoID+"'>ดูรายละเอียด</a> <a title='แก้ไข' target='_blank' class='btn btn-xs btn-warning' href='/inventory/product/update_get/"+row.Product_AutoID+"'>แก้ไข</a> ";
	        		},
	        		//"fnCreatedCell": function(nTd, sData, oData, iRow, iCol){
	        			/*
			        	$("a", nTd).tooltip({
			        		html: 'false'
			        	});
			        	*/
			        //}
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