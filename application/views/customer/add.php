<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form" class="form-horizontal" name="form_customer" enctype="multipart/form-data" id="form_customer" method="post" action="<?php echo site_url('customer/add_post')?>">
				<fieldset id="" class="">
			  		<legend><?php echo $title;?></legend>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="Cust_ID" class="control-label">รหัสลูกค้า</label></td>
								<td><input type="text" name="Cust_ID" id="Cust_ID" class="col-sm-5 form-control input-sm" autofocus /></td>
								<td class="text-right info"><label for="Cust_Name" class="control-label">ชื่อลูกค้า</label></td>
								<td><input type="text" name="Cust_Name" id="Cust_Name" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Cust_Contact" class="control-label">ชื่อผู้ติดต่อ</label></td>
								<td><input type="text" name="Cust_Contact" id="Cust_Contact" class="form-control input-sm" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="CustLine_ID" class="control-label">สายลูกค้า</label></td>
								<td>
									<select class="form-control input-sm" name="CustLine_ID" id="CustLine_ID">
										<?php echo $customer_line_dropdown;?>
									</select>
								</td>
								<td></td>
								<td></td>
								<td</td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Addr" class="control-label">ที่อยู่</label></td>
								<td colspan="3">
									<input type="text" name="Cust_Addr" id="Cust_Addr" class="form-control input-sm" />
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Tel" class="control-label">เบอร์ติดต่อ</label></td>
								<td><input type="text" name="Cust_Tel" id="Cust_Tel" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Cust_Fax" class="control-label">แฟกซ์</label></td>
								<td><input type="text" name="Cust_Fax" id="Cust_Fax" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="Cust_Email" class="control-label">E-Mail</label></td>
								<td><input type="text" name="Cust_Email" id="Cust_Email" class="form-control input-sm" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="OtherNote" class="control-label">หมายเหตุ</label></td>
								<td colspan="3">
									<input type="text" name="OtherNote" id="OtherNote" class="form-control input-sm" />
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Photo" class="control-label">รูปภาพ (.jpg|.jpeg|.png)</label></td>
								<td colspan="5">
									<input type="file" id="Cust_Photo" name="Cust_Photo">
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="Cust_Map" class="control-label">แผนที่ (.jpg|.jpeg|.png)</label></td>
								<td colspan="5">
									<input type="file" id="Cust_Map" name="Cust_Map">
								</td>
							</tr>
						</table>
					</div>	<!-- .col-md-8 -->
					
				</fieldset>
			</form>
			<div class="col-md-8" style="margin: 10px;" id="error_msg"></div>				 
			<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
				<input type="submit" id="btn_save" class="btn btn-primary" value="บันทึก" />
				<input type="reset" id="btn_reset" class="btn btn-danger" value="ล้างฟอร์ม" />
			</div>
		</div>
	</div><!-- end .row -->
</div>

<!-- end .container-fluid -->
