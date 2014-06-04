<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_base'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_default'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('css'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation_additional'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_js'); ?>"></script>
    <title><?php echo $title; ?></title>
    <script>
		$(function(){
			$("#cancel").click(function(e){
				e.preventDefault();
				alertify.set({buttonReverse: true});
				alertify.set({ labels: {
				    ok     : "ตกลง",
				    cancel : "ยกเลิก"
				} });
				alertify.confirm("คุณต้องการยกเลิกการแก้ไขข้อมูล แล้วกลับไปสู่หน้าหลัก", function (e) {
				    if (e) {
				        // user clicked "ok"
				        //return true;
				        var url;
				        url = $("#cancel").attr('href');
				        window.location = url;
				        //alertify.error("Error notification" + url);
				        //return false;

				    } else {
				    	//alertify.error("Error notification");
				        return false;
				    }
				});
			});//end cancel
			
			$('input, select').keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****
					
					
			// duplication data from idcard address to current contact			
			$("#dup_data").click(function(){
				$("#contact_address").val($("#member_address").val()).effect("highlight","slow");
				$("#contact_sub_district").val($("#member_sub_district").val()).effect("highlight","slow");
				$("#contact_district").val($("#member_district").val()).effect("highlight","slow");
				$("#contact_province").val($("#member_province").val()).effect("highlight","slow");
				$("#contact_postcode").val($("#member_postcode").val()).effect("highlight","slow");
				$("#contact_country").val($("#member_country").val()).effect("highlight","slow");
			});
			
			$.datepicker.regional['th'] ={
		        changeMonth: true,
		        changeYear: true,
		        dateFormat: 'dd-mm-yy',
		        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
		        monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
		        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
		        constrainInput: true,
		        yearRange: "-50:+0",
		        buttonText: 'เลือก',
		        yearOffSet: 543,
		    };
		
		    $.datepicker.setDefaults($.datepicker.regional['th']);
			$( "#dob" ).datepicker( $.datepicker.regional["th"] );   // บอกให้ใช้ Propertie ภาษาที่เรานิยามไว้
    		$( "#dob" ).datepicker();                                 //Innit DatePicker ไปที่ Control ที่มี ID = datepicker
			
			$.validator.addMethod(
				"title",
				function(value, element){
					if(value == 0)
					{
						return false;
					}else{
						return true;
					}
				}," Need member title"
			)
			
			jQuery.validator.messages.required = "";
			jQuery.validator.messages.min = "";
			
			$("#form_edit_member").validate({
				invalidHandler: function(e, validator) {

					 $.Dialog({
						shadow: true,
						overlay: true,
						// flat: true,
						icon: '<span class="icon-info"></span>',
						title: 'เกิดข้อผิดพลาด',
						width: 500,
						padding: 10,
						content: 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบข้อมูลใหม่ </br>'
						});
					
					//alert('กรุณาตรวจสอบข้อมูล');
					$("html, body").animate({ scrollTop: 100 }, "fast");//new
				},
				//errorClass: "error-state",
				//validClass: "",
				focusInvalid: false,
				// onkeyup: false,
				// onfocusout: false,
				// onchange: false,
				submitHandler: function(form) {
					//$("div.error").hide();
					// alert("submit! use link below to go to the other step");
					alertify.set({buttonReverse: true});
					alertify.set({ labels: {
					    ok     : "ตกลง",
					    cancel : "ยกเลิก"
					} });
					alertify.confirm("ยืนยันการแก้ไขข้อมูล", function (e) {
					    if (e) {
					    	form.submit();
					        // user clicked "ok"
					        //return true;
					        //$this.submit();
					    } else {
					        // user clicked "cancel"
					        return false;
					    }
					});
				},
				rules:{
					history_book: {
						min: 1
					},
					history_issue:{
						min:1,
					},
					member_title:{
						//minlength:2
						//min:1
						title: true
					},
					history_sexual:{
						min:1
					},
					member_country:{
						min:1
					},
					member_province:{
						min:1
					},
					contact_province:{
						min:1
					},
					contact_country:{
						min:1
					},
					history_img:{
						extension: "jpg|png|jpeg|gif"
					},
					history_attachment:{
						extension: "jpg|png|jpeg|pdf"
					},
					history_volume:{
						digits: true,
						remote: {
							url: "<?php echo base_url();?>history/check_volume",
							type: "post",
							data: {
								book: function(){
									return $("#history_book").val();
								},
								issue: function(){
									return $("#history_issue").val();
								},
								volume: function(){
									return $("#history_volume").val();
								},
								member_id: function(){
									return $("#member_id").val();
								},
								ismember: function(){
									return $("#ismember").val();
								},history_id: function(){
									return $("#history_id").val();
								}
							}
						}
					}
				},
				messages: {
					history_volume:{
						digits: " ",
						remote: "มีข้อมูลนี้อยู่ในระบบแล้ว"
					},
					member_title:{
						title: ""
					},
					member_fname: {
						required: " "
						//equalTo: "Please enter the same password as above"
					},
					member_lname: {
						required: " "
						//email: "Please enter a valid email address, example: you@yourdomain.com",
						//remote: jQuery.validator.format("{0} is already taken, please enter a different address.")
					},
					history_img:{
						extension: "สามารถ Upload รูปภาพได้เฉพาะไฟล์นามสกุล '.jpg', '.jpeg','.png', '.gif' เท่านั้น"
					},
					history_attachment:{
						//jpg|png|jpeg|pdf
						extension: "สามารถ Upload รูปภาพได้เฉพาะไฟล์นามสกุล '.jpg', '.png','.jpeg', '.pdf' เท่านั้น"
					}
				},
				// debug:true
			});
		});
		
	</script>
	<style>
		input.error{
			border: red 2px solid;
		}
	</style>

</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>
	
	<div class="container" style="margin-top: 70px;"><!-- div.container -->
		<h2><i class="icon-user fg-magenta"></i> แก้ไขข้อมูล </h2>
		<p>
			แก้ไขข้อมูลของ <span class="label info">คุณ <?php echo $member_info[0]['fname'];?> <?php echo $member_info[0]['lname'];?></span>
			เมื่อวันที่ <?php echo mysql2thaidate(date("Y-m-d",strtotime($history_info[0]['create_date'])));?>
			&nbsp;<?php echo $is_3months;?>
		</p>
		<form action="<?php echo site_url('history/update');?>" method="post" enctype="multipart/form-data" name="form_edit_member" id="form_edit_member">
			<input type="hidden" name="member_idcard" id="member_idcard" value="<?php echo $member_info[0]['idcard'];?>" />
			<input type="hidden" name="member_code" id="member_code" value="<?php echo $member_info[0]['member_code'];?>" />
			<input type="hidden" name="member_id" id="member_id" value="<?php echo $member_info[0]['id'];?>" />
			<input type="hidden" name="ismember" id="ismember" value="yes" />
			<input type="hidden" name="history_id" id="history_id" value="<?php echo $history_info[0]['id'];?>" />
			<input type="hidden" name="contact_id" id="contact_id" value="<?php echo $history_info[0]['contact_id'];?>" />
			<input type="hidden" name="personalize_id" id="personalize_id" value="<?php echo $history_info[0]['personalize_id'];?>" />
			<div class="grid">
				<div class="row">
					<div class="span2">
						<?php if ($history_info[0]['image']): ?>
							<img class="rounded shadow" src="<?php echo $this->config->item('base_history_thumbs').$history_info[0]['image'];?>">
						<?php else: ?>
							<img class="rounded shadow" src="<?php echo $this->config->item('base_assets_images');?>no_img.png">
						<?php endif ?>
					</div>
					<div class="span6">
						
						<a href="<?php echo base_url()?>history/memberhistory/<?php echo $history_info[0]['id'];?>" class="button" id="all_history">ดูประวัติทั้งหมด</a>
						<table class="table">
							<tr>
								<th colspan="2">รายละเอียด</th>
							</tr>
							<tr>
								<td class="text-right"><strong>ชื่อ</strong></td>
								<td>
									<?php echo $member_info[0]['title'].$member_info[0]['fname']." ".$member_info[0]['lname'];?> (<?php echo $member_info[0]['nickname'];?>)
									<?php if($history_info[0]['attachment']!=""):?>
										&nbsp;&nbsp;
										<a href="<?php echo $this->config->item('base_history_attachment').$history_info[0]['attachment'];?>" target="_blank"><i class="icon-attachment fg-lightRed"></i></a>
									<?php endif;?>
								</td>
							</tr>
							<tr>
								<td class="text-right"><strong>รหัสบัตรประชาชน : </strong></td>
								<td><?php echo $member_info[0]['idcard'];?></td>
							</tr>
							<tr>
								<td class="text-right"><strong>รหัสสมาชิก : </strong></td>
								<td><?php echo $member_info[0]['member_code'];?></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $member_info[0]['address'];?> 
									<?php echo get_prefix($member_info[0]['sub_district'],$member_info[0]['province_id'],1);?> 
									<?php echo get_prefix($member_info[0]['district'],$member_info[0]['province_id'],2);?> 
									<?php echo get_province($member_info[0]['province_id']);?> 
									<?php echo $member_info[0]['postcode'];?>
								</td>
							</tr>
						</table>
					</div>
					<div class="span4 shadow">
						<table class="table">
							<tr>
								<th colspan="2">ข้อมูลหนังสือ</th>
							</tr>
							<tr class="selected">
								<td class="text-right">หนังสือ</td>
								<td>
									<select name="history_book" id="history_book" style="width: 150px;" required autofocus>
										<?php echo books_dropdown($history_info[0]['book_id']);?>
									</select>
								</td>
							</tr>
							<tr class="selected">
								<td class="text-right">คอลัมน์</td>
								<td>
									<select name="history_issue" id="history_issue" style="width: 150px;" required>
										<?php echo issues_dropdown($history_info[0]['issue_id']);?>
									</select>
								</td>
							</tr>
							<tr class="selected">
								<td class="text-right">เล่มที่</td>
								<td><input type="text" name="history_volume" id="history_volume" value="<?php echo $history_info[0]['volume'];?>" required /></td>
							</tr>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			<div class="grid">
				<div class="row">
					<div class="span12 shadow">
						<table class="table">
							<thead>
								<tr>
									<th colspan="8">ข้อมูลสมาชิก</th>
								</tr>
							</thead>
							<tbody>
								<tr class="selected">
									<td class="text-right">
										<select name="member_title" id="member_title" required>
											<?php echo title_dropdown($member_info[0]['title']);?>
										</select>
									</td>
									<td class="text-right text-bold">ชื่อ</td>
									<td><input type='text' name="member_fname" id="fname" value="<?php echo $member_info[0]['fname'];?>" required /></td>
									<td class="text-right">นามสกุล</td>
									<td><input type='text' name="member_lname" id="lname" value="<?php echo $member_info[0]['lname'];?>" required /></td>
									<td class="text-right">ชื่อเล่น</td>
									<td><input type='text' size="12" name="member_nickname" id="nickname" value="<?php echo $member_info[0]['nickname'];?>" /></td>
								</tr>
								<tr class="selected">
									<td class="table-label" colspan="2">วันเกิด</td>
									<td class="table-input"><input type='text' name="member_dob" id="dob" value="<?php echo mysql2thaidate($member_info[0]['dob']);?>" readonly="readonly" required /></td>
									<td class="text-right">นามแฝง</td>
									<td><input type='text' name="history_alias" id="history_alias" value="<?php echo $history_info[0]['alias'];?>" /></td>
									<td class="text-right">รสนิยม</td>
									<td>
										<select name="history_sexual" id="history_sexual" required>
											<?php echo sexual_dropdown($history_info[0]['sexual_id']);?>
										</select>
									</td>
								</tr>
								<tr class="selected">
									<td colspan="2" class="table-label">รูปภาพ</td>
									<td colspan="5" class="table-input"><input type="file" name="history_img" id="history_img" /></td>
								</tr>
								<tr class="selected">
									<td colspan="2" class="table-label">เอกสารแนบ</td>
									<td colspan="5" class="table-input">
										<input type="file" name="history_attachment" id="history_attachment" />
									</td>
								</tr>
								<tr class="selected">
									<td colspan="2" class="text-right">ข้อความที่ต้องการลง</td>
									<td colspan="5"><input type='text' name="history_info" id="history_info" value="<?php echo $history_info[0]['info'];?>" size="100" required /></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			<div class="grid">
				<div class="row">
					<div class="span12 shadow">
						<table class="table">
							<thead>
								<tr>
									<th colspan="8">ที่อยู่ตามบัตรประชาชน</th>
								</tr>
							</thead>
							<tbody>
								<tr class="selected">
									<td class="table-label">ที่อยู่</td>
									<td class="table-input" colspan="3"><input type='text' size="60" name="member_address" id="member_address" value="<?php echo $member_info[0]['address'];?>" required /></td>
									<td class="text-right">แขวง/ตำบล</td>
									<td><input type='text' size="15" name="member_sub_district" id="member_sub_district" value="<?php echo $member_info[0]['sub_district'];?>" required /></td>
									<td class="text-right">เขต/อำเภอ</td>
									<td><input type='text' size="15" name="member_district" id="member_district" value="<?php echo $member_info[0]['district'];?>" required /></td>
								</tr>
								<tr class="selected">
									
									<td class="table-label">จังหวัด</td>
									<td class="table-input">
										<select name="member_province" id="member_province" required>
											<?php echo province_dropdown($member_info[0]['province_id']);?>
										</select>
									</td>
									<td class="table-label">รหัสไปรษณีย์</td>
									<td class="table-input"><input type="text" size="10" name="member_postcode" id="member_postcode" value="<?php echo $member_info[0]['postcode'];?>" required /></td>
									<td class="text-right">ประเทศ</td>
									<td>
										<select name="member_country" id="member_country" required>
											<?php echo countries_dropdown($member_info[0]['country_id']);?>
										</select>
									</td>
									<td class="table-label"></td>
									<td class="table-input"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			<div class="grid">
				<div class="row">
					<div class="span12 shadow">
						<table class="table">
							<thead>
								<tr>
									<th colspan="8">ที่อยู่ปัจจุบันที่ใช้ติดต่อได้จริง <input type="button" value="ใช้ข้อมูลตามบัตรประชาชน" class="mini bg-lightPink bd-black" name="dup_data" id="dup_data" /></th>
								</tr>
							</thead>
							<tbody>
								<tr class="selected">
									<td class="table-label">ที่อยู่</td>
									<td class="table-input" colspan="3"><input size="55" type="text" name="contact_address" id="contact_address" value="<?php echo $contact_info[0]['address'];?>" required /></td>
									<td class="text-left">แขวง/ตำบล</td>
									<td><input type="text" size="15" name="contact_sub_district" id="contact_sub_district" value="<?php echo $contact_info[0]['sub_district'];?>" required /></td>
									<td class="text-left">เขต/อำเภอ</td>
									<td><input type="text" size="15" name="contact_district" id="contact_district" value="<?php echo $contact_info[0]['district'];?>" required /></td>
								</tr>
								<tr class="selected">
									<td class="table-label">จังหวัด</td>
									<td class="table-input">
										<select name="contact_province" id="contact_province" required>
											<?php echo province_dropdown($contact_info[0][province_id]);?>
										</select>
									</td>
									<td class="table-label">รหัสไปรษณีย์</td>
									<td class="table-input"><input type="text" size="10" name="contact_postcode" id="contact_postcode" value="<?php echo $contact_info[0]['postcode'];?>" required /></td>
									<td class="text-right">ประเทศ</td>
									<td>
										<select name="contact_country" id="contact_country" required>
											<?php echo countries_dropdown($contact_info[0]['country_id']) ;?>
										</select>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr class="selected">
									<td class="table-label">โทรศัพท์บ้าน</td>
									<td class="table-input"><input type="text" size="15" name="contact_phone" id="contact_phone" value="<?php echo $contact_info[0]['phone'];?>" /></td>
									<td class="table-label">มือถือ</td>
									<td class="table-input"><input type="text" size="15" name="contact_mobile" id="contact_mobile" value="<?php echo $contact_info[0]['mobile'];?>" /></td>
									<td class="table-label">Email</td>
									<td class="table-input" colspan="3"><input type="text" size="40" name="contact_email" id="contact_email" value="<?php echo $contact_info[0]['email'];?>" /></td>
								</tr>
								<tr class="selected">
									<td class="table-label">MSN</td>
									<td class="table-input" colspan="3"><input type="text" size="40" name="contact_msn" id="contact_msn" value="<?php echo $contact_info[0]['msn'];?>" /></td>
									<td class="table-label">Yahoo</td>
									<td class="table-input" colspan="3"><input type="text" size="40" name="contact_yahoo" id="contact_yahoo" value="<?php echo $contact_info[0]['yahoo'];?>" /></td>
								</tr>
								<tr class="selected">
									<td class="table-label">QQ</td>
									<td class="table-input" colspan="3"><input type="text" size="40" name="contact_qq" id="contact_qq" value="<?php echo $contact_info[0]['qq'];?>" /></td>
									<td class="table-label">Facebook</td>
									<td class="table-input" colspan="3"><input type="text" size="40" name="contact_facebook" id="contact_facebook" value="<?php echo $contact_info[0]['facebook'];?>" /></td>
								</tr>
								<tr class="selected">
									<td class="table-label">อื่นๆ</td>
									<td class="table-input" colspan="7"><input type="text" size="40" name="contact_social_other" id="contact_social_other" value="<?php echo $contact_info[0]['social_other'];?>" /></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			
			<div class="grid">
				<div class="row">
					<div class="span12 shadow">
						<table class="table">
							<thead>
								<tr>
									<th colspan="2">ประวัติผู้ใช้บริการ</th>
								</tr>
							</thead>
							<tbody>
								<tr class="selected">
									<td class="table-label">ระดับการศึกษา</td>
									<td class="table-input">
										<select name="history_education" id="history_education" style="width: 200px;">
											<?php echo education_dropdown($history_info[0]['education_id']);?>
										</select>
										<input type="text" size="50" placeholder="การศึกษาอื่นๆ" name="history_education_other" id="history_education_other" value="<?php echo $history_info[0]['education_other'];?>" />
									</td>
								</tr>
								<tr class="selected">	
									<td class="table-label">อาชีพ</td>
									<td class="table-input">
										<select name="history_career" id="history_career" style="width: 200px;">
											<?php echo career_dropdown($history_info[0]['career_id']);?>
										</select>
										<input type="text" size="50" placeholder="อาชีพอื่นๆ" name="history_career_other" id="history_career_other" value="<?php echo $history_info[0]['career_other'];?>" />
									</td>
								</tr>
								<tr class="selected">	
									<td class="table-label">รายได้</td>
									<td class="table-input">
										<select name="history_salary" id="history_salary" style="width: 200px;">
											<?php echo salary_dropdown($history_info[0]['salary_id']);?>
										</select>
										<input type="text" size="50" placeholder="รายได้อื่นๆ" name="history_salary_other" id="history_salary_other" value="<?php echo $history_info[0]['salary_other'];?>" />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			
			<div class="grid">
				<div class="row">
					<div class="span12 shadow">
						<table class="table">
							<thead>
								<tr>
									<th colspan="6">ประวัติส่วนตัว</th>
								</tr>
							</thead>
							<tbody>
								<tr class="selected">
									<td>2</td>
									<td class="table-label" style="width: 200px;">สีที่ชอบ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q2" id="personalize_q2" value="<?php echo $personalize_info[0]['q2'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>3</td>
									<td class="table-label">อาหารที่ชอบ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q3" id="personalize_q3" value="<?php echo $personalize_info[0]['q3'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>4</td>
									<td class="table-label">ของสะสม</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q4" id="personalize_q4" value="<?php echo $personalize_info[0]['q4'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>5</td>
									<td class="table-label">เพลง/นักร้องที่ชอบ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q5" id="personalize_q5" value="<?php echo $personalize_info[0]['q5'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>6</td>
									<td class="table-label">สถานที่ท่องเที่ยวที่ชอบ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q6" id="personalize_q6" value="<?php echo $personalize_info[0]['q6'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>7</td>
									<td class="table-label">หนังสือที่ชอบอ่าน</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q7" id="personalize_q7" value="<?php echo $personalize_info[0]['q7'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>8</td>
									<td class="table-label">งานอดิเรก</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q8" id="personalize_q8" value="<?php echo $personalize_info[0]['q8'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>9</td>
									<td class="table-label">ความสามารถพิเศษ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q9" id="personalize_q9" value="<?php echo $personalize_info[0]['q9'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>10</td>
									<td class="table-label">ฮีโร่ในดวงใจ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q10" id="personalize_q10" value="<?php echo $personalize_info[0]['q10'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>11</td>
									<td class="table-label">สิ่งที่เกลียดที่สุด</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q11" id="personalize_q11" value="<?php echo $personalize_info[0]['q11'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>12</td>
									<td class="table-label">เรื่องดีๆที่เคยทำ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q12" id="personalize_q12" value="<?php echo $personalize_info[0]['q12'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>13</td>
									<td class="table-label">เรื่องแย่ๆที่เคยทำ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q13" id="personalize_q13" value="<?php echo $personalize_info[0]['q13'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>14</td>
									<td class="table-label">วิธีจัดการกับปัญหา</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q14" id="personalize_q14" value="<?php echo $personalize_info[0]['q14'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>15</td>
									<td class="table-label">วิธีจัดการกับความเหงา</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q15" id="personalize_q15" value="<?php echo $personalize_info[0]['q15'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>16</td>
									<td class="table-label">คำแนะนำที่ดีที่สุดที่เคยได้รับ</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q16" id="personalize_q16" value="<?php echo $personalize_info[0]['q16'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>17</td>
									<td class="table-label">เพื่อนที่ "ใช่เลย" สำหรับคุณคือเพื่อน</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q17" id="personalize_q17" value="<?php echo $personalize_info[0]['q17'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>18</td>
									<td class="table-label">คนรักที่ "ใช่เลย" ในความหมายเป็นคนแบบไหน</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q18" id="personalize_q18" value="<?php echo $personalize_info[0]['q18'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>18.1</td>
									<td class="table-label">รูปร่างหน้าตา</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q18.1" id="personalize_q18.1" value="<?php echo $personalize_info[0]['q18_1'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>18.2</td>
									<td class="table-label">นิสัย</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q18.2" id="personalize_q18.2" value="<?php echo $personalize_info[0]['q18_1'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>19</td>
									<td class="table-label">วิธีบอกรัก</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q19" id="personalize_q19" value="<?php echo $personalize_info[0]['q19'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>20</td>
									<td class="table-label">นิยามรัก</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q20" id="personalize_q20" value="<?php echo $personalize_info[0]['q20'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>21</td>
									<td class="table-label">คำพูดติดปาก</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q21" id="personalize_q21" value="<?php echo $personalize_info[0]['q21'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>22</td>
									<td class="table-label">คติประจำตัว</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q22" id="personalize_q22" value="<?php echo $personalize_info[0]['q22'];?>" /></td>
								</tr>
								<tr class="selected">
									<td>23</td>
									<td class="table-label"> 	เป้าหมายสูงสุดในชีวิต</td>
									<td class="table-input"><input type="text" size="80" name="personalize_q23" id="personalize_q23" value="<?php echo $personalize_info[0]['q23'];?>" /></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- div.grid -->
			
			<div class="grid">
				<div class="row">
					<div class="span12 text-center">
						<div class="error">
							<span></span>
						</div>
						<input type="submit" value="แก้ไขข้อมูล" class="button bg-cobalt fg-white large shadow" />
						<a href="<?php echo base_url().$this->session->userdata('previous_url');?>" id="cancel" name="cancel" class="button bg-red fg-white large shadow"">ยกเลิก</a>
					</div>
				</div>
			</div>
		</form>
	</div> <!-- end div.container -->

</body>
</html>