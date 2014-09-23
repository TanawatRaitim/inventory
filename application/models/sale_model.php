<?php
	class Sale_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_sale_all($type='sale')
		{	
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 1);
			$this->db->where('IsUsed',null);	
			
			if($type == 'sale')
			{
				$this->db->where('Ticket_Type.TK_Category', 'sale');
					
			}else{
				$this->db->where('Ticket_Type.TK_Code', $type);
			}
			
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function get_used()
		{	
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as sale_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.TK_Code','left');
			$this->db->join('Customers','Customers.Cust_ID = Inventory_Transaction.Cust_ID','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 1);
			$this->db->where('IsUsed',1);	
			$this->db->where('Ticket_Type.TK_Category', 'sale');
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function set_is_used($data)
		{
			//select transaction
			$transaction = $this->db->get_where('Inventory_Transaction', array('Transact_AutoID'=>$data['Transact_AutoID']))->row_array();
			$transaction_id = $data['Transact_AutoID'];
			
			//update transaction is used
			$this->db->where('Transact_AutoID', $transaction_id);
			$this->db->update('Inventory_Transaction', array('IsUsed'=>1));
			//get rs code ref
			$rs_ref = $transaction['TK_Code'].$transaction['TK_ID'];
			unset($transaction['Transact_AutoID']);
			
			$transaction['TK_Code'] = $data['new_code'];
			$transaction['TK_ID'] = $data['TK_ID'];
			$transaction['Transaction_For'] = NULL;
			$transaction['DocRef_AutoID'] = NULL;
			$transaction['DocRef_No'] = $rs_ref;
			$transaction['DocRef_Other'] = NULL;
			$transaction['RowCreatedDate'] = date("Y/m/d h:i:s");
			$transaction['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
			$transaction['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$transaction['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			$transaction['IsUsed'] = 1;
			$transaction['DocSale_Date'] = convert_date_to_mssql($data['DocSale_Date']);
			$transaction['Other_Remark'] = $data['Other_Remark'];
			$result = $this->db->insert('Inventory_Transaction', $transaction);
			
			
			$trans_detail = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$data['Transact_AutoID']))->result_array();
			$new_id = $this->db->insert_id();
			$insert_detail = array();
			
			
			
			foreach ($trans_detail as $key=>$value) {
				$trans_detail[$key]['Transact_AutoID'] = $new_id;
				$this->db->insert('Inventory_Transaction_Detail', $trans_detail[$key]);
				
				//update stock
				$where_stock = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				$stock = $this->db->get_where('Inventory_Detail', $where_stock)->row_array();
				$where = array(
					'RecNo'=>$stock['RecNo']
				);
				
				$update = array(
					'QTY_Good'=>$stock['QTY_Good']-$value['QTY_Good'],
					'QTY_ReserveGood'=>$stock['QTY_ReserveGood']-$value['QTY_Good'],
					'QTY_Waste'=>$stock['QTY_Waste']-$value['QTY_Waste'],
					'QTY_ReserveWaste'=>$stock['QTY_ReserveWaste']-$value['QTY_Waste'],
					'QTY_Damage'=>$stock['QTY_Damage']-$value['QTY_Damage'],
					'QTY_ReserveDamage'=>$stock['QTY_ReserveDamage']-$value['QTY_Damage']
				);
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
				
			}
			
			return TRUE;
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
			//$this->db->select('*, Inventory_Transaction.TK_Code as tk_code, Inventory_Transaction.RowCreatedDate as created_date');
			$this->db->select('*, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as created_date, convert(varchar,Inventory_Transaction.ApprovedDate,22) as approved_date');
			$this->db->from('Inventory_Transaction');
			$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID', 'left');
			$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson', 'left');
			// $this->db->join('Ticket_Type', 'Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For', 'left');
			$this->db->where(array('Inventory_Transaction.TK_Code'=>'RS','TK_ID'=>$rsid));
			
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
		
		public function get_transaction_used($type, $id)
		{
			//$this->db->get('Inventory_Transaction');
			
			//$this->db->select('*, Inventory_Transaction.TK_Code as tk_code,Inventory_Transaction.RowCreatedDate as created_date');
			$this->db->select('*, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as created_date, convert(varchar,Inventory_Transaction.ApprovedDate,22) as approved_date');
			$this->db->from('Inventory_Transaction');
			$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID','left');
			$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			// $this->db->join('Ticket_Type', 'Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where(array('Inventory_Transaction.TK_Code'=>$type,'Inventory_Transaction.TK_ID'=>$id));
			$query = $this->db->get();
			
			return $query->row_array();
		}
		
		public function get_transaction_used_detail($id)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
			$this->db->where(array('Transact_AutoID'=>$id));
			
			return $this->db->get()->result_array();	
		}
	
		public function notification()
		{
			$sale_tk =  $this->db->get_where('Ticket_Type',array('TK_Category'=>'sale'))->result_array();
			 
			 $notification = array(
			 	'all'=>'',
			 	'sale_all'=>''
			 );
			 
			 foreach($sale_tk as $key=>$val)
			 {
			 	$where = array(
					'Ticket_Type.TK_Code'=>$val['TK_Code'],
					'Inventory_Transaction.IsDraft'=>0,
					'Inventory_Transaction.IsApproved'=>1,
					'Inventory_Transaction.IsUsed'=>NULL,
					'Inventory_Transaction.IsDel'=>0,
					'Inventory_Transaction.RowStatus'=>'active'
				);
				
				$this->db->select('*');
				$this->db->from('Inventory_Transaction');
				$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For', 'left');
				$this->db->where($where);
				$query = $this->db->get();
				$rows = $query->num_rows();
				$notification[$val['TK_Code']] = $rows;	

			 }
			 
			 return $notification;
			
		}
		
		public function get_approve_person($id)
		{
			//$id = 1;
			$query = $this->db->get_where('Employees', array('Emp_ID'=>$id));
			
			if($query->num_rows()>0)
			{
				$row = $query->row_array();
				return $row['Emp_FnameTH'];
			}else{
				return "N/A";
			}
			
				
		}
		
		public function get_transaction_for($code)
		{
			$query = $this->db->get_where('Ticket_Type', array('TK_Code'=>$code));
			
			if($query->num_rows()>0)
			{
				$row = $query->row_array();
				return $row['TK_Description'];
			}else{
				return "N/A";
			}
		}
	
		
	
	}	