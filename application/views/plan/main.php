<script>
	$(function(){
		$("#show_form").click(function(e){
			e.preventDefault();
			//alert('Hello Production Plan');
		});
	});

</script>
		
<style>
	table, tr, td, th{
		/*border: 1px solid black;*/
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4>Production Plan</h4>
		</div>
		
		<div class="col-md-12">
			<form class="form-inline" role="form">
			  <div class="form-group">
			    <!-- <label class="sr-only" for="exampleInputEmail2">Job Number</label> -->
			    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Job ID.">
			  </div>
			  <div class="form-group">
			    <!-- <label class="sr-only" for="exampleInputPassword2">Job Type</label> -->
			    <!-- <input type="text" class="form-control" id="exampleInputPassword2" placeholder="ประเภทงาน"> -->
			    <select name="" id="" class="form-control">
			    	<?php echo $job_dropdown;?>
			    </select>
			  </div>
			 
			  <button type="button" class="btn btn-info" id="show_form">ยืนยัน</button>
			  กรุณาใส่เลข job id และ ประเภทงานและกดยืนยัน
			</form>
		</div>
		
		<div class="col-md-12" style="margin-top: 30px;">
			<div class="panel panel-primary">
			  <div class="panel-heading">Insert new plan</div>
			  <div class="panel-body">
			  	<fieldset class="bg-info" style="padding: 0px 0px 15px 10px;">
					<legend style="margin-bottom: 0px;">แผนงาน</legend>										 
				
					<div class="col-md-12">
					    <div class="table-responsive">
					    	<table>
					    		<!-- 
					    		<thead>
					    			<tr>
					    				<th>Job ID</th>
					    				<th></th>
					    				<th>ประเภทงาน</th>
					    				<th></th>
					    				<th>Job Name</th>
					    				<th></th>
					    				<th>Qty.</th>
					    				<th></th>
					    				<th>สี</th>
					    				<th></th>
					    				<th>ผู้ผลิต</th>
					    				<th></th>
					    				<th>กระดาษ</th>
					    				<th></th>
					    				<th>GSM</th>
					    				<th></th>
					    				<th>ขนาด</th>
					    				<th></th>
					    				<th>กำหนดส่ง</th>
					    				<th></th>
					    				<th>จน.สั่งผลิต</th>
					    				<th></th>
					    				<th>จน.ขั้นต่ำ</th>
					    				<th></th>
					    				
					    			</tr>
					    		</thead>
					    		 -->
					    		<tbody>
					    			<tr>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="รหัสงาน" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="ประเภทงาน" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="ชื่องาน" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="จำนวน" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="สี" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="ผู้ผลิต" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="ชนิดกระดาษ" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="GSM" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="ขนาดใบพิมพ์" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="กำหนดส่ง" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="จน.สั่งผลิต" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    				
						    			<td><input type="text" class="form-control input-sm" placeholder="จน.สั่งผลิตขั้นต่ำ" /></td>
						    			<td>&nbsp;&nbsp;&nbsp;</td>
					    												
						    		</tr>
						    		
						    		<tr>
						    			<th colspan="6">Form A</th>
						    			<th colspan="6">Form C</th>
						    			<th colspan="12"></th>
						    		</tr>
						    		<tr>
						    			<td colspan="6"><input type="file" /></td>
						    			<td colspan="6"><input type="file" /></td>
						    			<td colspan="12"><button class="btn btn-danger">เพิ่มแผนงาน </button></td>
						    		</tr>
						    		
					    		</tbody> 
					    	</table>
					    </div> <!-- .col-md-12 -->
				 	</div>    <!-- .table-responsive -->
			    </fieldset>
			      
			    <!-- <br /><br />   -->
			    
			    <div class="col-md-6">
			    	<fieldset class="bg-success" style="padding: 0px 0px 15px 10px;">
					  <legend style="margin-bottom: 0px;">การผลิต</legend>
						<div class="table-responsive">
					    	<table>
					    		<!-- 
					    		<thead>
					    			<tr>
					    				<th>วิธีการผลิต</th>
					    				<th></th>
					    				<th>เริ่ม</th>
					    				<th></th>
					    				<th>เสร็จ</th>
					    				<th></th>
					    				<th>ชม.</th>
					    				<th></th>
					    				<th>Plan</th>
					    				<th></th>
					    			</tr>	
					    		</thead>
					    		 -->
					    		<tbody>
					    			<tr>
					    				<td><input type="text" class="form-control input-sm" placeholder="วิธีการผลิต" /></td>
					    				<td>&nbsp;&nbsp;&nbsp;</td>
					    				<td><input type="text" class="form-control input-sm" placeholder="เวลาเริ่ม" /></td>
					    				<td>&nbsp;&nbsp;&nbsp;</td>
					    				<td><input type="text" class="form-control input-sm" placeholder="เวลาเสร็จ" /></td>
					    				<td>&nbsp;&nbsp;&nbsp;</td>
					    				<td><input type="text" class="form-control input-sm" placeholder="ชม." /></td>
					    				<td>&nbsp;&nbsp;&nbsp;</td>
					    				<td><input type="text" class="form-control input-sm" placeholder="แผน" /></td>
					    				<td>&nbsp;&nbsp;&nbsp;</td>
					    			</tr>
					    			<tr>
					    				<td colspan="10" style="padding-top: 10px;">
					    					<label for="order">
												<input type="checkbox" id="order" />
												ใบสั่ง
											</label>
											&nbsp;&nbsp;
					    					<label for="paper2">
												<input type="checkbox" id="paper2" />
												กระดาษ
											</label>
											&nbsp;&nbsp;
					    					<label for="plate2">
												<input type="checkbox" id="plate2" />
												เพลท
											</label>
											<button class="btn btn-danger">เพิ่มวิธีการผลิต <span class="glyphicon glyphicon-fast-forward"></span></button>
					    				</td>
					    			</tr>
					    		</tbody>
					    	</table>
			    		</div>		 
					</fieldset>
			    </div>
			    <div class="col-md-6">
			    	<div class="table-responsive">
				    	<table class="table table-condensed">
				    		<thead>
				    			<tr>
				    				<th colspan="8">วิธีการผลิตทั้งหมด</th>
				    			</tr>
				    			<tr>
				    				<th>วิธีการผลิต</th>
				    				<th>เริ่ม</th>
				    				<th>เสร็จ</th>
				    				<th>ชม.</th>
				    				<th>ใบสั่ง</th>
				    				<th>กระดาษ</th>
				    				<th>เพลท</th>
				    				<th>Plan</th>
				    			</tr>	
				    		</thead>
				    		<tbody>
				    			<tr>
				    				<td>กลับตีลังกา</td>
				    				<td>8.30</td>
				    				<td class="info">10.30</td>
				    				<td>2</td>
				    				<td><span class="glyphicon glyphicon-ok"></span></td>
				    				<td><span class="glyphicon glyphicon-ok"></span></td>
				    				<td><span class="glyphicon glyphicon-ok"></span></td>
				    				<td>4A</td>
				    			</tr>
				    			<tr class="success">
				    				<td>กลับนอก</td>
				    				<td>10.30</td>
				    				<td>12.00</td>
				    				<td>1.5</td>
				    				<td><span class="glyphicon glyphicon-ok"></span></td>
				    				<td><span class="glyphicon glyphicon-ok"></span></td>
				    				<td></td>
				    				<td>4B</td>
				    			</tr>
				    		</tbody>
				    	</table>
			    	</div>
			    </div>
			    
			    
			  </div> <!-- .panel-body -->
			</div>
		</div> <!-- .col-md-12 -->

		
		<div class="col-md-12" style="margin-top: 20px;">
			<div class="panel panel-default">
			  <div class="panel-heading">Planning next 3 days</div>
			  <div class="panel-body">
			    <div class="table-responsive">
			    	<table class="table table-condensed">
				    		<thead>
				    			<tr>
				    				<th colspan="8">วิธีการผลิตทั้งหมด</th>
				    			</tr>
				    			<tr>
				    				<th>วิธีการผลิต</th>
				    				<th>เริ่ม</th>
				    				<th>เสร็จ</th>
				    				<th>ชม.</th>
				    				<th>ใบสั่ง</th>
				    				<th>กระดาษ</th>
				    				<th>เพลท</th>
				    				<th>Plan</th>
				    			</tr>	
				    		</thead>
				    		<tbody> 
				    			<tr>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td class="info">cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    			</tr>
				    			<tr class="success">
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td class="danger">cell</td>
				    			</tr>
				    			<tr>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td>cell</td>
				    				<td class="danger">cell</td>
				    			</tr>
				    		</tbody>
				    	</table>

			    </div>
			  </div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">Other Information</div>
			  <div class="panel-body">
			    <div class="table-responsive">
			    	<table class="table table-condensed">
			    		<thead>
			    			<tr>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    			</tr>	
			    		</thead>
			    		<tbody>
			    			<tr>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td class="info">cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    			<tr class="success">
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td class="danger">cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    			<tr>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td class="danger">cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">Other Information</div>
			  <div class="panel-body">
				Other Information
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">Other Information</div>
			  <div class="panel-body">
			    Other Information
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">Other Information</div>
			  <div class="panel-body">
			    Other Information
			  </div>
			</div>
		</div>

	</div> <!-- .row -->
	
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">Last 10 plan added</div>
			  <div class="panel-body">
			    <div class="table-responsive">
			    	<table class="table table-condensed">
			    		<thead>
			    			<tr>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    				<th>head</th>
			    			</tr>	
			    		</thead>
			    		<tbody>
			    			<tr>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    			<tr class="danger">
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    			<tr>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    				<td class="danger">cell</td>
			    				<td>cell</td>
			    				<td>cell</td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div>
			  </div>
			</div>
		</div>
		
	</div>
</div>