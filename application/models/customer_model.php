<?php
class Customer_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function datatable()
	{
		$this->db->select('*');
		$this->db->from('Customers');
		$this->db->join('Customer_Line','Customer_Line.CusLine_ID = Customers.CustLine_ID', 'left');
		
		return $this->db->get();
	}
	
	public function get($id)
	{
		return $this->db->get_where('Customers', array('Cust_ID'=>$id))->row_array();	
	}
	
	public function get_view()
	{
		$this->db->select('*');
		$this->db->from('Customers');
		$this->db->join('Customer_Line','Customer_Line.CusLine_ID = Customers.CustLine_ID', 'left');
		
		return $this->db->get();
	}
	
}	