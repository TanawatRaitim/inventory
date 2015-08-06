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
	
	.no-border>thead>tr>th, .no-border>tbody>tr>th, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>tbody>tr>td, .no-border>tfoot>tr>td{
		border-top: 0px !important;
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
	
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	    border: 1px solid #000 !important;
	}
	
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
	    border-top: 1px solid #000 !important;
	}
	
	
</style>
<div class="container-fluid">
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $title;?></h4>
			<table class="table table-bordered table-condensed" style="margin-bottom: 0px;">
				<thead>
					<tr>
						<th class="text-right" style="width: 10%">ลูกค้า</th>
						<td><?php echo $customer['Cust_Name'];?> (<?php echo $customer['Cust_ID'];?>)</td>
						<th class="text-right" style="width: 15%;">วันที่ดึงข้อมูล </th>
						<td style="width: 25%;"><?php echo $report_date;?></td>
					</tr>
					<tr>
						<th class="text-right">ผู้ติดต่อ</th>
						<td><?php echo $customer['Cust_Contact'];?></td>
						<th class="text-right">วันที่รับสินค้า</th>
						<td></td>
					</tr>
					<tr>
						<th rowspan="3" class="text-right vertical-middle">ที่อยู่ลูกค้า</th>
						<td rowspan="3" class="vertical-middle"><?php echo $customer['Cust_Addr'];?><br /> Tel: <?php echo $customer['Cust_Tel'];?></td>
						<th class="text-right">ผู้รับคืนสินค้า</th>
						<td></td>

					</tr>
					<tr>
						<th class="text-right">ทะเบียนรถ</th>
						<td></td>
					</tr>
					<tr>
						<th class="text-right">จำนวนที่รับคืน</th>
						<td class="text-right">กล่อง/เล่ม</td>
					</tr>
					
				</thead>
			</table>
			
		</div>
	</div>

	<div class="row" style="margin-top: 0px;">
		<div class="col-md-12">
			<table class="table table-bordered table-condensed" style="margin-bottom: 0px;">
				<!-- <thead> -->
					<tr>
						<th class="text-center" colspan="9" style="font-size: 16px;">รายการสินค้าที่รับคืน (อยู่ในเงื่อนไขที่บริษัทกำหนด)</th>
					</tr>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center" style="width: 20%;">Barcode/รหัสสินค้า</th>
						<th style="width: 40%;"  class="text-center">ชื่อหนังสือ</th>
						<th class="text-center">Vol.</th>
						<th class="text-center">ราคา</th>
						<th class="text-center">ยอดส่ง</th>
						<th class="text-center">ยอดคืน</th>
						<th class="text-center">ส่วนลด %</th>
						<th class="text-center">จำนวนเงิน</th>
					</tr>
				<!-- </thead> -->
				<tbody>
					
				<?php if($has_product):?>
				
					<?php foreach($products as $key=>$value):?>
					<tr>
						<td class="vertical-middle text-center"><?php echo $key+1;?></td>
						<!-- <td class="text-center"><img style="width: 150px;" src="<?php //echo site_url($value['barcode_img']);?>" /></td> -->
						<td class="text-center"><?php echo $value['Product_ID'];?></td>
						<td class="vertical-middle"><?php echo $value['product_name'];?></td>
						<td class="vertical-middle text-center"><?php echo $value['product_vol'];?></td>
						<td class="vertical-middle text-center"><?php echo $value['price'];?></td>
						<td class="vertical-middle text-center"><?php echo $value['sumGood'];?></td>
						<td></td>
						<td></td>
						<td></td>

					</tr>
					<?php endforeach;?>
					<tr>
						<td colspan="3" rowspan="4"><strong>หมายเหตุ</strong></td>
						<td colspan="4" class="text-right">รวมจน.เงินที่ลด %แล้ว =</td>
						<td colspan="2"></td>

					</tr>
					<tr>
						<td colspan="4" class="text-right">ยอดส่ง = </td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="4" class="text-right">หัก ยอดคืน = </td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="4" class="text-right">ยอดชำระเงิน = </td>
						<td colspan="2"></td>
					</tr>
					

				<?php else:?>
						
					<tr>
						<td colspan="5"><h3>ไม่มีรายการสินค้า</h3></td>
					</tr>	
				
				<?php endif;?>		
					
				</tbody>
			</table>
		</div>
		<div class="col-md-12 page-break">
			<table class="table table-condensed table-bordered">
				<tr>
					
					<th colspan="2" class="text-center">สำหรับลูกค้า</th>
					<th colspan="2" class="text-center">สำหรับพนักงานขับรถ</th>
					<th colspan="2" class="text-center">สำหรับพนักงานติดรถ</th>
				</tr>
				
				<tr>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
				</tr>
				<tr>
					<td></td>
					<td class="text-center">ผู้ส่งคืนสินค้า</td>
					<td></td>
					<td class="text-center">ผู้รับคืนสินค้า</td>
					<td></td>
					<td class="text-center">ผู้รับคืนสินค้า</td>
				</tr>
				<tr>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
				</tr>
			</table>

				
		</div>
		
		
	</div>
	
	<!-- ผิดเงื่อนไข -->
	
	
	<div class="row page-break-alway">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $title;?></h4>
			<table class="table table-bordered table-condensed" style="margin-bottom: 0px;">
				<thead>
					<tr>
						<th class="text-right" style="width: 10%">ลูกค้า</th>
						<td colspan="3"><?php echo $customer['Cust_Name'];?> (<?php echo $customer['Cust_ID'];?>)</td>
						
					</tr>
					<tr>
						<th class="text-right">ผู้ติดต่อ</th>
						<td><?php echo $customer['Cust_Contact'];?></td>
						<th class="text-right" style="width: 15%;">วันที่รับสินค้า</th>
						<td style="width: 25%;"></td>
					</tr>
					<tr>
						<th rowspan="3" class="text-right vertical-middle">ที่อยู่ลูกค้า</th>
						<td rowspan="3" class="vertical-middle"><?php echo $customer['Cust_Addr'];?><br /> Tel: <?php echo $customer['Cust_Tel'];?></td>
						<th class="text-right">ผู้รับคืนสินค้า</th>
						<td></td>

					</tr>
					<tr>
						<th class="text-right">ทะเบียนรถ</th>
						<td></td>
					</tr>
					<tr>
						<th class="text-right">จำนวนที่รับคืน</th>
						<td class="text-right">กล่อง/เล่ม</td>
					</tr>
					
				</thead>
			</table>
			
		</div>
	</div>

	<div class="row" style="margin-top: 0px;">
		<div class="col-md-12">
			<table class="table table-bordered table-condensed" style="margin-bottom: 0px;">
				<!-- <thead> -->
					<tr>
						<th class="text-center" colspan="7" style="font-size: 16px;">รายการสินค้าที่รับคืน (ผิดเงื่อนไขที่บริษัทกำหนด / คืนก่อนกำหนด)</th>
					</tr>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Barcode/รหัสสินค้า</th>
						<th style="width: 40%;"  class="text-center">ชื่อหนังสือ</th>
						<th class="text-center">Vol.</th>
						<th class="text-center">ราคา</th>
						<th class="text-center">จน.รับคืน</th>

					</tr>
				<!-- </thead> -->
				<tbody>
					

				
					<?php for ($i=1; $i <= $table_rows ; $i++):?> 
						
					
					<tr>
						<td class="vertical-middle text-center">&nbsp;</td>
						<td class="text-center"></td>
						<td class="vertical-middle"></td>
						<td class="vertical-middle text-center"></td>
						<td class="vertical-middle text-center"></td>
						<td></td>

					</tr>
					<?php endfor;?>
					<tr>
						<td colspan="7" style="height: 50px;"><strong>หมายเหตุ </strong></td>
					</tr>

					
				</tbody>
			</table>
		</div>
		<div class="col-md-12 page-break" style="margin-top: 0px;">
			<table class="table table-condensed table-bordered">
				<tr>
					
					<th colspan="2" class="text-center">สำหรับลูกค้า</th>
					<th colspan="2" class="text-center">สำหรับพนักงานขับรถ</th>
					<th colspan="2" class="text-center">สำหรับพนักงานติดรถ</th>
				</tr>
				
				<tr>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
					<td class="text-right">ลงชื่อ</td>
					<td class="text-center"><?php echo repeater('.',50);?></td>
				</tr>
				<tr>
					<td></td>
					<td class="text-center">ผู้ส่งคืนสินค้า</td>
					<td></td>
					<td class="text-center">ผู้รับคืนสินค้า</td>
					<td></td>
					<td class="text-center">ผู้รับคืนสินค้า</td>
				</tr>
				<tr>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
					<td class="text-right">วันที่</td>
					<td class="text-center"><?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
				</tr>
			</table>
		</div>
		
		
	</div>
	
	
	
	
</div> <!-- end .container -->