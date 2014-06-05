<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets {
	
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		//$this->ci->load->model('member_model');
	}
	
    public function index()
    {

	}
	
		/**
	 *default project css
	 * 
	 * @param array
	 * @return html tag css
	 * 
	 */
	public function get_css($data=array())
	{
		$asset_path = $this->ci->config->item('base_assets');
		
		//define default css
		$default = array(
						'bootstrap/dist/css/bootstrap.min.css',
						'bootstrap/dist/css/bootstrap-theme.min.css',		
						// 'bootflatv2/bootflat/css/bootflat.css'		
					);
											
		//check $data
		if(!empty($data)){
			//mearge array with default css	
			foreach ($data as $value) {
				$default[] = $value;
			}
		}

		//looping css with html tag
		$css = "";		
		foreach ($default as $value) {
			$css .= "<link href='".$asset_path.$value."' rel='stylesheet'>\n";
		}

		//return script	
		return $css;
	}
	
	/**
	 *default project script
	 * 
	 * @param array
	 * @return html tag script
	 * 
	 */
	public function get_js($data=array())
	{
		$asset_path = $this->ci->config->item('base_assets');
		
		//define default script
		$default = array(
						'js/jquery/jquery.js',
						'bootstrap/dist/js/bootstrap.min.js'		
					);
											
		//check $data
		if(!empty($data)){
			//mearge array with default script	
			foreach ($data as $value) {
				$default[] = $value;
			}
		}

		//looping script with html tag
		$scripts = '';		
		foreach ($default as $script) {
			$scripts .= "<script src='".$asset_path.$script."'></script>\n";
		}

		//return script	
		return $scripts;
	}
	
	
		
}

/* End of file Assets.php */