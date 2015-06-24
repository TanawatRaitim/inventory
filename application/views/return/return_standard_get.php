<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<!-- <h2><?php echo $title; ?></h2> -->
			<ol class="breadcrumb">
				<?php foreach ($breadcrumb as $attr): ?>
					<?php if($attr['class'] == 'active'):?>
						<li class="<?php echo $attr['class'];?>"><?php echo $attr['name'];?></li>
					<?php else:?>	
						<li class="<?php echo $attr['class'];?>"><a href="<?php echo $attr['link'];?>"><?php echo $attr['name'];?></a></li>
					<?php endif;?>	
				<?php endforeach ?>
			</ol>
		</div> <!-- end col-md-12 -->
	</div> <!-- end .row -->
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div role="tabpanel">
	
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				  	
				  	<?php if($product_type->num_rows()!=0):?>
				  		
				  		<?php foreach($product_type->result_array() as $key=>$value):?>
				  			
				  			<?php if($value['ProType_ID']==1):?>
				  				<li role="presentation" class="active"><a href="#type_<?php echo $value['ProType_ID'];?>" aria-controls="type_<?php echo $value['ProType_ID'];?>" role="tab" data-toggle="tab"><?php echo $value['ProType_Name'];?></a></li>
				  			<?php else:?>
				  				<li role="presentation"><a href="#type_<?php echo $value['ProType_ID'];?>" aria-controls="type_<?php echo $value['ProType_ID'];?>" role="tab" data-toggle="tab"><?php echo $value['ProType_Name'];?></a></li>
				  			<?php endif;?>		
						<?php endforeach;?>	
				  		
				  		
				  	<?php endif;?>	
				
				  </ul>
				
				  <!-- Tab panes -->
				  <div class="tab-content">
				  	
				  	<?php if($product_type->num_rows()!=0):?>
				  		
				  		<?php foreach($product_type->result_array() as $key=>$value):?>
				  			
				  			<?php if($value['ProType_ID']==1):?>
				  				<div role="tabpanel" class="tab-pane active" id="type_<?php echo $value['ProType_ID'];?>">
				  			<?php else:?>
				  				<div role="tabpanel" class="tab-pane" id="type_<?php echo $value['ProType_ID'];?>">
				  			<?php endif;?>
				  			<div class="page-header">
				  				<h2>ประเภท "<?php echo $value['ProType_Name'];?>"</h2>
				  			</div>
				  			<table id="return_standard" class="table table-hover table-condensed table-striped table-bordered">
				  				<thead>
				  					<tr>
				  						<th>ประเภทการออกสินค้า</th>
				  						<th>ระยะเวลาการวางจำหน่าย</th>
				  					</tr>
				  				</thead>
				  			
								<?php foreach($data->result_array() as $key2=>$value2):?>
									
									<?php if($value2['ProType_ID'] == $value['ProType_ID']):?>
										<tr>
											<td><?php echo $value2['ProFreq_Name'];?></td>
											<!-- <td><a href="#" data-name="Return_Period" data-type="select" data-pk="<?php echo $value2['ProType_ID'];?>" data-url="<?php echo base_url('return_p/test_inline');?>" data-title="test title"><?php echo $value2['Period_Name'];?></a></td> -->
											<td><a href="#" data-value="<?php echo $value2['Period_Val'];?>" data-pk="<?php echo $value2['ProType_ID'];?>-<?php echo $value2['ProFreq_ID'];?>"><?php echo $value2['Period_Name'];?></a></td>
										</tr>
	
									<?php endif;?>	
								
								<?php endforeach;?>	
								
							</table>	
							</div> <!-- end div.tabpanel -->
						<?php endforeach;?>
				  	<?php endif;?>	
					</div>
				</div> <!-- end tab-panel -->
			</div> <!-- end col-md-6 -->					 
		</div> <!-- end col-md-12 -->
	</div><!-- end .row -->
</div><!-- end .container-fluid -->


