<?php

header("Content-type: application/vnd.ms-word");

header("Content-Disposition: attachment; filename=sala_export.doc");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
</head>
<body>
	<?php foreach ($result->result_array() as $rows): ?>
	
	<?php if($rows['image']):?>
	<img width="200px" style="width: 200px;" src="<?php echo $this->config->item('base_history_image').$rows['image']?>">	
	<?php else:?>
	<img width="200px" style="width: 200px;" src="<?php echo $this->config->item('base_assets_images').'no_img.png'?>">
	<?php endif;?>		
	
	<br />
	<strong>รหัสสมาชิก</strong> <?php echo $rows['member_code'];?>
	<br />
	<?php if($rows['alias'] == ""):?>
		<?php echo $rows['fname'];?> <?php echo $rows['lname'];?>
		<br />
		<?php echo $rows['nickname'];?>
		<br />  
	<?php else:?>
		<?php echo $rows['alias'];?> 
		<br />
	<?php endif;?>
	
	<?php echo $rows['contact_address'];?>
	<?php echo get_prefix($rows['contact_subdistrict'],$rows['contact_province'],1);?> 
	<?php echo get_prefix($rows['contact_district'],$rows['contact_province'],2);?> 
	<?php echo get_province($rows['contact_province']);?> 
	<?php echo $rows['contact_postcode'];?>
	<br />
	
	<?php if($rows['info'] != ""):?>
	<?php echo $rows['info'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['contact_phone'] != ""):?>
	<strong>เบอร์โทรศัพท์ (บ้าน) </strong> <?php echo $rows['contact_phone'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['contact_mobile'] != ""):?>
	<strong>เบอร์โทรศัพท์ (มือถือ) </strong> <?php echo $rows['contact_mobile'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['contact_email'] != ""):?>
	<strong>E-Mail </strong> <?php echo $rows['contact_email'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['msn'] != ""):?>
	<strong>MSN </strong> <?php echo $rows['msn'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['yahoo'] != ""):?>
	<strong>Yahoo </strong> <?php echo $rows['yahoo'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['qq'] != ""):?>
	<strong>QQ </strong> <?php echo $rows['qq'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['facebook'] != ""):?>
	<strong>Facebook </strong> <?php echo $rows['facebook'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['social_other'] != ""):?>
	<strong>อื่นๆ </strong> <?php echo $rows['social_other'];?>
	<br />
	<?php endif;?>
	
	
	
	<?php if($rows['q2'] != ""):?>
	<strong><?php echo $question['q2'];?></strong> <?php echo $rows['q2'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['q3'] != ""):?>
	<strong><?php echo $question['q3'];?></strong> <?php echo $rows['q3'];?>
	<br />
	<?php endif;?>	
	
	<?php if($rows['q4'] != ""):?>
	<strong><?php echo $question['q4'];?></strong> <?php echo $rows['q4'];?>
	<br />
	<?php endif;?>	
	
	<?php if($rows['q5'] != ""):?>
	<strong><?php echo $question['q5'];?></strong> <?php echo $rows['q5'];?>
	<br />	
	<?php endif;?>
	
	<?php if($rows['q6'] != ""):?>
	<strong><?php echo $question['q6'];?></strong> <?php echo $rows['q6'];?>
	<br />	
	<?php endif;?>
	
	<?php if($rows['q7'] != ""):?>
	<strong><?php echo $question['q7'];?></strong> <?php echo $rows['q7'];?>
	<br />	
	<?php endif;?>
	
	<?php if($rows['q8'] != ""):?>
	<strong><?php echo $question['q8'];?></strong> <?php echo $rows['q8'];?>
	<br />	
	<?php endif;?>
	
	<?php if($rows['q9'] != ""):?>
	<strong><?php echo $question['q9'];?></strong> <?php echo $rows['q9'];?>
	<br />	
	<?php endif;?>
	
	<?php if($this->input->post('issue_export')==3):?>
		<!-- แนะนำเพื่อนใหม่ -->
	
		<?php if($rows['q10'] != ""):?>	
		<strong><?php echo $question['q10'];?></strong> <?php echo $rows['q10'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q11'] != ""):?>	
		<strong><?php echo $question['q11'];?></strong> <?php echo $rows['q11'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q12'] != ""):?>	
		<strong><?php echo $question['q12'];?></strong> <?php echo $rows['q12'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q13'] != ""):?>	
		<strong><?php echo $question['q13'];?></strong> <?php echo $rows['q13'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q14'] != ""):?>	
		<strong><?php echo $question['q14'];?></strong> <?php echo $rows['q14'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q15'] != ""):?>	
		<strong><?php echo $question['q15'];?></strong> <?php echo $rows['q15'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q16'] != ""):?>	
		<strong><?php echo $question['q16'];?></strong> <?php echo $rows['q16'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q17'] != ""):?>	
		<strong><?php echo $question['q17'];?></strong> <?php echo $rows['q17'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q18'] != ""):?>	
		<strong><?php echo $question['q18'];?></strong> <?php echo $rows['q18'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q18_1'] != ""):?>	
		<strong><?php echo $question['q18_1'];?></strong> <?php echo $rows['q18_1'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q18_2'] != ""):?>	
		<strong><?php echo $question['q18_2'];?></strong> <?php echo $rows['q18_2'];?>
		<br />	
		<?php endif;?>
		
		<?php if($rows['q19'] != ""):?>	
		<strong><?php echo $question['q19'];?></strong> <?php echo $rows['q19'];?>
		<br />	
		<?php endif;?>
	
	<?php endif;?> <!-- end แนะนำเพื่อนใหม่ -->	
	
	<?php if($rows['q20'] != ""):?>
	<strong><?php echo $question['q20'];?></strong> <?php echo $rows['q20'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['q21'] != ""):?>
	<strong><?php echo $question['q21'];?></strong> <?php echo $rows['q21'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['q22'] != ""):?>
	<strong><?php echo $question['q22'];?></strong> <?php echo $rows['q22'];?>
	<br />
	<?php endif;?>
	
	<?php if($rows['q23'] != ""):?>
	<strong><?php echo $question['q23'];?></strong> <?php echo $rows['q23'];?>
	<br />
	<?php endif;?>
	
	<br />
	<br />
	<br />
	
	
	
<?php endforeach ?>
</body>
</html>