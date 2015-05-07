<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo $title; ?></h2>
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
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ข้อมูล</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<table class="table table-condensed table-bordered table-striped">
							<tbody>
								<tr>
									<th class="info text-right">เลขที่ใบจอง</th>
									<td colspan="3"><?php echo $transaction['TK_Code'];?><?php echo $transaction['TK_ID'];?></td>
								</tr>
								<tr>
									<th class="info text-right">จองสำหรับ</th>
									<td colspan="3"><?php echo $transaction_for;?> (<?php echo $transaction['Transaction_For'];?>)</td>
								</tr>
								<tr>
									<th class="info text-right">เอกสารอ้างอิง</th>
									<td><?php echo $transaction['DocRef_Name'];?></td>
									<th class="info text-right">อื่นๆ</th>
									<td><?php echo $transaction['DocRef_Other'];?></td>
								</tr>
								<tr>
									<th class="info text-right">เลขที่เอกสารอ้างอิง</th>
									<td><?php echo $transaction['DocRef_No'];?></td>
									<th class="info text-right">วันที่เอกสารอ้างอิง</th>
									<td><?php echo date('d-m-Y',strtotime($transaction['DocRef_Date']));?></td>
								</tr>
								<tr>
									<th class="info text-right">ผู้ทำรายการ</th>
									<td><?php echo $transaction['Emp_FnameTH'];?></td>
									<th class="info text-right">วันที่</th>
									<td><?php echo $transaction['created_date'];?></td>
								</tr>
								<tr>
									<th class="info text-right">สถานะ</th>
									<td colspan="3"><?php echo $description;?></td>
								</tr>
								<tr>
									<th class="info text-right">หมายเหตุ</th>
									<td colspan="3"><?php echo $transaction['Transact_Remark'];?></td>
								</tr>
								<tr>
									<th class="info text-right">หมายเหตุ</th>
									<td colspan="3"><?php echo $transaction['Other_Remark'];?></td>
								</tr>
								<tr>
									<th class="info text-right">ผู้อนุมัติ</th>
									<td><?php echo $approve_person;?></td>
									<th class="info text-right">อนุมัติเมื่อ</th>
									<td><?php echo $transaction['approved_date'];?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">ข้อมูลลูกค้า / อื่นๆ</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-12">
	<?php if(count($customer)>0):?>							
								<table class="table table-condensed table-striped table-bordered">
									<tbody>
										<tr>
											<th class="info text-right" style="width: 100px;">รหัสลูกค้า</th>
											<td>
												<?php echo $customer['Cust_ID']; ?>
											</td>
										</tr>
										<tr>
											<th class="info text-right">นามลูกค้า</th>
											<td><?php echo $customer['Cust_Name']; ?></td>
										</tr>
										<tr>
											<th class="info text-right">ที่อยู่</th>
											<td><?php echo $customer['Cust_Addr']; ?></td>
										</tr>
										<tr>
											<th class="info text-right">วันที่ส่งของ</th>
											<td><?php echo date('d-m-Y',strtotime($transaction['Transport_Date']));?></td>
										</tr>
										<tr>
											<th class="info text-right">หมายหตุ</th>
											<td><?php echo $transaction['Transact_Remark']; ?></td>
										</tr>
									</tbody>
								</table>
	<?php else: ?>							
								<table class="table table-condensed table-striped table-bordered">
									<tbody>
										<tr>
											<th>ไม่มีข้อมูลลูกค้า</th>

										</tr>
									</tbody>
								</table>
	
	<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายการสินค้า</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed table-border table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Product ID</th>
									<th>Name</th>
									<th class="text-center">คลัง</th>
									<th class="text-center">ดี</th>
									<th class="text-center">เสีย</th>
									<th class="text-center">ชำรุด</th>
									<th class="text-center">รวม</th>
								</tr>
							</thead>
							<tbody>
						<?php $i = 1;?>								
						<?php foreach($transaction_detail as $row):?>
							
							<?php if($row['good']<0 || $row['waste']<0 || $row['damage']<0):?>
							
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td class="danger"><?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?></td>
								<td class="text-center"><?php echo $row['Stock_Name'];?></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good']);?>&nbsp;<span class="label label-danger" title="ยอดในคลัง"><?php echo number_format($row['remain_good']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Waste']);?>&nbsp;<span class="label label-danger" title="ยอดในคลัง"><?php echo number_format($row['remain_waste']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Damage']);?>&nbsp;<span class="label label-danger" title="ยอดในคลัง"><?php echo number_format($row['remain_damage']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']);?></td>
							</tr>
								
								
							<?php else:?>	
							
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td><?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?></td>
								<td class="text-center"><?php echo $row['Stock_Name'];?></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good']);?>&nbsp;<span class="label label-primary" title="ยอดในคลัง"><?php echo number_format($row['remain_good']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Waste']);?>&nbsp;<span class="label label-primary" title="ยอดในคลัง"><?php echo number_format($row['remain_waste']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Damage']);?>&nbsp;<span class="label label-primary" title="ยอดในคลัง"><?php echo number_format($row['remain_damage']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']);?></td>
							</tr>
							
							<?php endif;?>
							
						<?php $i++;?>	
						<?php endforeach;?>									
							</tbody>
							<!-- <tfoot>
								<tr>
									<td colspan="2" class="text-center">รวม</td>
									<td></td>
									<td class="text-center">30</td>
									<td class="text-center">40</td>
									<td class="text-center">0</td>
									<td></td>
								</tr>
							</tfoot> -->
						</table>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">หมายเหตุ</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<div class="form-group">
								<p class="text-danger" style="font-size: 25px;">
									<?php echo $transaction['Reject_Remark']; ?>
								</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" id="message" style="padding-top: 20px;">
								
			</div>
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

