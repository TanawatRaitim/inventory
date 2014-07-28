<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $css;?>
	<?php echo $js;?>
    <script>
		$(function() {
			$("#form_login").validate({
				errorPlacement: function(error, element){
				$('#error_message').text('กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ครบถ้วน');
				},
    			rules:{
					identity:{
						required: true
					},
					password:{
						required: true
					}
				},//end rules
				messages:{
					identity:{
						required: "กรุณากรอก Username"
					},
					password:{
						required: "กรุณากรอก Password"
					}
				}//end messages	
    		});//end validate
		}); //end ready
	</script>
	<style>
		.box-login{
			width: 500px;
			padding: 30px 50px;
			margin:100px auto;
		}
		label.error,#infoMessage, #error_message{
			color: red;
			text-align: center;
			padding-top: 10px;	
		}
		.form-signin-heading{
			text-align: center;
		}

	</style>
    <title><?php echo $title; ?></title>
    
</head>
<body>
	<div class="container">

      <?php echo form_open("auth/check",array('id'=>'form_login','name'=>'form_login','class'=>'form-signin','role'=>'form'));?>
        <h3 class="form-signin-heading"><?php echo $this->config->item('system_name');?></h3>
        <h5 class="form-signin-heading">กรุณาลงชื่อเข้าสู่ระบบ</h5>
        <input type="text" class="form-control" name="identity" id="identity" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submit">Sign in</button>
        
        <div id="error_message"></div>
		<div id="infoMessage">
			<?php
			
				if(isset($global_msg))
				{
					echo $global_msg;
				}
				echo $this->session->flashdata('flash_msg');
			?>
		</div>
		
      <?php echo form_close();?>
      

    </div> <!-- /container -->

</body>
</html>