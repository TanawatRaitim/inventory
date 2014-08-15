<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends CI_Controller {
	
	// private $data;
	
	
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
	
	public function main()
	{
		if($this->input->post('submit')){
			echo 'submited!!!';
		}
		
		$local = $this->load->database('local', TRUE);
		
		$query = $local->get('tb_line');
		
		foreach($query->result_array() as $value)
		{
			echo $value['lin_id'];
		}
		
		
		$this->load->view('transfer');
	}
	
}