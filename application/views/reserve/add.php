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
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดหลักของ Ticket</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" name="main_ticket" id="main_ticket">
						
						<div class="col-md-5">
							<div class="form-group">
								<label class="col-sm-5 control-label"><?php echo $input_type;?> - </label>
								<label class="col-sm-7 control-label" id="TK_ID_Present"  style="text-align: left;">XX-XX-XXXX</label>
								<!-- <input type="hidden" name="Transact_AutoID" id="Transact_AutoID" value="" /> -->
								<input type="hidden" name="TK_ID" id="TK_ID" value="" />
								<input type="hidden" name="TK_Code" id="TK_Code" value="RS" />
								<!-- <div class="col-sm-7"> -->
									<!-- 
									<div class="input-group input-group-sm">
								      <input type="text" class="form-control input-sm" name="TK_ID" id="TK_ID" placeholder="รหัสการจอง" autofocus="">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" id="btn_gen_id" data-toggle="tooltip" title="ออกรหัสการจอง">
								        	<span class="glyphicon glyphicon-transfer"></span>
								        </button>
								      </span>
								    </div>
								    <!-- /input-group -->

								     <!-- <span id="TK_ID_present">1234</span> -->
								     <!-- <input type="hidden" name="TK_ID" id="TK_ID" value="new" /> -->
								<!-- </div> -->
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="Transaction_For" class="col-sm-5 control-label">จองสำหรับ <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<select class="form-control input-sm" id="Transaction_For" name="Transaction_For" autofocus="autofocus">
										<?php echo $ticket_type;?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-5">
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

						<div class="col-md-5">
							<div class="form-group">
								<label for="DocRef_Other" class="col-sm-5 control-label">เพิ่มเติม</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocRef_Other" name="DocRef_Other" placeholder="โปรดระบุถ้าเป็นเอกสารอื่นๆ">
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="DocRef_No" class="col-sm-5 control-label">เลขที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocRef_No" name="DocRef_No" placeholder="เลขที่เอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="DocRef_Date" class="col-sm-5 control-label">วันที่เอกสารอ้างอิง <span class="text-danger">*</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="DocRef_Date" name="DocRef_Date" placeholder="วันที่ของเอกสารอ้างอิง">
									<!-- http://eonasdan.github.io/bootstrap-datetimepicker/ -->
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="Cust_ID" class="col-sm-5 control-label">รหัสลูกค้า</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="Cust_ID" name="Cust_ID" placeholder="เลขที่รหัสลูกค้า" value="big">
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="Transport_Date" class="col-sm-5 control-label">วันที่ส่งของ</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="Transport_Date" name="Transport_Date" placeholder="วันที่ส่งของ">
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label"></label>
								<div class="col-sm-12 text-danger" id="customer_detail">
									
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="Transact_Remark" class="col-sm-5 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="" placeholder="หมายเหตุ"> -->
									<textarea class="form-control input-sm" name="Transact_Remark" id="Transact_Remark"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							
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
								<form class="form-horizontal" role="form" name="ticket_detail" id="ticket_detail">
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
									  <span class="input-group-addon">ดี</span>
									  <input type="text" id="QTY_Good" name="QTY_Good" class="form-control" placeholder="" value="0">
									  <span class="input-group-addon">เสีย</span>
									  <input type="text" id="QTY_Waste" name="QTY_Waste" class="form-control" placeholder="" value="0">
									  <span class="input-group-addon">ชำรุด</span>
									  <input type="text" id="QTY_Damage" name="QTY_Damage" class="form-control" placeholder="" value="0">
									  <span class="input-group-addon">รวม</span>
									  <input type="text" id="product_receive" readonly="readonly" tabindex="50000" class="form-control" placeholder="" value="0">
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
											<input type="button" id="btn_add_detail" class="btn btn-success" value="จองสินค้า" />
										</div>
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
				<div class="col-md-12">
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
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">รายละเอียดสินค้า</h3>
					</div>
					
					<div class="panel-body">
						<div class="col-md-4">
							<img width="120" id="p_img"  src="<?php echo base_url(); ?>assets/images/demo.jpg" class="img-rounded" />
							<br />
							<span class="label label-danger">spec sheet</span>
							<span class="label label-danger">sale sheet</span>
							<span class="label label-danger">other sheet</span>
						</div>
						<div class="col-md-8">
							<table class="table table-condensed table-striped">
								<thead>
									<tr>
										<th colspan="4">ยอดที่มีในคลัง</th>
									</tr>
									<tr>
										<th>คลัง</th>
										<th>ดี</th>
										<th>เสีย</th>
										<th>ชำรุด</th>
										<th>รวม</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>A</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
									</tr>
									<tr>
										<td>B</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
									</tr>
									<tr>
										<td>C</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
									</tr>
									<tr>
										<td>รับคืน</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
									</tr>
									
								</tbody>
								<tfoot>
									<tr class="warning">
										<td>ยอดรวม</td>
										<td>xx</td>
										<td>xx</td>
										<td>xx</td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-6">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th colspan="2">สินค้าสภาพดี</th>
										</tr>
									</thead>	
									<tbody>
										<tr>
											<td style="padding-top: 15px;">สินค้าสภาพดี</td>
											<td style="font-size: 30px;" class="text-right">1,257</td>
										</tr>
										<tr>
											<td style="padding-top: 15px;">ยอดการจอง</td>
											<td style="font-size: 30px;" class="text-right">200</td>
										</tr>
										<tr>
											<td style="padding-top: 15px;">คงเหลือ</td>
											<td style="font-size: 30px;" class="text-right"><u>1,057</u></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th colspan="2">เอกสารแนบ</th>
										</tr>
										<tr>
											<th>ประเภท</th>
											<th>เอกสารแนบ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Spec Sheet</td>
											<td><span class="label label-danger">PDF</span></td>
										</tr>
										<tr>
											<td>Sale Sheet</td>
											<td><span class="label label-danger">PDF</span></td>
										</tr>
										<tr>
											<td>Other</td>
											<td><span class="label label-danger">PDF</span></td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--
							<table class="table table-condensed table-hover">
								<thead>
									<tr>
										<th colspan="2">รายละเอียดสินค้า</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>รหัส</th>
										<td>13-GMAG-M1375</td>
									</tr>
									<tr>
										<th>ชื่อ</th>
										<td>The Guitar Mag</td>
									</tr>
									<tr>
										<th>Vol.</th>
										<td>375</td>
									</tr>
									<tr>
										<th>คลังหลัก</th>
										<td>C</td>
									</tr>
									<tr>
										<th>พิมพ์ครั้งที่</th>
										<td>1</td>
									</tr>
									<tr>
										<th>ยอดสั่งผลิต</th>
										<td>2,000</td>
									</tr>
									<tr>
										<th>รับเข้าคลัง</th>
										<td>1,800</td>
									</tr>
									<tr>
										<th>ยอดกระจาย(SA)</th>
										<td></td>
									</tr>
									<tr>
										<th>ยอดกระจาย(SC)</th>
										<td></td>
									</tr>
									<tr>
										<th>วันที่ผลิต</th>
										<td></td>
									</tr>
									<tr>
										<th>ผลิตเสร็จ</th>
										<td></td>
									</tr>
									<tr>
										<th>สถานะ</th>
										<td>active</td>
									</tr>
								</tbody>
							</table>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายการที่บันทึก</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed table-border table-striped" id="record_saved">
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
								<!-- <tr>
									<td>1</td>
									<td>GMAG#15</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>2</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>3</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>4</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr>
								<tr>
									<td>5</td>
									<td>GMAG#16</td>
									<td class="text-center">A</td>
									<td class="text-center">15</td>
									<td class="text-center">20</td>
									<td class="text-center">0</td>
									<td class="text-center">35</td>
									<td><span class="glyphicon glyphicon-remove" style="color: red;"></span></td>
								</tr> -->
							</tbody>
							<tfoot>
								<tr>
									<td colspan="7" id="total_record" class="text-left">ยังไม่มีรายการที่ถูกบันทึก</td>
								</tr>
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
					<div class="col-md-12">
						<button class="btn btn-primary btn-sm">
							บันทึกการจองสินค้า
						</button>
						<button class="btn btn-warning btn-sm">
							บันทึกแบบร่่าง
						</button>
						<button class="btn btn-danger btn-sm" id="test_noty">
							ยกเลิกการจองสินค้าทั้งหมด
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

