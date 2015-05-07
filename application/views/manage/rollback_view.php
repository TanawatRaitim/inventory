<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo $title; ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ข้อมูล</h3>
				</div>
				<div class="panel-body">
					
					<form class="form-horizontal" role="form">
						<div class="col-md-12">
							<table class="table table-condensed table-bordered table-striped">
								<tbody>
									<tr>
										<th class="info text-right">เลขที่ Ticket</th>
										<td colspan="3"><?php echo $transaction['TK_Code'];?><?php echo $transaction['TK_ID'];?></td>
									</tr>
									<tr>
										<th class="info text-right">สำหรับ</th>
										<td colspan="3"><?php echo get_transaction_for($transaction['Transaction_For']);?> (<?php echo $transaction['Transaction_For'];?>)</td>
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
										<th class="info text-right">ผู้อนุมัติ</th>
										<td><?php echo get_employee_firstname($transaction['ApprovedBy']);?></td>
										<th class="info text-right">อนุมัติเมื่อ</th>
										<td><?php echo $transaction['approved_date'];?></td>
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
											<td><?php echo date('d-m-Y',strtotime($transaction['Transport_Date']));?></td>
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
									<th colspan="8" class="text-danger"><?php echo $rollback_message;?></th>
								</tr>
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
							
							<?php if($transaction['TK_Code'] == 'RL'):?>
								
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td>
									<?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?>
									
									<?php if($row['rollback_status'] == false):?>
									<span class="text-red">&nbsp;***</span>
									<?php endif;?>
									
								</td>
								<td class="text-center"><?php echo get_inventory_name($row['Effect_Stock_Des']);?> => <?php echo get_inventory_name($row['Effect_Stock_AutoID']);?></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง <?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_good']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Waste']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_waste']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Damage']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_damage']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']);?></td>
							</tr>
								
							<?php elseif($transaction['TK_Code'] == 'RS'):?>
							
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td>
									<?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?>
									
									<?php if($row['rollback_status'] == false):?>
									<span class="text-red">&nbsp;***</span>
									<?php endif;?>
									
								</td>
								<td class="text-center"><?php echo $row['Stock_Name'];?></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good']);?>&nbsp;<span class="label label-primary" title="ยอดจองในคลัง <?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['reserve_good']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Waste']);?>&nbsp;<span class="label label-primary" title="ยอดจองในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['reserve_waste']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Damage']);?>&nbsp;<span class="label label-primary" title="ยอดจองในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['reserve_damage']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good'] + $row['QTY_Waste'] + $row['QTY_Damage']);?></td>
							</tr>		
								
							<?php elseif($transaction['TK_Code'] == 'SR' || $transaction['TK_Code'] == 'IN' || $transaction['TK_Code'] == 'IR'):?>	
								
								<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['Product_ID'];?></td>
								<td>
									<?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?>
									
									<?php if($row['rollback_status'] == false):?>
									<span class="text-red">&nbsp;***</span>
									<?php endif;?>
									
								</td>
								<td class="text-center"><?php echo $row['Stock_Name'];?></td>
								<td class="text-center"><?php echo number_format($row['QTY_Good']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง <?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_good']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Waste']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_waste']);?></span></td>
								<td class="text-center"><?php echo number_format($row['QTY_Damage']);?>&nbsp;<span class="label label-primary" title="ยอดคงเหลือในคลัง<?php echo get_inventory_name($row['Stock_AutoID']);?>"><?php echo number_format($row['remain_damage']);?></span></td>
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
						<h3 class="panel-title">ใส่ข้อมูลการ Rollback</h3>
					</div>
					<div class="panel-body">
						<!-- <form class="form-horizontal" role="form"> -->
						<form method="post" action="<?php echo site_url();?>reserve/set_reject" id='form_rollback'>	
							<input type="hidden" name="TK_Code" id="TK_Code" value="<?php echo $transaction['TK_Code'];?>" />
							<input type="hidden" name="Transact_AutoID" id="Transact_AutoID" value="<?php echo $transaction['Transact_AutoID'];?>" />
							<div class="col-md-12">
								<div class="form-group">
									<label for="DocRef_No" class="col-sm-3 control-label">เลขที่เอกสารอ้างอิง <span class="text-red">**</span></label>
									<div class="col-sm-7">
										<input type="text" name="DocRef_No" id="DocRef_No" placeholder="เลขที่เอกสารอ้างอิง" class="form-control input-sm" />
									</div>
								</div>
							</div>
							<div class="col-md-12" style="height: 15px"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="DocRef_Date" class="col-sm-3 control-label">วันที่เอกสารอ้างอิง<span class="text-red">**</span></label>
									<div class="col-sm-7">
										<input type="text" name="DocRef_Date" id="DocRef_Date" data-date-format="DD/MM/YYYY" placeholder="วันที่เอกสารอ้างอิง" class="form-control input-sm" />
									</div>
								</div>
							</div>
							
							<div class="col-md-12" style="height: 15px"></div>
	
							<div class="col-md-12">
								<div class="form-group">
									<label for="Description" class="col-sm-3 control-label">หมายเหตุ<span class="text-red">**</span></label>
									<div class="col-sm-7">
										<textarea name="Description" id="Description" class="form-control input-lg"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-md-offset-4" style="padding-top: 20px;">
								<input type="button" id="btn_save" class="btn btn-primary btn-sm" value="Rollback" />
								<input type="button" id="btn_cancel" class="btn btn-danger btn-sm" value="ยกเลิก" />
							</div>
						</form>	
						<div class="col-md-12" id="message" style="padding-top: 20px;"></div>
					</div><!-- panel body -->
				</div>
			
			
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

