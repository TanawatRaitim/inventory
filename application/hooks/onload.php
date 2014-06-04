<?php

class Onload{
	
	private $ci;
	
	public function __construct()
	{
		//echo 'construct';
		$this->ci =& get_instance();
	}
	
	public function check_login()
	{
		/*
		 * check class, method
		 */
		$controller = $this->ci->router->class;
		$method = $this->ci->router->method;
		
		if($method != 'logout')
		{
			redirect('auth/login','refresh');
			exit();
		}else{
			//nothing
		}
		
		// if($this->ci->session->userdata['username'])
		// {
// 			
// 			
// 			
			// echo "login as ";
			// exit();
		// }else{
			// echo 'not login';
			// exit();
		// }
		
		
		/*
		if($method != 'login')
		{
			redirect('auth/login','refresh');
			exit();
		}
		 * 
		 */
		
		//echo 'check';
		//exit();
		
		
		
		
	}
	
}



