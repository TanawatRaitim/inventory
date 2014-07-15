<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product {
	
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
	
	public function get_products()
	{
		//get all product
	}
	
	public function find_product($product_id)
	{
		//find product by specific id
	}
	
	public function set_idcard($idcard)
	{
		$this->id_card = $idcard;
		
		//get member
		$member = $this->ci->member_model->get_member($this->id_card);
		
		$this->member_info = $member->result_array();
		
		foreach($member->result_array() as $info)
		{
			$this->member_id = $info['id'];
			$this->member_code = $info['member_code'];
		}

		//get history
		$last_history = $this->ci->member_model->get_last_history($this->member_id);		
		$this->last_history_info = $last_history->result_array();
		foreach ($last_history->result_array() as $info) {
			$this->last_history_id = $info['id'];
			$this->last_contact_id = $info['contact_id'];
			$this->last_personalize_id = $info['personalize_id'];
		}
			
		//get personalize
		$last_personalize = $this->ci->member_model->get_last_personalize($this->last_personalize_id);
		$this->last_personalize_info = $last_personalize->result_array();
				
		//get contact
		$last_contact = $this->ci->member_model->get_last_contact($this->last_contact_id);
		$this->last_contact_info = $last_contact->result_array();
		
	}
		
}

/* End of file Product.php */