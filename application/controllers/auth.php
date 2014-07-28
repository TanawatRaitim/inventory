<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	
	public function index()
	{
		//echo 'login page';
	}
	
	public function login()
	{
		
		if($this->auth2->logged_in())
		{
			redirect('main');
			exit();
		}	
		
		$this->data['title'] = "เข้าสู่ระบบ";
		$css = array(
					'css/signin.css'
					);
		$js = array(
					'js/jquery_validation/dist/jquery.validate.min.js'
					);
					
					
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		
		$this->load->view('auth/login', $this->data);
		
	}
	
	public function check()
	{
		if($this->auth2->check())
		{

			redirect('main', 'refresh');
			
		}else{
			
			$this->session->set_flashdata('flash_msg','ไม่สามารถเข้าระบบได้');
			$this->login();
		}
	}
	
	public function logout()
	{
		$this->auth2->logout();
	}
	

	

}
