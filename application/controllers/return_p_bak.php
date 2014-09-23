<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_p extends CI_Controller {
	
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
		
	}

	public function all()
	{
		$content['title'] = 'ระบบการรับสินค้าคืน';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการรับสินค้าคืน',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'รับสินค้าคืน  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'รับสินค้าคืน [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'รับสินค้าคืน  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('return/all',$content, TRUE);
		
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
		$content['title'] = 'รับสินค้าคืน  [รออนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการรับสินค้าคืน',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'รับสินค้าคืน  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'รับสินค้าคืน [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'รับสินค้าคืน  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);


		$data['content'] = $this->load->view('return/no_appv',$content, TRUE);
		
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
		$content['title'] = 'รับสินค้าคืน [ผ่านการอนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการรับสินค้าคืน',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'รับสินค้าคืน  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'รับสินค้าคืน [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'รับสินค้าคืน  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);


		$data['content'] = $this->load->view('return/yes_appv',$content, TRUE);
		
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
										'name'=>'ระบบการรับสินค้าคืน',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'รับสินค้าคืน  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'รับสินค้าคืน [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบนำสินค้าเข้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>'active'
									)
								);


		$data['content'] = $this->load->view('return/reject',$content, TRUE);
		
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
		$content['title'] = 'เปิดใบรับสินค้าคืน';
		$content['input_type'] = 'RS';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการรับสินค้าคืน',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>'รับสินค้าคืน  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'รับสินค้าคืน [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'รับสินค้าคืน  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

								
		$data['content'] = $this->load->view('return/add',$content, TRUE);
		
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