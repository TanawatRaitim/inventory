<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$this->load->library('assets');
		$css = array(
					'css/style.css'
					);
		$js = array(
					//'bootflatv2/bootflat/js/icheck.min.js'
					);
					
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = "วางแผน";
		$this->data['job_dropdown'] = job_dropdown();
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('plan/main',$this->data,TRUE);
		$this->load->view('template/main',$this->data);
	
	}

}