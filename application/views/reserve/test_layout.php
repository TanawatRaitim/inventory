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
		
		<!-- 8 -->
		<div class="col-md-8">	
			<div class="col-md-7">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">รายละเอียดหลักของ Ticket</h3>
					</div>
					
					<div class="panel-body">
						<form>
							<div class="col-md-6">
							  <div class="form-group input-group-sm">
							    <label for="exampleInputEmail1">Email address</label>
							    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
						  </div>
							<div class="col-md-6">
							  <div class="form-group input-group-sm">
							    <label for="exampleInputEmail1">Email address</label>
							    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							  <div class="form-group input-group-sm">
							    <label for="exampleInputPassword1">Password</label>
							    <textarea class="form-control" ></textarea>
							  </div>
						  </div>
							
						</form>
						<!-- <form class="form-horizontal" method="post" role="form" name="main_ticket" id="main_ticket" action="">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="Transaction_For" class="col-sm-5 control-label">จองสำหรับ <span class="text-danger">*</span></label>
									<div class="col-sm-7">
										<select class="form-control input-sm" id="Transaction_For" name="Transaction_For" autofocus="autofocus">
											<?php echo $ticket_type;?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-5 control-label"><?php echo $input_type;?> - </label>
									<label class="col-sm-7 control-label" id="TK_ID_Present"  style="text-align: left;">XX-XX-XXXX</label>
									<input type="hidden" name="TK_ID" id="TK_ID" value="" />
									<input type="hidden" name="TK_Code" id="TK_Code" value="RS" />
	
								</div>
							</div>
	
							<div class="row"></div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="DocRef_AutoID" class="col-sm-5 control-label">เอกสารอ้างอิง<span class="text-danger">*</span></label>
									<div class="col-sm-7">

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
										<input type="text" class="form-control input-sm" id="DocRef_Other" name="DocRef_Other" placeholder="โปรดระบุถ้าเป็นเอกสารอื่นๆ">
									</div>
								</div>
							</div>
	
							<div class="col-md-6">
								<div class="form-group">
									<label for="DocRef_No" class="col-sm-5 control-label">เลขที่อ้างอิง<span class="text-danger">*</span></label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" id="DocRef_No" name="DocRef_No" placeholder="เลขที่เอกสารอ้างอิง">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="DocRef_Date" class="col-sm-5 control-label">วันที่อ้างอิง <span class="text-danger">*</span></label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" id="DocRef_Date" name="DocRef_Date"  data-date-format="DD/MM/YYYY" placeholder="วันที่ของเอกสารอ้างอิง">

									</div>
								</div>
							</div>
	
							<div class="col-md-6">
								<div class="form-group">
									<label for="Cust_ID" class="col-sm-5 control-label">รหัสลูกค้า</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" id="Cust_ID" name="Cust_ID" placeholder="เลขที่รหัสลูกค้า" value="big">
									</div>
								</div>
							</div>
	
							<div class="col-md-6">
								<div class="form-group">
									<label for="Transport_Date" class="col-sm-5 control-label">วันที่ส่งของ</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" id="Transport_Date"  data-date-format="DD/MM/YYYY" name="Transport_Date" placeholder="วันที่ส่งของ">
									</div>
								</div>
							</div>
	
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-5 control-label"></label>
									<div class="col-sm-12 text-danger" id="customer_detail">
										
									</div>
								</div>
							</div>
	
							<div class="col-md-6">
								<div class="form-group">
									<label for="Transact_Remark" class="col-sm-5 control-label">หมายเหตุ</label>
									<div class="col-sm-7">

										<textarea class="form-control input-sm" name="Transact_Remark" id="Transact_Remark"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-12" id="main_ticket_msg">
								
							</div>
				
						</form> -->
					</div>
				</div>
			</div>

			<div class="col-md-5">
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
											<label for="Effect_Stock_AutoID" class="col-sm-4 control-label">คลัง <span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<select class="form-control input-sm" id="Effect_Stock_AutoID" name="Effect_Stock_AutoID">
													<?php echo $inventory_type;?>
												</select>
											</div>
										</div>
										
										<div class="input-group input-group-sm form-group">
										  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ดี&nbsp;<span class="text-danger">*</span></span>
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
										<div class="form-group">
											<div class="col-sm-4"></div>
											<div class="col-sm-6">
												<!-- <input type="submit" id="btn_add_detail" class="btn btn-success" value="จองสินค้า" /> -->
												<input type="submit" id="btn_add_detail" class="btn btn-success" value="จองสินค้า" />
												<!-- <a href="#" id="btn_add_detail" class="btn btn-success">link submit</a> -->
												
												<!-- <button type="sumbit" id="btn_add_detail" class="btn btn-success">จองสินค้า</button> -->
											</div>
											<div class="col-sm-12" id="ticket_detail_msg" style="padding-top: 20px;"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					
				</div>
			</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">รายการที่บันทึก</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div class="col-md-12">
							<button class="btn btn-primary btn-sm" id="btn_save_rs">
								บันทึกการจอง
							</button>
							
							<button class="btn btn-success btn-sm" id="btn_save_draft">
								บันทึกแบบร่่าง
							</button>
							
							<button class="btn btn-danger btn-sm" id="btn_cancel_all">
								ลบใบจอง
							</button>
						</div>
						<div id="message" class="col-md-12" style="padding-top: 10px;"></div>
							<table class="table table-condensed table-border table-striped table-hover" id="record_saved">
								<thead>
									<tr>
										<!-- <th>#</th> -->
										<th>No.</th>
										<th>รหัสสินค้า</th>
										<th class="text-center">ชื่อสินค้า</th>
										<th class="text-center">คลัง</th>
										<th class="text-center">ดี</th>
										<th class="text-center">เสีย</th>
										<th class="text-center">ชำรุด</th>
										<th class="text-center">รวม</th>
										<th></th>
									</tr>
								</thead>
								<tbody>			
									
								</tbody>
								<tfoot>
									<tr>
										<td colspan="9" id="total_record" class="text-left">ยังไม่มีรายการที่ถูกบันทึก</td>
									</tr>
									
								</tfoot>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>	
		<!-- 8 -->
		
	<div class="col-md-4">

		<div class="col-md-12" id="table_qty"></div>
		<div class="col-md-12" id="table_premium"></div>
	</div>
		
	</div><!-- end .row -->
	
</div>
<!-- end .container-fluid -->

