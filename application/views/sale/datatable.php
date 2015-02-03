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
		                <th>เลขที่ใบสั่งขาย</th>
		                <th>สำหรับ</th>
		                <th>เลขที่ใบจอง</th>
		                <th>จำนวนรายการ</th>
		                <th>ลูกค้า</th>
		                <th>วันที่ส่งของ</th>
		                <th>วันที่ออกใบสั่งขาย</th>
		                <th>ผู้ออกใบสั่งขาย</th>
		                <th>สถานะ</th>
		                <th style="width: 150px;">action</th>
		            </tr>
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id="filter">เลขที่ใบสั่งขาย</th>
		                <th>สำหรับ</th>
		                <th id="filter">เลขที่ใบจอง</th>
		                <th>จำนวนรายการ</th>
		                <th id="filter">ลูกค้า</th>
		                <th>วันที่ส่งของ</th>
		                <th>วันที่ออกใบสั่งขาย</th>
		                <th>ผู้ออกใบสั่งขาย</th>
		                <th>สถานะ</th>
		                <th>action</th>
		            </tr>
		        </tfoot>
 
    		</table>
		</div>
	</div>
	
</div> <!-- end .container-fluid -->
