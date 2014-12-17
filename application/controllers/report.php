<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('in_model');
	}

	public function age_inventory()
	{
		$content['title'] = 'รายงานอายุสินค้าคงคลัง';
		$content['product_type_dropdown'] = product_type_dropdown();	
		$content['product_group_dropdown'] = product_group_dropdown();	
		$content['product_category_dropdown'] = product_category_dropdown();
		$content['age_return_dropdown'] = age_return_dropdown();

		$data['content'] = $this->load->view('report/age_inventory',$content, TRUE);
		
		//initail template	
		
		$js = array(
				'js/app/in/all.js'
		);
				
		$data['css'] = $this->assets->get_css();
		$data['js'] = $this->assets->get_js($js);
		//$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	
	
}