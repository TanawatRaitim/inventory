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
    <title><?php echo lang('edit_group_heading');?></title>
</head>
	<body class="metro">
	<?php $this->load->view('template/navigation');?>	
		<div class="container">
			<h1><a href="<?php echo base_url();?>auth"><i class="icon-arrow-left-3 fg-darker smaller"></i></a> <?php echo lang('edit_group_heading');?></h1>
			<p><?php echo lang('edit_group_subheading');?></p>
			
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open(current_url());?>
			
			      <p>
			            <?php echo lang('create_group_name_label', 'group_name');?> <br />
			            <?php echo form_input($group_name);?>
			      </p>
			
			      <p>
			            <?php echo lang('edit_group_desc_label', 'description');?> <br />
			            <?php echo form_input($group_description);?>
			      </p>
			
			      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>
			
			<?php echo form_close();?>
		</div>
	</body>
</html>	