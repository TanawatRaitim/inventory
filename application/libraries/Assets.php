<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets {
	
	private $ci;
	private $theme;
	private $asset_path;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		
		$this->theme = $this->ci->config->item('theme');
		$this->asset_path = $this->ci->config->item('base_assets');
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
		//$asset_path = $this->asset_path;
		$theme = $this->theme;
		
		if($theme == '' || $theme == 'default' || $theme == 'bs3'){
			$default = array(
						'bootstrap/dist/css/bootstrap.min.css',
						'css/style.css'	
					);	
		}elseif($theme == 'bs3_2'){
			$default = array(
						'bootstrap/dist/css/bootstrap.min.css',
						'bootstrap/dist/css/bootstrap-theme.min.css',
						'css/style.css'	
					);
		}elseif($theme == 'bootflat'){
			$default = array(
						'bootstrap/dist/css/bootstrap.min.css',
						'bootflatv2/bootflat/css/bootflat.css',
						'css/style.css'		
					);
		}else{
			$default = array(
						'bootstrap/dist/css/bootstrap.min.css',
						'bootstrap/dist/css/'.$theme.'.min.css',
						'css/style.css'
					);
		}
		
									
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
			
			if($this->is_cdn($value)){
				//if is cdn
				$css .= "<link href='".$value."' rel='stylesheet'>\n";
			}else{
				//local file
				$css .= "<link href='".$this->asset_path.$value."' rel='stylesheet'>\n";
			}
			
			
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
		//$asset_path = $this->asset_path;
		
		//define default script
		$default = array(
						'js/jquery/jquery.js',
						'bootstrap/dist/js/bootstrap.min.js',
						'js/app/global.js'		
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
			
			if($this->is_cdn($script)){
				$scripts .= "<script src='".$script."'></script>\n";
			}else{
				$scripts .= "<script src='".$this->asset_path.$script."'></script>\n";
			}
			
			
		}

		//return script	
		return $scripts;
	}

	public function get_source_datatable()
	{
		//for get all source for datatable
	}

	
	/**
	 * Check CDN or Local file
	 * @param
	 * - string
	 * 
	 * @return
	 * - Boolean
	 */
	private function is_cdn($link)
	{
		//check 
		$cdn = trim(substr($link, 0, 5));
		
		if($cdn == '//cdn'){
			return TRUE;
		}
			
		return FALSE;	
		
	}
	
}

/* End of file Assets.php */