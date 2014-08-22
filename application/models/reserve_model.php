<?php
	class Reserve_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function is_exist_rsid($id)
		{
			$where = array(
						'TK_Code'=>'RS',
						'TK_ID'=> $id
					);
			$query = $this->db->get_where('Inventory_Transaction', $where, 1);
			
			
			if($query->num_rows()<= 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function insert_main_ticket($id)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			$main['TK_ID'] = $id;
			$main['RowCreatedDate'] = date("Y/m/d h:i:s");
			$main['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
			$main['IsDraft'] = 1;
			$main['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$main['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			$main['RowStatus'] = 'active';
			$main['IsDel'] = 0;
			$this->db->insert('Inventory_Transaction', $main);
			return $this->db->insert_id();
		}

		public function insert_ticket_detail($id)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			$detail['Transact_AutoID']  = $id;
			$this->db->insert('Inventory_Transaction_Detail', $detail);
		}
		
		public function save_rs($main)
		{
			
			$auto_id = $this->find_tid($main['TK_ID']);
			$main['IsApproved'] = 0;
			$main['IsReject'] = 0;
			$main['IsDraft'] = 0;
			
			$this->db->where('Transact_AutoID', $auto_id);
			$this->db->update('Inventory_Transaction', $main);
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$auto_id));
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				$update = array();
				
				$update['QTY_ReserveGood'] = $inventory['QTY_ReserveGood'] + $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_Good'] - $update['QTY_ReserveGood']; 
				
				$update['QTY_ReserveWaste'] = $inventory['QTY_ReserveWaste'] + $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_Waste'] - $update['QTY_ReserveWaste']; 
				
				$update['QTY_ReserveDamage'] = $inventory['QTY_ReserveDamage'] + $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_Damage'] - $update['QTY_ReserveDamage']; 
				
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
		}
		
		public function delete_tran_detail($autoid, $product_id, $stock)
		{
			$where = array(
				'Transact_AutoID'=>$autoid,
				'Product_ID'=>$product_id,
				'Effect_Stock_AutoID'=>$stock
			);
			
			$this->db->where($where);
			$this->db->delete('Inventory_Transaction_Detail');
		}
		
		private function find_tid($TK_ID)
		{
			$where = array(
				'TK_Code'=>'RS',
				'TK_ID'=>$TK_ID	
			);
			$this->db->select('Transact_AutoID');
			$this->db->where($where);
			$query = $this->db->get('Inventory_Transaction', 1);
			$row = $query->row_array();
			return $row['Transact_AutoID'];
			
		}
		
	}	