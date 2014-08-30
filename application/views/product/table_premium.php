<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สินค้าประกอบ</h3>
	</div>
	<div class="panel-body">
		<div class="col-md-12">
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th colspan="4">สินค้าประกอบของ <?php echo $premium[0]['Product_ID'];?></th>
					</tr>
					<tr>
						<th></th>
						<th>#</th>
						<th>ชื่อ</th>
						<th>จำนวน</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($premium as $value):?>
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
					
					<!-- 
					<tr>
						<td><img width="80" src="<?php echo base_url(); ?>assets/images/disc.jpg" class="img-rounded" /></td>
						<td>2</td>
						<td>สินค้าประกอบ B</td>
						<td>xx อัน</td>
					</tr>
					<tr>
						<td><img width="80" src="<?php echo base_url(); ?>assets/images/pick.png" class="img-rounded" /></td>
						<td>3</td>
						<td>สินค้าประกอบ C</td>
						<td>xx อัน</td>
					</tr>
					 -->
					
				</tbody>
			</table>
		</div>
	</div>
</div>