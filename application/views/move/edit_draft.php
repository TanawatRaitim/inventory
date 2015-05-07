<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2><?php echo $title; ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดหลักของ Ticket</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" role="form" name="main_ticket" id="main_ticket" action="">
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="Transaction_For" class="col-sm-5 control-label">RL - </label>
								<input type="hidden" name="TK_Code" id="TK_Code" value="RL" />
								<div class="col-sm-5 text-right">
									
								</div>
								<div class="col-sm-7">
									<input type="text" value="<?php echo $transaction['TK_ID']; ?>" class="form-control input-sm" id="TK_ID" name="TK_ID" placeholder="Ticket ID" readonly autofocus>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<!-- <label class="col-sm-5 control-label"><?php echo $input_type;?> - </label> -->
								<!-- <label class="col-sm-7 control-label" id="TK_ID_Present"  style="text-align: left;">XX-XX-XXXX</label> -->
								<!-- <input type="hidden" name="TK_ID" id="TK_ID" value="" /> -->
								<!-- <input type="hidden" name="TK_Code" id="TK_Code" value="RS" /> -->
								<input type="hidden" name="Transaction_AutoID" id="Transaction_AutoID" value="<?php echo $transaction['Transact_AutoID']; ?>" />

							</div>
						</div>

						<div class="row"></div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_AutoID" class="col-sm-5 control-label">เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="" placeholder="Product ID"> -->
									<select class="form-control input-sm" name="DocRef_AutoID" id="DocRef_AutoID">
										<?php echo $doc_refer;?>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_Other" class="col-sm-5 control-label">เพิ่มเติม</label>
								<div class="col-sm-7">
									<input type="text" value="<?php echo $transaction['DocRef_Other']; ?>" class="form-control input-sm" id="DocRef_Other" name="DocRef_Other" placeholder="โปรดระบุถ้าเป็นเอกสารอื่นๆ">
								</div>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_No" class="col-sm-5 control-label">เลขที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" value="<?php echo $transaction['DocRef_No']; ?>" class="form-control input-sm" id="DocRef_No" name="DocRef_No" placeholder="เลขที่เอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_Date" class="col-sm-5 control-label">วันที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" value="<?php echo convert_mssql_date($transaction['DocRef_Date']); ?>" class="form-control input-sm" id="DocRef_Date" name="DocRef_Date" data-date-format="DD/MM/YYYY" placeholder="วันที่ของเอกสารอ้างอิง">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Transact_Remark" class="col-sm-5 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="" placeholder="หมายเหตุ"> -->
									<textarea class="form-control input-sm" name="Transact_Remark" id="Transact_Remark"><?php echo $transaction['Transact_Remark']; ?></textarea>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							
						</div>
						<div class="col-md-12 text-danger" id="customer_detail">
							<?php echo get_customer_address($transaction['Cust_ID']);?>
						</div>

						
						<div class="col-md-12" id="main_ticket_msg">
							
						</div>
						<!-- 
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 col-md-2 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="" placeholder="หมายเหตุ">
								</div>
							</div>
						</div> -->						
					</form>
				</div>
			</div>

			<div class="col-md-6">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">รายละเอียดสินค้า</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form class="form-horizontal" role="form" name="ticket_detail" id="ticket_detail" action="">
									<div class="form-group">
										<label for="Product_ID" class="col-sm-4 control-label">รหัสสินค้า <span class="text-danger">*</span></label>
										<div class="col-sm-8">
											<input type="hidden" class="form-control input-sm" id="Product_ID" name="Product_ID" data-product_id="" data-product_text="" />
											<!-- <input type="hidden" id="Transact_AutoID" name="Transact_AutoID" /> -->
											
											<!-- <input type="text" class="form-control input-sm" id="" placeholder="Product ID"> -->
										</div>
									</div>
									
									
									<div class="form-group">
										<label for="Effect_Stock_AutoID" class="col-sm-4 control-label">คลังต้นทาง <span class="text-danger">*</span></label>
										<div class="col-sm-8">
											<select class="form-control input-sm" id="Effect_Stock_AutoID" name="Effect_Stock_AutoID">
												<?php echo $inventory_type;?>
											</select>
										</div>
									</div>
									<div class="form-group">	
										<label for="Effect_Stock_Des" class="col-sm-4 control-label">คลังปลายทาง<span class="text-danger">*</span></label>
										<div class="col-sm-8">
											<select class="form-control input-sm" id="Effect_Stock_Des" name="Effect_Stock_Des">
												<?php echo $inventory_type;?>
											</select>
										</div>
									</div>
									
									<div class="input-group input-group-sm form-group">
									  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดี<span class="text-danger">*</span></span>
									  <input type="text" id="QTY_Good" name="QTY_Good" class="form-control" placeholder="" value="0" required="required">
									  <span class="input-group-addon">เสีย<span class="text-danger">*</span></span>
									  <input type="text" id="QTY_Waste" name="QTY_Waste" class="form-control" placeholder="" value="0" required="required">
									 </div> 
									 <div class="input-group input-group-sm form-group">
									  <span class="input-group-addon">ชำรุด<span class="text-danger">*</span></span>
									  <input type="text" id="QTY_Damage" name="QTY_Damage" class="form-control" placeholder="" value="0" required="required">
									  <span class="input-group-addon">รวม</span>
									  <input type="text" id="product_receive" readonly="readonly" tabindex="50000" class="form-control" placeholder="" value="0" required="required">
									</div>
									<!--
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">จำนวน</label>
										<div class="col-sm-6">
											<input type="text" class="form-control input-sm" id="" placeholder="Quantity">
										</div>
									</div>
									-->
									<div class="form-group">
										<div class="col-sm-4"></div>
										<div class="col-sm-6">
											<!-- <input type="submit" id="btn_add_detail" class="btn btn-success" value="จองสินค้า" /> -->
											<input type="submit" id="btn_add_detail" class="btn btn-success" value="นำเข้า" />
											<!-- <a href="#" id="btn_add_detail" class="btn btn-success">link submit</a> -->
											
											<!-- <button type="sumbit" id="btn_add_detail" class="btn btn-success">จองสินค้า</button> -->
										</div>
										<div class="col-sm-12" id="ticket_detail_msg" style="padding-top: 20px;"></div>
									</div>
									<!-- 
									<table>
										<tr>
											<th class="text-center">ดี</th>
											<th class="text-center">เสีย</th>
											<th class="text-center">ชำรุด</th>
											<th class="text-center">รวม</th>
											<th class="text-center"></th>
										</tr>
										<tr>
											<td>
												<input type="text" id="product_good" class="col-md-11 col-sm-5 col-xs-8 text-center" placeholder="ดี" value="0" />
											</td>
											<td>
												<input type="text" id="QTY_Damage" class="col-md-11 col-sm-5 col-xs-8 text-center" placeholder="เสีย" value="0" />
											</td>
											<td>
												<input type="text" id="product_deteriorate" class="col-md-11 col-sm-5 col-xs-8 text-center" placeholder="ชำรุด" value="0" />
											</td>
											<td>
												<input type="text" id="product_receive" class="col-md-11 col-sm-5 col-xs-8 text-center" placeholder="รวม" value="0" />
											</td>
											<td>
												<input type="button" class="btn btn-success" value="เพิ่ม" />
											</td>
										</tr>
									</table> 
									<br />
									-->								
									
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="table_premium">
				<!--
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">สินค้าประกอบ</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<table class="table table-condensed table-striped">
									<thead>
										<tr>
											<th colspan="4">สินค้าประกอบของ 13-GMAG-M1375</th>
										</tr>
										<tr>
											<th></th>
											<th>#</th>
											<th>ชื่อ</th>
											<th>จำนวน</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><img width="80"src="<?php echo base_url(); ?>assets/images/calendar.jpg" class="img-rounded" /></td>
											<td>1</td>
											<td>สินค้าประกอบ A</td>
											<td>xx อัน</td>
										</tr>
										<tr>
											<td><img width="80" src="<?php echo base_url(); ?>assets/images/disc.jpg" class="img-rounded" /></td>
											<td>2</td>
											<td>สินค้าประกอบ B</td>
											<td>xx อัน</td>
										</tr>
										<tr>
											<td><img width="80" src="<?php echo base_url(); ?>assets/images/pick.png" class="img-rounded" /></td>
											<td>3</td>
											<td>สินค้าประกอบ C</td>
											<td>xx อัน</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					!-->
				</div>
			</div>

			<div class="col-md-6" id="table_qty">
				
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายการที่บันทึก</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed table-border table-striped table-hover" id="record_saved">
							<thead>
								<tr>
									<!-- <th>#</th> -->
									<th>Product ID</th>
									<th class="text-center">คลัง</th>
									<th class="text-center">ดี</th>
									<th class="text-center">เสีย</th>
									<th class="text-center">ชำรุด</th>
									<th class="text-center">รวม</th>
									<th></th>
								</tr>
							</thead>
							<tbody>			
								<?php foreach($transaction_detail as $row):?>			
								<tr title="<?php echo get_product_name($row['Product_ID']); ?>">
									<td><?php echo $row['Product_ID']; ?></td>
									<td class="text-center"><?php echo get_inventory_name($row['Effect_Stock_AutoID']); ?>-><?php echo get_inventory_name($row['Effect_Stock_Des']); ?></td>
									<td class="text-center"><?php echo $row['QTY_Good']; ?></td>
									<td class="text-center"><?php echo $row['QTY_Waste']; ?></td>
									<td class="text-center"><?php echo $row['QTY_Damage']; ?></td>
									<td class="text-center"><?php echo $row['QTY_Good']+$row['QTY_Waste']+$row['QTY_Damage'];?></td>
									<td>
										<span id="btn_delete_record" class="glyphicon glyphicon-remove cursor-pointer" style="color: red;" data-stock="<?php echo $row['Effect_Stock_AutoID']; ?>" data-autoid="<?php echo $row['Transact_AutoID'];?>" data-productid="<?php echo $row['Product_ID'];?>"></span>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="7" id="total_record" class="text-left"></td>
								</tr>
								
							</tfoot>
						</table>
					</div>
					<div class="col-md-12">
						<button class="btn btn-primary btn-sm" style="width: 100px;" id="btn_save_rs">
							ส่งขออนุมัติ
						</button>
						
						<button class="btn btn-warning btn-sm" style="width: 100px;" id="btn_save_draft">
							บันทึกแบบร่่าง
						</button>
						
						<button class="btn btn-danger btn-sm" style="width: 100px;" id="btn_cancel_all">
							ยกเลิก
						</button>
					</div>
					<div id="message" class="col-md-12" style="padding-top: 10px;">
					</div>
				</div>
			</div>
		</div>

	</div><!-- end .row -->
	


</div>
<!-- end .container-fluid -->

