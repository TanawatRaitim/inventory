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
    <title><?php echo lang('change_password_heading');?></title>
</head>
	<body class="metro">
	<?php $this->load->view('template/navigation');?>	
		<div class="container">
			<h1><?php echo lang('change_password_heading');?></h1>
			
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open("auth/change_password");?>
			
			      <p>
			            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
			            <?php echo form_input($old_password);?>
			      </p>
			
			      <p>
			            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
			            <?php echo form_input($new_password);?>
			      </p>
			
			      <p>
			            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
			            <?php echo form_input($new_password_confirm);?>
			      </p>
			
			      <?php echo form_input($user_id);?>
			      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>
			
			<?php echo form_close();?>
		</div>
	</body>
</html>		