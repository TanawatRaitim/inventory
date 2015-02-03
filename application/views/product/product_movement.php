<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<fieldset>
			<legend>Tracking Product Movement for <?php echo $product['Product_Name'];?> # <?php echo $product['Product_Vol'];?></legend>	
				<form class="form-inline" method="post" action="">
				  <!-- <div class="form-group form-group-sm">
				    <label for="exampleInputEmail1">Product ID</label>
				    <input type="text" class="form-control input-sm" value="<?php echo $product['Product_Name'];?> # <?php echo $product['Product_Vol'];?>" readonly>
				    <input type="hidden" value="">
				  </div> -->

				  <div class="form-group form-group-sm">
				    <label for="start_date">Start Date</label>
				    <input type="text" class="form-control input-sm" id="start_date" name="start_date"  value="<?php echo $start_date;?>" placeholder="Start Date">
				  </div>
				  <div class="form-group form-group-sm">
				    <label for="end_date">&nbsp;&nbsp;End Date</label>
				    <input type="text" class="form-control input-sm" id="end_date" name="end_date" value="<?php echo $end_date;?>" placeholder="End Date" readonly>
				  </div>
				  
				  <button type="submit" name="search_movement" class="btn btn-primary btn-sm" value="sumbit">Search!!!</button>
				</form>
			</fieldset>
		</div>
		<div class="col-md-12 table-responsive" style="margin-top: 20px;">
			<?php if($product_movement->num_rows()>0):?>
				<div class="col-md-12" style="margin-bottom: 10px;">
					พบจำนวน <?php echo $product_movement->num_rows();?>  รายการ  <a class="btn btn-success btn-xs" target="_blank" href="<?php echo $excel_link;?>">Excel</a>
				</div>
			<?php endif;?>
			<table class="table table-bordered table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th>ลำดับ</th>
						<th>ประเภท</th>
						<th>Ticket</th>
						<th>ดี</th>
						<th>เสีย</th>
						<th>ชำรุด</th>
						<th>รวม</th>
						<th>เอกสารอ้างอิง</th>
						<th>เลขที่เอกสาร</th>
						<th>วันที่เอกสาร</th>
						<th>รหัสลูกค้า</th>
						<th>ชื่อลูกค้า</th>
						<th>หมายเหตุ</th>
						<th>ผู้จัดทำ</th>
						<th>วันที่จัดทำ</th>
						<th>ผู้อนุมัติ</th>
						<th>วันที่อนุมัติ</th>
					</tr>
				</thead>
				<tbody>
			<?php if(isset($product_movement)):?>
				
				<?php if($product_movement->num_rows() <= 0 ):?>
					
					<tr>
						<th colspan="17" class="text-center">ไม่มีรายการ</th>
					</tr>
					
				<?php else:?>
					<?php foreach($product_movement->result_array() as $row):?>
					<tr>
						<td><?php echo $row['RowNo'];?></td>
						<td><?php echo $row['TK_Main'];?></td>
						<td><?php echo $row['Ticket_ID'];?></td>
						<td><?php echo $row['QTY_Good'];?></td>
						<td><?php echo $row['QTY_Waste'];?></td>
						<td><?php echo $row['QTY_Damage'];?></td>
						<td><?php echo $row['SumQTY'];?></td>
						<td><?php echo $row['DocRef'];?></td>
						<td><?php echo $row['DocRef_No'];?></td>
						<td><?php echo $row['DocRef_Date'];?></td>
						<td><?php echo $row['Cust_ID'];?></td>
						<td><?php echo $row['Cust_Name'];?></td>
						<td><?php echo $row['Transact_Remark'];?></td>
						<td><?php echo $row['PersonCreated'];?></td>
						<td><?php echo $row['RowCreatedDate'];?></td>
						<td><?php echo $row['PersonApproved'];?></td>
						<td><?php echo $row['ApprovedDate'];?></td>
					</tr>
					<?php endforeach;?>
				<?php endif;?>		
				
			<?php else:?>
			
				<tr>
					<th colspan="17" class="text-center">ไม่มีรายการ</th>
				</tr>
				
				
			<?php endif;?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- end .container-fluid -->

