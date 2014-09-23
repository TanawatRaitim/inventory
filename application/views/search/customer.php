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
	</div> <!-- end .row -->
	
	<div class="row">
		<div class="col-md-12">
			<table id="example" class="table table-bordered table-condensed table-striped table-hover hover">
		        <thead>
		        	<tr>
		                <th>Customer ID</th>
		                <th>Name</th>
		                <th>Contact</th>
		                <th>Line</th>
		                <th>Address</th>
		                <th>Phone</th>
		                <th>Fax</th>
		                <th>Email</th>
		                <th style="width: 100px;">action</th>
		                <!-- <th></th> -->
		            </tr>
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id="filter">Customer ID</th>
		                <th id="filter">Name</th>
		                <th id="filter">Contact</th>
		                <th>Line</th>
		                <th id="filter">Address</th>
		                <th>Phone</th>
		                <th>Fax</th>
		                <th>Email</th>
		                <th>action</th>
		        </tfoot>
 
    		</table>
		</div>
	</div>
</div> <!-- end .container-fluid -->
