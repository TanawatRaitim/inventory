<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Tracking Product Movement for <?php echo $product['Product_Name'];?> # <?php echo $product['Product_Vol'];?></h1>	

		</div>
		<div class="col-md-12 table-responsive" style="margin-top: 20px;">
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

