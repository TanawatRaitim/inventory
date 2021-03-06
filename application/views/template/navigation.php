<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('main')?>"><?php echo $this->config->item('system_name');?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('reserve/no_appv')?>">จอง</a></li>
        <li class="active"><a href="<?php echo site_url('sale/all')?>">ตัดขาย</a></li>
        <li class="active"><a href="<?php echo site_url('cut/all')?>">ตัดจ่าย</a></li>
        <li class="active"><a href="<?php echo site_url('in/no_appv')?>">นำเข้า</a></li>
        <li class="active"><a href="<?php echo site_url('return_p/no_appv')?>">รับคืน</a></li>
        <li class="active"><a href="<?php echo site_url('move/no_appv')?>">โอนย้าย</a></li>
        <li class="active"><a href="<?php echo site_url('adjust/no_appv')?>">ปรับยอด</a></li>
        <!-- <li class="active"><a href="<?php echo site_url('search/main')?>">ค้นหา</a></li> -->
        <li class="active"><a href="http://172.168.1.109/IMS_Reporting58/index.aspx?empID=<?php echo trim($this->session->userdata('Emp_ID'));?>&empGroup=<?php echo $this->session->userdata('UserGroup');?>" target="_blank">รายงาน</a></li>
        <li class="dropdown active">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการข้อมูล  <b class="caret"></b></a>
        	<ul class="dropdown-menu">
	            <li><a href="<?php echo site_url('search/product')?>">ค้นหาข้อมูลสินค้า</a></li>
	            <li><a href="<?php echo site_url('product/add')?>">เพิ่มข้อมูลสินค้า</a></li>
	            <li><a href="<?php echo site_url('search/customer')?>">ค้นหาข้อมูลลูกค้า</a></li>
	            <li><a href="<?php echo site_url('customer/add')?>">เพิ่มข้อมูลลูกค้า</a></li>
	            <li><a href="<?php echo site_url('product/category_get')?>">เพิ่มข้อมูลหมวดหมู่สินค้า</a></li>
	            <li><a href="<?php echo site_url('product/group_get')?>">เพิ่มข้อมูลกลุ่มสินค้า</a></li>
	            <li><a href="<?php echo site_url('product/type_get')?>">เพิ่มข้อมูลประเภทสินค้า</a></li>
	            <li><a href="<?php echo site_url('product/frequency_get')?>">เพิ่มข้อมูลประเภทการออกสินค้า</a></li>
	            <li><a href="<?php echo site_url('return_p/return_standard_get')?>">จัดการข้อมูลการรับคืนสินค้า</a></li>
	            <li><a href="<?php echo site_url('setting/transport_get')?>">จัดการข้อมูลผู้ขนส่ง</a></li>
	          </ul>
        </li>
        <!-- <li class="active"><a href="<?php echo site_url('admin')?>">Administrator</a></li> -->

		<?php if ($this->session->userdata('UserGroup') == '1'): ?>
			<li class="dropdown active">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo site_url('manage/rollback')?>">Rollback</a></li>
	          </ul>
	        </li>	
		<?php endif ?>
        
       <!--
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">สินค้าตัดขาย <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('input/sa')?>">ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)</a></li>
            <li><a href="<?php echo site_url('input/ss')?>">ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)</a></li>
            <li><a href="<?php echo site_url('input/sc')?>">ลูกค้าเงินสดหนังสือออกประจำ (SC)</a></li>
            <li><a href="<?php echo site_url('input/sz')?>">ขายเลหลัง (SZ)</a></li>
            <li><a href="<?php echo site_url('input/sm')?>">ขายลูกค้าสมาชิก (SM)</a></li>
            <li><a href="<?php echo site_url('input/sd')?>">ขายลูกค้าไปรษณีย์ (SD)</a></li>
            <li><a href="<?php echo site_url('input/se')?>">กิจกรรมพิเศษ (SE)</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">สินค้าตัดจ่าย <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('input/fr')?>">อภินันท์ (FR)</a></li>
            <li><a href="<?php echo site_url('input/tt')?>">ดัดแปลง/รวมเล่มใหม่ (TT)</a></li>
            <li><a href="<?php echo site_url('input/zz')?>">ตัดเคลียร์สต๊อก (ZZ)</a></li>
            <li><a href="<?php echo site_url('input/mo')?>">เบิกชั่วคราวเพื่อดัดแปลง (MO)</a></li>
            <li><a href="<?php echo site_url('input/xs')?>">เบิกสินค้าตัวอย่าง (XS)</a></li>
            <li><a href="<?php echo site_url('input/pd')?>">เบิกวัสดุประกอบ (PD)</a></li>
            
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">ค้นหา <b class="caret"></b></a>
          <ul class="dropdown-menu">
          	
            <li><a href="<?php echo site_url('product/')?>">ข้อมูลสินค้า</a></li>
            <li><a href="<?php echo site_url('customer/')?>">ข้อมูลลูกค้า</a></li>
            <li><a href="<?php echo site_url('reserve/')?>">ข้อมูลการจองสินค้า</a></li>
            <li><a href="<?php echo site_url('ticket/')?>">Ticket</a></li>
            
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน <b class="caret"></b></a>
          <ul class="dropdown-menu">
          	
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">อื่นๆ <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('')?>">โอนย้ายคลัง ()</a></li>
            <li><a href="<?php echo site_url('')?>">คลังพักสินค้า ()</a></li>
            <li><a href="<?php echo site_url('')?>">ปรับยอด ()</a></li>
            
            <li><a href="<?php echo site_url('product/add')?>">บันทึกข้อมูลสินค้า</a></li>
            <li><a href="<?php echo site_url('customer/add')?>">บันทึกข้อมูลลูกค้า</a></li>
            <li><a href="<?php echo site_url('reserve/add')?>">จองสินค้า (RS)</a></li>
            
          </ul>
        </li>
         -->
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
    
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('Inven_User');?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            
            <!-- <li><a href="<?php echo site_url('manage/clear_unused_ticket')?>">ล้างข้อมูลที่ค้างในระบบ</a></li> -->
            <!-- <li><a href="#" id="clear_unused_ticket">ล้างข้อมูลที่ค้างในระบบ</a></li> -->
            <li><a href="<?php echo site_url('transaction/draft_list')?>" id="draft_list">แบบร่างที่บันทึกไว้</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('auth/logout')?>">ออกจากโปรแกรม</a></li>
          </ul>
        </li>
      </ul>
    
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>