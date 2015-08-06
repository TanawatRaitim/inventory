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
						<th class="text-right" style="width: 15%;">เลขที่รับคืน</th>
						<td style="width: 25%;"><b>SR</b></td>
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
			<table class="table table-bordered table-condensed">
				<!-- <thead> -->
					<tr>
						<th class="text-center" colspan="7" style="font-size: 16px;">รายการสินค้าที่รับคืน (อยู่ในเงื่อนไขที่บริษัทกำหนด)</th>
					</tr>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Barcode/รหัสสินค้า</th>
						<th style="width: 40%;"  class="text-center">ชื่อหนังสือ</th>
						<th class="text-center">Vol.</th>
						<th class="text-center">ราคา</th>
						<!-- <th class="text-center">จน.ขาย</th> -->
						<th class="text-center">จน.รับคืน</th>
						<th class="text-center">+/-</th>
					</tr>
				<!-- </thead> -->
				<tbody>
					
				<?php if($has_product):?>
				
					<?php foreach($products as $key=>$value):?>
					<tr>
						<td class="vertical-middle text-center"><?php echo $key+1;?></td>
						<td class="text-center"><img style="width: 150px;" src="<?php echo site_url($value['barcode_img']);?>" /></td>
						<td class="vertical-middle"><?php echo $value['product_name'];?></td>
						<td class="vertical-middle text-center"><?php echo $value['product_vol'];?></td>
						<td class="vertical-middle text-center"><?php echo $value['price'];?></td>
						<!-- <td class="vertical-middle text-center"><?php //echo $value['sumGood'];?></td> -->
						<td></td>
						<td></td>
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
		<div class="col-md-12 page-break">
			<table class="table table-condensed no-border">
				<tr>
					<td class="text-right">ผู้ตรวจรับคืน :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.คลัง)</td>
					<td></td>
					<td></td>
					<td class="text-right">รวมรับ(เล่ม) = </td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					
					<td colspan="6" class="text-center">ฝ่ายบัญชี : ตรวจสอบการรับคืนของลูกค้าและปิดบัญชี</td>
					
				</tr>
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.บัญชี)</td>
					<td colspan="3" class="text-right">ตามเอกสารอ้างอิงใบลดหนี้ / รับคืน เลขที่ :</td>
					<td colspan="2"><?php echo repeater('.',55);?></td>
					
				</tr>
				<tr>
					<td class="text-right">วันที่</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<!-- <td></td> -->
					<td colspan="3" class="text-right">อ้างอิงใบลดหนี้ / รับคืน เลขที่ :</td>
					<td><?php echo repeater('.',30);?></td>
					<td class="text-right">ใบเสร็จเลขที่ :</td>
					<td>......................</td>
					
				</tr>
				
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.Admin)</td>
					<td colspan="2" class="text-right">สรุปบัญชีถูกต้องแล้ว:</td>
					<td><?php echo repeater('.',30);?></td>
					<td>(จนท.บัญชี)</td>
					<td></td>
					
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<td></td>
					<td></td>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',8);?>/<?php echo repeater('.',8);?>/<?php echo repeater('.',8);?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(หน.คลัง)</td>
					<td colspan="2" class="text-right">ตรวจสอบ :</td>

					<td><?php echo repeater('.',28);?></td>
					<td><?php echo repeater('.',28);?></td>
					<td><?php echo repeater('.',8);?>/<?php echo repeater('.',8);?>/<?php echo repeater('.',8);?></td>
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="text-center">(ผจก.ฝ่าย)</td>
					<td class="text-center">ฝ่ายตรวจสอบ</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="8"><u>คำอธิบายการใช้งานเอกสาร</u></td>
				</tr>
				<tr>
					<td colspan="8" style="font-size: 2px;">1.ต้นฉบับ-สำเนา ให้ส่งบช.ลูกหนี้, 2.บช.สรุป ตรวจ-เซ็น คืนสำเนาให้ทาง จนท.ขาย , 3.จนท.บัญชีตรวจคู่กับใบรับคืนหนังสือ(ลูกค้า)และสรุปปิดในใบรับคืนสินค้า(ลูกค้า)</td>
				</tr>
			</table>
			
			<!-- <div class="col-md-12" style="font-size: 2px;"> -->
				<!-- <u>คำอธิบายการใช้งานเอกสาร</u>
				<br />
				1.ต้นฉบับ-สำเนา ให้ส่งบช.ลูกหนี้, 2.บช.สรุป ตรวจ-เซ็น คืนสำเนาให้ทาง จนท.ขาย , 3.จนท.บัญชีตรวจคู่กับใบรับคืนหนังสือ(ลูกค้า)และสรุปปิดในใบรับคืนสินค้า(ลูกค้า)  -->
				<!-- 
				tanawat
				<ol style="font-size: 8px;">
					<u>คำอธิบายการใช้งานเอกสาร</u>
					<li>ต้นฉบับ-สำเนา ให้ส่งบช.ลูกหนี้</li>
					<li>บช.สรุป ตรวจ-เซ็น คืนสำเนาให้ทาง จนท.ขาย</li>
					<li>จนท.บัญชีตรวจคู่กับใบรับคืนหนังสือ(ลูกค้า)และสรุปปิดในใบรับคืนสินค้า(ลูกค้า)</li>
				</ol> -->
			<!-- </div>	 -->
				
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
						<td><?php echo $customer['Cust_Name'];?> (<?php echo $customer['Cust_ID'];?>)</td>
						<th class="text-right" style="width: 15%;">เลขที่รับคืน</th>
						<td style="width: 25%;"><b>SR</b></td>
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
			<table class="table table-bordered table-condensed">
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
						<th class="text-center">+/-</th>
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
						<td></td>
					</tr>
					<?php endfor;?>
					<tr>
						<td colspan="7" style="height: 80px;"><strong>  หมายเหตุ / เหตุผลการคืนสินค้า</strong></td>
					</tr>

					
				</tbody>
			</table>
		</div>
		<div class="col-md-12 page-break">
			<table class="table table-condensed no-border">
				<tr>
					<td class="text-right">ผู้ตรวจรับคืน :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.คลัง)</td>
					<td></td>
					<td></td>
					<td class="text-right">รวมรับ(เล่ม) = </td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					
					<td colspan="6" class="text-center">ฝ่ายบัญชี : ตรวจสอบการรับคืนของลูกค้าและปิดบัญชี</td>
					
				</tr>
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.บัญชี)</td>
					<td colspan="3" class="text-right">ตามเอกสารอ้างอิงใบลดหนี้ / รับคืน เลขที่ :</td>
					<td colspan="2"><?php echo repeater('.',55);?></td>
					
				</tr>
				<tr>
					<td class="text-right">วันที่</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<!-- <td></td> -->
					<td colspan="3" class="text-right">อ้างอิงใบลดหนี้ / รับคืน เลขที่ :</td>
					<td><?php echo repeater('.',30);?></td>
					<td class="text-right">ใบเสร็จเลขที่ :</td>
					<td>......................</td>
					
				</tr>
				
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(จนท.Admin)</td>
					<td colspan="2" class="text-right">สรุปบัญชีถูกต้องแล้ว:</td>
					<td><?php echo repeater('.',30);?></td>
					<td>(จนท.บัญชี)</td>
					<td></td>
					
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<td></td>
					<td></td>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',8);?>/<?php echo repeater('.',8);?>/<?php echo repeater('.',8);?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="text-right">จนท.ตรวจร่วม :</td>
					<td><?php echo repeater(".",32);?></td>
					<td>(หน.คลัง)</td>
					<td colspan="2" class="text-right">ตรวจสอบ :</td>

					<td><?php echo repeater('.',28);?></td>
					<td><?php echo repeater('.',28);?></td>
					<td><?php echo repeater('.',8);?>/<?php echo repeater('.',8);?>/<?php echo repeater('.',8);?></td>
				</tr>
				<tr>
					<td class="text-right">วันที่ :</td>
					<td><?php echo repeater('.',10);?>/<?php echo repeater('.',10);?>/<?php echo repeater('.',10);?></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="text-center">(ผจก.ฝ่าย)</td>
					<td class="text-center">ฝ่ายตรวจสอบ</td>
					<td></td>
				</tr>
			</table>
			<div class="col-md-12" style="font-size: 11px;">
				<ol>
					<u>คำอธิบายการใช้งานเอกสาร</u>
					<li>ต้นฉบับ-สำเนา ให้ส่งบช.ลูกหนี้</li>
					<li>บช.สรุป ตรวจ-เซ็น คืนสำเนาให้ทาง จนท.ขาย</li>
					<li>จนท.บัญชีตรวจคู่กับใบรับคืนหนังสือ(ลูกค้า)และสรุปปิดในใบรับคืนสินค้า(ลูกค้า)</li>
				</ol>
			</div>
		</div>
		
		
	</div>
	
	
	
	
</div> <!-- end .container -->