<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<!-- <h3><?php echo $title;?></h3> -->
			
			<form role="form" class="form-horizontal">
				<fieldset id="" class="">
			  		<legend>ข้อมูลสินค้า</legend>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">รหัสสินค้า</label></td>
								<td><input type="text" name="" id="" class="col-sm-5 form-control input-sm" autofocus /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ชื่อสินค้า</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">เล่มที่</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">รูปภาพ</label></td>
								<td colspan="5">
									    <input type="file" id="exampleInputFile">
								</td>
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
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">อายุการวางขาย</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ราคา</label></td>
								<td>
									<input type="text" name="" id="" class="form-control input-sm" placeholder="บาท" />
									<!-- 
									<div class="input-group">
									  <input type="text" class="form-control input-sm">
									  <span class="input-group-addon">บาท</span>
									</div>
									 -->
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">คลังหลัก</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ทะเบียน</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">Barcode</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">น้ำหนัก</label></td>
								<td>
									<input type="text" name="" id="" class="form-control input-sm" placeholder="กก." />
									<!-- 
									<div class="input-group">
									  <input type="text" class="form-control input-sm">
									  <span class="input-group-addon">กก.</span>
									</div> -->
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">กว้าง</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" placeholder="มม." /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ยาว</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" placeholder="มม." /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">หนา</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" placeholder="มม." /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">อายุรับคืน</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">อายุคงคลัง</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label"></label></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">คำอธิบาย</label></td>
								<td colspan="3"><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">สถานะ</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								
							</tr>
						</table>
					</div>
				</fieldset>
				<fieldset id="" class="">
			  		<legend>ข้อมูลการผลิต</legend>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">เลขที่ใบสั่งผลิต</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ครั้งที่ผลิต</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">วันที่ผลิต</label></td>
								<td><input type="text" name="" id="manufacture-start" class="form-control input-sm" /></td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">วันผลิตเสร็จ</label></td>
								<td><input type="text" name="" id="manufacture-end" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ยอดสั่งผลิต1</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ยอดสั่งผลิต2</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ยอดสำรองสินค้า</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ยอดตัวอย่าง</label></td>
								<td><input type="text" name="" id="" class="form-control input-sm" /></td>
								<td class="text-right info"><label for="inputEmail3" class="control-label">ผลิตโดยกอง</label></td>
								<td>
									<select name="" id="" class="form-control input-sm">
										<option>please select one</option>
									</select>
								</td>
							</tr>
						</table>
					</div>	<!-- col-md-8 -->
					<div class="col-md-6 col-md-offset-1">
						<input type="submit" class="btn btn-primary" value="บันทึก" />
						<input type="submit" class="btn btn-primary" value="บันทึกและกลับสู่หน้าหลัก" />
						<input type="submit" class="btn btn-primary" value="บันทึกและเพิ่มใหม่" />
						<input type="reset" class="btn btn-danger" value="ล้างฟอร์ม" />
						<input type="submit" class="btn btn-danger" value="ยกเลิกและกลับสู่หน้าหลัก" />
					</div>
				</fieldset>
			</form>				 
			
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
		
		$("#manufacture-start, #manufacture-end").datetimepicker({
			pickTime: false
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