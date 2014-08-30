<?php
	class Product_model extends CI_Model{
		
		//private $search_row;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get($id)
		{
			return $this->db->get_where('Products', array("Product_ID"=>$id), 1);
		}
		
		public function get_all()
		{
			$this->db->order_by('Product_AutoID', 'desc');
			$query = $this->db->get('Products');	
			
			return $query->result_array();
		}
		
		public function get_all_product_premium($product_id)
		{
			return $this->db->get_where('Product_Premium', array("Product_ID"=>$product_id));	
		}


			
	}	
	
/* End of file product_model.php */	