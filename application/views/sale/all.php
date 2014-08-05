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
							<th class="text-center">เลขที่การตัดขาย</th>
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
							<td class="text-center">RS-57-08-001</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">2</td>
							<td class="text-center">RS-57-08-002</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">3</td>
							<td class="text-center">RS-57-08-003</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">4</td>
							<td class="text-center">RS-57-08-004</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">5</td>
							<td class="text-center">RS-57-08-005</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">6</td>
							<td class="text-center">RS-57-08-006</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">7</td>
							<td class="text-center">RS-57-08-007</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">8</td>
							<td class="text-center">RS-57-08-008</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">9</td>
							<td class="text-center">RS-57-08-009</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">10</td>
							<td class="text-center">RS-57-08-010</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">11</td>
							<td class="text-center">RS-57-08-011</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">12</td>
							<td class="text-center">RS-57-08-012</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">13</td>
							<td class="text-center">RS-57-08-013</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">14</td>
							<td class="text-center">RS-57-08-0141</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">15</td>
							<td class="text-center">RS-57-08-015</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">16</td>
							<td class="text-center">RS-57-08-016</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">17</td>
							<td class="text-center">RS-57-08-017</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">18</td>
							<td class="text-center">RS-57-08-018</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">19</td>
							<td class="text-center">RS-57-08-019</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">20</td>
							<td class="text-center">RS-57-08-020</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">21</td>
							<td class="text-center">RS-57-08-021</td>
							<td>ตัดขาย-ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</td>
							<td class="text-center">10</td>
							<td class="text-center">04/08/2014</td>
							<td class="text-center">06/08/2014</td>
							<td class="text-center">prapaporn.s</td>
							<td class="text-center">รออนุมัติ</td>
							<td style="width:20px;">
								<div class="btn-group btn-group-xs">
								  <button type="button" class="btn btn-info">View Detail</button>
								  <!-- <button type="button" class="btn btn-default">Middle</button>
								  <button type="button" class="btn btn-default">Right</button> -->
								</div>
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

