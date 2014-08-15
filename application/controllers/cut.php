<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cut extends CI_Controller {
	
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
		$content['title'] = 'ข้อมูลการตัดจ่ายทั้งหมด';

		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'ตัดจ่าย - อภินันท์ (FR)',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'ตัดจ่าย-ดัดแปลง/รวมเล่มใหม่ (TT)',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดจ่าย-ตัดเคลียร์สต็อค (ZZ)',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ตัดจ่าย -ชัวคราวเพื่อซ่อมแซม (MO)',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'ตัดจ่าย-สินค้าตัวอย่าง (XS)',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ข้อมูลใบตัดจ่ายทั้งหมด',
										'link'=>'cut_all',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('cut/all',$content, TRUE);
		
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
	
	
	
	public function cut_all()
	{
		$content['title'] = 'ข้อมูลใบตัดจ่ายทั้งหมด';

		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ตัดจ่าย - อภินันท์ (FR)',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'ตัดจ่าย-ดัดแปลง/รวมเล่มใหม่ (TT)',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดจ่าย-ตัดเคลียร์สต็อค (ZZ)',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ตัดจ่าย -ชัวคราวเพื่อซ่อมแซม (MO)',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'ตัดจ่าย-สินค้าตัวอย่าง (XS)',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ข้อมูลใบตัดจ่ายทั้งหมด',
										'link'=>'cut_all',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('cut/cut_all',$content, TRUE);
		
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
	
	
	public function fr()
	{
		//$this->output->enable_profiler(TRUE);		
		$content['title'] = 'ตัดจ่าย - อภินันท์ (FR)';
		$content['input_type'] = 'FR';
		// $content['product_list'] = $this->get_product();	
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ตัดจ่าย - อภินันท์ (FR)',
										'link'=>'fr',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ตัดจ่าย-ดัดแปลง/รวมเล่มใหม่ (TT)',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดจ่าย-ตัดเคลียร์สต็อค (ZZ)',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ตัดจ่าย -ชัวคราวเพื่อซ่อมแซม (MO)',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'ตัดจ่าย-สินค้าตัวอย่าง (XS)',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ข้อมูลใบตัดจ่ายทั้งหมด',
										'link'=>'cut_all',
										'class'=>''
									)
								);
		$data['content'] = $this->load->view('cut/all2',$content, TRUE);
		
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
		$content['title'] = 'ตัดจ่าย - อภินันท์ (FR)';
		$content['input_type'] = 'FR';
		// $content['product_list'] = $this->get_product();	
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ตัดจ่าย - อภินันท์ (FR)',
										'link'=>'fr',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ตัดจ่าย-ดัดแปลง/รวมเล่มใหม่ (TT)',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดจ่าย-ตัดเคลียร์สต็อค (ZZ)',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ตัดจ่าย -ชัวคราวเพื่อซ่อมแซม (MO)',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'ตัดจ่าย-สินค้าตัวอย่าง (XS)',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ข้อมูลใบตัดจ่ายทั้งหมด',
										'link'=>'cut_all',
										'class'=>''
									)
								);
		$data['content'] = $this->load->view('cut/add',$content, TRUE);
		
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
		$data['content'] = $this->load->view('cut/approve',$content, TRUE);
		
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