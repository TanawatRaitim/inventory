<div class="container">
	<div class="row">
		<!-- <div class="col-md-8 col-md-offset-2"> -->
		<div class="col-md-8 col-redius-shadow">	
			<fieldset>
			<legend>ข้อมูลสำหรับการออก Packing List ลูกค้า</legend>	
				<form class="form-horizontal" method="post" action="<?php echo site_url('report/packing_list_show');?>">
				
					<div class="form-group" style=" margin-bottom: 0px;">
					    <label for="start_date">ประเภทใบสั่งขาย </label>
					    <button id="select_all" class="btn btn-default btn-xs">select all</button>
					    &nbsp;<button id="select_none" class="btn btn-default btn-xs">select none</button>
					  </div>
					  
					  <div class="col-md-3">
							<div class="form-group">	
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SA"> SA
						    </label>
						  </div>
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SS"> SS
						    </label>
						  </div>
						</div>  	
					  </div>
					  <div class="col-md-3">
							<div class="form-group">	
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SC"> SC
						    </label>
						  </div>
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SZ"> SZ
						    </label>
						  </div>
						</div>  	
					  </div>
					  <div class="col-md-3">
							<div class="form-group">	
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SM"> SM
						    </label>
						  </div>
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SD"> SD
						    </label>
						  </div>
						</div>  	
					  </div>
					  <div class="col-md-3">
							<div class="form-group">	
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SC"> SC
						    </label>
						  </div>
						 <div class="checkbox">
						    <label>
						      <input type="checkbox" name="sale_code[]" value="SU"> SU
						    </label>
						  </div>
						</div>  	
					  </div>
					  
					
				  <div class="form-group">
				    <label for="start_date">วันที่เริ่ม</label>
				    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
				  </div>
				  
				  <div class="form-group">
				    <label for="end_date">วันที่สิ้นสุด</label>
				    <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date" readonly>
				  </div>
				  <div class="form-group">
				    <label for="end_date">สายลูกค้า</label>
				    <select class="form-control" id="customer_line" name="customer_line">
						<?php echo $customer_line_dropdown;?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="end_date">ภาค</label>
				    <select class="form-control" id="area" name="area">
						<?php echo $area_dropdown;?>
					</select>
				  </div>
				  
				  <div class="form-group">
				  	<button type="submit" id="packing_list_submit" name="submit" class="btn btn-primary" value="submit">ออก Packing List</button>	
				  </div>
				  
				  
				</form>
			</fieldset>
		</div>
		
	</div>
</div>
<!-- end .container-fluid -->

