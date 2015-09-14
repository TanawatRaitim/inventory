<div class="container-fluid">
	<div class="row" style="padding: 0px;">
		<div class="col-md-12" style="padding: 0px;">
			<div class="page-header"  style="padding: 0px;">
				<h1 class="text-center"><?php echo $customer['Cust_Name'];?> <small><?php echo $customer['Cust_ID'];?></small></h1>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-2">
			<!-- 
			<div class="col-md-12">
				<h1 class="text-center"><?php echo $customer['Cust_Name'];?></h1>
			</div>
			 -->
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
		<div class="col-md-10">
			
			<div class="col-md-12">
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
						                <th>สินค้า</th>
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
						                <th id="filter">สินค้า</th>
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
			</div>
			
			
			<div class="col-md-6">
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
			
			<div class="col-md-6">
				
				<div role="tabpanel">
	
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				  	
				  	<?php if($product_type->num_rows()!=0):?>
				  		
				  		<?php foreach($product_type->result_array() as $key=>$value):?>
				  			
				  			<?php if($value['ProType_ID']==1):?>
				  				<li role="presentation" class="active"><a href="#type_<?php echo $value['ProType_ID'];?>" aria-controls="type_<?php echo $value['ProType_ID'];?>" role="tab" data-toggle="tab"><?php echo $value['ProType_Name'];?></a></li>
				  			<?php else:?>
				  				<li role="presentation"><a href="#type_<?php echo $value['ProType_ID'];?>" aria-controls="type_<?php echo $value['ProType_ID'];?>" role="tab" data-toggle="tab"><?php echo $value['ProType_Name'];?></a></li>
				  			<?php endif;?>		
						<?php endforeach;?>	
				  	<?php endif;?>	
				</ul>
				
				  <!-- Tab panes -->
				  <div class="tab-content">
				  	
				  	<?php if($product_type->num_rows()!=0):?>
				  		
				  		<?php foreach($product_type->result_array() as $key=>$value):?>
				  			
				  			<?php if($value['ProType_ID']==1):?>
				  				<div role="tabpanel" class="tab-pane active" id="type_<?php echo $value['ProType_ID'];?>">
				  			<?php else:?>
				  				<div role="tabpanel" class="tab-pane" id="type_<?php echo $value['ProType_ID'];?>">
				  			<?php endif;?>
				  			<div class="page-header">
				  				<h2>ประเภท "<?php echo $value['ProType_Name'];?>"</h2>
				  			</div>
				  			<table id="return_standard" class="table table-hover table-condensed table-striped table-bordered">
				  				<thead>
				  					<tr>
				  						<th>ประเภทการออกสินค้า</th>
				  						<th>Standard</th>
				  						<th>Customize</th>
				  					</tr>
				  				</thead>
				  			
								<?php foreach($standard_return as $key2=>$value2):?>
									
									<?php if($value2['ProType_ID'] == $value['ProType_ID']):?>
										<?php if($value2['Is_Customize']):?>
											<tr class="success">
										<?php else:?>
											<tr>
										<?php endif;?>		
											<td><?php echo $value2['ProFreq_Name'];?></td>
											<td><?php echo $value2['Period_Name'];?></td>
											<?php if($value2['Is_Customize']):?>
												<td><a href="#" data-value="<?php echo $value2['Customize_Return_Period'];?>" data-pk="<?php echo $value2['ProType_ID'];?>-<?php echo $value2['ProFreq_ID'];?>"><?php echo $value2['Customize_Return_Period_Name'];?></a></td>
												
											<?php else:?>
											
												<td><a href="#" data-value="<?php echo $value2['Period_Val'];?>" data-pk="<?php echo $value2['ProType_ID'];?>-<?php echo $value2['ProFreq_ID'];?>"><?php echo $value2['Period_Name'];?></a></td>	
												
											<?php endif;?>	
											
										</tr>
	
									<?php endif;?>	
								
								<?php endforeach;?>	
								
							</table>	
							</div> <!-- end div.tabpanel -->
						<?php endforeach;?>
				  	<?php endif;?>	
					</div>
				</div> <!-- end tab-panel -->
			
				
			</div>
			
			
			
			
			
			
			
			
		</div>
	</div><!-- end .row -->
	
</div>
<!-- end .container-fluid -->

