<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">สินค้าคงเหลือ</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12 table-responsive">
						<table class="table table-condensed table-striped">
							<thead>
								<tr>
									<th colspan="4">ยอดที่มีในคลัง</th>
								</tr>
								<tr>
									<th>คลัง</th>
									<th>ดี</th>
									<th>จอง</th>
									<th class="danger">เหลือ</th>
									<th>เสีย</th>
									<th>จอง</th>
									<th class="danger">เหลือ</th>
									<th>ชำรุด</th>
									<th>จอง</th>
									<th class="danger">เหลือ</th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($inventory as $value): ?>
							
								<tr>
									<td><?php echo $value['Stock_Name'];?></td>
									<td><?php echo $value['QTY_Good'];?></td>
									<td><?php echo $value['QTY_ReserveGood'];?></td>
									<td class="danger"><?php echo $value['QTY_RemainGood'];?></td>
									<td><?php echo $value['QTY_Waste'];?></td>
									<td><?php echo $value['QTY_ReserveWaste'];?></td>
									<td class="danger"><?php echo $value['QTY_RemainWaste'];?></td>
									<td><?php echo $value['QTY_Damage'];?></td>
									<td><?php echo $value['QTY_ReserveDamage'];?></td>
									<td class="danger"><?php echo $value['QTY_RemainDamage'];?></td>
								</tr>
							
							
						<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<td>รวม</td>
									<td><?php echo $total['good'];?></td>
									<td><?php echo $total['reserve_good'];?></td>
									<td class="info"><?php echo $total['remain_good'];?></td>
									<td><?php echo $total['waste'];?></td>
									<td><?php echo $total['reserve_waste'];?></td>
									<td class="info"><?php echo $total['remain_waste'];?></td>
									<td><?php echo $total['damage'];?></td>
									<td><?php echo $total['reserve_damage'];?></td>
									<td class="info"><?php echo $total['remain_damage'];?></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">กิจกรรมต่างๆ  <a class="btn btn-primary btn-xs" target="_blank" style="color: white;" href="<?php echo site_url('product/product_movement/'.$product['Product_AutoID']);?>">Product Movement</a></h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<table id="datatable" class="table table-bordered table-condensed table-striped table-hover hover">
					        <thead>
					        	<tr>
					                <th>Ticket</th>
					                <th>กิจกรรม</th>
					                <th>วันที่</th>
					                <th>ดี</th>
					                <th>เสีย</th>
					                <th>ชำรุด</th>
					                
					                <th>ผู้ทำรายการ</th>
					            </tr>
					        	
					        </thead>
					     
					        <tfoot>
					            <tr>
					                <th id="filter">Ticket</th>
					                <th id="filter">กิจกรรม</th>
					                <th>วันที่</th>
					                <th>ดี</th>
					                <th>เสีย</th>
					                <th>ชำรุด</th>
					                
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
		<div class="col-md-4">
			<div class="thumbnail">
				<img src="<?php echo $product['Product_Photo'];?>" class="img-thumbnail" />
				<div class="caption">
					<h3 class="text-center"><?php echo $product['Product_Name'];?> เล่มที่  <?php echo $product['Product_Vol'];?></h3>
					<p>
						<table class="table table-condensed">
							<tr>
								<th>รหัสสินค้า</th>
								<td><?php echo $product['Product_ID'];?></td>
							</tr>
							<tr>
								<th>ราคา</th>
								<td><?php echo $product['Price'];?></td>
							</tr>
							<tr>
								<th>หมวดหมู่</th>
								<td><?php echo $product['ProCat_Name'];?></td>
							</tr>
							<tr>
								<th>ประเภท</th>
								<td><?php echo $product['ProType_Name'];?></td>
							</tr>
							<tr>
								<th>อายุการวางขาย</th>
								<td><?php echo $product['ProFreq_Name'];?></td>
							</tr>
							<tr>
								<th>รายละเอียด</th>
								<td><?php echo $product['Definition'];?></td>
							</tr>
							<tr>
								<th>สถานะ</th>
								<td><?php echo $product['product_status'];?></td>
							</tr>
						</table>
					</p>
				</div>
			</div>
			
			
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">รายละเอียดอื่นๆ</h3>
				</div>
				<div class="panel-body">
					<input name="product_id" id="product_id" type="hidden" value="<?php echo $product['Product_ID'];?>" />
					<table class="table table-condensed">
						<tbody>
							<tr>
								<th colspan="8">อายุปิดรับคืนหมดวันที่ <?php echo $product['Age_ExpireReturn'];?></th>
							</tr>
							<tr>
								<th colspan="8">สินค้าคงคลังหมดวันที่ <?php echo $product['Age_ExpireInventory'];?></th>
							</tr>
							<tr>
								<th colspan="8" style="padding: 10px; height: 40px;">เอกสารแนบ :
							<?php if($product['Product_SpecSheet']):?>
							<span class="label label-success" style="padding: 10px;"><a style="color:white; font-size: 15px;" target="_blank" href="<?php echo $product['Product_SpecSheet'];?>">specsheet</a></span>
							<?php endif;?>
								
							<?php if($product['Product_SaleSheet']):?>
								<span class="label label-success" style="padding: 10px;"><a style="color: white; font-size: 15px;" target="_blank" href="<?php echo $product['Product_SaleSheet'];?>">salesheet</a></span>
							<?php endif;?>
							
							<?php if($product['Product_DocOther']):?>
								<span class="label label-success" style="padding: 10px;"><a style="color:white; font-size: 15px;" target="_blank" href="<?php echo $product['Product_DocOther'];?>">other</a></span>
							<?php endif;?>
								</th>
							</tr>
							<tr>
								<th colspan="8">ใบกำกับสินค้า  : <a href="http://172.168.1.109/ims_reporting/plateproduct.aspx?prm=<?php echo $product['Product_ID'];?>" target="_blank" class='btn btn-xs btn-primary'>ดูรายละเอียด</a></th>
							</tr>
							<tr>
								<th class="danger text-right">คลังหลัก</th>
								<td><?php echo $product['Stock_Name'];?></td>
								<th class="danger text-right">ทะเบียนสินค้า</th>
								<td><?php echo $product['TypeReg_Name'];?></td>
								<th class="danger text-right">Barcode</th>
								<td><?php echo $product['Barcode_Main'];?></td>
								<th class="danger text-right"></th>
								<td></td>
							</tr>	
							<tr>
								<th class="danger text-right">ความกว้าง</th>
								<td><?php echo $product['Width'];?></td>
								<th class="danger text-right">ความยาว</th>
								<td><?php echo $product['Height'];?></td>
								<th class="danger text-right">ความหนา</th>
								<td><?php echo $product['Bold'];?></td>
								<th class="danger text-right">น้ำหนัก</th>
								<td><?php echo $product['Weight'];?></td>
							</tr>	
							<tr>
								<th class="danger text-right">เฉลี่ยอายุปิดรับคืน</th>
								<td><?php echo $product['Age_AverageReturn'];?></td>
								<th class="danger text-right">อายุสินค้าคงคลัง</th>
								<td><?php echo $product['Age_Inventory'];?></td>
								<th class="danger text-right"></th>
								<td></td>
								<th class="danger text-right"></th>
								<td></td>
							</tr>	
							<tr>
								<th class="info text-right">เลขที่ใบสั่งผลิต</th>
								<td><?php echo $product['Order_Num'];?></td>
								<th class="info text-right">ผลิตครั้งที่</th>
								<td><?php echo $product['Manufact_Num'];?></td>
								<th class="info text-right">วันที่ผลิต</th>
								<td><?php echo $product['Manufact_StartDate'];?></td>
								<th class="info text-right">วันที่ผลิตเสร็จ</th>
								<td><?php echo $product['Manufact_EndDate'];?></td>
							</tr>	
							<tr>
								<th class="info text-right">ยอดการสั่งผลิต</th>
								<td><?php echo $product['QTY_Production'];?></td>
								<th class="info text-right">ยอดรับเข้าคลัง</th>
								<td><?php echo $product['QTY_ReceiveInventory'];?></td>
								<th class="info text-right">ยอดสำรองสินค้า</th>
								<td><?php echo $product['QTY_Reserve'];?></td>
								<th class="info text-right">ยอดตัวอย่าง</th>
								<td><?php echo $product['QTY_Sample'];?></td>
							</tr>	
							<tr>
								<th class="info text-right">ยอดกระจายสินค้า (SA)</th>
								<td><?php echo $product['total_sa'];?></td>
								<th class="info text-right">ยอดขายลูกค้าเงินสด (SC)</th>
								<td><?php echo $product['total_sc'];?></td>
								<th class="info text-right">ผลิตโดยกอง</th>
								<td><?php echo $product['Dept_NameTH'];?></td>
								<th class="info text-right"></th>
								<td></td>
							</tr>	
							
						</tbody>
					</table>
					<div class="col-md-6">
						<table class="table">
							<thead>
								<tr>
									<th colspan="4">สินค้าประกอบ</th>
								</tr>
								<tr>
									<th></th>
									<th>#</th>
									<th>ชื่อ</th>
									<th>จำนวน</th>
								</tr>
							</thead>
							<tbody>
								<?php if($premium->num_rows()>0):?>
									<?php $i=1;?>
									<?php foreach($premium->result_array() as $value):?>
									<tr>
										<td rowspan="2"><img width="80"src="<?php echo $this->config->item('premiumimg_path'); ?><?php echo $value['Premium_Photo'];?>" class="img-rounded" /></td>
										<td><?php echo $i;?></td>
										<td><?php echo $value['Premium_Name'];?></td>
										<td><?php echo $value['Premium_QTY'];?> <?php echo $value['Premium_Unit'];?></td>
									</tr>
									<tr>
										<td>รายละเอียด :</td>
										<td colspan="2"><?php echo $value['Premium_Detail'];?></td>
									</tr>
									<?php $i++;?>
									<?php endforeach;?>
								<?php else:?>
									<td colspan="4"><h3 class="text-center">ไม่มีสินค้าประกอบ</h3></td>
								<?php endif;?>		
							</tbody>
						</table>
					</div>	
					
				</div>
			</div>
		</div>
	</div>
	


</div>
<!-- end .container-fluid -->

