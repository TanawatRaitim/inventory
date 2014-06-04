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
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('highlight_js'); ?>"></script>
    <title><?php echo $title; ?></title>
    <script>
		$(function(){
			
			//highlight plugin
			var keyword = $("#keyword").val();
			
			if(keyword!="")
			{
				//console.log('have value to search');
				$("#history_data").highlight(keyword);
			}
			
			
			//clear filter
			$("#btn_clear").click(function(){
				// alert('clear filter');
				window.location = "<?php echo base_url();?>";
				//
			});
			
			//validate export
			//#book_export, #issue_export, #volume_export, #btn_export
			$("#btn_export").click(function(e){
				
				var book = $("#book_export").val();
				var issue = $("#issue_export").val();
				var volume = $("#volume_export").val();
				
				if(book == 0 || issue == 0 || volume == "")
				{
					return false;
				}
				
			});
			
			
<?php 
	if($this->session->flashdata('message') && $this->session->flashdata('message')!="")
	{
		echo "alertify.log('".$this->session->flashdata('message')."');";
		$this->session->set_flashdata('message','');
		
?>		
		/*
		$.Dialog({
						shadow: true,
						overlay: true,
						// flat: true,
						icon: '<span class="icon-info"></span>',
						title: 'ข้อความจากระบบ',
						width: 500,
						padding: 10,
						content: "<?php //echo $this->session->flashdata('message');?>"
						});
						
		*/				
<?php		
	}//end if
?>
		}); //end ready
		
	</script>
	<style>
		.text-underline{
			text-decoration: underline;
		}
		
	</style>
</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>	
	<div class="container" style="margin-top: 70px;"><!-- div.container -->
		<h2>ประวัติการสมัครลงคอลัมน์</h2>
		
		<!--
		<div class="grid">	
			<div class="row">
				<div class="span12">
					<a href="<?php echo site_url('history/check_idcard')?>" class="button bg-cobalt fg-white large shadow">เพิ่มข้อมูล</a>
				</div>
			</div>	
		</div>
		-->
		
		
			<?php echo $pagination;?>
			<?php echo $rows_text;?>
			
			<table class="table hovered" id="history_data">
				<thead>
					<tr>
						<form name="search" id="search" method="post" action="<?php echo base_url();?>main/search">
							<td colspan="5" class="bg-steel">
								<div class="input-control text size4">
								    <input type="text" placeholder="ค้นหาข้อมูล" name="keyword" id="keyword" value="<?php echo urldecode($keyword);?>" autofocus />
								    <button name="btn_search" id="btn_search" class="btn-search"></button>
								    <button class="btn-clear" name="btn_clear" id="btn_clear" style="margin-right: 20px;"></button>
								</div>
							</td>
						</form>
						<form name="export" id="export" method="post" action="<?php echo base_url();?>history/export">	
							<td colspan="8" class="bg-mauve">
								<div class="input-control select size2">
									<select name="book_export" id="book_export">
										<?php echo books_dropdown();?>
									</select>
								</div>
								<div class="input-control select size2">
									<select id="issue_export" name="issue_export">
										<?php echo issues_dropdown();?>
									</select>
								</div>
								<div class="input-control text size1">
									<input type="text" name="volume_export" id="volume_export" placeholder="เล่มที่" />
								</div>
								<input type="submit" id="btn_export" name="btn_export" class="button bg-darkGreen fg-white" value="ดึงข้อมูล" />
							</td>
						</form>
					</tr>
					<tr>
						<th></th>
						<th>ID</th>
						<th>ID Card</th>
						<th>ชื่อ-นามสกุล</th>
						<th>เพศ</th>
						<th>รสนิยม</th>
						<th>อายุ</th>
						<th>จังหวัด</th>
						<!-- <th>หนังสือ</th> -->
						<th>คอลัมน์</th>
						<th>เล่มที่</th>
						<th>วันที่บันทึก</th>
						<th>Actions</th>
					</tr>
					
				</thead>
				
				
				
				<tbody>
					
				<?php if($histories->num_rows()>0):?>	
				<?php foreach ($histories->result_array() as $history): ?>
					<tr style="text-align:justify; ">
						<td>
							<?php if ($history['image']): ?>
							<img class="rounded shadow" width="40px" src="<?php echo $this->config->item('base_history_thumbs').$history['image'];?>">
						<?php else: ?>
							<img class="rounded shadow" width="40px" src="<?php echo $this->config->item('base_assets_images');?>no_img.png">
						<?php endif ?>
						</td>
						<td><?php echo $history['member_code'];?></td>
						<td><?php echo $history['idcard'];?></td>
						<td><?php echo $history['member_name'];?>
							<?php if($history['attachment']!=""):?>
								&nbsp;&nbsp;
								<a href="<?php echo $this->config->item('base_history_attachment').$history['attachment'];?>" target="_blank"><i class="icon-attachment fg-lightRed"></i></a>
							<?php endif;?>	
						</td>
						<td class="text-center"><?php echo $history['sexual_descr'];?></td>
						<td class="text-center"><img class="rounded" src="<?php echo $this->config->item('base_assets_images');?><?php echo $history['sexual_img'];?>" alt="<?php echo $history['sexual'];?>" /></td>						
						<td class="text-center"><?php echo get_age($history['dob']);?></td>
						<td class="text-center"><?php echo $history['province'];?></td>
						<!-- <td class="text-center" style="width: 100px;"><?php echo $history['book'];?></td> -->
						<td class="text-center"><?php echo $history['issue'];?></td>
						<td class="text-center"><?php echo $history['volume'];?></td>
						<td class="text-center" style="width: 100px;"><?php echo mysql2thaidate($history['history_date']);?></td>
						<td>
							<div class="button-dropdown">
								<button class="dropdown-toggle bg-darkCobalt fg-white">Actions</button>
								<ul class="dropdown-menu" data-role="dropdown">
									<li><a href="<?php echo base_url();?>history/memberhistory/<?php echo $history['history_id'];?>">ดูประวัติ</a></li>
									<li><a href="<?php echo base_url();?>history/edit/<?php echo $history['history_id'];?>">แก้ไข</a></li>
									<li><a href="<?php echo base_url();?>history/addtemp/<?php echo $history['history_id'];?>">เพิ่ม</a></li>
									<?php if($this->session->userdata('is_admin')):?>
									<li><a href="<?php echo base_url();?>history/delete/<?php echo $history['history_id'];?>">ลบ</a></li>	
									<?php endif;?>	
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach ?>	
				
				<?php else:?>	
					
					<tr style="text-align: justify">
						<td colspan="13" class="text-center"><h2>ไม่พบข้อมูล</h2></td>
					</tr>	
					
				<?php endif;?>			
				</tbody>
				<tfoot>
					<tr>
						<td colspan="13">
							<?php echo $pagination;?>
							<?php echo $rows_text;?>
						</td>
					</tr>
				</tfoot>
			</table>
						
			
	</div> <!-- end div.container -->
</body>
</html>