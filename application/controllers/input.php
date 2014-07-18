<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {
	
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
	
	public function in()
	{
		$css = array('bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
		$js = array(
			'js/moment/min/moment.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/app/input/main.js'
			);
			
			
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = 'สินค้าใหม่  (IN)';
		$this->data['input_type'] = 'IN';
		$this->data['content'] = $this->load->view('input/main',$this->data,TRUE);
		
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$this->data);
	}
	
	
	

}