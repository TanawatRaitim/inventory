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
						    <label for="inputEmail3" class="col-sm-4 control-label">Product ID</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control input-sm" id="inputEmail3" placeholder="Product ID">
						    </div>
						  </div>
						  <!-- 
						  <div class="form-group">
						    <div class="col-sm-2 text-center">ดี</div>
						    <div class="col-sm-2 text-center">เสีย</div>
						    <div class="col-sm-2 text-center">ชำรุด</div>
						    <div class="col-sm-2 text-center">รวม</div>
						</div>
						 -->
						<div class="form-group">   
						    <div class="col-sm-2">
						    	<input type="text" class="form-control input-sm" id="inputEmail3" placeholder="ดี">
						    </div>
						    <div class="col-sm-2">
						    	<input type="text" class="form-control input-sm" id="inputEmail3" placeholder="เสีย">
						    </div>
						    <div class="col-sm-2">
						    	<input type="text" class="form-control input-sm" id="inputEmail3" placeholder="ชำรุด">
						    </div>
						    <div class="col-sm-2">
						    	<input type="text" class="form-control input-sm" id="inputEmail3" placeholder="รวม">
						    </div>
						    <div class="col-sm-4">
						    	<button type="submit" class="btn btn-danger btn-sm">&nbsp;&nbsp;เพิ่ม&nbsp;&nbsp;</button>
						    </div>
						  </div>
						</form>
				    </div>			    
				  </div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Product Detail</h3>
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
						<table class="table table-condensed">
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
			    <h3 class="panel-title">Ticket Information</h3>
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
			    			<th>Action</th>
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
			    			<td>action</td>
			    		</tr>
			    	</tbody>
			    	<tfoot>
			    		<tr>
			    			<td colspan="3" class="text-center">รวม</td>
			    			<td>375</td>
			    			<td>20</td>
			    			<td>30</td>
			    			<td>65</td>
			    			<td>action</td>
			    		</tr>
			    	</tfoot>
			    </table>
			  </div>
			</div>
		</div>
		
	</div><!-- end .row -->
	
</div> <!-- end .container-fluid -->