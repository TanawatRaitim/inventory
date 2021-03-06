
<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-12">
			
			<form role="form" class="form-horizontal" name="form_product" enctype="multipart/form-data" id="form_product" method="post" action="<?php echo site_url('product/insert')?>">
				<fieldset id="" class="">
			  		<legend>ข้อมูลสินค้า</legend>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Product_ID" class="control-label">รหัสสินค้า</label></td>
								<td><input type="text" name="Product_ID" id="Product_ID" data-mask="AA-AAAA-AAAAA" class="form-control input-sm" autofocus /></td>
								<td class="text-right info"><label for="Product_Name" class="control-label">ชื่อสินค้า</label></td>
								<td><input type="text" name="Product_Name" id="Product_Name" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Product_Vol" class="control-label">เล่มที่</label></td>
								<td><input type="text" name="Product_Vol" id="Product_Vol" class="form-control input-sm" /></td>
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
									<input type="text" name="Price" id="Price" class="form-control input-sm" placeholder="บาท" />
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
								<td><input type="text" name="Barcode_Main" id="Barcode_Main" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Barcode_Internal" class="control-label">Barcode ภายใน</label></td>
								<td>
									<input type="text" name="Barcode_Internal" id="Barcode_Internal" class="form-control input-sm" placeholder="" />
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Width" class="control-label">กว้าง</label></td>
								<td><input type="text" name="Width" id="Width" class="form-control input-sm" placeholder="มม." /></td>
								<td class="text-right info"><label for="Height" class="control-label">ยาว</label></td>
								<td><input type="text" name="Height" id="Height" class="form-control input-sm" placeholder="มม." /></td>
								<td class="text-right info"><label for="Bold" class="control-label">หนา</label></td>
								<td><input type="text" name="Bold" id="Bold" class="form-control input-sm" placeholder="มม." /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Weight" class="control-label">น้ำหนัก</label></td>
								<td>
									<input type="text" name="Weight" id="Weight" class="form-control input-sm" placeholder="กรัม" />
								</td>
								<td class="text-right info"><label for="Definition" class="control-label">คำอธิบาย</label></td>
								<td colspan="3"><input type="text" name="Definition" id="Definition" class="form-control input-sm" /></td>
								
								
							</tr>
							<tr>
								
								<td class="text-right info"><label for="MonitorStat_ID" class="control-label">สถานะการ Monitor</label></td>
								<td>
									<select name="MonitorStat_ID" id="MonitorStat_ID" class="form-control input-sm">
										<?php echo $monitor_status_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label for="RowStatus" class="control-label">สถานะ</label></td>
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
								</td>
								<td class="text-right info"><label for="Product_SpecSheet" class="control-label">Spec Sheet (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_SpecSheet" name="Product_SpecSheet">
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Product_SaleSheet" class="control-label">Sale Sheet (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_SaleSheet" name="Product_SaleSheet">
								</td>
								<td class="text-right info"><label for="Product_DocOther" class="control-label">เอกสารอื่นๆ (.pdf)</label></td>
								<td>
									    <input type="file" id="Product_DocOther" name="Product_DocOther">
								</td>
								<td></td>
								<td></td>
							</tr>
						</table>

					</div>
				</fieldset>
				<fieldset id="" class="">
			  		<legend>ข้อมูลการผลิต</legend>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Order_Num" class="control-label">เลขที่ใบสั่งผลิต</label></td>
								<td><input type="text" name="Order_Num" id="Order_Num" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Manufact_Num" class="control-label">ครั้งที่ผลิต</label></td>
								<td><input type="text" name="Manufact_Num" id="Manufact_Num" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Manufact_StartDate" class="control-label">วันที่ผลิต</label></td>
								<td><input type="text" data-date-format="DD/MM/YYYY" name="Manufact_StartDate" id="Manufact_StartDate" class="form-control input-sm" data-date-format="YYYY-MM-DD" /></td>
							</tr>
							<tr>
								
								<td class="text-right info"><label for="QTY_Production" class="control-label">ยอดสั่งผลิต</label></td>
								<td><input type="text" name="QTY_Production" id="QTY_Production" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="QTY_Reserve" class="control-label">ยอดสำรองสินค้า</label></td>
								<td><input type="text" name="QTY_Reserve" id="QTY_Reserve" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="QTY_Sample" class="control-label">ยอดตัวอย่าง</label></td>
								<td><input type="text" name="QTY_Sample" id="QTY_Sample" class="form-control input-sm" /></td>
								
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="QTY_Distribution" class="control-label">ยอดกระจาย</label></td>
								<td><input type="text" name="QTY_Distribution" id="QTY_Distribution" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="QTY_ReceiveInventory" class="control-label">ยอดรับเข้าคลัง</label></td>
								<td><input type="text" name="QTY_ReceiveInventory" id="QTY_ReceiveInventory" class="form-control input-sm" /></td>
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
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Manufact_EndDate" class="control-label">วันรับเข้าคลัง</label></td>
								<td><input   data-date-format="DD/MM/YYYY" type="text" name="Manufact_EndDate" id="Manufact_EndDate" class="form-control input-sm" data-date-format="YYYY-MM-DD" /></td>
								<td class="text-right info"><label for="Age_Inventory" class="control-label">อายุคงคลัง</label></td>
								<td>
									<select name="Age_Inventory" id="Age_Inventory" class="form-control input-sm">
										<?php echo $age_inventory_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุคงคลัง</label></td>
								<td><input type="text" class="form-control input-sm" id="age_inventory_result" readonly="readonly" /></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="text-right info"><label for="Age_Sale" class="control-label">อายุการวางขาย</label></td>
								<td>
									<select name="Age_Sale" id="Age_Sale" class="form-control input-sm">
										<?php echo $age_sale_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุวางขาย</label></td>
								<td><input type="text" class="form-control input-sm" id="age_sale_result" readonly="readonly" /></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="text-right info"><label for="Age_AverageReturn" class="control-label">อายุรับคืน</label></td>
								<td>
									<select name="Age_AverageReturn" id="Age_AverageReturn" class="form-control input-sm">
										<?php echo $age_return_dropdown;?>
									</select>
								</td>
								<td class="text-right info"><label class="control-label">หมดอายุรับคืน</label></td>
								<td><input type="text" class="form-control input-sm" id="age_return_result" readonly="readonly" /></td>
							</tr>
							
						</table>
					</div>	<!-- col-md-8 -->
				</fieldset>
				
			</form>
			<div class="col-md-8" style="margin: 10px;" id="error_msg"></div>
			<div class="col-md-6 col-md-offset-3">
				<input type="submit" name="btn_save" id="btn_save" class="btn btn-primary" value="บันทึก" />
				<input type="reset" name="reset" class="btn btn-danger" value="ล้างฟอร์ม" />
			</div>				 
			
		</div>
	</div><!-- end .row -->
</div>

<!-- end .container-fluid -->
