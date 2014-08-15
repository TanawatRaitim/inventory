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
					<h3 class="panel-title">Main Ticket</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						
						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">SR -</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="">
									
								</div>
							</div>
						</div>

						<div class="row"></div>
						<!-- <div class="col-md-5">
							
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">เพื่อนำไปใช้</label>
								<div class="col-sm-7">
									<select class="form-control input-sm" id="ticket_type">
									</select>
								</div>
							</div>
							
						</div> -->
						
						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">เอกสารอ้างอิง</label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="product_id" placeholder="Product ID"> -->
									<select class="form-control input-sm">
										<option>เอกสารอ้างอิง</option>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">เพิ่มเติม</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="โปรดระบุถ้าเป็นเอกสารอื่นๆ">
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">เลขที่เอกสารอ้างอิง</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="เลขที่เอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">วันที่เอกสารอ้างอิง</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="refer_date" placeholder="วันที่ของเอกสารอ้างอิง">
									<!-- http://eonasdan.github.io/bootstrap-datetimepicker/ -->
								</div>
							</div>
						</div>


						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<!-- <input type="text" class="form-control input-sm" id="product_id" placeholder="หมายเหตุ"> -->
									<textarea class="form-control input-sm"></textarea>
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
									<input type="text" class="form-control input-sm" id="product_id" placeholder="หมายเหตุ">
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
							<h3 class="panel-title">Ticket Detail</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">รหัสสินค้า</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" id="test_select2" />
											<!-- <input type="text" class="form-control input-sm" id="product_id" placeholder="Product ID"> -->
										</div>
									</div>
									
									<div class="form-group-sm">
										<div class="col-sm-12">
											<!-- <select class="form-control input-sm" id="product_list"> -->
												<?php //echo $product_list;?>
											<!-- </select> -->
											<!-- <input type="text" class="form-control input-sm" id="product_id" placeholder="Product ID"> -->
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">คลัง</label>
										<div class="col-sm-8">
											
											
											<select class="form-control input-sm">
												<option>คลังรับคืน</option>
											</select>
											
										</div>
									</div>
									
									<div class="input-group input-group-sm form-group">
									  <span class="input-group-addon">ดี</span>
									  <input type="text" class="form-control" placeholder="">
									  <span class="input-group-addon">เสีย</span>
									  <input type="text" class="form-control" placeholder="">
									  <span class="input-group-addon">ชำรุด</span>
									  <input type="text" class="form-control" placeholder="">
									  <span class="input-group-addon">รวม</span>
									  <input type="text" readonly="readonly" tabindex="-1" class="form-control" placeholder="">
									</div>
									<!--
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">จำนวน</label>
										<div class="col-sm-6">
											<input type="text" class="form-control input-sm" id="product_id" placeholder="Quantity">
										</div>
									</div>
									-->
									<div class="form-group">
										<div class="col-sm-4"></div>
										<div class="col-sm-6">
											<input type="button" class="btn btn-success" value="จองสินค้า" />
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
												<input type="text" id="product_unusable" class="col-md-11 col-sm-5 col-xs-8 text-center" placeholder="เสีย" value="0" />
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
											<td><img width="80" src="<?php echo base_url(); ?>assets/images/calendar.jpg" class="img-rounded" /></td>
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
							<img width="120" src="<?php echo base_url(); ?>assets/images/demo.jpg" class="img-rounded" />
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
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
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
					<div class="col-md-12">
						<button class="btn btn-primary btn-sm">
							บันทึก
						</button>
						<button class="btn btn-warning btn-sm">
							บันทึกแบบร่่าง
						</button>
						<button class="btn btn-danger btn-sm" id="test_noty">
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

