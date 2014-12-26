<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form role="form" class="form-horizontal" name="form_product" enctype="multipart/form-data" id="form_product" method="post" action="<?php echo site_url('product/update_post')?>">
				<input type="hidden" name="Product_AutoID" id="Product_AutoID" value="<?php echo $product[0]['Product_AutoID'];?>" />
				<fieldset id="" class="">
			  		<legend>ข้อมูลสินค้า</legend>
					<div class="col-md-12">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Product_ID" class="control-label">รหัสสินค้า</label></td>
								<td><input type="text" name="Product_ID" id="Product_ID" data-mask="AA-AAAA-AAAAA" class="form-control input-sm" readonly="readonly" value="<?php echo $product[0]['Product_ID'];?>" /></td>
								<td class="text-right info"><label for="Product_Name" class="control-label">ชื่อสินค้า</label></td>
								<td><input type="text" name="Product_Name" id="Product_Name" class="form-control input-sm" autofocus="autofocus" value="<?php echo $product[0]['Product_Name'];?>" /></td>
								<td class="text-right info"><label for="Product_Vol" class="control-label">เล่มที่</label></td>
								<td><input type="text" name="Product_Vol" id="Product_Vol" class="form-control input-sm" value="<?php echo $product[0]['Product_Vol'];?>" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="ProType_ID" class="control-label">ประเภท</label></td>
								<td>
									<select name="ProType_ID" id="ProType_ID" class="form-control input-sm">
										<?php echo $product_type_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="ProGroup_ID" class="control-label">กลุ่ม</label></td>
								<td>
									<select name="ProGroup_ID" id="ProGroup_ID" class="form-control input-sm">
										<?php echo $product_group_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="ProCate_ID" class="control-label">หมวด</label></td>
								<td>
									<select name="ProCate_ID" id="ProCate_ID" class="form-control input-sm">
										<?php echo $product_category_dropdown;?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="ProFreq_ID" class="control-label">การออกหนังสือ</label></td>
								<td>
									<select name="ProFreq_ID" id="ProFreq_ID" class="form-control input-sm">
										<?php echo $product_frequency_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="Price" class="control-label">ราคา</label></td>
								<td>
									<input type="text" name="Price" id="Price" class="form-control input-sm" placeholder="บาท" value="<?php echo $product[0]['Price'];?>" />
								</td>
								<td class="text-right info"><label for="Main_Inventory" class="control-label">คลังหลัก</label></td>
								<td>
									<select name="Main_Inventory" id="Main_Inventory" class="form-control input-sm">
										<?php echo $inventory_dropdown;?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="TypeReg_ID" class="control-label">ทะเบียน</label></td>
								<td>
									<select name="TypeReg_ID" id="TypeReg_ID" class="form-control input-sm">
										<?php echo $product_register_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="Barcode_Main" class="control-label">Barcode</label></td>
								<td><input type="text" name="Barcode_Main" id="Barcode_Main" class="form-control input-sm" value="<?php echo $product[0]['Barcode_Main'];?>" /></td>
								<td class="text-right info"><label for="Barcode_Internal" class="control-label">Barcode ภายใน</label></td>
								<td>
									<input type="text" name="Barcode_Internal" id="Barcode_Internal" class="form-control input-sm" placeholder="" value="<?php echo $product[0]['Barcode_Internal'];?>" />
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Width" class="control-label">กว้าง</label></td>
								<td><input type="text" name="Width" id="Width" class="form-control input-sm" placeholder="มม." value="<?php echo $product[0]['Width'];?>" /></td>
								<td class="text-right info"><label for="Height" class="control-label">ยาว</label></td>
								<td><input type="text" name="Height" id="Height" class="form-control input-sm" placeholder="มม." value="<?php echo $product[0]['Height'];?>" /></td>
								<td class="text-right info"><label for="Bold" class="control-label">หนา</label></td>
								<td><input type="text" name="Bold" id="Bold" class="form-control input-sm" placeholder="มม." value="<?php echo $product[0]['Bold'];?>" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Weight" class="control-label">น้ำหนัก</label></td>
								<td>
									<input type="text" name="Weight" id="Weight" class="form-control input-sm" placeholder="กรัม" value="<?php echo $product[0]['Weight'];?>" />
								</td>
								<td class="text-right info"><label for="Definition" class="control-label">คำอธิบาย</label></td>
								<td colspan="3"><input type="text" name="Definition" id="Definition" class="form-control input-sm" value="<?php echo $product[0]['Definition'];?>" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="MonitorStat_ID" class="control-label">สถานะการ Monitor</label></td>
								<td>
									<select name="MonitorStat_ID" id="MonitorStat_ID" class="form-control input-sm">
										<?php echo $monitor_status_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="RowStatus" class="control-label">สถานะการขาย</label></td>
								<td>
									<select name="RowStatus" id="RowStatus" class="form-control input-sm">
										<?php echo $product_status_dropdown;?>
									</select>
								</td>
								
							</tr>
						</table>

						<table class="table">
								
							<tr>	
								<td class="text-right info"><label for="Product_Photo" class="control-label">รูปภาพ (.jpg|.jpeg|.png)</label></td>
								<td>
									    <input type="file" id="Product_Photo" name="Product_Photo">
									    <?php if($product[0]['Product_Photo']):?>
									    <a href="<?php echo $this->config->item('productimg_path').$product[0]['Product_Photo'];?>" target="_blank"><?php echo $product[0]['Product_Photo'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_photo" data-remove="Product_Photo"><span class="glyphicon glyphicon-remove"></span></a>
									    <?php endif;?>
								</td>
								<td class="text-right info"><label for="Product_SpecSheet" class="control-label">Spec Sheet (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_SpecSheet" name="Product_SpecSheet">
									    <?php if($product[0]['Product_SpecSheet']):?>
									    <a href="<?php echo $this->config->item('specsheet_path').$product[0]['Product_SpecSheet'];?>" target="_blank"><?php echo $product[0]['Product_SpecSheet'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_specsheet" data-remove="Product_SpecSheet"><span class="glyphicon glyphicon-remove"></span></a>
									    <?php endif;?>
								</td>
								<td></td>
								<td></td>
							</tr>
							
							<tr>
								<td class="text-right info"><label for="Product_SaleSheet" class="control-label">Sale Sheet (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_SaleSheet" name="Product_SaleSheet">
									    <?php if($product[0]['Product_SaleSheet']):?>
									    <a href="<?php echo $this->config->item('salesheet_path').$product[0]['Product_SaleSheet'];?>" target="_blank"><?php echo $product[0]['Product_SaleSheet'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_salesheet" data-remove="Product_SaleSheet"><span class="glyphicon glyphicon-remove"></span></a>
									    <?php endif;?>
								</td>
								<td class="text-right info"><label for="Product_DocOther" class="control-label">เอกสารอื่นๆ (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_DocOther" name="Product_DocOther">
									    <?php if($product[0]['Product_DocOther']):?>
									    <a href="<?php echo $this->config->item('docother_path').$product[0]['Product_DocOther'];?>" target="_blank"><?php echo $product[0]['Product_DocOther'];?></a> &nbsp;&nbsp;<a style="color:red;" href="#" id="remove_docother" data-remove="Product_DocOther"><span class="glyphicon glyphicon-remove"></span></a>
									    <?php endif;?>
								</td>
								<td></td>
								<td></td>
							</tr>
						</table>

					</div>
				</fieldset>
				<fieldset id="" class="">
			  		<legend>ข้อมูลการผลิต</legend>
					<div class="col-md-12">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Order_Num" class="control-label">เลขที่ใบสั่งผลิต</label></td>
								<td><input type="text" name="Order_Num" id="Order_Num" class="form-control input-sm" value="<?php echo $product[0]['Order_Num'];?>" /></td>
								<td class="text-right info"><label for="Manufact_Num" class="control-label">ครั้งที่ผลิต</label></td>
								<td><input type="text" name="Manufact_Num" id="Manufact_Num" class="form-control input-sm" value="<?php echo $product[0]['Manufact_Num'];?>" /></td>
								<td class="text-right info"><label for="Manufact_StartDate" class="control-label">วันที่ผลิต</label></td>
								<td><input type="text" data-date-format="DD/MM/YYYY" name="Manufact_StartDate" id="Manufact_StartDate" class="form-control input-sm" data-date-format="YYYY-MM-DD" value="<?php echo $product[0]['Manufact_StartDate'];?>" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="QTY_Production" class="control-label">ยอดสั่งผลิต</label></td>
								<td><input type="text" name="QTY_Production" id="QTY_Production" class="form-control input-sm" value="<?php echo $product[0]['QTY_Production'];?>" /></td>
								<td class="text-right info"><label for="QTY_Reserve" class="control-label">ยอดสำรองสินค้า</label></td>
								<td><input type="text" name="QTY_Reserve" id="QTY_Reserve" class="form-control input-sm" value="<?php echo $product[0]['QTY_Reserve'];?>" /></td>
								<td class="text-right info"><label for="QTY_Sample" class="control-label">ยอดตัวอย่าง</label></td>
								<td><input type="text" name="QTY_Sample" id="QTY_Sample" class="form-control input-sm" value="<?php echo $product[0]['QTY_Sample'];?>" /></td>
								
							</tr>
							<tr>
								<td class="text-right info"><label for="QTY_Distribution" class="control-label">ยอดกระจาย</label></td>
								<td><input type="text" name="QTY_Distribution" id="QTY_Distribution" class="form-control input-sm" value="<?php echo $product[0]['QTY_Distribution'];?>" /></td>
								<td class="text-right info"><label for="QTY_ReceiveInventory" class="control-label">ยอดรับเข้าคลัง</label></td>
								<td><input type="text" name="QTY_ReceiveInventory" id="QTY_ReceiveInventory" class="form-control input-sm" value="<?php echo $product[0]['QTY_ReceiveInventory'];?>" /></td>
								<td class="text-right info"><label for="ProduceBy" class="control-label">ผลิตโดยกอง</label></td>
								<td>
									<select name="ProduceBy" id="ProduceBy" class="form-control input-sm">
										<?php echo $department_dropdown;?>
									</select>
								</td>
							</tr>
						</table>
					</div>	<!-- col-md-8 -->
				</fieldset>
				
				
				<fieldset>
			  		<legend>ข้อมูลอายุสินค้า</legend>
					<div class="col-md-12">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Manufact_EndDate" class="control-label">วันรับเข้าคลัง</label></td>
								<?php if($status_end_date):?>
								<td><input   data-date-format="DD/MM/YYYY" type="text" name="Manufact_EndDate" id="Manufact_EndDate" class="form-control input-sm" data-date-format="YYYY-MM-DD" value="<?php echo $product[0]['Manufact_EndDate'];?>" /></td>
								<?php else:?>
								<td><input   data-date-format="DD/MM/YYYY" type="text" name="Manufact_EndDate" id="Manufact_EndDate" class="form-control input-sm" data-date-format="YYYY-MM-DD" value="<?php echo $product[0]['Manufact_EndDate'];?>" readonly='readonly' /></td>
								<?php endif;?>	
								<td class="text-right info"><label for="Age_Inventory" class="control-label">อายุคงคลัง</label></td>
								<td>
									<?php if($has_age_inventory):?>
									<select id="Age_Inventory" class="form-control input-sm" disabled="disabled">
										<?php echo $inventory_age_dropdown;?>
									</select>
									<input type="hidden" name="Age_Inventory" value="<?php echo $product[0]['Age_Inventory'];?>" />	
									<?php else:?>	
									<select name="Age_Inventory" id="Age_Inventory" class="form-control input-sm">
										<?php echo $inventory_age_dropdown;?>
									</select>
									<?php endif;?>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุคงคลัง</label></td>
								<td><input type="text" id="age_inventory_result" readonly="readonly" class="form-control input-sm" value="<?php echo convert_mssql_date($product[0]['Age_ExpireInventory']);?>"  /></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="text-right info"><label for="Age_Sale" class="control-label">อายุการวางขาย</label></td>
								<td>
									<?php if($has_age_sale):?>
									<select id="Age_Sale" class="form-control input-sm" disabled="disabled">
										<?php echo $sale_age_dropdown;?>
									</select>
									<input type="hidden" name="Age_Sale" value="<?php echo $product[0]['Age_Sale'];?>" />	
									<?php else:?>	
									<select name="Age_Sale" id="Age_Sale" class="form-control input-sm">
										<?php echo $sale_age_dropdown;?>
									</select>
									<?php endif;?>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุวางขาย</label></td>
								<td><input type="text" id="age_sale_result" readonly="readonly" class="form-control input-sm" value="<?php echo convert_mssql_date($product[0]['Age_ExpireSale']);?>" /></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="text-right info"><label for="Age_AverageReturn" class="control-label">อายุรับคืน</label></td>
								<td>
									<?php if($has_age_return):?>
									<select id="Age_AverageReturn" class="form-control input-sm" disabled="disabled">
										<?php echo $return_age_dropdown;?>
									</select>
									<input type="hidden" name="Age_AverageReturn" value="<?php echo $product[0]['Age_AverageReturn'];?>" />	
									<?php else:?>	
									<select name="Age_AverageReturn" id="Age_AverageReturn" class="form-control input-sm">
										<?php echo $return_age_dropdown;?>
									</select>
									<?php endif;?>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุรับคืน</label></td>
								<td><input type="text" id="age_return_result" readonly="readonly" class="form-control input-sm" value="<?php echo convert_mssql_date($product[0]['Age_ExpireReturn']);?>" /></td>
							</tr>
							
						</table>
					</div>	<!-- col-md-8 -->
				</fieldset>
				
			</form>
			<div class="col-md-8" style="margin: 10px;" id="error_msg"></div>
			<div class="col-md-6 col-md-offset-3">
				<input type="submit" name="btn_save" id="btn_save" class="btn btn-primary" value="บันทึกสินค้าหลัก" />
				<!-- <input type="submit" name="save_and_main" class="btn btn-primary" value="บันทึกและกลับสู่หน้าหลัก" />
				<input type="submit" name="save_and_new" class="btn btn-primary" value="บันทึกและเพิ่มใหม่" /> -->
				<input type="reset" name="reset" class="btn btn-danger" value="ล้างฟอร์ม" />
				<!-- <input type="submit" name="cancel_and_main" class="btn btn-danger" value="ยกเลิกและกลับสู่หน้าหลัก" /> -->
			</div>
			
			<div class="col-md-12 well well-sm" style="margin-top: 20px;">
				<form role="form" class="form-horizontal" name="form_premium" enctype="multipart/form-data" id="form_premium" method="post" action="<?php echo site_url('product/premium_add')?>">
					<input type="hidden" name="Product_ID" id="Product_ID" value="<?php echo $product[0]['Product_ID'];?>" />
					<fieldset id="" class="">
				  		<legend>สินค้าประกอบ</legend>
				  			<table class="table">
								<tr>
									<td class="text-right danger"><label for="Premium_ID" class="control-label">รหัสสินค้าประกอบ</label></td>
									<td><input type="text" name="Premium_ID" id="Premium_ID" class="form-control input-sm" placeholder="" /></td>
									<td class="text-right danger"><label for="Premium_Name" class="control-label">ชื่อ</label></td>
									<td><input type="text" name="Premium_Name" id="Premium_Name" class="form-control input-sm" placeholder="" /></td>
									
								</tr>
								<tr>
									<td class="text-right danger"><label for="Premium_Detail" class="control-label">รายละเอียด</label></td>
									<td colspan="3"><input type="text" name="Premium_Detail" id="Premium_Detail" class="form-control input-sm" placeholder="" /></td>
									
								</tr>
								<tr>
									<td class="text-right danger"><label for="Premium_OtherNote" class="control-label">รายละเอียดอื่นๆ</label></td>
									<td colspan="3"><input type="text" name="Premium_OtherNote" id="Premium_OtherNote" class="form-control input-sm" placeholder="" /></td>
									
								</tr>
								<tr>
									<td class="text-right danger"><label for="Premium_QTY" class="control-label">จำนวน</label></td>
									<td><input type="text" name="Premium_QTY" id="Premium_QTY" class="form-control input-sm" placeholder="" /></td>
									<td class="text-right danger"><label for="Premium_Unit" class="control-label">หน่วย</label></td>
									<td><input type="text" name="Premium_Unit" id="Premium_Unit" class="form-control input-sm" placeholder="" /></td>
									
								</tr>
							</table>
							<table class="table">
								<tr>
									<td class="text-right danger"><label for="Premium_Photo" class="control-label">ภาพสินค้าประกอบ (.jpg|.jpeg|.png)</label></td>
									<td><input type="file" name="Premium_Photo" id="Premium_Photo" /></td>
								</tr>
							</table>	
					</fieldset>
				</form>
				<div class="col-md-12" style="margin: 10px;" id="error_premium_msg"></div>
				<div class="col-md-6 col-md-offset-4">
					<input type="submit" name="btn_save_premium" id="btn_save_premium" class="btn btn-primary" value="บันทึกสินค้าประกอบ" />
					<input type="reset" name="reset" class="btn btn-danger" value="ล้างฟอร์ม" />
				</div>
				<div class="col-md-12" style="padding-top: 20px;">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>รูป</th>
										<th>ID</th>
										<th>ชื่อสินค้าประกอบ</th>
										<th>จำนวน(หน่วย)</th>
										<th>action</th>
									</tr>
								</thead>
								<tbody>
				<?php if($premium->num_rows()==0):?>
					
					<tr>
						<td colspan="5">ไม่มีรายละเอียดสินค้าประกอบ</td>
					</tr>
					
				<?php else:?>
					
					<?php foreach($premium->result_array() as $value):?>
						<tr id="<?php echo $value['Premium_AutoID'];?>">
							<td rowspan="3"><img width="80"src="<?php echo $value['Premium_Photo'];?>" class="img-rounded" /></td>
							<td><?php echo $value['Premium_ID'];?></td>
							<td><?php echo $value['Premium_Name'];?></td>
							<td><?php echo $value['Premium_QTY'];?> <?php echo $value['Premium_Unit'];?></td>
							<td><a style="color:red;" title="ลบ" href="#" id="remove_premium" data-remove="<?php echo $value['Premium_AutoID'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
						</tr>
						<tr id="<?php echo $value['Premium_AutoID'];?>">
							<th class="text-right">รายละเอียด:</th>
							<td colspan="3"><?php echo $value['Premium_Detail'];?></td>
						</tr>
						<tr id="<?php echo $value['Premium_AutoID'];?>">
							<th class="text-right">รายละเอียดอื่นๆ:</th>
							<td colspan="3"><?php echo $value['Premium_OtherNote'];?></td>
						</tr>
						
					<?php endforeach;?>	
					
				<?php endif;?>								
								</tbody>
							</table>
						</div>
				</div><!-- end col-md-12 -->				 
			
		</div><!-- end col-md-7 -->
		
		<div class="col-md-5"><!-- right side -->
			
			

						
			
			<!-- extend age inventory -->
			<?php if($age_inventory_form):?>
			<div class="col-md-12 well well-sm">
				<form role="form" class="form-horizontal" name="form_extend_age_inventory" enctype="multipart/form-data" id="form_extend_age_inventory" method="post" action="<?php echo site_url('product/extend_age_inventory')?>">
					<input type="hidden" name="Product_ID" id="Product_ID" value="<?php echo $product[0]['Product_ID'];?>" />
					<input type="hidden" name="Old_Age_Inventory" id="Old_Age_Inventory" value="<?php echo $product[0]['Age_Inventory'];?>" />
					<fieldset id="" class="">
				  		<legend>ต่ออายุคงคลัง</legend>
				  			<table class="table">
								<tr>
									<td class="text-right danger"><label for="Old_Age_Inventory" class="control-label">อายุคงคลังเดิม</label></td>
									<td>
										<select name="" id="" class="form-control input-sm" disabled="disabled">
											<?php echo $inventory_age_dropdown;?>
										</select>
									</td>
									<td class="text-right danger"><label for="Old_Age_ExpireInventory" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="Old_Age_ExpireInventory" id="Old_Age_ExpireInventory" class="form-control input-sm" readonly="readonly"  value="<?php echo convert_mssql_date($product[0]['Age_ExpireInventory']);?>" /></td>
								</tr>
								<tr>
									<td class="text-right danger"><label for="Old_Age_Inventory" class="control-label">อายุคงคลังใหม่</label></td>
									<td>
										<select name="New_Age_Inventory" id="New_Age_Inventory" class="form-control input-sm">
											<?php echo $inventory_age_dropdown_blank;?>
										</select>
									</td>
									<td class="text-right danger"><label for="New_Age_ExpireInventory" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="New_Age_ExpireInventory" id="New_Age_ExpireInventory" class="form-control input-sm" readonly="readonly" /></td>
								</tr>
							</table>	
					</fieldset>
				</form>
					<div class="col-md-12" style="margin: 2px;" id="error_extend_inventory"></div>
					<div class="col-md-6 col-md-offset-4">
						<input type="button" id="btn_extend_age_inventory" class="btn btn-xs btn-primary" value="ต่ออายุคงคลัง" />
						<input type="reset" class="btn btn-xs btn-danger" value="ล้างฟอร์ม" />
					</div>
				
				<div class="col-md-12" style="padding-top: 20px;">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>อายุคงคลังเดิม</th>
										<th>อายุใหม่</th>
										<th>วันที่ทำรายการ</th>
										<th>ทำรายการโดย</th>
									</tr>
								</thead>
								<tbody>
				<?php if($age_inventory_history->num_rows()==0):?>
					
					<tr>
						<td colspan="4">ยังไม่มีประวัติการต่ออายุคงคลัง</td>
					</tr>
					
				<?php else:?>
					
					<?php foreach($age_inventory_history->result_array() as $value):?>
						<tr>
							<td><?php echo convert_mssql_date($value['Old_Age_ExpireInventory']);?></td>
							<td><?php echo convert_mssql_date($value['New_Age_ExpireInventory']);?></td>
							<td><?php echo $value['RowCreatedDate'];?></td>
							<td><?php echo get_employee_name($value['RowCreatedPerson']);?></td>
						</tr>
						
					<?php endforeach;?>	
					
				<?php endif;?>								
								</tbody>
							</table>
						</div>
				</div><!-- end col-md-12 -->	
			<?php endif;?>	
				<!-- end extend age inventory -->

			
			<!-- extend age sale -->
			<?php if($age_sale_form):?>
			<div class="col-md-12 well well-sm">
				<form role="form" class="form-horizontal" name="form_extend_age_sale" enctype="multipart/form-data" id="form_extend_age_sale" method="post" action="<?php echo site_url('product/extend_age_sale')?>">
					<input type="hidden" name="Product_ID" id="Product_ID" value="<?php echo $product[0]['Product_ID'];?>" />
					<input type="hidden" name="Old_Age_Sale" id="Old_Age_Sale" value="<?php echo $product[0]['Age_Sale'];?>" />
					<fieldset id="" class="">
				  		<legend>ต่ออายุการวางขาย</legend>
				  			<table class="table">
								<tr>
									<td class="text-right danger"><label for="Old_Age_Sale" class="control-label">อายุวางขายเดิม</label></td>
									<td>
										<select name="" id="" class="form-control input-sm" disabled="disabled">
											<?php echo $sale_age_dropdown;?>
										</select>
									</td>
									<td class="text-right danger"><label for="Old_Age_ExpireSale" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="Old_Age_ExpireSale" id="Old_Age_ExpireSale" class="form-control input-sm" readonly="readonly"  value="<?php echo convert_mssql_date($product[0]['Age_ExpireSale']);?>" /></td>
								</tr>
								<tr>
									<td class="text-right danger"><label for="Old_Age_Sale" class="control-label">อายุวางขายใหม่</label></td>
									<td>
										<select name="New_Age_Sale" id="New_Age_Sale" class="form-control input-sm">
											<?php echo $sale_age_dropdown_blank;?>
										</select>
									</td>
									<td class="text-right danger"><label for="New_Age_ExpireSale" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="New_Age_ExpireSale" id="New_Age_ExpireSale" class="form-control input-sm" readonly="readonly" /></td>
								</tr>
							</table>	
					</fieldset>
				</form>
					<div class="col-md-12" style="margin: 2px;" id="error_extend_sale"></div>
					<div class="col-md-6 col-md-offset-4">
						<input type="button" id="btn_extend_age_sale" class="btn btn-xs btn-primary" value="ต่ออายุการวางขาย" />
						<input type="reset" class="btn btn-xs btn-danger" value="ล้างฟอร์ม" />
					</div>
				
				<div class="col-md-12" style="padding-top: 20px;">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>อายุวางขายเดิม</th>
										<th>อายุใหม่</th>
										<th>วันที่ทำรายการ</th>
										<th>ทำรายการโดย</th>
									</tr>
								</thead>
								<tbody>
				<?php if($age_sale_history->num_rows()==0):?>
					
					<tr>
						<td colspan="4">ยังไม่มีประวัติการต่ออายุการวางขาย</td>
					</tr>
					
				<?php else:?>
					
					<?php foreach($age_sale_history->result_array() as $value):?>
						<tr>
							<td><?php echo convert_mssql_date($value['Old_Age_ExpireSale']);?></td>
							<td><?php echo convert_mssql_date($value['New_Age_ExpireSale']);?></td>
							<td><?php echo $value['RowCreatedDate'];?></td>
							<td><?php echo get_employee_name($value['RowCreatedPerson']);?></td>
						</tr>
						
					<?php endforeach;?>	
					
				<?php endif;?>								
								</tbody>
							</table>
						</div>
				</div><!-- end col-md-12 -->
			<?php endif;?>		
				<!-- end extend age sale -->
				
			<!-- extend age return -->
			<?php if($age_return_form):?>
			<div class="col-md-12 well well-sm">
				<form role="form" class="form-horizontal" name="form_extend_age_return" enctype="multipart/form-data" id="form_extend_age_return" method="post" action="<?php echo site_url('product/extend_age_return')?>">
					<input type="hidden" name="Product_ID" id="Product_ID" value="<?php echo $product[0]['Product_ID'];?>" />
					<input type="hidden" name="Old_Age_AverageReturn" id="Old_Age_AverageReturn" value="<?php echo $product[0]['Age_AverageReturn'];?>" />
					<fieldset id="" class="">
				  		<legend>ต่ออายุรับคืนสินค้า</legend>
				  			<table class="table">
								<tr>
									<td class="text-right danger"><label for="Old_Age_AverageReturn" class="control-label">อายุรับคืนเดิม</label></td>
									<td>
										<select name="" id="" class="form-control input-sm" disabled="disabled">
											<?php echo $return_age_dropdown;?>
										</select>
									</td>
									<td class="text-right danger"><label for="Old_Age_ExpireReturn" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="Old_Age_ExpireReturn" id="Old_Age_ExpireReturn" class="form-control input-sm" readonly="readonly"  value="<?php echo convert_mssql_date($product[0]['Age_ExpireReturn']);?>" /></td>
								</tr>
								<tr>
									<td class="text-right danger"><label for="Old_Age_AverageReturn" class="control-label">อายุรับคืนใหม่</label></td>
									<td>
										<select name="New_Age_AverageReturn" id="New_Age_AverageReturn" class="form-control input-sm">
											<?php echo $return_age_dropdown_blank;?>
										</select>
									</td>
									<td class="text-right danger"><label for="New_Age_ExpireReturn" class="control-label">หมดอายุ</label></td>
									<td><input type="text" name="New_Age_ExpireReturn" id="New_Age_ExpireReturn" class="form-control input-sm" readonly="readonly" /></td>
								</tr>
							</table>	
					</fieldset>
				</form>
					<div class="col-md-12" style="margin: 2px;" id="error_extend_return"></div>
					<div class="col-md-6 col-md-offset-4">
						<input type="button" id="btn_extend_age_return" class="btn btn-xs btn-primary" value="ต่ออายุรับคืน" />
						<input type="reset" class="btn btn-xs btn-danger" value="ล้างฟอร์ม" />
					</div>
				
				<div class="col-md-12" style="padding-top: 20px;">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>อายุรับคืนเดิม</th>
										<th>อายุใหม่</th>
										<th>วันที่ทำรายการ</th>
										<th>ทำรายการโดย</th>
									</tr>
								</thead>
								<tbody>
				<?php if($age_return_history->num_rows()==0):?>
					
					<tr>
						<td colspan="4">ยังไม่มีประวัติการต่ออายุการรับคืน</td>
					</tr>
					
				<?php else:?>
					
					<?php foreach($age_return_history->result_array() as $value):?>
						<tr>
							<td><?php echo convert_mssql_date($value['Old_Age_ExpireReturn']);?></td>
							<td><?php echo convert_mssql_date($value['New_Age_ExpireReturn']);?></td>
							<td><?php echo $value['RowCreatedDate'];?></td>
							<td><?php echo get_employee_name($value['RowCreatedPerson']);?></td>
						</tr>
						
					<?php endforeach;?>	
					
				<?php endif;?>								
								</tbody>
							</table>
						</div>
				</div><!-- end col-md-12 -->	
			<?php endif;?>	
				<!-- end extend age return -->
		</div> <!-- .end col-md-5 -->
	</div><!-- end .row -->
</div>

<!-- end .container-fluid -->
