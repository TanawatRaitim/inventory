<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='http://localhost/production_plan/assets/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
	<link href='http://localhost/production_plan/assets/bootflatv2/bootflat/css/bootflat.css' rel='stylesheet'>
	<link href='http://localhost/production_plan/assets/css/style.css' rel='stylesheet'>
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
	<script src='http://localhost/production_plan/assets/bootstrap/dist/js/bootstrap.min.js'></script>
	<style type='text/css'>
	body
	{
		font-family: Arial;
		font-size: 14px;
	}
	a {
	    color: blue;
	    text-decoration: none;
	    font-size: 14px;
	}
	a:hover
	{
		text-decoration: underline;
	}
	
	.flexigrid div.form-div input[type="text"], .flexigrid div.form-div input[type="password"] {
	    background: none repeat scroll 0 0 #FAFAFA;
	    border: 1px solid #AAAAAA;
	    font-size: 15px;
	    height: auto;
	    padding: 5px;
	    width: 500px;
	}
	a.chzn-single{
		height: 50px;
		padding: 5px;
	}
	</style>
	<title><?php echo $this->config->item('system_name');?></title>
</head>
<body>
    	<?php $this->load->view('template/navigation');?>	
	<div style='height:20px;'></div>  
    <div class="container">
		<?php echo $output; ?>
    </div>
</body>
</html>
