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
							<th class="text-center">เลขที่ใบสั่งขาย</th>
							<th class="text-center">จากข้อมูลเลขที่ใบจอง</th>
							<th class="text-center">จำนวนรายการ</th>
							<th class="text-center">วันที่บันทึกใบสั่งขาย</th>
							<th class="text-center">ผู้ทำรายการ</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">3</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">4</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">5</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">6</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">7</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">8</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
							</td>
						</tr>
						<tr>
							<td class="text-center">9</td>
							<td class="text-center">SA-57-06-2001</td>
							<td class="text-center">RS-57-08-001</td>
							<td class="text-center">10</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td style="width:20px;">
								  <a href="/inventory/sale/approve" class="btn btn-info btn-xs">View Detail</a>
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

