	<!-- <nav class="navigation-bar fixed-top shadow bg-cobalt"> -->
	<nav class="navigation-bar fixed-top shadow bg-darkTeal">
		<div class="navigation-bar-content">
			<a href="<?php echo base_url();?>" class="element"><span class="icon-heart"></span> ทะเบียนสมาชิกศาลาบริการ <sup>2.0</sup></a>
			<span class="element-divider"></span>
			<a class="pull-menu" href="#"></a>
			<ul class="element-menu">
				<?php if($this->session->userdata('is_admin')):?>
				<!-- admin menu	 -->
				<li>
					<a class="dropdown-toggle"  href="#">Admin</a>
					<ul class="dropdown-menu dark" data-role="dropdown">
						<li>
							<a href='<?php echo site_url('main/history')?>'>History</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/members')?>'>Members</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/contacts')?>'>Contacts</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/personalize')?>'>Personalize</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href='<?php echo site_url('main/issues')?>'>Issues</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/books')?>'>Books</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href='<?php echo site_url('main/provinces')?>'>Provinces</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/countries')?>'>Countries</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/geography')?>'>Geography</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/careers')?>'>Careers</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/salary')?>'>Salary</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/education')?>'>Education</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/sexual')?>'>Sexual</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/questions')?>'>Questions</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href='<?php echo site_url('auth')?>'>Users</a>
						</li>
					</ul>
				</li>
				<!-- end admin menu -->
				<?php endif;?>
				<li><a href="<?php echo base_url().'history/check_idcard';?>">เพิ่มข้อมูล</a></li>
			</ul>

			<div class="no-tablet-portrait">
				<span class="element-divider"></span>
				<!--
				<a class="element brand" href="#"><span class="icon-spin"></span></a>
				<a class="element brand" href="#"><span class="icon-printer"></span></a>
				<span class="element-divider"></span>
				-->
				<div class="element input-element">
					<form name="nav_search" id="nav_search" method="post" action="<?php echo base_url();?>main/search">
						<div class="input-control text size4">
						<?php if (isset($keyword)): ?>
							<input type="text" placeholder="search..." name="keyword" id="keyword" value="<?php echo urldecode($keyword);?>" />	
						<?php else:?>	
							<input type="text" placeholder="search..." name="keyword" id="keyword" />
						<?php endif; ?>
							
						    <button name="btn_search_nav" id="btn_search_nav" class="btn-search"></button>
						</div>
					</form>
				</div>

				<div class="element place-right">
					<a class="dropdown-toggle" href="#"> <span class="icon-cog"></span> </a>
					<ul class="dropdown-menu place-right dark" data-role="dropdown">
						<li>
							<a href="<?php echo base_url().'auth/change_password';?>">เปลี่ยนรหัสผ่าน</a>
						</li>
						<li>
							<a href="<?php echo base_url().'auth/logout';?>">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
				<span class="element-divider place-right"></span>
				<button class="element image-button image-left place-right">
					<?php echo $this->session->userdata('username');?>
					<!-- <img src="images/me.jpg"/> -->
				</button>
			</div>
		</div>
	</nav>
<!-- end nav -->

