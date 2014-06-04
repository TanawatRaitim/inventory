<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $data;
	 
	public function __construct()
	{
		parent::__construct();
		
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		//$this->config->load('scripts');
		
	}
	
	public function index()
	{
		
		$this->data['title'] = 'หน้าหลัก';
		$this->load->view('template/main',$this->data);
	}
	
	public function test_template()
	{
		$this->data['title'] = 'ทดสอบ Template';
		$this->load->view('template/main',$this->data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */