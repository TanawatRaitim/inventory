<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
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
		<div class="col-md-8">
			<h4><?php echo $title;?> <small><a href="<?php echo $create_link;?>" class="btn btn-info btn-sm"> <?php echo $create_text?></a></small></h4>
		</div>	<!-- end .col-md-6 -->
		
		
	</div> <!-- end .row -->
	
	<div class="row">
		<div class="col-md-12">
			<table id="example" class="table table-bordered table-condensed table-striped table-hover hover">
		        <thead>
		        	<tr>
		                <th>Customer ID</th>
		                <th>Name</th>
		                <th>Contact</th>
		                <th>Address</th>
		                <th>Sub-District</th>
		                <th>District</th>
		                <th>Province</th>
		                <th>Phone</th>
		                <!-- <th></th> -->
		            </tr>
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id="filter">Customer ID</th>
		                <th id="filter">Name</th>
		                <th id="filter">Contact</th>
		                <th id="filter">Address</th>
		                <th id="filter">Sub-District</th>
		                <th id="filter">District</th>
		                <th id="filter">Province</th>
		                <th>Phone</th>
		                <!-- <th></th> -->
		            </tr>
		        </tfoot>
 
    		</table>
		</div>
	</div>
</div> <!-- end .container-fluid -->
