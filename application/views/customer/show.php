<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-4">
			<div class="col-md-6">
				<div class="thumbnail">
					<img src="<?php echo $customer['Cust_Photo'];?>" class="img-thumbnail" />
					<img src="<?php echo $customer['Cust_Map'];?>" class="img-thumbnail" />
					<div class="caption">
						<h3 class="text-center"><?php echo $customer['Cust_Name'];?></h3>
						<p>
							
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
					<img src="<?php echo $customer['Cust_Photo'];?>" class="img-thumbnail" />
					<img src="<?php echo $customer['Cust_Map'];?>" class="img-thumbnail" />
					<div class="caption">
						<h3 class="text-center"><?php echo $customer['Cust_Name'];?></h3>
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
					                <th>วันที่</th>
					                <th>ผู้ทำรายการ</th>
					            </tr>
					        	
					        </thead>
					     
					        <tfoot>
					            <tr>
					                <th id="filter">Ticket</th>
					                <th id="filter">กิจกรรม</th>
					                <th>วันที่</th>
					                <th>ผู้ทำรายการ</th>
					            </tr>
					        </tfoot>
			 
			    		</table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end .row -->
	<div class="row">
		
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดอื่นๆ</h3>
				</div>
				<div class="panel-body">
					<input name="customer_id" id="customer_id" type="hidden" value="<?php echo $customer['Cust_ID'];?>" />
					
					</div>	
					
				</div>
			</div>
			<div class="col-md-4">
			
			
		</div>
		</div>
	</div>
	


</div>
<!-- end .container-fluid -->

