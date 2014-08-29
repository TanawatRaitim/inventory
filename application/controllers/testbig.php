<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?
	header('content-type: text/html; charset=utf-8');
	
	$realname = $HIIP_POST_FILES['userfile']['name'];
	
	if (is_uploaded_file($HTTP_POST_FILES['usefile']['tmp_name'])){
		
		move_uploaded_file($HTTP_POST_FILES ['userfile']['tmp_name']."./upload/".$realname);
		echo "Upload Filename:".$HTTP_POST_FILES['userfile']['name']."<br>";
		echo "File size:".($HTTP_POST_FILES['usefile']['size']/1024)."KB"; echo "<br>";
		echo "File type:".$HTTP_POST_FILES['userfile']['type'];echo"<br/>";
		echo "<br>".$HTTP_POST_FILES['userfile']['tmp_name'];
	}
	else{
		echo "Upload not complete<br>";
		switch ($_FILES['userfile']['error']){
			case 1: echo "File exceeded upload_max_filesize";break;
			case 2: echo "File exceeded max_file_size";break;
			case 3: echo "File only partially uploaded";break;
			case 4: echo "No file uploaded";break;
		}
	}


?>
</body>
</html>