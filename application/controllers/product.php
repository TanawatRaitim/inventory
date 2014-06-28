<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
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
	
	
	public function add()
	{
		$this->data['css'] = $this->assets->get_css();
		$this->data['js'] = $this->assets->get_js();
		$this->data['title'] = "เพิ่มข้อมูลสินค้า";
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('product/add',$this->data,TRUE);
		$this->load->view('template/main',$this->data);
	}

	
	

}