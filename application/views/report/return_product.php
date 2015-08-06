<div class="container">
	<div class="row">
		<!-- <div class="col-md-8 col-md-offset-2"> -->
		<div class="col-md-8 col-redius-shadow">	
			<fieldset>
			<legend>ค้นหาข้อมูลสินค้าที่สามารถรับคืนได้</legend>	
				<form class="form-horizontal" method="post" action="<?php echo site_url('report/return_product');?>">
				
				<div class="form-group">
				    <label for="customer">รหัสลูกค้า</label>
				    <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer ID" />
				    
				  </div>
					
				  <div class="form-group">
				  	<button type="submit" id="return_product_submit" name="submit" class="btn btn-primary" value="submit">ออกใบรับคืนสินค้า</button>	
				  </div>
				  
				  
				</form>
			</fieldset>
		</div>
		
		<?php if(isset($has_product)):?>
		<div class="col-md-4">
			<div class="page-header">
				<h4>Print ใบรับคืนสินค้า</h4>
			</div>
			<ul>
				<li><a href="<?php echo base_url('report/return_product_war/'.$customer_id); ?>" target="_blank">ใบตรวจรับคืนสำหรับคลังสินค้า</a></li>
				<li><a href="<?php echo base_url('report/return_product_sdb/'.$customer_id); ?>" target="_blank">ใบตรวจรับคืนสำหรับรถขนส่ง / จนท.ขาย</a></li>
				
			</ul>
		</div>
		<?php endif;?>
		
	</div>
	
	
	<?php if(isset($customer_id)):?>
	
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $title;?></h4>
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="text-right">ลูกค้า</th>
						<td><?php echo $customer['Cust_Name'];?> (<?php echo $customer['Cust_ID'];?>)</td>
						<th class="text-right">ผู้ติดต่อ</th>
						<td><?php echo $customer['Cust_Contact'];?></td>
						<td colspan="2"><?php echo $customer['OtherNote'];?></td>						
					</tr>
					<tr>
						<th class="text-right">โทรศัพท์</th>
						<td><?php echo $customer['Cust_Tel'];?></td>
						<th class="text-right">แฟกส์</th>
						<td><?php echo $customer['Cust_Fax'];?></td>
						<th class="text-right">Email</th>
						<td><?php echo $customer['Cust_Email'];?></td>
					</tr>
					<tr>
						<th class="text-right">ที่อยู่</th>
						<td colspan="5"><?php echo $customer['Cust_Addr'];?></td>
						
					</tr>
					
				</thead>
			</table>
			
		</div>
	</div>

	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>No.</th>
						<th>Barcode/รหัสสินค้า</th>
						<th>ชื่อหนังสือ</th>
						<th>เล่มที่</th>
						<th>ราคาปก</th>
					</tr>
				</thead>
				<tbody>
					
				<?php if($has_product):?>
				
					<?php foreach($products as $key=>$value):?>
					<tr>
						<td><?php echo $key+1;?></td>
						<td><img src="<?php echo site_url($value['barcode_img']);?>" /></td>
						<td><?php echo $value['product_name'];?></td>
						<td><?php echo $value['product_vol'];?></td>
						<td><?php echo $value['price'];?></td>
	
						
					</tr>
					<?php endforeach;?>
				
				<?php else:?>
						
					<tr>
						<td colspan="5"><h3>ไม่มีรายการสินค้า</h3></td>
					</tr>	
				
				<?php endif;?>		
					
				</tbody>
			</table>
		</div>
	</div>
	
	<?php endif;?>
	
</div>
<!-- end .container-fluid -->

