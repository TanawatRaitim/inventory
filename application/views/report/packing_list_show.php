<style media="print, screen">
	@page{
		/*size:8.27in 11.69in; */
		margin:.3in .1in .4in .1in; 
		/*
		mso-header-margin:.5in; 
		mso-footer-margin:.5in; 
		mso-paper-source:0;
		*/
	}
	
	table{
		font-size: 12px;
		
	}
	.underline{
		text-decoration: underline;
	}

	.page-break{

		page-break-inside: avoid;
		
		/*page-break-inside: inherit;*/

	}
	.page-break-alway{
		page-break-before: always;
		/*page-break-after: always;*/
		-webkit-region-break-inside: avoid;
		
	}
	
	thead{
		display: table-header-group;
	}
	div.page-break2{
		
		page-break-inside: inherit;
		
	} 
	tr{
		/*display: block;*/
		-webkit-region-break-inside: avoid;
	}
	
	.hide{
		display: none;
	}
	
	table tr td, table tr th{
		padding-top: 3px !important;
		padding-bottom: 3px !important;
	}
	.signature{
		padding-bottom: 1px !important;
		padding-top: 10px !important;
	}
	
	h4{
		margin-top: 1px;
		margin-bottom: 1px;
	}
	body{
		/*background-color: red;*/
		padding-bottom: 0px;
		/*background: transparent !important;*/
	}
	.head-color{
		
		background-image: url('<?php echo base_url();?>assets/images/bg-head.jpg') !important;
		
		background-repeat: repeat !important;
		-webkit-print-color-adjust: exact !important; 
		background: color: #aaaaaa !important;
		
		
	}
	.customer-name{
		width: 150px;
	}
	.customer-address{
		width: 1px;
	}
	.customer-product{
		width: 100px;
	}
	.product-weight{
		width: 80px;
	}
	.box-qty{
		width: 40px;
	}
	
	
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $title;?></h4>
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="text-right">ประเภทใบสั่งขาย</th>
						<td><?php echo $sale_type;?></td>
						<th class="text-right">สายลูกค้า</th>
						<td><?php echo $customer_line;?></td>
					</tr>
					<tr>
						<th class="text-right">วันที่ส่งสินค้า</th>
						<td><?php echo $transport_date;?></td>
						<th class="text-right">ภาค</th>
						<td><?php echo $customer_area;?></td>
					</tr>
					
				</thead>
			</table>
		</div>
		
			
			
		<div class="col-md-12">	
			<?php foreach($packing_list as $key=>$val):?>
				
				<!-- <div class="page-header"> -->
					<h3>จัดส่งโดย <?php echo $packing_list[$key]['transport_name'];?></h3>
				<!-- </div> -->
					
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th rowspan="2" class="text-center" >#</th>
							<th rowspan="2" class="customer-name text-center">ชื่อร้าน</th>
							<!-- <th rowspan="2" class="customer-address">ส่งที่</th> -->
							<th rowspan="2" class="text-center">รายการ / จำนวน</th>
							<th rowspan="2" class="product-weight text-center">น้ำหนักรวม </th>
							<th colspan="10" class="text-center">จำนวนกล่องพัสดุภัณฑ์</th>
						</tr>
						<tr>
							<th class="text-center box-qty">1</th>
							<th class="text-center box-qty">2</th>
							<th class="text-center box-qty">3</th>
							<th class="text-center box-qty">4</th>
							<th class="text-center box-qty">5</th>
							<th class="text-center box-qty">6</th>
							<th class="text-center box-qty">7</th>
							<th class="text-center box-qty">8</th>
							<th class="text-center box-qty">9</th>
							<th class="text-center box-qty">10</th>
							
						</tr>
					</thead>
					<tbody>

				
					<?php $i = 1;?>
					<?php foreach($packing_list[$key]['send_to'] as $key2=>$val2):?>
						<tr>
							<td><?php echo $i;?></td>
							<td><u><?php echo $val2['customer_name'];?></u> <?php echo $val2['customer_address'];?> </td>
							<!-- <td></td> -->
							<td>						
							<?php $i++;?>
					  
						
						<?php foreach($packing_list[$key]['send_to'][$key2]['products'] as $key3=>$val3):?>
						
							<?php echo get_product_name($val3['product'])." (".$val3['qty']."เล่ม)";?>
							<?php echo br();?>
							
						<?php endforeach;?>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
					<?php endforeach;?>
					

			</tbody>
		</table>	
			<?php endforeach;?>
			
		</div>	

		
	</div>
	
	
</div> <!-- end .container -->