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
    <title><?php echo lang('index_heading');?></title>
</head>
	<body class="metro">
	<?php $this->load->view('template/navigation');?>	
		<div class="container">
			<h1><a href="<?php echo base_url();?>auth"><i class="icon-arrow-left-3 fg-darker smaller"></i></a> <?php echo lang('edit_user_heading');?></h1>
			<p><?php echo lang('edit_user_subheading');?></p>
			
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open(uri_string());?>
			
			      <p>
			            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
			            <?php echo form_input($first_name);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
			            <?php echo form_input($last_name);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_user_company_label', 'company');?> <br />
			            <?php echo form_input($company);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
			            <?php echo form_input($phone);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_user_password_label', 'password');?> <br />
			            <?php echo form_input($password);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
			            <?php echo form_input($password_confirm);?>
			      </p>
			
				 <h3><?php echo lang('edit_user_groups_heading');?></h3>
				<?php foreach ($groups as $group):?>
				<label class="checkbox">
				<?php
					$gID=$group['id'];
					$checked = null;
					$item = null;
					foreach($currentGroups as $grp) {
						if ($gID == $grp->id) {
							$checked= ' checked="checked"';
						break;
						}
					}
				?>
				<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
				<?php echo $group['name'];?>
				</label>
				<?php endforeach?>
			
			      <?php echo form_hidden('id', $user->id);?>
			      <?php echo form_hidden($csrf); ?>
			
			      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
			
			<?php echo form_close();?>
		</div>
	</body>
</html>			
