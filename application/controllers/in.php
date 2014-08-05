<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In extends CI_Controller {
	
	// private $data;
	
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
	}
	
	public function index()
	{
		// $this->output->enable_profiler(TRUE);
		//initial content	
		$content['title'] = 'ข้อมูล การจอง';
		$content['create_text'] = "เพิ่มข้อมูล";
		$content['create_link'] = site_url('reserve/add');
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'การจอง',
										'link'=>'',
										'class'=>'active'
									)
								);
		
		$data['content'] = $this->load->view('reserve/main',$content ,TRUE);	
		
			
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/reserve.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function all()
	{
		$content['title'] = 'ระบบการนำสินค้าเข้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการนำสินค้าเข้า',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบนำสินค้าเข้า',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบนำสินค้าเข้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบนำสินค้าเข้า [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('in/all',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ใบนำสินค้าเข้า  [รออนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการนำสินค้าเข้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบนำสินค้าเข้า',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบนำสินค้าเข้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบนำสินค้าเข้า [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('in/no_appv',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ใบนำสินค้าเข้า [ผ่านการอนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการนำสินค้าเข้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบนำสินค้าเข้า',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบนำสินค้าเข้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบนำสินค้าเข้า [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('in/yes_appv',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการนำสินค้าเข้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบนำสินค้าเข้า',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบนำสินค้าเข้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบนำสินค้าเข้า [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('in/reject',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		
		//$this->output->enable_profiler(TRUE);		
		$content['title'] = 'เปิดใบนำสินค้าเข้า';
		$content['input_type'] = 'RS';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการนำสินค้าเข้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบนำสินค้าเข้า',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ใบนำสินค้าเข้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบนำสินค้าเข้า [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);
								
		$data['content'] = $this->load->view('in/add',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/reserve_add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	
}