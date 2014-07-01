<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Main Ticket</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 col-md-2 control-label text-right" style="padding-right: 5px;">IN - </label>
								<div class="col-sm-3" style="padding-left: 20px;">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="Ticket ID" autofocus>
								</div>
							</div>
						</div>
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
								<label for="inputEmail3" class="col-sm-5 control-label">อื่นๆ</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="โปรดระบุถ้าเป็นเอกสารอื่นๆ">
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">เลขที่</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="เลขที่เอกสารอ้างอิง">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">วันที่</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="refer_date" placeholder="วันที่ของเอกสารอ้างอิง">
									<!-- http://eonasdan.github.io/bootstrap-datetimepicker/ -->
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">รหัสลูกค้า</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="เลขที่รหัสลูกค้า">
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 col-md-2 control-label">หมายเหตุ</label>
								<div class="col-sm-7">
									<input type="text" class="form-control input-sm" id="product_id" placeholder="หมายเหตุ">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Ticket Detail</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">รหัสสินค้า</label>
									<div class="col-sm-6">
										<input type="text" class="form-control input-sm" id="product_id" placeholder="Product ID">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">คลัง</label>
									<div class="col-sm-6">
										<select class="form-control input-sm">
											<option>Please select</option>
										</select>
									</div>
								</div>

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
											<input type="text" id="product_good" class="col-md-11 col-sm-5 col-xs-8" placeholder="ดี" value="0" />
										</td>
										<td>
											<input type="text" id="product_unusable" class="col-md-11 col-sm-5 col-xs-8" placeholder="เสีย" value="0" />
										</td>
										<td>
											<input type="text" id="product_deteriorate" class="col-md-11 col-sm-5 col-xs-8" placeholder="ชำรุด" value="0" />
										</td>
										<td>
											<input type="text" id="product_receive" class="col-md-11 col-sm-5 col-xs-8" placeholder="รวม" value="0" />
										</td>
										<td>
											<input type="button" class="btn btn-success" value="เพิ่ม" />
										</td>
									</tr>
								</table>
								<br />
							</form>
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
										<td>C</td>
										<td>100</td>
										<td>0</td>
										<td>0</td>
										<td>100</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-12">
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
									<th>ดี</th>
									<th>เสีย</th>
									<th>ชำรุด</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>GMAG#15</td>
									<td>15</td>
									<td>20</td>
									<td>30</td>
									<td>65</td>
									<td><!-- Single button -->
									<div class="btn-group">
										<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
											Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li>
												<a href="#">แก้ไข</a>
											</li>
											<li>
												<a href="#">ลบ</a>
											</li>
										</ul>
									</div><!-- Single button --></td>
								</tr>
								<tr>
									<td>2</td>
									<td>GMAG#16</td>
									<td>15</td>
									<td>20</td>
									<td>30</td>
									<td>65</td>
									<td><!-- Single button -->
									<div class="btn-group">
										<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
											Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li>
												<a href="#">แก้ไข</a>
											</li>
											<li>
												<a href="#">ลบ</a>
											</li>
										</ul>
									</div><!-- Single button --></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="text-center">รวม</td>
									<td>30</td>
									<td>40</td>
									<td>60</td>
									<td>130</td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="col-md-10 col-md-offset-2">
						<button class="btn btn-primary btn-sm">
							บันทึก Ticket
						</button>
						<button class="btn btn-danger btn-sm">
							ยกเลิกการบันทึก Ticket
						</button>
					</div>

				</div>
			</div>
		</div>

	</div><!-- end .row -->

</div>
<!-- end .container-fluid -->

<script>
	$(function() {
		// alert('hello ims');
		$("#product_id").blur(function() {
			var str = $(this).val();
			str = str.toUpperCase();
			$(this).val(str);
		});
		
		$("#refer_date").datetimepicker();


		$("#product_good, #product_unusable, #product_deteriorate").blur(function(e) {
			// alert('on blur');
			var total_receive = parseInt($("#product_good").val()) + parseInt($("#product_deteriorate").val()) + parseInt($("#product_unusable").val());

			$("#product_receive").val(total_receive);
		});
		
		$('input, select').keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****

	}); 
</script>