<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h4><?php echo $title;?> <small><a href="<?php echo $create_link;?>" class="btn btn-info btn-sm"> <?php echo $create_text?></a></small></h4>
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
		                <th>Ticket ID</th>
		                <th>รายละเอียด</th>
		                <th>ผู้บันทึก</th>
		                <th>รหัสลูกค้า</th>
		                <th>วันที่บันทึก</th>
		                <th></th>
		                <th></th>
		                <th>Action</th>
		            </tr>
		        	
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id="filter">Ticket ID</th>
		                <th id="filter">รายละเอียด</th>
		                <th id="filter">ผู้บันทึก</th>
		                <th id="filter">รหัสลูกค้า</th>
		                <th id="filter">วันที่บันทึก</th>
		                <th></th>
		                <th></th>
		                <th></th>
		            </tr>
		        </tfoot>
 
    		</table>
		</div>
	</div>
	
</div> <!-- end .container-fluid -->
