<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form role="form" class="form-horizontal" name="form_customer" enctype="multipart/form-data" id="form_customer" method="post" action="<?php echo site_url('customer/update_post')?>">
				<input type="hidden" name="Cust_AutoID" id="Cust_AutoID" value="<?php echo $customer[0]['Cust_AutoID'];?>" />
				<fieldset id="" class="">
			  		<legend><?php echo $title;?></legend>
					<div class="col-md-12">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Cust_ID" class="control-label">รหัสลูกค้า</label></td>
								<td><input type="text" name="Cust_ID" id="Cust_ID" class="col-sm-5 form-control input-sm" value="<?php echo $customer[0]['Cust_ID'];?>" readonly /></td>
								<td class="text-right info" style="width: 100px;"><label for="Cust_Name" class="control-label">ชื่อลูกค้า</label></td>
								<td colspan="3"><input type="text" name="Cust_Name" id="Cust_Name" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Name'];?>" autofocus /></td>
								
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Contact" class="control-label">ชื่อผู้ติดต่อ</label></td>
								<td colspan="3"><input type="text" name="Cust_Contact" id="Cust_Contact" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Contact'];?>" /></td>
								<td class="text-right info" style="width: 100px;"><label for="CustLine_ID" class="control-label">สายลูกค้า</label></td>
								<td>
									<select class="form-control input-sm" name="CustLine_ID" id="CustLine_ID">
										<?php echo $customer_line_dropdown;?>
									</select>
								</td>

							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Addr" class="control-label">ที่อยู่</label></td>
								<td colspan="5">
									<input type="text" name="Cust_Addr" id="Cust_Addr" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Addr'];?>" />
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Tel" class="control-label">เบอร์ติดต่อ</label></td>
								<td><input type="text" name="Cust_Tel" id="Cust_Tel" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Tel'];?>" /></td>
								<td class="text-right info"><label for="Cust_Fax" class="control-label">แฟกซ์</label></td>
								<td><input type="text" name="Cust_Fax" id="Cust_Fax" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Fax'];?>" /></td>
								<td class="text-right info"><label for="Cust_Email" class="control-label">E-Mail</label></td>
								<td><input type="text" name="Cust_Email" id="Cust_Email" class="form-control input-sm" value="<?php echo $customer[0]['Cust_Email'];?>" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="OtherNote" class="control-label">หมายเหตุ</label></td>
								<td colspan="3">
									<input type="text" name="OtherNote" id="OtherNote" class="form-control input-sm" value="<?php echo $customer[0]['OtherNote'];?>" />
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Photo" class="control-label">รูปภาพ (.jpg|.jpeg|.png)</label></td>
								<td colspan="5">
									<input type="file" id="Cust_Photo" name="Cust_Photo">
									<?php if($customer[0]['Cust_Photo']):?>
								    <a href="<?php echo $this->config->item('customer_img_path').$customer[0]['Cust_Photo'];?>" target="_blank"><?php echo $customer[0]['Cust_Photo'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_photo" data-remove="Cust_Photo"><span class="glyphicon glyphicon-remove"></span></a>
								    <?php endif;?>
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Map" class="control-label">แผนที่ (.jpg|.jpeg|.png)</label></td>
								<td colspan="5">
									<input type="file" id="Cust_Map" name="Cust_Map">
									<?php if($customer[0]['Cust_Map']):?>
								    <a href="<?php echo $this->config->item('customer_map_path').$customer[0]['Cust_Map'];?>" target="_blank"><?php echo $customer[0]['Cust_Map'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_map" data-remove="Cust_Map"><span class="glyphicon glyphicon-remove"></span></a>
								    <?php endif;?>
								</td>
							</tr>
						</table>
					</div>	<!-- .col-md-6 -->
					
				</fieldset>
			</form>
			<div class="col-md-8" style="margin: 10px;" id="error_msg"></div>				 
			<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
				<input type="submit" id="btn_save" class="btn btn-primary" value="บันทึก" />
				<input type="reset" id="btn_reset" class="btn btn-danger" value="ล้างฟอร์ม" />
			</div>
		</div> <!-- end col-md-6 -->
		
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
	</div><!-- end .row -->
</div>

<!-- end .container-fluid -->
