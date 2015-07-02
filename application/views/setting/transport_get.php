<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<?php foreach ($breadcrumb as $attr): ?>
					<?php if($attr['class'] == 'active'):?>
						<li class="<?php echo $attr['class'];?>"><?php echo $attr['name'];?></li>
					<?php else:?>	
						<li class="<?php echo $attr['class'];?>"><a href="<?php echo $attr['link'];?>"><?php echo $attr['name'];?></a></li>
					<?php endif;?>	
				<?php endforeach ?>
			</ol>
		</div>
	</div> <!-- end .row -->
	<div class="row">
		
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="page-header" style="margin-top: 0px;">
					<?php echo $form_header;?>
				</div>
				
				<form role="form" name="<?php echo $form_name;?>" enctype="multipart/form-data" id="<?php echo $form_name;?>" method="post" action="<?php echo site_url($form_action);?>">
					<div class="form-group">
					    <label for="Trans_Name"><?php echo $name_label;?></label>
					    <?php if(isset($data['Trans_ID'])):?>
					    <input type="text" value="<?php echo $data['Trans_Name'];?>" class="form-control" id="Trans_Name" name="Trans_Name" placeholder="<?php echo $name_placeholder;?>" autofocus>	
					    <input type="hidden" name="Trans_ID" id="Trans_ID" value="<?php echo $data['Trans_ID'];?>" />
					    <?php else:?>
					    <input type="text" class="form-control" id="Trans_Name" name="Trans_Name" placeholder="<?php echo $name_placeholder;?>" autofocus>	
					    <?php endif;?>		
					    	
					    
					  </div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" id="submit" value="<?php echo $submit_text;?>" />
						<input type="reset" class="btn btn-danger" id="reset" name="reset" value="ล้างฟอร์ม" />
					</div>
						
				</form>
				<div id="error_msg"></div>
			</div>
			<div class="col-md-6">
				<div class="page-header" style="margin-top: 0px;">
					<h1><?php echo $data_header;?></h1>
				</div>
				<table id="example" class="table table-bordered table-condensed table-striped table-hover hover">
		        <thead>
		        	<tr>
		                <th>ชื่อ</th>
		                <th>Action</th>
		            </tr>
		        	
		        </thead>
		     
		        <tfoot>
		            <tr>
		                <th id="filter">ชื่อ</th>
		                <th></th>
		            </tr>
		        </tfoot>
 
    		</table>
			</div>
							 
		</div> <!-- end col-md-12 -->
	</div><!-- end .row -->
</div>
<script>
	
</script>
<!-- end .container-fluid -->
