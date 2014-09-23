<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ข้อมูล</h3>
				</div>
				<div class="panel-body">

						
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-sm-3 control-label">RS<?php echo $transaction['TK_ID']; ?></label>
								<div class="col-sm-7"></div>
							</div>
						</div>
						
						<div class="row"></div>

						<div class="col-md-12">
							<table class="table table-condensed table-bordered table-striped">
								<tbody>
									<tr>
										<th class="info text-right">เอกสารอ้างอิง</th>
										<td><?php echo $transaction['DocRef_Name']; ?></td>
										<th class="info text-right">อื่นๆ</th>
										<td><?php echo $transaction['DocRef_Other']; ?></td>
									</tr>
									<tr>
										<th class="info text-right">เลขที่เอกสารอ้างอิง</th>
										<td><?php echo $transaction['DocRef_No']; ?></td>
										<th class="info text-right">วันที่เอกสารอ้างอิง</th>
										<td><?php echo $transaction['DocRef_Date']; ?></td>
									</tr>
									<tr>
										<th class="info text-right">ผู้ทำรายการ</th>
										<td><?php echo $transaction['Emp_FnameTH']; ?></td>
										<th class="info text-right">วันที่</th>
										<td><?php echo $transaction['created_date']; ?></td>
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
											<td><?php echo $transaction['Transport_Date']; ?></td>
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

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายการสินค้า</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<form id="form_detail" method="post" action="/inventory/reserve/edit_detail">	
						<table class="table table-condensed table-border table-striped">
							<thead>
								<tr>
									<th><i class="glyphicon glyphicon-remove" style="color: red;" title="ลย"></i></th>
									<th>#</th>
									<th>Product ID</th>
									<th class="text-center">คลัง</th>
									<th class="text-center">ดี</th>
									<th class="text-center">เสีย</th>
									<th class="text-center">ชำรุด</th>
									<th class="text-center">รวม</th>
									
								</tr>
							</thead>
							<tbody>
						<?php $i = 1; ?>	
												
						<?php foreach($transaction_detail as $row):?>
							<tr id="detail_row">
								<td><input value="1" type="checkbox" name="<?php echo $row['Transact_AutoID']; ?>,<?php echo $row['Product_ID']; ?>,<?php echo $row['Effect_Stock_AutoID']; ?>,delete,1,<?php echo $i; ?>" /></td>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['Product_ID']; ?></td>
								<td><?php echo $row['Stock_Name']; ?></td>
								<td><input type="text" id="QTY_Good" data-max="<?php echo $row['QTY_Good']; ?>" name="<?php echo $row['Transact_AutoID']; ?>,<?php echo $row['Product_ID']; ?>,<?php echo $row['Effect_Stock_AutoID']; ?>,QTY_Good,<?php echo $row['QTY_Good']; ?>,<?php echo $i; ?>" class="form-control input-sm text-center" value="<?php echo $row['QTY_Good']; ?>" /></td>
								<td><input type="text" id="QTY_Waste" data-max="<?php echo $row['QTY_Waste']; ?>" name="<?php echo $row['Transact_AutoID']; ?>,<?php echo $row['Product_ID']; ?>,<?php echo $row['Effect_Stock_AutoID']; ?>,QTY_Waste,<?php echo $row['QTY_Waste']; ?>,<?php echo $i; ?>" class="form-control input-sm text-center" value="<?php echo $row['QTY_Waste']; ?>" /></td>
								<td><input type="text" id="QTY_Damage" data-max="<?php echo $row['QTY_Damage']; ?>" name="<?php echo $row['Transact_AutoID']; ?>,<?php echo $row['Product_ID']; ?>,<?php echo $row['Effect_Stock_AutoID']; ?>,QTY_Damage,<?php echo $row['QTY_Damage']; ?>,<?php echo $i; ?>" class="form-control input-sm text-center" value="<?php echo $row['QTY_Damage']; ?>" /></td>
								<td class="text-center" id="total"><?php echo $row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']; ?></td>
								
							</tr>
							
						<?php $i++; ?>	
						<?php endforeach; ?>									
							</tbody>
						</table>
						</form>
						<div class="col-md-6 col-md-offset-4">
							<button id="btn_save" class="btn btn-primary btn-sm">
								บันทึก
							</button>
							<button id="btn_cancel" class="btn btn-danger btn-sm">
								ยกเลิก
							</button>
						</div>
					</div>
					<div class="col-md-12" id="message" style="padding-top: 20px;"></div>
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
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

