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
        <!-- <li class="active"><a href="#">Link</a></li> -->
        <!-- <li><a href="<?php echo site_url('plan')?>">วางแผน</a></li> -->
        <!-- <li><a href="#">Link</a></li> -->
        
        <!-- 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการระบบ <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('main/papers')?>">ประเภทกระดาษ</a></li>
            <li><a href="<?php echo site_url('main/jobs')?>">งาน / เครื่องจักร</a></li>
            <li><a href="<?php echo site_url('main/technician')?>">ผู้รับผิดชอบ</a></li>
            <li><a href="<?php echo site_url('main/duration')?>">ช่วงเวลา</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
         -->
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">สินค้าเข้า <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('input/in')?>">สินค้าใหม่ (IN)</a></li>
            <li><a href="<?php echo site_url('input/ir')?>">สินค้าดัดแปลง (IR)</a></li>
            <li><a href="<?php echo site_url('input/sr')?>">สินค้าคืน (SR)</a></li>
            <li><a href="<?php echo site_url('input/ra')?>">วัตถุดิบสำเร็จรูป (RA)</a></li>
            <!-- 
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
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
            <!-- 
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
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
            
            <!-- 
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
          </ul>
        </li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">ค้นหา <b class="caret"></b></a>
          <ul class="dropdown-menu">
          	
            <li><a href="<?php echo site_url('input/main/')?>">ข้อมูลสินค้า</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">ข้อมูลลูกค้า</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">ข้อมูลการจองสินค้า</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">Ticket</a></li>
            <!--
            <li><a href="<?php echo site_url('input/main/')?>">ดัดแปลง/รวมเล่มใหม่ (TT)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">ตัดเคลียร์สต๊อก (ZZ)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกชั่วคราวเพื่อดัดแปลง (MO)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกสินค้าตัวอย่าง (XS)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกวัสดุประกอบ (PD)</a></li>
            
             
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
          </ul>
        </li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน <b class="caret"></b></a>
          <ul class="dropdown-menu">
          	<!--
            <li><a href="<?php echo site_url('input/main/')?>">อภินันท์ (FR)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">ดัดแปลง/รวมเล่มใหม่ (TT)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">ตัดเคลียร์สต๊อก (ZZ)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกชั่วคราวเพื่อดัดแปลง (MO)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกสินค้าตัวอย่าง (XS)</a></li>
            <li><a href="<?php echo site_url('input/main/')?>">เบิกวัสดุประกอบ (PD)</a></li>
            
             
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
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
            <li><a href="<?php echo site_url('input/rs')?>">จองสินค้า (RS)</a></li>
            <!-- 
            <li><a href="<?php echo site_url('input/main/IR')?>">สินค้าดัดแปลง (IR)</a></li>
            <li><a href="<?php echo site_url('input/main/SR')?>">สินค้าคืน (SR)</a></li>
            <li><a href="<?php echo site_url('input/main/RA')?>">วัตถุดิบสำเร็จรูป (RA)</a></li>
             -->
            <!-- 
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
             -->
          </ul>
        </li>
        
        
      </ul>
      
      <!-- search form -->
      <!--
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->
      <!-- end search form -->
      
      <ul class="nav navbar-nav navbar-right">
    
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('identity');?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            
            <li><a href="#">แบบร่างที่บันทึกไว้</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('auth/logout')?>">ออกจากโปรแกรม</a></li>
          </ul>
        </li>
      </ul>
      
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>