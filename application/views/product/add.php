<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<!-- <h3><?php echo $title;?></h3> -->
			<fieldset id="" class="">
			  <legend><?php echo $title;?></legend>
				<form role="form" class="form-horizontal">
					<!--
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-5 control-label label label-warning">รหัสสินค้า</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" id="product_id" placeholder="Product ID">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-5 control-label text-right">เอกสารอ้างอิง</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" id="product_id" placeholder="">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-5 control-label">เอกสารอ้างอิง</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" id="product_id" placeholder="">
							</div>
						</div>
					</div>
					-->
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">รหัสสินค้า</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ชื่อสินค้า</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">เล่มที่</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ประเภท</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">กลุ่ม</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">หมวด</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
							</tr>
						</table>
					</div>
					
				</form>				 
			</fieldset>
		</div>
	</div><!-- end .row -->
</div>
<!-- end .container-fluid -->

<script>
	$(function() {
		// alert('hello ims');
		$("#product_id").blur(function() {
			var str = $(this).val();
			str = str.toUpperCase();
			$(this).val(str);
		});


		$("#product_good, #product_unusable, #product_deteriorate").blur(function(e) {
			// alert('on blur');
			var total_receive = parseInt($("#product_good").val()) + parseInt($("#product_deteriorate").val()) + parseInt($("#product_unusable").val());

			$("#product_receive").val(total_receive);
		});
		
		$('input, select').keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****

	}); 
</script>