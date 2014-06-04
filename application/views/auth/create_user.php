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
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('css'); ?>" rel="stylesheet">
    <script>
		$(function() {
			//something
		}); //end ready
	</script>
	<style>
		/*some style*/
	</style>
    <title><?php echo lang('create_user_heading');?></title>
</head>
	<body class="metro">
		<?php $this->load->view('template/navigation');?>	
		<div class="container">
			<h1><a href="<?php echo base_url();?>auth"><i class="icon-arrow-left-3 fg-darker smaller"></i></a> <?php echo lang('create_user_heading');?></h1>
			<p><?php echo lang('create_user_subheading');?></p>
			
			<div id="infoMessage"><?php echo $message;?></div>
			
			<form action="<?php echo base_url();?>auth/create_user" method="post" accept-charset="utf-8">
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" value="" id="first_name"  />

				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" value="" id="last_name"  />
				<label for="company">Company Name:</label>

				<input type="text" name="company" value="" id="company"  />

				<label for="email">Email:</label>

				<input type="text" name="email" value="" id="email"  />

				<label for="phone">Phone:</label>

				<input type="text" name="phone" value="" id="phone"  />

				<label for="password">Password:</label>

				<input type="password" name="password" value="" id="password"  />

				<label for="password_confirm">Confirm Password:</label>

				<input type="password" name="password_confirm" value="" id="password_confirm"  />
				<br />
				<br />
				<input type="submit" name="submit" value="Create User"  />

			</form>
			
			<!-- <?php echo form_open("auth/create_user");?>
			
			      <p>
			            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
			            <?php echo form_input($first_name);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
			            <?php echo form_input($last_name);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_company_label', 'company');?> <br />
			            <?php echo form_input($company);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_email_label', 'email');?> <br />
			            <?php echo form_input($email);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_phone_label', 'phone');?> <br />
			            <?php echo form_input($phone);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_password_label', 'password');?> <br />
			            <?php echo form_input($password);?>
			      </p>
			
			      <p>
			            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
			            <?php echo form_input($password_confirm);?>
			      </p>
			
			
			      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
			
			<?php echo form_close();?> -->
		</div>
	</body>
</html>	