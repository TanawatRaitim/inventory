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
        <li class="active"><a href="<?php echo site_url('reserve/all')?>">จองสินค้า</a></li>
        <li class="active"><a href="<?php echo site_url('sale/all')?>">ตัดขาย</a></li>
        <li class="active"><a href="<?php echo site_url('cut/all')?>">ตัดจ่าย</a></li>
        <li class="active"><a href="<?php echo site_url('in/all')?>">นำสินค้าเข้า</a></li>
        <li class="active"><a href="<?php echo site_url('return_p/all')?>">รับคืนสินค้า</a></li>
        <li class="active"><a href="<?php echo site_url('move/all')?>">โอนย้ายสินค้า</a></li>
        <li class="active"><a href="<?php echo site_url('adjust/all')?>">ปรับยอดสินค้า</a></li>
        <li class="active"><a href="<?php echo site_url('search/main')?>">ค้นหาข้อมูล</a></li>
        <li class="active"><a href="<?php echo site_url('report')?>">รายงาน</a></li>
        <li class="active"><a href="<?php echo site_url('manage/main')?>">จัดการข้อมูล</a></li>
        <li class="active"><a href="<?php echo site_url('admin')?>">Administrator</a></li>
        <!-- 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">สินค้าเข้า <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('input/in')?>">สินค้าใหม่ (IN)</a></li>
            <li><a href="<?php echo site_url('input/ir')?>">สินค้าดัดแปลง (IR)</a></li>
            <li><a href="<?php echo site_url('input/sr')?>">สินค้าคืน (SR)</a></li>
            <li><a href="<?php echo site_url('input/ra')?>">วัตถุดิบสำเร็จรูป (RA)</a></li>
            </ul>
        </li>
        
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
            <li><a href="#" id="clear_unused_ticket">ล้างข้อมูลที่ค้างในระบบ</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('auth/logout')?>">ออกจากโปรแกรม</a></li>
          </ul>
        </li>
      </ul>
    
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>