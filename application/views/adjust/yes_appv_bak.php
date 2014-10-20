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
		                <th>เลขที่ใบจอง</th>
		                <th>เพื่อนำไปใช้เป็น</th>
		                <th>จำนวนรายการ</th>
		                <th>วันที่จอง</th>
		                <th>วันที่ส่งของ</th>
		                <th>ผู้ทำการจอง</th>
		                <th>สถานะ</th>
		                <th>action</th>
		            </tr>
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id='filter'>เลขที่ใบจอง</th>
		                <th id="filter">เพื่อนำไปใช้เป็น</th>
		                <th>จำนวนรายการ</th>
		                <th>วันที่จอง</th>
		                <th>วันที่ส่งของ</th>
		                <th>ผู้ทำการจอง</th>
		                <th>สถานะ</th>
		                <th>action</th>
		            </tr>
		        </tfoot>
 
    		</table>
		</div>
	</div>
	
</div> <!-- end .container-fluid -->
