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
	
	public function get_view($id)
	{
		$this->db->select('*');
		$this->db->from('Customers');
		$this->db->join('Customer_Line','Customer_Line.CusLine_ID = Customers.CustLine_ID', 'left');
		$this->db->where('Cust_AutoID', $id);
		
		return $this->db->get();
	}
	
	public function get_customer_transaction($id)
	{
		$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
		$this->db->from('Inventory_Transaction');
		$this->db->join('Inventory_Transaction_Detail','Inventory_Transaction_Detail.Transact_AutoID = Inventory_Transaction.Transact_AutoID','left');
		$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
		$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.TK_Code','left');
		$this->db->where('Inventory_Transaction.TK_Code !=','RS');
		$this->db->where('Inventory_Transaction.Cust_ID =',$id);
		$this->db->where('Inventory_Transaction.IsApproved',1);	
		//$this->db->where('Inventory_Transaction_Detail.Product_ID',$id);	
		
		$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
}	