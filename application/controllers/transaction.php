<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
	}
	
	public function delete_detail()
	{
		$autoid = $this->input->post('autoid');
		$product_id = $this->input->post('product_id');
		$stock = $this->input->post('stock');
		
		$result = $this->transaction_model->delete_transaction_detail($autoid, $product_id, $stock);
		
		if($result)
		{
			echo 'deleted';	
		}else{
			echo 'can not delete';
		}
	}
	
	
	public function insert_rs_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		if($detail['QTY_Good'] == 0 && $detail['QTY_Waste'] == 0 && $detail['QTY_Damage'] == 0)
		{
			$data = array(
				'TK_ID'=>'',
				'Transact_AutoID'=>'',
				'Effect_Stock_AutoID'=>'',
				'Product_ID'=>'',
				'Product_Name'=>'',
				'status'=>false
			);

			echo json_encode($data);
			exit();
		}
		
		//check qty remain
		$stock = $this->inventory_model->get_product_stock($detail['Product_ID'], $detail['Effect_Stock_AutoID']);
		
		if($detail['QTY_Good'] > $stock['QTY_RemainGood'] || $detail['QTY_Waste'] > $stock['QTY_RemainWaste'] || $detail['QTY_Damage'] > $stock['QTY_RemainDamage'])
		{
			$remain_status = false;
		}else{
			$remain_status = true;
		}
		//print_r($stock);
		//exit();
		//check qty
		
		if($this->transaction_model->is_exist_rsid('RS', $main['TK_ID']))
		{
			//find transac_autoID from TKID
			// $tid = $this->find_tid($main['TK_ID']);
			$tid = $this->transaction_model->find_autoid('RS',$main['TK_ID']);
			$this->transaction_model->update_main_transaction($tid);
			$this->transaction_model->insert_transaction_detail($tid);
			
			

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID']),
				'status'=>true,
				'remain_status'=>$remain_status
			);

			echo json_encode($data);
		}else{
			
			$rs_id = $this->transaction_model->gen_rsid();
			$auto_id = $this->transaction_model->insert_transaction($rs_id);			
			$this->transaction_model->insert_transaction_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$rs_id,
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID']),
				'status'=>true,
				'remain_status'=>$remain_status
			);

			echo json_encode($data);
			
		}	
	}

	public function insert_transaction()
		{
			parse_str($_POST['main_ticket'], $main);
			parse_str($_POST['ticket_detail'], $detail);
			
			
			$this->transaction_model->update_main_transaction($main['Transact_AutoID']);
			$this->transaction_model->insert_transaction_detail($main['Transact_AutoID']);
	
			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$main['Transact_AutoID'],
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID'])
			);
	
			echo json_encode($data);
				
		}
	
	public function check_save_rs($tkid)
	{
		$auto_id = $this->transaction_model->find_autoid('RS',$tkid);
		$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$auto_id));
		$trans = $query->result_array();
		$result = array(
				'status'=>true,
				'valid'=>''
			);
		
		if(!$this->transaction_model->has_detail($auto_id))
		{
			$result = array(
				'status'=>false,
				'valid'=>'ไม่พบรายการที่ต้องการส่งขออนุมัติ กรุณาตรวจสอบข้อมูลอีกครั้ง !!!'
			);
		}
		
		/*
		foreach ($trans as $key => $value) {
			
			if(!$this->check_tran_qty($trans[$key])){
				$result['status'] = false;
				$result['valid'] = 'ไม่สามารถบันทักข้อมูลได้เนื่องสินค้า '.$value['Product_ID'].'ไม่จำนวนไม่พอสำหรับจอง';
			}
			
		}
		
		 * */
		echo json_encode($result);
	}
	
	public function save_rs()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->transaction_model->save_rs($main);
		
	}
	
	public function save_edit_reject()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->transaction_model->save_edit_reject_rs($main);
	}
	
	public function save_draft()
	{

		$query = $this->transaction_model->save_draft();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
	}
	
	
	public function save_draft_in()
	{

		$query = $this->transaction_model->save_draft_in();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
	}
	
	public function save_draft_return()
	{

		$query = $this->transaction_model->save_draft_return();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
	}
	
	public function save_draft_adjust()
	{

		$query = $this->transaction_model->save_draft_adjust();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
	}
	
	public function save_draft_move()
	{

		$query = $this->transaction_model->save_draft_move();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
	}
	
	public function cancel_all($tkid)
	{
		$delete = $this->transaction_model->cancel_rs($tkid);
		
		/*
		if($delete){
			echo 'true';
		}else{
			echo 'false';
		}
		 * */
	}
	
	public function check_new_rs_data()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		//print_r($detail);
		//exit();
		
		$tkid = $main['TK_ID'];
		$product_id = $detail['Product_ID'];
		$stock_id = $detail['Effect_Stock_AutoID'];
		
		if($tkid == "")
		{
			
			$result = array(
						'status'=>true,
						'valid'=>''
					);
					
					
			
			/*
			if($this->transaction_model->check_tran_qty($detail)){
					$result = array(
						'status'=>true,
						'valid'=>''
					);
				}else{
					$result = array(
						'status'=>false,
						'valid'=>'ไม่สามรถบันทึกรายการได้ เนื่องจากสินค้าในคลังไม่พอตัด'
					);
				}
			 * 
			 * */
			
		}else{
			
			if($this->transaction_model->check_tran_dup($tkid, $product_id, $stock_id))
			{
				
				/*
				if($this->transaction_model->check_tran_qty($detail)){
					$result = array(
						'status'=>true,
						'valid'=>''
					);
				}else{
					$result = array(
						'status'=>false,
						'valid'=>'ไม่สามรถบันทึกรายการได้ เนื่องจากสินค้าในคลังไม่พอตัด'
					);
				}
				 * 
				 * */
				 
				 $result = array(
						'status'=>true,
						'valid'=>''
					);
				 
				 
			}
			else
			{
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามารถบันทึกข้อมูลได้ เนื่องจากคุณบันทึกรายการซ้ำ'
				);
			}

		}
		
		
		
		
		
		echo json_encode($result);
	}

	public function draft_list()
	{
		$content['title'] = 'แบบร่างที่บันทึกไว้';
		//$content['input_type'] = 'RS';

		$data['content'] = $this->load->view('transaction/draft_list',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/transaction/draft_list.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);	
	}

	public function edit_draft($id)
	{
		//check edit type
		
		$tk_code =  get_ticket_code($id);
		
		if($tk_code == "N/A")
		{
			echo 'Error!!!, Please Administrator # 226';
			exit();
		}else{
			
			switch($tk_code){
				
				case "RS":
					redirect(site_url('reserve/edit_draft/'.$id, 'refresh'));
					break;
				case "IN":
					redirect(site_url('in/edit_draft/'.$id, 'refresh'));
					break;	
				case "IR":
					redirect(site_url('in/edit_draft/'.$id, 'refresh'));
					break;	
				case "SR":
					redirect(site_url('return_p/edit_draft/'.$id, 'refresh'));
					break;	
				case "RL":
					redirect(site_url('move/edit_draft/'.$id, 'refresh'));
					break;	
				case "AD":
					redirect(site_url('adjust/edit_draft/'.$id, 'refresh'));
					break;	
				default:
					echo 'Error!!!, Please Administrator # 226'; 
			}//end switch
		}//end if
		
		
	}

	public function get_draft_all()
	{
		
		$result = $this->transaction_model->get_draft_by_emp($this->session->userdata('Emp_ID'));
		
		$result2 = $this->transaction_model->count_transaction_detail();
		
		$count = array();
		
		foreach ($result2 as $key => $value) {
			//$count
			$count[$value['Transact_AutoID']] = $value['count_a'];
		}
		
		foreach ($result as $key => $value) {
			
			if(isset($count[$value['Transact_AutoID']])){
				$result[$key]['count'] = $count[$value['Transact_AutoID']];
			}else{
				$result[$key]['count'] = 0;
			}
		}
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}
	

	public function rollback_before_approve()
	{
		//echo 'rollback list';
	}
	
	public function rollback_after_approve()
	{
		
	}

		
}