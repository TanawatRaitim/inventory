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
		
		public function get_reserve_draft($product_id="")
		{
			$query = $this->db->select('Stock_AutoID')->from('Inventory')->get()->result_array();
			
			$inventory_list = array();
			
			foreach($query as $row)
			{
				$inventory_list[$row['Stock_AutoID']] = array();
			}
			
			$sql = "select inventory.Stock_AutoID, 
					SUM(Inventory_Transaction_Detail.QTY_Good) as good,
					SUM(Inventory_Transaction_Detail.QTY_Waste) as waste, 
					SUM(Inventory_Transaction_Detail.QTY_Damage) as damage
					from Inventory
					left join Inventory_Transaction_Detail on Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory.Stock_AutoID
					left join Inventory_Transaction on Inventory_Transaction.Transact_AutoID = Inventory_Transaction_Detail.Transact_AutoID
					where Inventory_Transaction_Detail.Product_ID = '".$product_id."' and (Inventory_Transaction.IsDraft = 1 or IsApproved = 0)
					group by inventory.Stock_AutoID
					";
			$draft = $this->db->query($sql)->result_array();
			
			$reserve_draft = array();
			
			foreach ($draft as $key => $value) {
				$reserve_draft[$value['Stock_AutoID']] = array(
					'good'=>$value['good'],
					'waste'=>$value['waste'],
					'damage'=>$value['damage']
				);
			}

			foreach ($inventory_list as $key => $value) {
				if(!isset($reserve_draft[$key]))
				{
					$reserve_draft[$key] = array(
						'good'=>0,
						'waste'=>0,
						'damage'=>0
					);	
				}
			}
			
			
			ksort($reserve_draft);
			//print_r($reserve_draft);
			return $reserve_draft;
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
	
