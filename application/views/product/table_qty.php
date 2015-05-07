
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">รายละเอียดสินค้า</h3>
	</div>
	
	<div class="panel-body">
		<div class="col-md-12 text-center">
			<h3 style="margin-top: 0px;"><?php echo $product['Product_Name'];?> (<?php echo $product['Product_ID'];?>) # <?php echo $product['Product_Vol'];?></h3>
		</div>
		<div class="col-md-12 col-lg-4">
			<img width="120" id="p_img" src="<?php echo $product['Product_Photo'] ;?>" class="img-rounded img-responsive" />
			<br />
			<?php if($product['Product_SpecSheet']):?>
				<span class="label label-default"><a style="color:white" class="text-white" target="_blank" href="<?php echo $product['Product_SpecSheet'];?>">specsheet</a></span>
			<?php endif;?>
				
			<?php if($product['Product_SaleSheet']):?>
				<span class="label label-default"><a style="color:white" class="text-white" target="_blank" href="<?php echo $product['Product_SaleSheet'];?>">salesheet</a></span>
			<?php endif;?>
			
			<?php if($product['Product_DocOther']):?>
				<span class="label label-default"><a style="color:white" target="_blank" href="<?php echo $product['Product_DocOther'];?>">other</a></span>
			<?php endif;?>
		</div>
		<div class="col-md-12 col-lg-8">

			<table class="table table-condensed">	
				<tbody>
					<tr>
						<td>คลังสินค้าหลัก</td>
						<td><?php echo get_inventory_name($product['Main_Inventory']); ?></td>
					</tr>
					<tr>
						<td>Barcode</td>
						<td><?php echo $product['Barcode_Main'];?></td>
					</tr>
					<tr>
						<td>ราคา</td>
						<td><?php echo $product['Price'];?> บาท</td>
					</tr>
					<tr>
						<td>วันที่รับเข้าคลัง</td>
						<td><?php echo convert_mssql_date($product['Manufact_EndDate']); ?></td>
					</tr>
					<tr>
						<td>อายุคงคลัง</td>
						<td><?php echo get_age_inventory($product['Age_Inventory']); ?></td>
					</tr>
					<tr>
						<td>สถานะ</td>
						<td><?php echo $product['RowStatus'];?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-12 table-responsive">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>ข้อมูลสินค้าคลังหลัก</th>
						<th>ดี</th>
						<th>เสีย</th>
						<th>ชำรุด</th>
					</tr>	
				</thead>
				<tbody>
					<tr>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['inventory']['text'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['inventory']['good'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['inventory']['waste'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['inventory']['damage'];?></td>
					</tr>
					<tr>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['draft']['text'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['draft']['good'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['draft']['waste'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['draft']['damage'];?></td>
					</tr>
					<tr>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['reserve']['text'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['reserve']['good'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['reserve']['waste'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['reserve']['damage'];?></td>
					</tr>
					<tr>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['total']['text'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['total']['good'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['total']['waste'];?></td>
						<td><?php echo $all_inventory[$product['Main_Inventory']]['total']['damage'];?></td>
					</tr>
				</tbody>
			</table>
		</div>	
		<div class="col-md-12 table-responsive">
			<div role="tabpanel">
			
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			  	<?php foreach ($all_inventory as $key => $value): ?>
			  		
			  		<?php if($key == $product['Main_Inventory']):?>
			  			<li role="presentation" class="active"><a href="#inventory_<?php echo $key;?>" aria-controls="home" role="tab" data-toggle="tab">คลัง <?php echo $value['stock_name'];?></a></li>
			  			<?php continue;?>
			  		<?php endif;?>	
			  			
			  		
					  <li role="presentation"><a href="#inventory_<?php echo $key;?>" aria-controls="home" role="tab" data-toggle="tab">คลัง <?php echo $value['stock_name'];?></a></li>
				  <?php endforeach ?>
			  </ul>
			
			  <!-- Tab panes -->
			  <div class="tab-content">
			  	
			  	<?php foreach ($all_inventory as $key => $value): ?>
			  		
			  		<?php if($key == $product['Main_Inventory']):?>
			  			<div role="tabpanel" class="tab-pane active" id="inventory_<?php echo $key;?>">
			  				<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>ข้อมูลสินค้าคลังหลัก</th>
										<th>ดี</th>
										<th>เสีย</th>
										<th>ชำรุด</th>
									</tr>	
								</thead>
								<tbody>
									<tr>
										<td><?php echo $all_inventory[$key]['inventory']['text'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['good'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['draft']['text'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['good'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['reserve']['text'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['good'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['total']['text'];?></td>
										<td><?php echo $all_inventory[$key]['total']['good'];?></td>
										<td><?php echo $all_inventory[$key]['total']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['total']['damage'];?></td>
									</tr>
								</tbody>
							</table>
			  				
			  			</div>
			  			<?php continue;?>
			  		<?php endif;?>	
			  			<div role="tabpanel" class="tab-pane fade" id="inventory_<?php echo $key;?>">
			  				<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>ข้อมูลสินค้าแต่ละคลัง</th>
										<th>ดี</th>
										<th>เสีย</th>
										<th>ชำรุด</th>
									</tr>	
								</thead>
								<tbody>
									<tr>
										<td><?php echo $all_inventory[$key]['inventory']['text'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['good'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['inventory']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['draft']['text'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['good'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['draft']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['reserve']['text'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['good'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['reserve']['damage'];?></td>
									</tr>
									<tr>
										<td><?php echo $all_inventory[$key]['total']['text'];?></td>
										<td><?php echo $all_inventory[$key]['total']['good'];?></td>
										<td><?php echo $all_inventory[$key]['total']['waste'];?></td>
										<td><?php echo $all_inventory[$key]['total']['damage'];?></td>
									</tr>
								</tbody>
							</table>
			  			</div>
			  		
					  
				  <?php endforeach ?>

			  </div>
			
			</div>
		</div>
		
		<div class="col-md-12">
			
		</div>
	</div>
</div>
<!-- </div><!-- for test --> 