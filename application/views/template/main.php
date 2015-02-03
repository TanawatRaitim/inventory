<?php
	if(isset($excel))
	{
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$excel_name");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $css;?>
    <title><?php echo $title; ?></title>
</head>
<body>
	<!-- Navigation -->
	<?php 
		if(isset($navigation)){
			echo $navigation;
		}
	?>
	<!-- Content -->
	<?php echo $content;?>
	<?php echo $js;?>
</body>
</html>