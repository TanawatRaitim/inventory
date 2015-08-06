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
						<th class="text-right">ลูกค้า</th>
						<td><?php echo $customer['Cust_Name'];?> (<?php echo $customer['Cust_ID'];?>)</td>
						<th class="text-right">ผู้ติดต่อ</th>
						<td><?php echo $customer['Cust_Contact'];?></td>
						<td colspan="2"><?php echo $customer['OtherNote'];?></td>						
					</tr>
					<tr>
						<th class="text-right">โทรศัพท์</th>
						<td><?php echo $customer['Cust_Tel'];?></td>
						<th class="text-right">แฟกส์</th>
						<td><?php echo $customer['Cust_Fax'];?></td>
						<th class="text-right">Email</th>
						<td><?php echo $customer['Cust_Email'];?></td>
					</tr>
					<tr>
						<th class="text-right">ที่อยู่</th>
						<td colspan="5"><?php echo $customer['Cust_Addr'];?></td>
						
					</tr>
					
				</thead>
			</table>
		</div>
	</div>
	
	<pre>
		<?php print_r($products);?>
	</pre>
	
	<div class="row">
		<?php foreach($products as $key=>$value):?>
			
			<div class="col-md-12">
				
				<h3><?php echo $value['product_name'];?>#<?php echo $value['product_vol'];?></h3>
				
				
				<img src="<?php echo base_url($value['barcode_img']);?>" alt="" />
			</div>
			
		<?php endforeach;?>	
	</div>
	
	
</div> <!-- end .container -->