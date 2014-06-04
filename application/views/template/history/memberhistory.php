<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_base'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_default'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('css'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation_additional'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_js'); ?>"></script>

    <title><?php echo $title; ?></title>
	<style>
		input.error{
			border: red 2px solid;
		}
	</style>

</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>
	
	<div class="container" style="margin-top: 70px;"><!-- div.container -->
		<h2><i class="icon-user fg-magenta"></i>ประวัติการสมัครลงคอลัมน์ </h2>
		<div class="grid">
			<div class="row">
				<div class="span12">
					<div class="grid">
				<div class="row">
					<div class="span2">
						<?php if ($history_info[0]['image']): ?>
							<img class="rounded shadow" src="<?php echo $this->config->item('base_history_thumbs').$history_info[0]['image'];?>">
						<?php else: ?>
							<img class="rounded shadow" src="<?php echo $this->config->item('base_assets_images');?>no_img.png">
						<?php endif ?>
					</div>
					<div class="span10 shadow">
						<table class="table">
							<tr class="selected">
								<th colspan="6">รายละเอียด <?php echo $is_3months;?></th>
							</tr>
							<tr>
								<td class="text-right">ชื่อ : </td>
								<td>
									<?php echo $member_info[0]['title'].$member_info[0]['fname']." ".$member_info[0]['lname'];?> (<?php echo $member_info[0]['nickname'];?>)
									&nbsp;&nbsp;
									<?php if($history_info[0]['attachment']!=""):?>
										&nbsp;&nbsp;
										<a href="<?php echo $this->config->item('base_history_attachment').$history_info[0]['attachment'];?>" target="_blank"><i class="icon-attachment fg-lightRed"></i></a>
									<?php endif;?>
									
								</td>
								<td class="text-right">บัตรประชาชน : </td>
								<td><?php echo $member_info[0]['idcard'];?></td>
								<td class="text-right">รหัสสมาชิก : </td>
								<td><?php echo $member_info[0]['member_code'];?></td>
							</tr>
							<tr>
								<td class="text-right">DOB</td>
								<td><?php echo mysql2thaidate($member_info[0]['dob']);?></td>
								<td class="text-right">อายุ</td>
								<td><?php echo get_age($member_info[0]['dob']);?></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="text-right">ที่อยู่</td>
								<td colspan="5">
									<?php echo $member_info[0]['address'];?> 
									<?php echo get_prefix($member_info[0]['sub_district'],$member_info[0]['province_id'],1);?> 
									<?php echo get_prefix($member_info[0]['district'],$member_info[0]['province_id'],2);?> 
									<?php echo get_province($member_info[0]['province_id']);?> 
									<?php echo $member_info[0]['postcode'];?>
								</td>
							</tr>
						</table>	
					</div>
				</div>
			</div><!-- div.grid -->
					<?php echo $total_history;?>
					<br />
					<table class="table hovered" id="history_data">
						<thead>
							<tr>
								<th>รูป</th>
								<th>หนังสือ</th>
								<th>คอลัมน์</th>
								<th>เล่มที่</th>
								<th>ข้อความ</th>
								<th>วันที่เพิ่ม</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
		<?php foreach ($member_history as $history): ?>
					<tr>
						<td>
						<?php if ($history['image']): ?>
							<img class="rounded shadow" width="50px" src="<?php echo $this->config->item('base_history_thumbs').$history['image'];?>">
						<?php else: ?>
							<img class="rounded shadow" width="50px" src="<?php echo $this->config->item('base_assets_images');?>no_img.png">
						<?php endif ?>
						
						
						</td>
						<td class="text-center">
							<?php echo $history['book'];?>
							<?php if($history['attachment']!=""):?>
								&nbsp;&nbsp;
								<a href="<?php echo $this->config->item('base_history_attachment').$history['attachment'];?>" target="_blank"><i class="icon-attachment fg-lightRed"></i></a>
							<?php endif;?>
						</td>
						<td class="text-center">
							<?php echo $history['issue'];?>
							
						</td>
						<td class="text-center"><?php echo $history['volume'];?></td>
						<td><?php echo $history['info'];?></td>
						<td class="text-center"><?php echo mysql2thaidate($history['history_date']);?></td>
						<td>
							<div class="button-dropdown">
								<button class="dropdown-toggle bg-darkCobalt fg-white">Actions</button>
								<ul class="dropdown-menu" data-role="dropdown">
									<!-- <li><a href="<?php echo base_url();?>history/memberhistory/<?php echo $history['history_id'];?>">ดู</a></li> -->
									<li><a href="<?php echo base_url();?>history/edit/<?php echo $history['history_id'];?>">แก้ไข</a></li>
									<li><a href="<?php echo base_url();?>history/addtemp/<?php echo $history['history_id'];?>">เพิ่ม</a></li>
								</ul>
							</div>
						</td>
					</tr>
		<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- end div.container -->

</body>
</html>