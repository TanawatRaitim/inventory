<?php
	class Inventory_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_all_product_stock($product_id)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Detail');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Detail.Stock_AutoID');
			$this->db->where('Inventory_Detail.Product_ID', $product_id);
			$this->db->where('Inventory.Inventory_TypeID !=', 2);
			
			return $this->db->get();	
		}
		
		public function get_all_stock($product_id)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Detail');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Detail.Stock_AutoID');
			$this->db->where('Inventory_Detail.Product_ID', $product_id);
			// $this->db->where('Inventory.Inventory_TypeID !=', 2);
			
			return $this->db->get();	
		}
		
		public function get_product_stock($product_id, $stock_id)
		{
			$where = array(
				'Product_ID'=>$product_id,
				'Stock_AutoID'=>$stock_id
			);
			
			return $this->db->get_where('Inventory_Detail', $where)->row_array();	
		}
		
		public function update_stock_qty($product_id, $stock_id, $update = array())
		{
			$where = array(
				'Product_ID'=>$product_id,
				'Stock_AutoID'=>$stock_id
			);
			
			$this->db->where($where);
			$this->db->update('Inventory_Detail', $update);
		}
		
		public function update_qty($stock_id, $update=array())
		{
			$this->db->where('RecNo', $stock_id);
			$this->db->update('Inventory_Detail', $update);	
		}
			
	}	
	
