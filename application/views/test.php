<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script>
		//alert('big');
		var myObj =  new Object();
		myObj.type = "human";
		myObj.name = "big";
		
		console.log(myObj);
		console.log(myObj.type);
		console.log(myObj.name);
		
	</script>
</head>
<body>
<?php

	$arr['body'] = '[img]https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-frc3/1466057_623100137729262_1098831179_n.jpg[/img]
[img]https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-prn1/894484_675610472458305_976745514_o.jpg[/img]

คุณพงษ์ประสิทธิ์ โชติกะพุกกณะ  ผู้จัดการฝ่ายขายและจัดจำหน่าย บริษัท  วงศ์สว่างพับลิชชิ่ง แอนด์ พริ้นติ้งจำกัด สำนักพิมพ์คุณภาพที่เป็นที่เชื่อถือยาวนานต่อเนื่องกว่า 44 ปี
ภายใต้โลโก้ The Guitar และ I.S. Song Hits เป็นตัวแทน มอบกีตาร์โปร่งจากการจับรางวัลผู้โชคดีที่มียอดซื้อครบ 800 บาท ที่บูธในงานมหกรรมหนังสือระดับชาติ 2556 

โดยคุณ สุชาติ คงทรัพย์โสภณ และ คุณ วัณชัย สุวรรณเกต ได้มารับรางวัลด้วยตัวเองที่ร้าน I.S. Book  ซอยจรัญสนิทวงศ์ 86/1 
งานนี้ใครพลาด สามารถร่วมสนุกตอบคำถามชิงกีตาร์โปร่ง แจกจริงทุกเล่มได้ใน The Guitar Express 
….“ร้องเล่นกีตาร์ ต้องเดอะกีตาร์เท่านั้น”  ';


	echo $arr['body'];
	echo '<br /><br />';
	
	
	$img = substr($arr['body'], strpos($arr['body'],'[img]'), strpos($arr['body'],'[/img]'));
	echo $img;
	echo '<br /><br />';
	
	
	$img_link = substr_replace($img,'',0,5);
	echo $img_link;	
	
	
	echo '<br /><br />';
	
	
	$find = strstr($arr['body'], '[/img]', true);
	echo $find;
	
	echo '<br /><br />';
	$strp = strpos($arr['body'], '[/img]', 0);
	echo $strp;

?>
	
</body>
</html>





