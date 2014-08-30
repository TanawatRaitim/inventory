<?php
	class Customer_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get($id)
		{
			return $this->db->get_where('Customers', array('Cust_ID'=>$id))->row_array();	
		}
		
	}	