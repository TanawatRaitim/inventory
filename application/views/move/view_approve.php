<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ข้อมูล</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo $transaction['TK_Code'];?><?php echo $transaction['TK_ID'];?></label>
								<div class="col-sm-7">
		
								</div>
							</div>
						</div>
						
						<div class="row"></div>

						<div class="col-md-12">
							<table class="table table-condensed table-bordered table-striped">
								<tbody>
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
								</tbody>
							</table>
						</div>
					
					</form>
					
				</div>
			</div>

			<!-- <div class="col-md-12"> -->
				
				<!-- <div class="col-md-12"> -->
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
												<?php echo $customer['Cust_ID'];?>
											</td>
										</tr>
										<tr>
											<th class="info text-right">นามลูกค้า</th>
											<td><?php echo $customer['Cust_Name'];?></td>
										</tr>
										<tr>
											<th class="info text-right">ที่อยู่</th>
											<td><?php echo $customer['Cust_Addr'];?></td>
										</tr>
										<tr>
											<th class="info text-right">วันที่ส่งของ</th>
											<td><?php echo $transaction['Transport_Date'];?></td>
										</tr>
										<tr>
											<th class="info text-right">หมายหตุ</th>
											<td><?php echo $transaction['Transact_Remark'];?></td>
										</tr>
									</tbody>
								</table>
	<?php else:?>							
								<table class="table table-condensed table-striped table-bordered">
									<tbody>
										<tr>
											<th>ไม่มีข้อมูลลูกค้า</th>

										</tr>
									</tbody>
								</table>
	
	<?php endif;?>
							</div>
						</div>
					</div>
				<!-- </div> -->
			<!-- </div> -->

			
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายการสินค้า</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
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
						<?php $i = 1;?>								
						<?php foreach($transaction_detail as $row):?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td class="text-center"><?php echo $row['Stock_Name'];?></td>
								<td class="text-center"><?php echo $row['QTY_Good'];?></td>
								<td class="text-center"><?php echo $row['QTY_Waste'];?></td>
								<td class="text-center"><?php echo $row['QTY_Damage'];?></td>
								<td class="text-center"><?php echo $row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage'];?></td>
							</tr>
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
			<form method="post" action="<?php echo site_url();?>reserve/set_reject" id='form_reject'>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">รายละเอียด</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-12">
							<h2><?php echo $description;?></h2>
						</div>
							
						<div class="col-md-12" style="height: 30px"></div>

						<div class="col-md-12">
						</div>
						<div class="col-md-6 col-md-offset-4" style="padding-top: 20px;">
	
						</div>
							
					</div>
				</div>
			<div class="col-md-12" id="message" style="padding-top: 20px;">
								
			</div>
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

