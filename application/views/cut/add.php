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
									<td><?php echo $transaction['DocRef_Date'];?></td>
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
								<td><?php echo $i; ?></td>
								<td><?php echo $row['Product_ID']; ?></td>
								<td class="text-center"><?php echo $row['Stock_Name']; ?></td>
								<td class="text-center"><?php echo $row['QTY_Good']; ?></td>
								<td class="text-center"><?php echo $row['QTY_Waste']; ?></td>
								<td class="text-center"><?php echo $row['QTY_Damage']; ?></td>
								<td class="text-center" id="total"><?php echo $row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']; ?></td>
								
							</tr>
							
						<?php $i++; ?>	
						<?php endforeach; ?>									
							</tbody>
						</table>
						</form>
						<div class="col-md-6 col-md-offset-4">
							
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ข้อมูลใบสั่งขาย/ใบตัดจ่าย</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" name="form_sale" id="form_sale" method="post" >
						<input type="hidden" name="Transact_AutoID" id="Transact_AutoID" value="<?php echo $transaction['Transact_AutoID']; ?>" />
						<input type="hidden" name="new_code" id="new_code" value="<?php echo $transaction['Transaction_For']; ?>" />
						<div class="col-md-12">
							<div class="form-group">
								<label for="TK_ID" class="col-sm-4 control-label">เลขที่ใบตัดจ่าย  <?php echo $transaction['Transaction_For'];?> *</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="TK_ID" name="TK_ID" placeholder="xx-xx-xxxx">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="DocSale_Date" class="col-sm-4 control-label">วันที่บนใบตัดจ่าย *</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocSale_Date" name="DocSale_Date" data-date-format="DD/MM/YYYY" placeholder="วันที่บนใบสั่งขาย">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="Other_Remark" class="col-sm-4 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<textarea class="form-control input-sm" name="Other_Remark" id="Other_Remark"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-4">
							<button class="btn btn-primary btn-sm" id="btn_save">
								บันทึก
							</button>
							<button class="btn btn-danger btn-sm" id="btn_cancel">
								ยกเลิก
							</button>
						</div>				
					</form>
					<div class="col-md-12" id="message" style="padding-top: 20px;"></div>
				</div>
			</div>
			
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

