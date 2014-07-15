<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h4><?php echo $title;?></h4>
		</div>	<!-- end .col-md-6 -->
		<div class="col-md-4">
			<ol class="breadcrumb">
				<?php foreach ($breadcrumb as $attr): ?>
					
					<?php if($attr['class'] == 'active'):?>
						<li class="<?php echo $attr['class'];?>"><?php echo $attr['name'];?></li>
					<?php else:?>	
						<li class="<?php echo $attr['class'];?>"><a href="<?php echo $attr['link'];?>"><?php echo $attr['name'];?></a></li>
					<?php endif;?>	
				<?php endforeach ?>
			</ol>
		</div>
		
	</div> <!-- end .row -->
	

	<div class="row">
		<div class="col-md-12">
			<table id="example" class="table table-bordered table-condensed table-striped table-hover hover">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>No.</th>
                <th>Category</th>
                <th>Group</th>
                <th>Type</th>
                <th>Issue</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tfoot>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>No.</th>
                <th>Category</th>
                <th>Group</th>
                <th>Type</th>
                <th>Issue</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
    </table>
		</div>
	</div>
	

	
	
</div> <!-- end .container-fluid -->

<script>
	$(function(){
		
		
		//Set up - add a text input to each footer cell
		$("#example tfoot th").each(function(){
			var title = $("#example thead th").eq($(this).index()).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		});
		
		//Datatable
		
		var table = $('#example').DataTable( {
			//"processing": true,
			//"serverSide": true,
	        "ajax": 'datatable/get_data',
	        "stateSave": true,
	        // "order": [[1, "desc"]],
	        "columns": [
	        	{"data": "prod_id"},
	        	{"data":"prod_name"},
	        	{"data":"book_num"},
	        	{"data":"category_p"},
	        	{"data":"group_p"},
	        	{"data":"type_p"},
	        	{"data":"out_p"},
	        	// {"render": "big"},
				// 	        	
	        	// {
	        		// "data": null,
					// 	        		
	        		// defaultContent: '<a href="datatable/edit/"prod_id class="editor_edit">Edit</a> / <a href="datable/delete" class="editor_remove">Delete</a>'
	        	// },
				// 	        	
	        	{
	        		"render": function(data, type, row){
	        			// return row.id_prod;
	        			//return "<a href='datatable/edit/"+row.id_prod+"' >Edit</a>";
	        			return "<a href='datatable/show/"+row.id_prod+"'>Show</a>|<a href='datatable/edit/"+row.id_prod+"'>Edit</a>|<a href='datatable/delete/"+row.id_prod+"'>Delete</a>";
	        		}
	        	}
	        	
	        ]
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
        	$(this).toggleClass('success');
	    } );
	 
	 
		//rows count
		/* 
	    $('#button').click( function () {
	        alert( table.rows('.selected').data().length +' row(s) selected' );
	    } );
	    */

		
		$("#mytable").dataTable({
			//'info': false,
			//'paging': false
			//"ajax": source
		});
	});
</script>