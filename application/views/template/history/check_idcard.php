<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation_additional'); ?>"></script>
    <title><?php echo $title; ?></title>
    <script>
			$.validator.addMethod(
			  "pid13",
			  function(value, element) {
			    if(value.length != 13) return false;
				for(i=0, sum=0; i < 12; i++)
				sum += parseFloat(value.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(value.charAt(12)))
				return false; return true;
				},
			  "Please enter a valid personal ID."
			);
    		
		$(function(){
			$("#form_idcard").validate({
					errorPlacement: function(error, element){
					error.appendTo($("span#idcard_error"));
				},
				//errorClass: "error-state",
				rules: {
					idcard:{
						required: true,
						pid13: true
					}
				},messages:{
					idcard:{
						required: 'กรุณากรอกข้อมูลให้ครบถ้วน',
						pid13: 'รหัสไม่ถูกต้อง     <br />ถ้ายืนยันจะใช้รหัสนี้ <button class="button bg-lightBlue fg-white" id="valid_pass">กด</button>'
					}
				}
			});
			

			$("body").on('click','#valid_pass',function(e){
				$("#idcard").rules('remove', 'pid13');
				// $("#form_idcard").submit();
			});
		});
		
	</script>
	<style>
		.text-underline{
			text-decoration: underline;
		}
		input.error{

			outline: 1px red solid;
		}
		
		span#idcard_error{
			color: red;
		}
	</style>
</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>	
	<div class="container" style="margin-top: 70px;"><!-- div.container -->
		<h2><i class="icon-user fg-magenta"></i> Check ID Card </h2>
		
		<?php if(!isset($_POST['idcard'])||$_POST['idcard']==''):?>
		<div class="grid">
			<div class="row">
				<div class="span12">
					<form method="post" name="form_idcard" id="form_idcard" action="<?php echo base_url()?>history/addnew">
						<label for="">เลขบัตรประชาชน
						<div class="input-control text size5">
							<input type="text" placeholder="เลขบัตรประชาชน" name="idcard" id="idcard" required autofocus/>
						</div>
						<input type="submit" value="ตรวจสอบ" />
						</label>
						<span id="idcard_error"></span>
						
					</form>
				</div>
			</div>
		</div><!-- div.grid -->
		<?php endif;?>
			
	</div> <!-- end div.container -->
</body>
</html>