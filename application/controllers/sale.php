<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {
	
	private $data;
	
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
	
	public function all()
	{
		$content['title'] = 'ข้อมูลการตัดขายทั้งหมด';
		// $content['input_type'] = 'RS';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC)',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ)',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM)',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD)',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE)',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ข้อมูลใบสั่งขายทั้งหมด',
										'link'=>'sale_all',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('sale/all',$content, TRUE);
		
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

	public function sale_all()
	{
		$content['title'] = 'ข้อมูลใบสั่งขายทั้งหมด';
		// $content['input_type'] = 'RS';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC)',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ)',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM)',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD)',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE)',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ข้อมูลใบสั่งขายทั้งหมด',
										'link'=>'sale_all',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('sale/sale_all',$content, TRUE);
		
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
	
	
	public function sa()
	{
		//$this->output->enable_profiler(TRUE);		
		$content['title'] = 'ลูกค้าเงินเชื่อสินค้าออกประจำ (SA)';
		$content['input_type'] = 'SA';
		// $content['product_list'] = $this->get_product();	
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)',
										'link'=>'sa',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC)',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ)',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM)',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD)',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE)',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ข้อมูลใบสั่งขายทั้งหมด',
										'link'=>'sale_all',
										'class'=>''
									)
								);
		$data['content'] = $this->load->view('sale/all2',$content, TRUE);
		
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
			'js/app/input/sa_add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function add()
	{
		//$this->output->enable_profiler(TRUE);		
		$content['title'] = 'ลูกค้าเงินเชื่อสินค้าออกประจำ (SA)';
		$content['input_type'] = 'SA';
		// $content['product_list'] = $this->get_product();	
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)',
										'link'=>'sa',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC)',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ)',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM)',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD)',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE)',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ข้อมูลใบสั่งขายทั้งหมด',
										'link'=>'sale_all',
										'class'=>''
									)
								);
		$data['content'] = $this->load->view('sale/add',$content, TRUE);
		
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
			'js/app/input/sa_add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function approve()
	{
		$content['title'] = 'View Detail';
		// $content['input_type'] = 'SA';
		$data['content'] = $this->load->view('sale/approve',$content, TRUE);
		
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
			'js/app/reserve/reserve_approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	

}