<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<fieldset>
			<legend><?php echo $title;?></legend>	
				<form class="form-inline" method="post" action="">
				  <div class="form-group form-group-sm">
				    <label for="rollback_type">Rollback Type : </label>
				    <select name="rollback_type" id="rollback_type">
				    	<?php echo $rollback_type;?>
				    </select>
				  </div>
				  <div class="form-group form-group-sm">
				    &nbsp;<label for="ticket_id">Ticket ID : </label>
				    <input type="text" class="form-control input-sm" id="tk_id" name="tk_id"  value="<?php echo $tk_id;?>" placeholder="Ticket ID">
				  </div>
				  
				  <button type="submit" name="search_rollback" class="btn btn-success btn-sm" value="sumbit">Search!!!</button>
				</form>
			</fieldset>
		</div>
		<div class="col-md-12 table-responsive" style="margin-top: 20px;">
			<?php if(isset($rollback_list)):?>
				<div class="col-md-12" style="margin-bottom: 10px;">
					พบจำนวน <?php echo $rollback_list->num_rows();?>  รายการ 
				</div>
			<?php endif;?>
			<table class="table table-bordered table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th>เลขที่</th>
						<th>จองสำหรับ</th>
						<th>จำนวนรายการ</th>
						<th>ผู้ทำรายการจอง</th>
						<th>วันที่จอง</th>
						<th>ผู้อนุมัติ</th>
						<th>วันที่อนุมัติ</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php if(isset($rollback_list)):?>
				
				<?php if($rollback_list->num_rows() <= 0 ):?>
					
					<tr>
						<th colspan="17" class="text-center">ไม่มีรายการ</th>
					</tr>
					
				<?php else:?>
					<?php foreach($rollback_list->result_array() as $row):?>
					<tr>
						<td><?php echo $row['TK_Code'];?><?php echo $row['TK_ID'];?></td>
						<td><?php echo get_ticket_code_name($row['Transaction_For']);?></td>
						<td><?php echo get_count_detail($row['Transact_AutoID']);?></td>
						<td><?php echo get_employee_name($row['RowCreatedPerson']);?></td>
						<td><?php echo convert_mssql_datetime($row['RowCreatedDate']);?></td>
						<td><?php echo get_employee_name($row['ApprovedBy']);?></td>
						<td><?php echo convert_mssql_datetime($row['ApprovedDate']);?></td>
						<td><a href="<?php echo site_url('manage/rollback_view');?>/<?php echo $row['Transact_AutoID'];?>" class="btn btn-primary btn-xs">ดูรายละเอียด</a></td>
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

