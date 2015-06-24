<?php
	class Return_p_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function insert_main_ticket($tkcode, $tkid)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			
			unset($main['Transaction_AutoID']);
			
			$main['TK_Code'] = $tkcode;
			$main['TK_ID'] = $tkid;
			$main['Transaction_For'] = $tkcode;
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['RowCreatedDate'] = date("Y/m/d h:i:s");
			$main['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
			$main['IsDraft'] = 1;
			$main['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$main['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			$main['RowStatus'] = 'active';
			$main['IsDel'] = 0;
			$this->db->insert('Inventory_Transaction', $main);
			
			// return $this->transaction_model->find_autoid($tkcode, $tkid);
			
			return $this->db->insert_id();
		}
		
		public function update_main_transaction($autoid)
		{
			parse_str($_POST['main_ticket'], $main);
			
			unset($main['Transaction_AutoID']);
			
			$main['Transaction_For'] = $main['TK_Code'];
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$main['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			
			$this->db->where('Transact_AutoID',$autoid);
			$this->db->update('Inventory_Transaction',$main);
			
		}		

		public function insert_ticket_detail($id)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			$detail['Transact_AutoID']  = $id;
			$detail['Effect_Stock_Des'] = $detail['Effect_Stock_AutoID'];
			$this->db->insert('Inventory_Transaction_Detail', $detail);
		}
		
		public function save($main)
		{
			$auto_id = $main['Transaction_AutoID'];
			unset($main['Transaction_AutoID']);
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['IsApproved'] = 0;
			$main['IsReject'] = 0;
			$main['IsDraft'] = 0;
			
			$this->db->where('Transact_AutoID', $auto_id);
			$this->db->update('Inventory_Transaction', $main);
			
			/*
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$auto_id));
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				
				$update = array();
				
				
				$update['QTY_Good'] = $inventory['QTY_Good'] + $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_RemainGood'] + $value['QTY_Good']; 
				
				$update['QTY_Waste'] = $inventory['QTY_Waste'] + $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_RemainWaste'] + $value['QTY_Waste']; 
				
				$update['QTY_Damage'] = $inventory['QTY_Damage'] + $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_RemainDamage'] + $value['QTY_Damage']; 
				
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
				
			}
			 * 
			 */
		}

		public function save_edit_reject($main)
		{
			$auto_id = $main['Transaction_AutoID'];
			unset($main['Transaction_AutoID']);
			
			$main['Reject_Remark'] = '';
			$main['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$main['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['IsApproved'] = 0;
			$main['IsReject'] = 0;
			$main['IsDraft'] = 0;
			
			$this->db->where('Transact_AutoID', $auto_id);
			$this->db->update('Inventory_Transaction', $main);	
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
		
		public function get_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as in_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('Ticket_Type.TK_Category','return');
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_no_appv_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as in_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 0);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->where('Ticket_Type.TK_Category','return');
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function get_yes_appv_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as in_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 1);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			$this->db->where('Ticket_Type.TK_Category','return');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_reject_all()
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as in_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsReject', 1);
			$this->db->where('IsApproved', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->where('Ticket_Type.TK_Category','return');
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
		
		public function get_inventory_transaction($id)
		{
			$this->db->select('*, convert(varchar(17),Inventory_Transaction.RowCreatedDate,113) as created_date, convert(varchar(17),Inventory_Transaction.ApprovedDate,113) as approved_date');
			$this->db->from('Inventory_Transaction');
			$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID');
			$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson');
			$this->db->where(array('Transact_AutoID'=>$id));
			
			return $this->db->get()->row_array();
		}

		public function get_transaction_detail($id)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
			$this->db->where(array('Transact_AutoID'=>$id));
			$this->db->order_by('Inventory_Transaction_Detail.RecNo', 'asc');
			
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
				'Reject_Remark'=>'',
				'RowUpdatedDate'=> date("Y/m/d h:i:s"),
				'RowUpdatedPerson'=> $this->session->userdata('Emp_ID')
			);
			
			$this->db->where('Transact_AutoID', $transaction_id);
			$this->db->update('Inventory_Transaction', $update);
		}

		public function set_reject_approve($reject=array())
		{
			//set status approve or reject
			if($reject['is_rejected'] == 0)
			{
				//update stock
				
				$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$reject['autoid']));
				foreach ($query->result_array() as $value) {
					$where = array(
						'Product_ID'=>$value['Product_ID'],
						'Stock_AutoID'=>$value['Effect_Stock_AutoID']
					);
					
					$query = $this->db->get_where('Inventory_Detail', $where);
					$inventory = $query->row_array();
					
					$update = array();
					
					
					$update['QTY_Good'] = $inventory['QTY_Good'] + $value['QTY_Good']; 
					$update['QTY_RemainGood'] = $inventory['QTY_RemainGood'] + $value['QTY_Good']; 
					
					$update['QTY_Waste'] = $inventory['QTY_Waste'] + $value['QTY_Waste']; 
					$update['QTY_RemainWaste'] = $inventory['QTY_RemainWaste'] + $value['QTY_Waste']; 
					
					$update['QTY_Damage'] = $inventory['QTY_Damage'] + $value['QTY_Damage']; 
					$update['QTY_RemainDamage'] = $inventory['QTY_RemainDamage'] + $value['QTY_Damage']; 
					
					
					$this->db->where($where);
					$this->db->update('Inventory_Detail', $update);
					
				}
				
				//set status approve
				$approved = 1;
				$data = array(
					'IsReject'=>$reject['is_rejected'],
					'RejectBy'=>NULL,
					'RejectDate'=>NULL,
					'Reject_Remark'=>NULL,
					'IsApproved'=>$approved,
					'ApprovedBy'=>$this->session->userdata('Emp_ID'),
					'ApprovedDate'=>date("Y/m/d h:i:s")
				);
				
				$where = array(
					'Transact_AutoID'=>$reject['autoid']
					);
				
				$this->db->where($where);
				return $this->db->update('Inventory_Transaction', $data);	
				
			}else{
				//reject
				$approved = 0;
				$data = array(
					'IsReject'=>$reject['is_rejected'],
					'IsApproved'=>$approved,
					'Reject_Remark'=>$reject['Reject_Remark'],
					'RejectBy'=>$this->session->userdata('Emp_ID'),
					'RejectDate'=>date("Y/m/d h:i:s")
				);
				
				$where = array(
					'Transact_AutoID'=>$reject['autoid']
					);
				
				$this->db->where($where);
				return $this->db->update('Inventory_Transaction', $data);
				
			}
			
			
		}
		
		public function notification()
		{
			$this->db->select('Inventory_Transaction.TK_Code');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('IsDraft', 0);
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('Ticket_Type.TK_Category','return');
			$all = $this->db->get()->num_rows();
			
			$this->db->select('Inventory_Transaction.TK_Code');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 0);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->where('Ticket_Type.TK_Category','return');
			$wait = $this->db->get()->num_rows();	
			
			$this->db->select('Inventory_Transaction.TK_Code');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 1);
			$this->db->where('IsReject', 0);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->where('Ticket_Type.TK_Category','return');
			$approved = $this->db->get()->num_rows();
			
			$this->db->select('Inventory_Transaction.TK_Code');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			$this->db->where('Inventory_Transaction.IsUsed', NULL);
			$this->db->where('IsDraft', 0);
			$this->db->where('IsApproved', 0);
			$this->db->where('IsReject', 1);
			$this->db->where('Inventory_Transaction.RowStatus','active');
			$this->db->where('Inventory_Transaction.IsDel',0);
			$this->db->where('Ticket_Type.TK_Category','return');
			$rejected = $this->db->get()->num_rows();
			
			$notification = array(
				'all' => $all,
				'wait' => $wait,
				'approved' => $approved,
				'rejected' => $rejected
			);
			
			return $notification;
		}
		
		public function save_draft($autoid)
		{
			$where = array(
					"Transact_AutoID" => $autoid
				);
			$update = array(
				"IsDraft"=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}
		
		public function cancel($autoid)
		{
			$table = array('Inventory_Transaction', 'Inventory_Transaction_Detail');
			$this->db->where('Transact_AutoID',$autoid);
			return $this->db->delete($table);
		}
		
		public function get_approve_person($id)
		{
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
		
		public function get_standard_return()
		{
			$this->db->select('Return_Standard.ProType_ID, Return_Standard.ProFreq_ID, 
				Return_Standard.Return_Period, Return_Period.Period_ID, Return_Period.Period_Name, 
				Return_Period.Period_Val, Product_Type.ProType_Name, Product_Frequency.ProFreq_Name'
			);
			
			$this->db->from('Return_Standard');
			$this->db->join('Return_Period', 'Return_Period.Period_Val = Return_Standard.Return_Period', 'left');
			$this->db->join('Product_Type', 'Product_Type.ProType_ID = Return_Standard.ProType_ID', 'left');
			$this->db->join('Product_Frequency', 'Product_Frequency.ProFreq_ID = Return_Standard.ProFreq_ID', 'left');
			
			return $this->db->get();
		
		}
		
		public function get_customize_return($customer_id, $type_id, $freq_id)
		{
			$where = array(
				'Cust_ID' => $customer_id,
				'ProType_ID' => $type_id,
				'ProFreq_ID' => $freq_id
			);
			
			$this->db->from('Return_Customize');
			$this->db->join('Return_Period', 'Return_Period.Period_Val = Return_Customize.Return_Period');
			$this->db->where($where);
			$query = $this->db->get();
			
			return $query;
			
				
		}
		
		
	}	