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
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดหลักของ Ticket</h3>
					
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" role="form" name="main_ticket" id="main_ticket" action="">
						
						<div class="col-md-6">
							<div class="form-group">
								<div class="col-sm-5">
									
									<select class="form-control input-sm" id="TK_Code" name="TK_Code" autofocus="autofocus" style="color: black;">
										<?php echo $ticket_type;?>
									</select>
									
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="TK_ID" name="TK_ID" placeholder="Ticket ID">
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input type="hidden" name="Transaction_AutoID" id="Transaction_AutoID" value="" />

							</div>
						</div>

						<div class="row"></div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_AutoID" class="col-sm-5 control-label">เอกสารอ้างอิง <span class="text-danger">*</span></label>
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
								<label for="DocRef_No" class="col-sm-5 control-label">เลขที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocRef_No" name="DocRef_No" placeholder="เลขที่เอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="DocRef_Date" class="col-sm-5 control-label">วันที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocRef_Date" name="DocRef_Date" data-date-format="DD/MM/YYYY" placeholder="วันที่ของเอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Transact_Remark" class="col-sm-5 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="" placeholder="หมายเหตุ"> -->
									<textarea class="form-control input-sm" name="Transact_Remark" id="Transact_Remark"></textarea>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">

						</div>
						
						<div class="col-md-12" id="main_ticket_msg">
							
						</div>
											
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
									
									<div class="form-group">
										<div class="col-sm-4"></div>
										<div class="col-sm-6">
											<input type="submit" id="btn_add_detail" class="btn btn-success" value="นำเข้า" />
											
										</div>
										<div class="col-sm-12" id="ticket_detail_msg" style="padding-top: 20px;"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="table_premium">
				
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
								
							</tbody>
							<tfoot>
								<tr>
									<td colspan="7" id="total_record" class="text-left">ยังไม่มีรายการที่ถูกบันทึก</td>
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

