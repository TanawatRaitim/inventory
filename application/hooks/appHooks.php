<?php

class AppHooks{
	
	private $ci;
	
	public function __construct()
	{
		//echo 'construct';
		//parent::__construct();
		$this->ci =& get_instance();
	}
	
	public function enable_profiler()
	{
		$this->ci->output->enable_profiler(TRUE);		
	}
	
}



