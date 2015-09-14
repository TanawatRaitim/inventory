<?php
	class Transaction_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function save_draft($tk_code="")
		{
			parse_str($_POST['main_ticket'], $main);
			
			//print_r($main);
			
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			if(!$main['Transport_Date'] || $main['Transport_Date'] == "")
			{
				$main['Transport_Date'] = NULL;
			}else{
				$main['Transport_Date'] = convert_date_to_mssql($main['Transport_Date']);
			}
			
			
			if(isset($main['Transact_AutoID']))
			{
				$autoid = $main['Transact_AutoID'];	
			}else{
				$autoid = $this->find_autoid($main['TK_Code'], $main['TK_ID']);
			}
			
			$where = array(
					"Transact_AutoID"=>$autoid
				);
				
			//update main ticket	
			$update = array(
				'Transaction_For'=>$main['Transaction_For'],
				'DocRef_AutoID'=>$main['DocRef_AutoID'],
				'DocRef_Other'=>$main['DocRef_Other'],
				'DocRef_No'=>$main['DocRef_No'],
				'DocRef_Date'=>$main['DocRef_Date'],
				'Cust_ID'=>$main['Cust_ID'],
				'Transport_Date'=>$main['Transport_Date'],
				'Transport_By'=>$main['Transport_By'],
				'Transact_Remark'=>$main['Transact_Remark'],
				'IsDraft'=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}

		
		public function save_draft_in($tk_code="")
		{
			parse_str($_POST['main_ticket'], $main);
			
			
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			
			if(isset($main['Transact_AutoID']))
			{
				$autoid = $main['Transact_AutoID'];	
			}else{
				$autoid = $this->find_autoid($main['TK_Code'], $main['TK_ID']);
			}
			
			$where = array(
					"Transact_AutoID"=>$autoid
				);
				
			//update main ticket	
			$update = array(
				'DocRef_AutoID'=>$main['DocRef_AutoID'],
				'DocRef_Other'=>$main['DocRef_Other'],
				'DocRef_No'=>$main['DocRef_No'],
				'DocRef_Date'=>$main['DocRef_Date'],
				'Transact_Remark'=>$main['Transact_Remark'],
				'IsDraft'=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}
		
		public function save_draft_return($tk_code="")
		{
			parse_str($_POST['main_ticket'], $main);
			
			
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			
			if(isset($main['Transact_AutoID']))
			{
				$autoid = $main['Transact_AutoID'];	
			}else{
				$autoid = $this->find_autoid($main['TK_Code'], $main['TK_ID']);
			}
			
			$where = array(
					"Transact_AutoID"=>$autoid
				);
				
			//update main ticket	
			$update = array(
				'DocRef_AutoID'=>$main['DocRef_AutoID'],
				'DocRef_Other'=>$main['DocRef_Other'],
				'DocRef_No'=>$main['DocRef_No'],
				'DocRef_Date'=>$main['DocRef_Date'],
				'Cust_ID'=>$main['Cust_ID'],
				'Transact_Remark'=>$main['Transact_Remark'],
				'IsDraft'=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}
		
		public function save_draft_adjust($tk_code="")
		{
			parse_str($_POST['main_ticket'], $main);
			
			
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			
			if(isset($main['Transact_AutoID']))
			{
				$autoid = $main['Transact_AutoID'];	
			}else{
				$autoid = $this->find_autoid($main['TK_Code'], $main['TK_ID']);
			}
			
			$where = array(
					"Transact_AutoID"=>$autoid
				);
				
			//update main ticket	
			$update = array(
				'DocRef_AutoID'=>$main['DocRef_AutoID'],
				'DocRef_Other'=>$main['DocRef_Other'],
				'DocRef_No'=>$main['DocRef_No'],
				'DocRef_Date'=>$main['DocRef_Date'],
				// 'Cust_ID'=>$main['Cust_ID'],
				'Transact_Remark'=>$main['Transact_Remark'],
				'IsDraft'=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}
		
		public function save_draft_move($tk_code="")
		{
			parse_str($_POST['main_ticket'], $main);
			
			
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			
			if(isset($main['Transact_AutoID']))
			{
				$autoid = $main['Transact_AutoID'];	
			}else{
				$autoid = $this->find_autoid($main['TK_Code'], $main['TK_ID']);
			}
			
			$where = array(
					"Transact_AutoID"=>$autoid
				);
				
			//update main ticket	
			$update = array(
				'DocRef_AutoID'=>$main['DocRef_AutoID'],
				'DocRef_Other'=>$main['DocRef_Other'],
				'DocRef_No'=>$main['DocRef_No'],
				'DocRef_Date'=>$main['DocRef_Date'],
				'Transact_Remark'=>$main['Transact_Remark'],
				'IsDraft'=>1	
				);	
			$this->db->where($where);
			return $this->db->update('Inventory_Transaction', $update);	
			
		}
		
		/**
		 * 
		 * get inventory transaction by auto id
		 */
		public function get_transaction($autoid)
		{
			
			return $this->db->get_where('Inventory_Transaction', array('Transact_AutoID'=>$autoid))->row_array();
		}

		public function get_transaction_full($autoid)
		{
			$this->db->select('*, convert(varchar(17),Inventory_Transaction.RowCreatedDate,113) as created_date, convert(varchar(17),Inventory_Transaction.ApprovedDate,113) as approved_date');
			$this->db->from('Inventory_Transaction');
			$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID', 'left');
			$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson', 'left');
			$this->db->where(array('Transact_AutoID'=>$autoid));
			
			return $this->db->get()->row_array();
			
		}
		
		/**
		 * 
		 * get inventory transaction detail by auto id
		 */
		public function get_transaction_detail($autoid)
		{
			$this->db->order_by('RecNo');
			return $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid))->result_array();
		}

		public function get_transaction_detail_full($autoid)
		{
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
			$this->db->where(array('Transact_AutoID'=>$autoid));
			$this->db->order_by('Inventory_Transaction_Detail.RecNo','asc');
			
			return $this->db->get()->result_array();	
		}
		
		public function get_table_transaction_detail($id)
		{
			$this->db->select('Inventory_Transaction_Detail.*, Products.*, Inventory.* ');
			$this->db->select('Inventory_Detail.QTY_RemainGood - Inventory_Transaction_Detail.QTY_Good as good');
			$this->db->select('Inventory_Detail.QTY_RemainWaste - Inventory_Transaction_Detail.QTY_Waste as waste');
			$this->db->select('Inventory_Detail.QTY_RemainDamage - Inventory_Transaction_Detail.QTY_Damage as damage');
			$this->db->select('Inventory_Detail.QTY_Good as have_good');
			$this->db->select('Inventory_Detail.QTY_Waste as have_waste');
			$this->db->select('Inventory_Detail.QTY_Damage as have_damage');
			$this->db->select('Inventory_Detail.QTY_RemainGood as remain_good');
			$this->db->select('Inventory_Detail.QTY_RemainWaste as remain_waste');
			$this->db->select('Inventory_Detail.QTY_RemainDamage as remain_damage');
			$this->db->select('Inventory_Detail.QTY_ReserveGood as reserve_good');
			$this->db->select('Inventory_Detail.QTY_ReserveWaste as reserve_waste');
			$this->db->select('Inventory_Detail.QTY_ReserveDamage as reserve_damage');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
			$this->db->join('Inventory_Detail',' Inventory_Detail.Product_ID = Inventory_Transaction_Detail.Product_ID and Inventory_Detail.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID');
			$this->db->where(array('Transact_AutoID'=>$id));
			$this->db->order_by('Inventory_Transaction_Detail.RecNo','asc');
			
			return $this->db->get()->result_array();
		}
		
		public function get_table_transaction_detail_des($id)
		{
			$this->db->select('Inventory_Transaction_Detail.*, Products.*, Inventory.* ');
			$this->db->select('Inventory_Detail.QTY_RemainGood - Inventory_Transaction_Detail.QTY_Good as good');
			$this->db->select('Inventory_Detail.QTY_RemainWaste - Inventory_Transaction_Detail.QTY_Waste as waste');
			$this->db->select('Inventory_Detail.QTY_RemainDamage - Inventory_Transaction_Detail.QTY_Damage as damage');
			$this->db->select('Inventory_Detail.QTY_Good as have_good');
			$this->db->select('Inventory_Detail.QTY_Waste as have_waste');
			$this->db->select('Inventory_Detail.QTY_Damage as have_damage');
			$this->db->select('Inventory_Detail.QTY_RemainGood as remain_good');
			$this->db->select('Inventory_Detail.QTY_RemainWaste as remain_waste');
			$this->db->select('Inventory_Detail.QTY_RemainDamage as remain_damage');
			$this->db->select('Inventory_Detail.QTY_ReserveGood as reserve_good');
			$this->db->select('Inventory_Detail.QTY_ReserveWaste as reserve_waste');
			$this->db->select('Inventory_Detail.QTY_ReserveDamage as reserve_damage');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_Des', 'left');
			$this->db->join('Inventory_Detail',' Inventory_Detail.Product_ID = Inventory_Transaction_Detail.Product_ID and Inventory_Detail.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_Des');
			$this->db->where(array('Transact_AutoID'=>$id));
			$this->db->order_by('Inventory_Transaction_Detail.RecNo','asc');
			
			return $this->db->get()->result_array();
		}
		
		public function insert_transaction($id)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			$main['TK_ID'] = $id;
			if(!$main['DocRef_Date'] || $main['DocRef_Date'] == "")
			{
				$main['DocRef_Date'] = NULL;
			}else{
				$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			}
			
			if(!$main['Transport_Date'] || $main['Transport_Date'] == "")
			{
				$main['Transport_Date'] = NULL;
			}else{
				$main['Transport_Date'] = convert_date_to_mssql($main['Transport_Date']);
			}
			
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
		
		public function update_main_transaction($autoid)
		{
			parse_str($_POST['main_ticket'], $main);
			
			if(isset($main['Transact_AutoID']))
			{
				unset($main['Transact_AutoID']);
			}
			
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['Transport_Date'] = convert_date_to_mssql($main['Transport_Date']);
			
			$this->db->where('Transact_AutoID',$autoid);
			$this->db->update('Inventory_Transaction',$main);
		}

		public function insert_transaction_detail($id)
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			$detail['Transact_AutoID']  = $id;
			$detail['Effect_Stock_Des'] = $detail['Effect_Stock_AutoID'];
			
			$this->db->insert('Inventory_Transaction_Detail', $detail);
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

		public function delete_transaction_detail($autoid, $product_id, $stock)
		{
			$where = array(
				'Transact_AutoID'=>$autoid,
				'Product_ID'=>$product_id,
				'Effect_Stock_AutoID'=>$stock
			);
			
			$this->db->where($where);
			return $this->db->delete('Inventory_Transaction_Detail');
		}
		
		public function delete_all($autoid)
		{
			$tables = array('Inventory_Transaction', 'Inventory_Transaction_Detail');	
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->delete($tables);
		}

		public function save_rs($main)
		{
			
			$auto_id = $this->find_autoid('RS',$main['TK_ID']);
			
			if(isset($main['Transact_AutoID']))
			{
				unset($main['Transact_AutoID']);
			}
			
			//print_r($main);
			
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['Transport_Date'] = convert_date_to_mssql($main['Transport_Date']);
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
				
				$update['QTY_ReserveGood'] = $inventory['QTY_ReserveGood'] + $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_Good'] - $update['QTY_ReserveGood']; 
				
				$update['QTY_ReserveWaste'] = $inventory['QTY_ReserveWaste'] + $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_Waste'] - $update['QTY_ReserveWaste']; 
				
				$update['QTY_ReserveDamage'] = $inventory['QTY_ReserveDamage'] + $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_Damage'] - $update['QTY_ReserveDamage']; 
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
			 * 
			 * 
			 */
			
		}

		public function save_edit_reject_rs($main)
		{
			$auto_id = $this->find_autoid('RS',$main['TK_ID']);
			
			if(isset($main['Transact_AutoID']))
			{
				unset($main['Transact_AutoID']);
			}
			
			$main['Reject_Remark'] = '';
			$main['RowUpdatedDate'] = date("Y/m/d h:i:s");
			$main['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
			$main['DocRef_Date'] = convert_date_to_mssql($main['DocRef_Date']);
			$main['Transport_Date'] = convert_date_to_mssql($main['Transport_Date']);
			$main['IsApproved'] = 0;
			$main['IsReject'] = 0;
			$main['IsDraft'] = 0;
			
			$this->db->where('Transact_AutoID', $auto_id);
			$this->db->update('Inventory_Transaction', $main);
			
			
		}
		
		public function cancel_rs($tkid)
		{
			$autoid = $this->find_autoid('RS',$tkid);
			$table = array('Inventory_Transaction', 'Inventory_Transaction_Detail');
			$this->db->where('Transact_AutoID',$autoid);
			return $this->db->delete($table);
		}

		public function find_autoid($tk_code, $tk_id)
		{
			$where = array(
				'TK_Code'=>$tk_code,
				'TK_ID'=>$tk_id	
			);
			$this->db->select('Transact_AutoID');
			$this->db->where($where);
			$query = $this->db->get('Inventory_Transaction', 1);
			$row = $query->row_array();
			return $row['Transact_AutoID'];
			
		}
		
		
		/**
		 * 
		 * Return true if has auto id
		 * 
		 */
		public function has_autoid($tk_code, $tk_id)
		{
			$where = array(
						'TK_Code'=>$tk_code,
						'TK_ID'=> $tk_id
					);
			$query = $this->db->get_where('Inventory_Transaction', $where, 1);
			
			
			if($query->num_rows() == 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function has_detail($autoid)
		{
			$where = array(
				'Transact_AutoID'=>$autoid
			);
			$query = $this->db->get_where('Inventory_Transaction_Detail',$where);
			
			if($query->num_rows()<=0)
			{
				return false;
			}	
			
			return true;
		}

		public function is_exist_rsid($tk_code, $tk_id)
		{
			$where = array(
						'TK_Code'=>$tk_code,
						'TK_ID'=> $tk_id
					);
			$query = $this->db->get_where('Inventory_Transaction', $where, 1);
			
			
			if($query->num_rows()<= 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function gen_rsid()
		{
			$this->load->helper('string');
			//yy
			$year =  date('Y');
			$year += 543;
			$year = substr($year, 2);
			//mm
			$month = date('m');
			$rsid = $year."-".$month;
			
			$this->db->where('TK_Code','RS');
			$this->db->like('TK_ID', $rsid, 'after');
			$this->db->order_by('TK_ID', 'DESC');
			$query = $this->db->get('Inventory_Transaction', 1);
			
			if($query->num_rows()>0)
			{
				//have
				$row = $query->row_array();
				$arr = explode("-", $row['TK_ID']);
				$auto_num = (int)$arr[2];
				$auto_num += 1;
				$id_len = strlen($auto_num);
				$repeat = 4-$id_len;
				$zero = repeater('0',$repeat);
				$next_id = $zero.$auto_num;
				
				return $rsid.'-'.$next_id;
				
			}else{
				//not have
				return $rsid = $rsid.'-0001';
			}
		}
		
	
		
		public function check_tran_dup($tkid, $product_id, $stock)
		{
			$auto_id = $this->find_autoid('RS',$tkid);
			
			$where = array(
				'Transact_AutoID'=> $auto_id,
				'Product_ID'=> $product_id,
				'Effect_Stock_AutoID'=> $stock
			);
			
			$this->db->where($where);
			
			$query = $this->db->get('Inventory_Transaction_Detail');
	
			
			if($query->num_rows()>0)
			{
				return false;
			}
			
			return true;
			
			
		}
		
		public function check_tran_qty($detail)
		{
			/**
			 * Product_ID
			 * Effect_Stock_AutoID
			 * QTY_Good
			 * QTY_Waste
			 * QTY_Damage
			 */
			 
			 
			 $this->db->where('Product_ID', $detail['Product_ID']);
			 $this->db->where('Stock_AutoID', $detail['Effect_Stock_AutoID']);
			 $this->db->where('QTY_RemainGood>=', $detail['QTY_Good']);
			 $this->db->where('QTY_RemainWaste>=', $detail['QTY_Waste']);
			 $this->db->where('QTY_RemainDamage>=', $detail['QTY_Damage']);
			 
			 $query = $this->db->get('Inventory_Detail');
			 
			 
			if($query->num_rows()==0)
			{
				return false;
			}	
			
			return true;
		}
		
		public function get_draft_by_emp($emp_id)
		{
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.Transaction_For','left');
			// $this->db->where('Inventory_Transaction.TK_Code', 'RS');
			$this->db->where('IsDraft', 1);
			$this->db->where('Inventory_Transaction.RowCreatedPerson', $emp_id);
			//$this->db->where('Inventory_Transaction.IsUsed', NULL);
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
		
		public function search_rollback($tk_id, $rollback_type)
		{
			if($rollback_type == 'RS')
			{
				//tk_code == 'rs'
				//isApproved == 1
				//IsUsed == NULL
				
				$where = array(
					'TK_Code'=>'RS',
					'TK_ID'=>$tk_id,
					'IsApproved'=> 1,
					'IsUsed'=> NULL
				);
				
				$query = $this->db->get_where('Inventory_Transaction', $where);
				return $query;
			
			}elseif($rollback_type == 'SR'){
				//tk_code == 'SR'
				//isApproved == 1
				
				$where = array(
					'TK_Code'=>'SR',
					'TK_ID'=>$tk_id,
					'IsApproved'=> 1
				);
				
				$query = $this->db->get_where('Inventory_Transaction', $where);
				return $query;
				
			}elseif($rollback_type == 'RL'){
				//tk_code == 'RL'
				//isApproved == 1
				$where = array(
					'TK_Code'=>'RL',
					'TK_ID'=>$tk_id,
					'IsApproved'=> 1
				);
				
				$query = $this->db->get_where('Inventory_Transaction', $where);
				return $query;
				
			}elseif($rollback_type == 'IN'){
				//tk_code == 'IN' or 'IR'
				//isApproved == 1
				$code = array('IN','IR');
				
				$this->db->where('TK_ID',$tk_id);
				$this->db->where('IsApproved', 1);
				$this->db->where_in('TK_Code', $code);
				
				$query = $this->db->get('Inventory_Transaction');
				
				
				return $query;
				
			}elseif($rollback_type == 'CutOut'){
				$code = array('SA','SS','SC','SZ','SM','SD','SE','SU','FR','TT','ZZ','MO','XS');
				
				$this->db->where('TK_ID',$tk_id);
				$this->db->where('IsUsed', 1);
				$this->db->where_in('TK_Code', $code);
				
				$query = $this->db->get('Inventory_Transaction');
				
				return $query;	
				
			}else{
				//wrong condition
			}
		}
		
		public function check_rollback_rs($autoid)
		{
			//select data from inventory_transaction_detail by $autoid
			$sql = "select * 
					from Inventory_Transaction_Detail
					left join Inventory_Detail on Inventory_Transaction_Detail.Product_ID = Inventory_Detail.Product_ID and Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory_Detail.Stock_AutoID
					where Transact_AutoID = $autoid and 
					(Inventory_Transaction_Detail.QTY_Good > Inventory_Detail.QTY_ReserveGood or Inventory_Transaction_Detail.QTY_Waste > Inventory_Detail.QTY_ReserveWaste or Inventory_Transaction_Detail.QTY_Damage > Inventory_Detail.QTY_ReserveDamage)";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows()>0)
			{
				return false;
			}
			
			return true;
			
		}
		
		
		public function check_rollback_in($autoid)
		{
			//select data from inventory_transaction_detail by $autoid
			$sql = "select * 
					from Inventory_Transaction_Detail
					left join Inventory_Detail on Inventory_Transaction_Detail.Product_ID = Inventory_Detail.Product_ID and Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory_Detail.Stock_AutoID
					where Transact_AutoID = $autoid and 
					(Inventory_Transaction_Detail.QTY_Good > Inventory_Detail.QTY_RemainGood or Inventory_Transaction_Detail.QTY_Waste > Inventory_Detail.QTY_RemainWaste or Inventory_Transaction_Detail.QTY_Damage > Inventory_Detail.QTY_RemainDamage)";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows()>0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function check_rollback_rl($autoid)
		{
			//select data from inventory_transaction_detail by $autoid
			$sql = "select * 
					from Inventory_Transaction_Detail
					left join Inventory_Detail on Inventory_Transaction_Detail.Product_ID = Inventory_Detail.Product_ID and Inventory_Transaction_Detail.Effect_Stock_Des = Inventory_Detail.Stock_AutoID
					where Transact_AutoID = $autoid and 
					(Inventory_Transaction_Detail.QTY_Good > Inventory_Detail.QTY_RemainGood or Inventory_Transaction_Detail.QTY_Waste > Inventory_Detail.QTY_RemainWaste or Inventory_Transaction_Detail.QTY_Damage > Inventory_Detail.QTY_RemainDamage)";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows()>0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function check_rollback_sr($autoid)
		{
			//select data from inventory_transaction_detail by $autoid
			$sql = "select * 
					from Inventory_Transaction_Detail
					left join Inventory_Detail on Inventory_Transaction_Detail.Product_ID = Inventory_Detail.Product_ID and Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory_Detail.Stock_AutoID
					where Transact_AutoID = $autoid and 
					(Inventory_Transaction_Detail.QTY_Good > Inventory_Detail.QTY_RemainGood or Inventory_Transaction_Detail.QTY_Waste > Inventory_Detail.QTY_RemainWaste or Inventory_Transaction_Detail.QTY_Damage > Inventory_Detail.QTY_RemainDamage)";
			
			$query = $this->db->query($sql);
			
			if($query->num_rows()>0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function rollback_rs($autoid)
		{
			//get transaction detail
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
			
			//looping rollback
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				$update = array();
				
				$update['QTY_ReserveGood'] = $inventory['QTY_ReserveGood'] - $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_RemainGood'] + $value['QTY_Good']; 
				
				$update['QTY_ReserveWaste'] = $inventory['QTY_ReserveWaste'] - $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_RemainWaste'] + $value['QTY_Waste'];  
				
				$update['QTY_ReserveDamage'] = $inventory['QTY_ReserveDamage'] - $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_RemainDamage'] + $value['QTY_Damage']; 
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
			
			
			return true;	
			
		}
		
		public function rollback_in($autoid)
		{
			//get transaction detail
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
			
			//looping rollback
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				$update = array();
				
				$update['QTY_Good'] = $inventory['QTY_Good'] - $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_RemainGood'] - $value['QTY_Good']; 
				
				$update['QTY_Waste'] = $inventory['QTY_Waste'] - $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_RemainWaste'] - $value['QTY_Waste'];  
				
				$update['QTY_Damage'] = $inventory['QTY_Damage'] - $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_RemainDamage'] - $value['QTY_Damage']; 
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
			
			return true;	
			
		}
		
		public function rollback_rl($autoid)
		{
			//get transaction detail
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
			
			//looping rollback
			foreach ($query->result_array() as $value) {
				$where_stock_from = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$where_stock_to = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_Des']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where_stock_from);
				$stock_from = $query->row_array();
				
				$query = $this->db->get_where('Inventory_Detail', $where_stock_to);
				$stock_to = $query->row_array();
				
				//increase from stock from
				$update_stock_from = array();
				
				$update_stock_from['QTY_Good'] = $stock_from['QTY_Good'] + $value['QTY_Good'];
				$update_stock_from['QTY_RemainGood'] = $stock_from['QTY_RemainGood'] + $value['QTY_Good'];
				// $update_stock_from['QTY_ReserveGood'] = $stock_from['QTY_ReserveGood'] - $value['QTY_Good'];
				
				$update_stock_from['QTY_Waste'] = $stock_from['QTY_Waste'] + $value['QTY_Waste'];
				$update_stock_from['QTY_RemainWaste'] = $stock_from['QTY_RemainWaste'] + $value['QTY_Waste'];
				
				$update_stock_from['QTY_Damage'] = $stock_from['QTY_Damage'] + $value['QTY_Damage'];
				$update_stock_from['QTY_RemainDamage'] = $stock_from['QTY_RemainDamage'] + $value['QTY_Damage'];
				
				//decrease from stock to
				$update_stock_to = array();
				
				$update_stock_to['QTY_Good'] = $stock_to['QTY_Good'] - $value['QTY_Good'];
				$update_stock_to['QTY_RemainGood'] = $stock_to['QTY_RemainGood'] - $value['QTY_Good'];
				
				$update_stock_to['QTY_Waste'] = $stock_to['QTY_Waste'] - $value['QTY_Waste'];
				$update_stock_to['QTY_RemainWaste'] = $stock_to['QTY_RemainWaste'] - $value['QTY_Waste'];
				
				$update_stock_to['QTY_Damage'] = $stock_to['QTY_Damage'] - $value['QTY_Damage'];
				$update_stock_to['QTY_RemainDamage'] = $stock_to['QTY_RemainDamage'] - $value['QTY_Damage'];
				
				//update stock from
				$this->db->where($where_stock_from);
				$this->db->update('Inventory_Detail', $update_stock_from);
				
				//update stock to
				$this->db->where($where_stock_to);
				$this->db->update('Inventory_Detail', $update_stock_to);
			}
			
			return true;
			
		}
		
		public function rollback_sr($autoid)
		{
			//get transaction detail
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
			
			//looping rollback
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				$update = array();
				
				$update['QTY_Good'] = $inventory['QTY_Good'] - $value['QTY_Good']; 
				$update['QTY_RemainGood'] = $inventory['QTY_RemainGood'] - $value['QTY_Good']; 
				
				$update['QTY_Waste'] = $inventory['QTY_Waste'] - $value['QTY_Waste']; 
				$update['QTY_RemainWaste'] = $inventory['QTY_RemainWaste'] - $value['QTY_Waste'];  
				
				$update['QTY_Damage'] = $inventory['QTY_Damage'] - $value['QTY_Damage']; 
				$update['QTY_RemainDamage'] = $inventory['QTY_RemainDamage'] - $value['QTY_Damage']; 
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
			
			return true;	
			
		}

		public function rollback_cutout($autoid)
		{
			//get transaction detail
			$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
			
			//looping rollback
			foreach ($query->result_array() as $value) {
				$where = array(
					'Product_ID'=>$value['Product_ID'],
					'Stock_AutoID'=>$value['Effect_Stock_AutoID']
				);
				
				$query = $this->db->get_where('Inventory_Detail', $where);
				$inventory = $query->row_array();
				$update = array();
				
				$update['QTY_ReserveGood'] = $inventory['QTY_ReserveGood'] + $value['QTY_Good']; 
				$update['QTY_Good'] = $inventory['QTY_Good'] + $value['QTY_Good']; 
				
				$update['QTY_ReserveWaste'] = $inventory['QTY_ReserveWaste'] + $value['QTY_Waste']; 
				$update['QTY_Waste'] = $inventory['QTY_Waste'] + $value['QTY_Waste'];  
				
				$update['QTY_ReserveDamage'] = $inventory['QTY_ReserveDamage'] + $value['QTY_Damage']; 
				$update['QTY_Damage'] = $inventory['QTY_Damage'] + $value['QTY_Damage']; 
				
				$this->db->where($where);
				$this->db->update('Inventory_Detail', $update);
			}
			
			
			return true;
		}

	
		public function insert_rollback_log($data = array())
		{
			if(!$data['DocRef_Date'] || $data['DocRef_Date'] == "")
			{
				$data['DocRef_Date'] = NULL;
			}else{
				$data['DocRef_Date'] = convert_date_to_mssql($data['DocRef_Date']);
			}
			
			$data = array(
				'Transact_AutoID'=>$data['Transact_AutoID'],
				'Process'=>$data['Process'],
				'DocRef_No'=>$data['DocRef_No'],
				'DocRef_Date'=>$data['DocRef_Date'],
				'Description'=>$data['Description'],
				'RowCreatedDate'=>date("Y/m/d h:i:s"),
				'RowCreatedPerson'=>$this->session->userdata('Emp_ID')
			);
			
			return $this->db->insert('RollRemove_Log', $data);
			
		}
		
		public function change_status_rollback_rs($autoid)
		{
			$data = array(
				'IsApproved'=> 0,
				'ApprovedBy'=> NULL,
				'ApprovedDate'=> NULL,
				'IsReject'=> 0,
				'RejectBy'=> NULL
			);
			
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->update('Inventory_Transaction', $data);
		}	
		
		public function change_status_rollback_in($autoid)
		{
			$data = array(
				'IsApproved'=> 0,
				'ApprovedBy'=> NULL,
				'ApprovedDate'=> NULL,
				'IsReject'=> 0,
				'RejectBy'=> NULL
			);
			
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->update('Inventory_Transaction', $data);
		}	
		
		public function change_status_rollback_rl($autoid)
		{
			$data = array(
				'IsApproved'=> 0,
				'ApprovedBy'=> NULL,
				'ApprovedDate'=> NULL,
				'IsReject'=> 0,
				'RejectBy'=> NULL
			);
			
			
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->update('Inventory_Transaction', $data);
		}	
		
		public function change_status_rollback_sr($autoid)
		{
			$data = array(
				'IsApproved'=> 0,
				'ApprovedBy'=> NULL,
				'ApprovedDate'=> NULL,
				'IsReject'=> 0,
				'RejectBy'=> NULL
			);
			
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->update('Inventory_Transaction', $data);
		}	
		
		public function change_status_rollback_cutout($autoid)
		{
			$data = array(
				'IsUsed'=> NULL
			);
			
			$this->db->where('Transact_AutoID', $autoid);
			$this->db->update('Inventory_Transaction', $data);	
		}
		
		
	
			
	}//end transaction_model
	