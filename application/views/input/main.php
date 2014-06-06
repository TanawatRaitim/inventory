<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">Main Ticket</h3>
			  </div>
			  <div class="panel-body">
				  <div class="col-md-6">
				  	
				  </div>
				  <div class="col-md-6">
				  	
				  </div>
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
						      <input type="text" class="form-control input-sm" id="inputEmail3" placeholder="Product ID">
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
								<td><input type="text" class="col-md-11 col-sm-5 col-xs-8" placeholder="ดี" /></td>
								<td><input type="text" class="col-md-11 col-sm-5 col-xs-8" placeholder="เสีย" /></td>
								<td><input type="text" class="col-md-11 col-sm-5 col-xs-8" placeholder="ชำรุด" /></td>
								<td><input type="text" class="col-md-11 col-sm-5 col-xs-8" placeholder="รวม" /></td>
								<td><input type="button" class="btn btn-success" value="เพิ่ม" /></td>
							</tr>
						</table>
						  
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
						<img width="120" src="<?php echo base_url();?>assets/images/demo.jpg" class="img-rounded" />
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
									<td></td>
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
									<td></td>
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
			  	
				  <table class="table table-condensed table-border table-striped">
			    	<thead>
			    		<tr>
			    			<th>#</th>
			    			<th>Product ID</th>
			    			<th>Vol.</th>
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
			    			<td>GMAG</td>
			    			<td>15</td>
			    			<td>15</td>
			    			<td>20</td>
			    			<td>30</td>
			    			<td>65</td>
			    			<td>
			    				<!-- Single button -->
								<div class="btn-group">
								  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
								    Action <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu pull-right" role="menu">
								    <li><a href="#">แก้ไข</a></li>
								    <li><a href="#">ลบ</a></li>
								  </ul>
								</div>
								<!-- Single button -->
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>2</td>
			    			<td>GMAG</td>
			    			<td>15</td>
			    			<td>15</td>
			    			<td>20</td>
			    			<td>30</td>
			    			<td>65</td>
			    			<td>
			    				<!-- Single button -->
								<div class="btn-group">
								  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
								    Action <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu pull-right" role="menu">
								    <li><a href="#">แก้ไข</a></li>
								    <li><a href="#">ลบ</a></li>
								  </ul>
								</div>
								<!-- Single button -->
			    			</td>
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
			    <div class="col-md-6 col-md-offset-3">
			    	<button class="btn btn-primary btn-sm">บันทึก Ticket</button>
			  		<button class="btn btn-danger btn-sm">ยกเลิกการบันทึก Ticket</button>
			    </div>
			    
			  </div>
			</div>
		</div>
		
	</div><!-- end .row -->
	
</div> <!-- end .container-fluid -->