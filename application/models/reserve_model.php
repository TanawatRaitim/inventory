<?php
	class Reserve_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function is_exist_rsid($id)
		{
			
			
			//$query = $this->db->get_where('Inventory_Transaction', array('Transact_AutoID'=>$id));
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
			//$create_date = date("Y/m/d h:i:s");//hh:mm:ss
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
			//print_r($detail);
			$this->db->insert('Inventory_Transaction_Detail', $detail);
		}
		
	}	