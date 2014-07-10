<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends CI_Controller {
	
	private $data;
	
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
	}
	
	public function index()
	{
		$css = array();
		$js = array();
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = 'ข้อมูลการจองสินค้า';
		// $this->data['input_type'] = 'RS';
		$this->data['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'ข้อมูลการจองสินค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
		
							
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('reserve/main',$this->data,TRUE);
		
		$this->load->view('template/main',$this->data);
	}
	
	public function add()
	{
		$css = array('bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
		$js = array(
			'js/moment/min/moment.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
			);
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = 'จองสินค้า  (RS)';
		$this->data['input_type'] = 'RS';
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('input/rs',$this->data,TRUE);
		
		$this->load->view('template/main',$this->data);
	}
	
}