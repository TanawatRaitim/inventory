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
		
		public function get_rs_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_no_appv_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 0);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_yes_appv_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 1);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_reject_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('IsReject', 1);
			$this->db->where('IsApproved', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function count_transaction_detail()
		{
			$sql = "select Inventory_Transaction_Detail.Transact_AutoID, COUNT(Inventory_Transaction_Detail.Transact_AutoID)as count_a
				from Inventory_Transaction_Detail
				group by Transact_AutoID	
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function get_inventory_transaction($rsid)
		{
			$this->db->select('*, Inventory_Transaction.RowCreatedDate as created_date');
			$this->db->from('Inventory_Transaction');
			$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID');
			$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson');
			$this->db->where(array('TK_Code'=>'RS','TK_ID'=>$rsid));
			
			return $this->db->get()->row_array();
		}

		public function get_transaction_detail($id)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
			$this->db->where(array('Transact_AutoID'=>$id));
			
			return $this->db->get()->result_array();
		}
		
		public function get_each_detail($id, $product_id, $stock)
		{
			$where = array(
					'Transact_AutoID'=>$id,
					'Product_ID'=>$product_id,
					'Effect_Stock_AutoID'=>$stock
				);
				
			return $this->db->get_where('Inventory_Transaction_Detail', $where)->row_array();
		}

		public function delete_each_detail($id, $product_id, $stock)
		{
			$where = array(
					'Transact_AutoID'=>$id,
					'Product_ID'=>$product_id,
					'Effect_Stock_AutoID'=>$stock
				);
				
			$this->db->where($where);
			$this->db->delete('Inventory_Transaction_Detail');	
					
		}
		
		public function update_detail($update=array(), $where=array())
		{
			$this->db->where($where);
			$this->db->update('Inventory_Transaction_Detail', $update);	
		}
		
		public function set_status_wait($transaction_id)
		{
			$update = array(
				'IsApproved'=>0,
				'IsReject'=>0,
				'RowUpdatedDate'=> date("Y/m/d h:i:s"),
				'RowUpdatedPerson'=> $this->session->userdata('Emp_ID')
			);
			
			$this->db->where('Transact_AutoID', $transaction_id);
			$this->db->update('Inventory_Transaction', $update);
		}

		public function set_reject_approve($reject=array())
		{
			if($reject['is_rejected'] == 0)
			{
				//approve
				$approved = 1;
				$data = array(
					'IsReject'=>$reject['is_rejected'],
					'IsApproved'=>$approved,
					'ApprovedBy'=>$this->session->userdata('Emp_ID'),
					'ApprovedDate'=>date("Y/m/d h:i:s")
				);
			}else{
				$approved = 0;
				$data = array(
					'IsReject'=>$reject['is_rejected'],
					'IsApproved'=>$approved,
					'Reject_Remark'=>$reject['Reject_Remark'],
					'RejectBy'=>$this->session->userdata('Emp_ID'),
					'RejectDate'=>date("Y/m/d h:i:s")
				);
			}
			
			
			$where = array(
				'TK_Code'=>'RS',
				'TK_ID'=>$reject['rsid']
			);
			
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $data);	
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