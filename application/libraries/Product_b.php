<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_b{
	
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('product_model');
	}
	
    public function index()
    {
		//
	}
	
	public function get_all()
	{
		//get all product
	}
	
	public function get()
	{
		
	}
	
	public function find_product($product_id)
	{
		//find product by specific id
	}
	
	public function get_all_json()
	{
		$query = $this->ci->product_model->get_all();
		
		$json = array(
			'data'=>$query
		);
		return json_encode($json);
	}
	
	
		
}

/* End of file Product.php */