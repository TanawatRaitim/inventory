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
	</div>
	<div class="row">
		

		<div class="col-md-12">

			<div class="table-responsive">
				<table class="table table-condensed table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">เลขที่</th>
							<th class="text-center">เพื่อนำไปใช้เป็น</th>
							<th class="text-center">จำนวนรายการ</th>
							<th class="text-center">วันที่จอง</th>
							<th class="text-center">วันที่ส่งของ</th>
							<th class="text-center">ผู้ทำการจอง</th>
							<th class="text-center">สถานะ</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td class="text-center">RL-57-08-001</td>
							<td>โอนย้าย (RL)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">ปฏิเสธ</td>
							<td style="width:250px;">
								<a href="/inventory/reserve/detail" class="btn btn-danger btn-xs">View Detail(WAR)</a>  <a href="/inventory/reserve/approve" class="btn btn-info btn-xs">View Detail(ACC)</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td class="text-center">RL-57-08-002</td>
							<td>โอนย้าย (RL)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">ปฏิเสธ</td>
							<td style="width:250px;">
								<a href="/inventory/reserve/detail" class="btn btn-danger btn-xs">View Detail(WAR)</a>  <a href="/inventory/reserve/approve" class="btn btn-info btn-xs">View Detail(ACC)</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">3</td>
							<td class="text-center">RL-57-08-003</td>
							<td>โอนย้าย (RL)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">ปฏิเสธ</td>
							<td style="width:250px;">
								<a href="/inventory/reserve/detail" class="btn btn-danger btn-xs">View Detail(WAR)</a>  <a href="/inventory/reserve/approve" class="btn btn-info btn-xs">View Detail(ACC)</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">4</td>
							<td class="text-center">RL-57-08-004</td>
							<td>โอนย้าย (RL)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">ปฏิเสธ</td>
							<td style="width:250px;">
								<a href="/inventory/reserve/detail" class="btn btn-danger btn-xs">View Detail(WAR)</a>  <a href="/inventory/reserve/approve" class="btn btn-info btn-xs">View Detail(ACC)</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">5</td>
							<td class="text-center">RL-57-08-005</td>
							<td>โอนย้าย (RL)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">ปฏิเสธ</td>
							<td style="width:250px;">
								<a href="/inventory/reserve/detail" class="btn btn-danger btn-xs">View Detail(WAR)</a>  <a href="/inventory/reserve/approve" class="btn btn-info btn-xs">View Detail(ACC)</a>
							</td>
						</tr>
						
						
						
					</tbody>
					<tfoot>
						<!-- <tr>
							<td colspan="2" class="text-center">รวม</td>
							<td></td>
							<td class="text-center">30</td>
							<td class="text-center">40</td>
							<td class="text-center">0</td>
							<td></td>
							<td></td>
						</tr> -->
					</tfoot>
				</table>
			</div>
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

