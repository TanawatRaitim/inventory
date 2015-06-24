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
	
	
	
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-center"><?php echo $title;?></h4>
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="text-right">เลขที่ใบจอง :</th>
						<td><?php echo $transaction['DocRef_No'];?></td>
						<th class="text-right">จองสำหรับ :</th>
						<td><?php echo $tk_name;?></td>
					</tr>
					<tr>
						<th class="text-right">ผู้ทำรายการจอง :</th>
						<td><?php echo $reserve_employee;?></td>
						<th class="text-right">วันที่ทำการจอง :</th>
						<td><?php echo date_format(date_create($transaction['RowUpdatedDate']), 'd/m/Y');?></td>
					</tr>
					<tr>
						<th class="text-right">ผู้รับจอง :</th>
						<td><?php echo $approve_employee;?></td>
						<th class="text-right">วันที่รับจอง :</th>
						<td><?php echo date_format(date_create($transaction['ApprovedDate']), 'd/m/Y');?></td>
					</tr>
					<tr>
						<th class="text-right">นามลูกค้า :</th>
						<td><?php echo $customer_name;?></td>
						<th class="text-right">วันที่ต้องการส่งของ :</th>
						<td><?php echo convert_mssql_date($transaction['Transport_Date']);?> (<?php echo $transport_by;?>)</td>
					</tr>
					<tr>
						<th class="text-right">เลขที่ใบส่ั่งขาย /ตัดจ่าย :</th>
						<td><?php echo $transaction['TK_Code'];?><?php echo $transaction['TK_ID'];?></td>
						<th class="text-right">เลขที่ Invoice :</th>
						<td><?php echo $transaction['Invoice_No'];?></td>
					</tr>
				</thead>
			</table>
		</div>
		
		<div class="col-md-12">
			<h4 class="text-center">รายการสินค้าที่ต้องการให้จัดแพ๊ค</h4>
			<?php if(isset($error)):?>
				<?php echo $error;?>
			<?php endif;?>	
				
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="text-center">ลำดับ</th>
						<th class="text-center">รหัสสินค้า</th>
						<th class="text-center">ชื่อสินค้า</th>
						<th class="text-center">คลัง</th>
						<th class="text-center">จำนวน </th>
						<th class="text-center">รวมน้ำหนัก (กรัม)</th>
					</tr>
				</thead>
				<tbody>
				<?php if($product_count>0):?>
					<?php $i = 1;?>
					<?php foreach ($transaction_detail as $row):?>
						<?php if($i==31):?>
							
						</tbody>	
					</table>
					<div class="page-break-alway"></div>
					<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="text-center">ลำดับ</th>
							<th class="text-center">รหัสสินค้า</th>
							<th class="text-center">ชื่อสินค้า</th>
							<th class="text-center">คลัง</th>
							<th class="text-center">จำนวน (เล่ม)</th>
							<th class="text-center">รวมน้ำหนัก (กรัม)</th>
						</tr>
					</thead>
					<tbody>
						<?php endif;?>	
						<tr>
							<td class="text-center"><div class="page-break2"><?php echo $i;?></div></td>
							<td class="text-center"><div class="page-break2"><?php echo $row['Product_ID'];?></div></td>
							<td><div class="page-break2"><?php echo $row['Product_Name'];?> # <?php echo $row['Product_Vol'];?></div></td>
							<td class="text-center"><div class="page-break2"><?php echo $row['Stock_Name'];?></div></td>
							<td class="text-center"><div class="page-break2"><?php echo number_format($row['QTY_Good']);?></div></td>
							<td class="text-center"><div class="page-break2"><?php echo number_format($row['product_weight'],2);?></div></td>
							<!-- <td class="text-center"><?php echo number_format($row['product_weight']);?>&nbsp;(<?php echo $row['Weight'];?>*<?php echo $row['QTY_Good'];?>)</td> -->
							
						</tr>
						
						<?php $i++;?>
					<?php endforeach;?>	
				<?php else:?>
					<tr>
						<th colspan="6">ไม่มีรายการ</th>
					</tr>
				<?php endif;?>			
				</tbody>
				<!--
				<tfoot style="border: 0px none !important;">
					<tr style="border: 0px none !important; padding: 0px;">
						<td colspan="6" style="border: 0px none !important; padding: 0px;">
							<table class="table table-condensed table-bordered">
								<?php if(isset($error)):?>
									<tr>
										<th colspan="6"><?php echo $error;?></th>
									</tr>
								<?php endif;?>		
								<tr>
									<th style="width: 120px;"></th>
									<td style="width: 150px;"></td>
									<th style="width: 160px;"></th>
									<td style="width: 200px;"></td>
									<th class="text-right" style="width: 170px;">ผู้จัดของ :</th>
									<td style="width: 200px;"></td>
								</tr>
								<tr>
									<th></th>
									<td></td>
									<th></th>
									<td></td>
									<th class="text-right">ผู้ตรวจสอบ 1 :</th>
									<td></td>
								</tr>
								<tr>
									<th class="text-right">รวม :</th>
									<td><?php echo number_format($product_count);?> รายการ</td>
									<th class="text-right">จำนวนห่อทั้งสิ้น :</th>
									<td></td>
									<th class="text-right">ผู้ตรวจสอบ 2 :</th>
									<td></td>
								</tr>
								<tr>
									<th class="text-right">รวมยอด :</th>
									<td><?php echo number_format($item_count);?> เล่ม</td>
									<th class="text-right">น้ำหนัก/ห่อ :</th>
									<td></td>
									<th class="text-right">วันที่ Loading สินค้า :</th>
									<td></td>
								</tr>
								<tr>
									<th class="text-right">รวมน้ำหนัก :</th>
									<?php if(isset($error)):?>
										<td>N/A</td>
									<?php else:?>
										<td><?php echo number_format($total_weight,2);?> กิโลกรัม</td>		
									<?php endif;?>
									<th class="text-right">รวมน้ำหนักทั้งสิ้น :</th>
									<td></td>
									<th class="text-right">เวลา Loading สินค้า :</th>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				</tfoot>
				-->
			</table>
		</div>
		<div class="col-md-12 page-break">
			<table class="table table-condensed table-bordered">
				<?php if(isset($error)):?>
				<tr>
					<th colspan="6"><?php echo $error;?></th>
				</tr>
					
				<?php endif;?>
				<tr>
					<th style="width: 120px;"></th>
					<td style="width: 150px;"></td>
					<th style="width: 160px;"></th>
					<td style="width: 200px;"></td>
					<th class="text-right" style="width: 200px;">ผู้จัดของ :</th>
					<td style="width: 200px;"></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td></td>
					<th class="text-right">ผู้ตรวจสอบ 1 :</th>
					<td></td>
				</tr>
				<tr>
					<th class="text-right">รวม :</th>
					<td><?php echo number_format($product_count);?> รายการ</td>
					<th class="text-right">จำนวนห่อทั้งสิ้น :</th>
					<td></td>
					<th class="text-right">ผู้ตรวจสอบ 2 :</th>
					<td></td>
				</tr>
				<tr>
					<th class="text-right">รวมยอด :</th>
					<td><?php echo number_format($item_count);?> เล่ม</td>
					<th class="text-right">น้ำหนัก/ห่อ :</th>
					<td></td>
					<th class="text-right">วันที่ Loading สินค้า :</th>
					<td></td>
				</tr>
				<tr>
					<th class="text-right">รวมน้ำหนัก :</th>
					<?php if(isset($error)):?>
						<td>N/A</td>
					<?php else:?>
						<td><?php echo number_format($total_weight,2);?> กิโลกรัม</td>		
					<?php endif;?>
					<th class="text-right">รวมน้ำหนักทั้งสิ้น :</th>
					<td></td>
					<th class="text-right">เวลา Loading สินค้า :</th>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
	
	<!------------------------------------------------------------------ page break ------------------------------------------------------------->
	
	<div class="page-break-alway"></div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th colspan="4" style="background-image: ">
							<h4><img height="25px;" src="<?php echo $this->config->item('base_assets_images');?>/logo.jpg" /><?php echo repeater("&nbsp;",20);?><span class="underline"><?php echo $title2;?></span></h4>
						</th>	
					</tr>
					<tr>
						<th class="text-right">เลขที่ใบจอง :</th>
						<td><?php echo $ticket;?></td>
						<th class="text-right">จองสำหรับ :</th>
						<td><?php echo $tk_name;?></td>
					</tr>
					<tr>
						<th class="text-right">ผู้ทำรายการจอง :</th>
						<td><?php echo $reserve_employee;?></td>
						<th class="text-right">วันที่ทำการจอง :</th>
						<td><?php echo date_format(date_create($transaction['RowUpdatedDate']), 'd/m/Y');?></td>
					</tr>
					<tr>
						<th class="text-right">ผู้รับจอง :</th>
						<td><?php echo $approve_employee;?></td>
						<th class="text-right">วันที่รับจอง :</th>
						<td><?php echo date_format(date_create($transaction['ApprovedDate']), 'd/m/Y');?></td>
					</tr>
					<tr>
						<th class="text-right">นามลูกค้า :</th>
						<td><?php echo $customer_name;?></td>
						<th class="text-right">วันที่ต้องการส่งของ :</th>
						<td><?php echo convert_mssql_date($transaction['Transport_Date']);?>  (<?php echo $transport_by;?>)</td>
					</tr>
					<tr>
						<th class="text-right">เลขที่ใบสั่งขาย /ตัดจ่าย :</th>
						<td><?php echo $transaction['TK_Code'];?><?php echo $transaction['TK_ID'];?></td>
						<th class="text-right">เลขที่ Invoice :</th>
						<td><?php echo $transaction['Invoice_No'];?></td>
					</tr>
					
				</table>
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th style="width: 50%;">ลักษณะหีบห่อ</th>
						<th>วิธีการบรรจุ</th>
					</tr>
					<tr>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;ห่อกระดาษน้ำตาล</td>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;บรรจุรวมกัน</td>
					</tr>
					<tr>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;กล่องลูกฟูก กว้าง<?php echo repeater('.',15);?> x ยาว<?php echo repeater('.',15);?> x สูง<?php echo repeater('.',15);?></td>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;บรรจุแยกตามประเภทสินค้า</td>
					</tr>
					<tr>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;สายรัด</td>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;อื่นๆ<?php echo repeater('.',80);?></td>
					</tr>
					<tr>
						<td><input type="checkbox" class="cb" />&nbsp;&nbsp;อื่นๆ<?php echo repeater('.',80);?></td>
						<td></td>
					</tr>
				</table>
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th class="text-center">ห่อ</th>
						<th class="text-center">จำนวนเล่ม</th>
						<th class="text-center">น้ำหนัก/ห่อ (กรัม)</th>
						<th class="text-center">ห่อ</th>
						<th class="text-center">จำนวนเล่ม</th>
						<th class="text-center">น้ำหนัก/ห่อ (กรัม)</th>
						<th class="text-center">ห่อ</th>
						<th class="text-center">จำนวนเล่ม</th>
						<th class="text-center">น้ำหนัก/ห่อ (กรัม)</th>
					</tr>
					<?php for ($i=1; $i <= 10 ; $i++):?>
					<tr>
						<th class="text-center"><?php echo $i;?></th>
						<td></td>
						<td></td>
						<th class="text-center"><?php echo $i+10;?></th>
						<td></td>
						<td></td>
						<th class="text-center"><?php echo $i+20;?></th>
						<td></td>
						<td></td>
					</tr>	
					<?php endfor;?>
					
				</table>
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th colspan="6"><h4>ข้อมูลสรุปหลังแพ๊คกิ้งสินค้า</h4></th>
					</tr>
					<tr>
						<th class="text-right">จำนวนรายการรวม</th>
						<td class="text-left"><?php echo repeater('.',20);?> รายการ</td>
						<th class="text-right">จำนวนเล่มรวม</th>
						<td class="text-left"><?php echo repeater('.',20);?> เล่ม</td>
						<th class="text-right">น้ำหนักหลังแพ๊ครวม</th>
						<td class="text-left"><?php echo repeater('.',20);?> กรัม</td>
					</tr>
					<tr>
						<th class="text-right signature">ผู้บรรจุ1</th>
						<td class="text-left signature"><?php echo repeater('.',30);?></td>
						<th class="text-right signature">ผู้บรรจุ2</th>
						<td class="text-left signature"><?php echo repeater('.',30);?></td>
						<th class="text-right signature">วันเวลาที่บรรจุเสร็จ</th>
						<td class="text-left signature"></td>
					</tr>
				</table>
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th colspan="2"><h4>ผลการตรวจสอบการแพ๊คกิ้งสินค้า</h4></th>
					</tr>
					<tr>
						<td style="width: 40%;"><input type="checkbox" />&nbsp;&nbsp;จำนวนสินค้าครบถ้วนสามารถจัดส่งสินค้าได้</td>
						<td rowspan="3"><span class="underline">หมายเหตุ</span></td>
					</tr>
					<tr>
						<td><input type="checkbox" />&nbsp;&nbsp;ยอดสินค้าไม่ครบ ไม่สามารถจัดส่งสินค้าได้</td>
					</tr>
					<tr>
						<td><input type="checkbox" />&nbsp;&nbsp;อื่นๆ .............................. </td>
					</tr>
				</table>
				<table class="table table-condensed table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th class="text-center">ผู้ตรวจสอบ (คลังสินค้า)</th>
						<th class="text-center">ผู้ตรวจสอบ (ฝ่ายขาย)</th>
						<th class="text-center">ผู้ตรวจสอบ (ฝ่ายบัญชี)</th>
					</tr>
					<tr>
						<td class="text-center signature">ลงชื่อ  <?php echo repeater('.',55);?></td>
						<td class="text-center signature">ลงชื่อ  <?php echo repeater('.',55);?></td>
						<td class="text-center signature">ลงชื่อ  <?php echo repeater('.',55);?></td>

					</tr>
					<tr>
						<td class="text-center signature ">วันที่ <?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
						<td class="text-center signature ">วันที่ <?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
						<td class="text-center signature ">วันที่ <?php echo repeater('.',15);?>/<?php echo repeater('.',15);?>/<?php echo repeater('.',15);?></td>
					</tr>
					<tr>
						<td colspan="3" class="underline" style="height: 55px;">อธิบายเพิ่มเติม</td>
					</tr>
				</table>
				<p>
					<h5 class="underline">ข้อบ่งใช้เอกสารฉบับนี้</h5>
					<ol style="font-size: 11px;">
						<li>เอกสารฉบับนี้เป็นเอกสารที่แสดงรายละเอียดของสินค้าที่มีการสั่งซื้อ โดยใช้เป็นใบสั่งบรรจุหีบห่อ และการตรวจสอบ</li>
						<li>ฝ่ายคลังสินค้าจะต้องเป็นผู้สั่งพิมพ์ ภายหลังจากดำเนินการตัดขาย / ตัดจ่าย โดยระบุข้อมูลใบสั่งขายและ Invoice แล้วเท่านั้น</li>
						<li>ภายหลังการตรวจสอบ และจัดส่งสินค้าเรียบร้อยแล้ว เอกสารฉบับนี้จะต้องนำส่งและจัดเก็บไว้ที่ฝ่ายขายเพื่อเป็นคู่สำเนา</li>
					</ol>
				</p>
			</div>
		</div>
</div> <!-- end .container-fluid -->