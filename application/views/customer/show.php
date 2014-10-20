<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-4">
			<div class="col-md-12">
				<h1 class="text-center"><?php echo $customer['Cust_Name'];?></h1>
			</div>
			<div class="col-md-12">
				<div class="thumbnail">
					<h3 class="text-center">รูปภาพ</h3>
					<img src="<?php echo $customer['Cust_Photo'];?>" class="img-thumbnail" />
					<div class="caption">
						
						<p>
							
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="thumbnail">
					<h3 class="text-center">แผนที่</h3>
					<img src="<?php echo $customer['Cust_Map'];?>" class="img-thumbnail" />
					<div class="caption">
						
						<p>
							
						</p>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-md-8">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">กิจกรรมต่างๆ</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<table id="datatable" class="table table-bordered table-condensed table-striped table-hover hover">
					        <thead>
					        	<tr>
					                <th>Ticket</th>
					                <th>กิจกรรม</th>
					                <th>ดี</th>
					                <th>เสีย</th>
					                <th>ชำรุด</th>
					                <th>วันที่</th>
					                <th>ผู้ทำรายการ</th>
					                
					            </tr>
					        	
					        </thead>
					     
					        <tfoot>
					            <tr>
					                <th id="filter">Ticket</th>
					                <th id="filter">กิจกรรม</th>
					                <th>ดี</th>
					                <th>เสีย</th>
					                <th>ชำรุด</th>
					                <th>วันที่</th>
					                <th>ผู้ทำรายการ</th>
					            </tr>
					        </tfoot>
			 
			    		</table>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดอื่นๆ</h3>
				</div>
				<div class="panel-body">
				<input name="customer_id" id="customer_id" type="hidden" value="<?php echo $customer['Cust_ID'];?>" />
				<table class="table table-condensed">
					<tbody>
						<tr>
							<th colspan="6"><h2 class="text-center"><?php echo $customer['CusLine_Name'];?></h2></th>
						</tr>
						<tr>
							<th class="danger text-right">รหัสลูกค้า</th>
							<td><?php echo $customer['Cust_ID'];?></td>
							<th class="danger text-right">ชื่อ</th>
							<td><?php echo $customer['Cust_Name'];?></td>
							<th class="danger text-right">ผู้ติดต่อ</th>
							<td><?php echo $customer['Cust_Contact'];?></td>
						</tr>
						<tr>
							<th class="danger text-right">ที่อยู่</th>
							<td colspan="5"><?php echo $customer['Cust_Addr'];?></td>
						</tr>	
						<tr>
							<th class="danger text-right">เบอร์โทร</th>
							<td><?php echo $customer['Cust_Tel'];?></td>
							<th class="danger text-right">เบอร์แฟกซ์</th>
							<td><?php echo $customer['Cust_Fax'];?></td>
							<th class="danger text-right">Email</th>
							<td><?php echo $customer['Cust_Email'];?></td>
						</tr>	
						<tr>
							<th class="danger text-right">รายละเอืยดอื่นๆ</th>
							<td colspan="5"><?php echo $customer['OtherNote'];?></td>
						</tr>
					</tbody>
				</table>
				
				</div>	
				
			</div>
			
			
		</div>
	</div><!-- end .row -->
	
</div>
<!-- end .container-fluid -->

