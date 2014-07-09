<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h4><?php echo $title;?> <small><a href="<?php echo site_url('reserve/add')?>" class="btn btn-sm btn-success">จองสินค้า</a></small></h4>
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
		<div class="col-md-8">
			<ul class="pagination pagination-sm">
			  <li><a href="#">&laquo;</a></li>
			  <li class="active"><a href="#">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li><a href="#">&raquo;</a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<div class="input-group">
		      <input type="text" class="form-control input-sm">
		      <span class="input-group-btn">
		        <button class="btn btn-default btn-sm" type="button">Search!</button>
		      </span>
		    </div><!-- /input-group -->
		</div>	
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>วันที่จอง</th>
						<th>ผู้จอง</th>
						<th>จำนวนที่จอง</th>
						<th>สถานะ</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>xx-xx-xxxx</td>
						<td>dd-mm-yyyy</td>
						<td>คุณxxxxxx</td>
						<td>250</td>
						<td></td>
						<td>
							<div class="btn-group btn-group-xs">
								<button type="button" class="btn btn-primary">ดู</button>
							  <button type="button" class="btn btn-success">แก้ไข</button>
							  <button type="button" class="btn btn-warning">ยกเลิก</button>
							  <button type="button" class="btn btn-danger">ลบ</button>
							</div>
						</td>
					</tr>
					<tr>
						<td>xx-xx-xxxx</td>
						<td>dd-mm-yyyy</td>
						<td>คุณxxxxxx</td>
						<td>250</td>
						<td></td>
						<td>
							<div class="btn-group btn-group-xs">
								<button type="button" class="btn btn-primary">ดู</button>
							  <button type="button" class="btn btn-success">แก้ไข</button>
							  <button type="button" class="btn btn-warning">ยกเลิก</button>
							  <button type="button" class="btn btn-danger">ลบ</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	
</div> <!-- end .container-fluid -->