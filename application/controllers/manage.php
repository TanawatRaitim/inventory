<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	
	// private $data;
	
	
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
	
	public function main()
	{
		$content['title'] = 'จัดการข้อมูล';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'จัดการข้อมูล',
										'link'=>'main',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เพิ่มข้อมูลสินค้า',
										'link'=>base_url('product/add'),
										'class'=>''
									),
									2 => array(
										'name'=>'เพิ่มข้อมูลลูกค้า',
										'link'=>base_url('customer/add'),
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('search/main',$content, TRUE);
		
		$css = array(
			//'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css'
			//'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			// 'js/moment/min/moment.min.js',
			// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function product()
	{
		$content['title'] = 'ค้นหาข้อมูลสินค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'main',
										'class'=>''
									),
									1 => array(
										'name'=>'ค้นหาข้อมูลสินค้า',
										'link'=>'product',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ค้นหาข้อมูลลูกค้า',
										'link'=>'customer',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('search/product',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/app/search/product.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function customer()
	{
		$content['title'] = 'ค้นหาข้อมูลลูกค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'main',
										'class'=>''
									),
									1 => array(
										'name'=>'ค้นหาข้อมูลสินค้า',
										'link'=>'product',
										'class'=>''
									),
									2 => array(
										'name'=>'ค้นหาข้อมูลลูกค้า',
										'link'=>'customer',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('search/customer',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/app/search/customer.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_product_datatable()
	{
		$this->load->model('product_model');
		$query = $this->product_model->datatable();
		$products = $query->result_array();
		
		$json = array(
			'data'=>$products
		);
		
		echo json_encode($json);
	}

	
	public function get_customer_datatable()
	{
		$this->load->model('customer_model');
		$query = $this->customer_model->datatable();
		$customers = $query->result_array();
		
		// print_r($customers);
		
		$json = array(
			'data'=>$customers
		);
		
		echo json_encode($json);
	}
	
	public function clear_unused_ticket()
	{
		$result = array(
			'status'=>true,
			'description'=>'ล้างข้อมูลที่ไม่ใช้เรียบร้อยแล้ว'
		);
		
		$user_id = $this->session->userdata('Emp_ID');
		
		$where = array(
			'IsDraft'=>1,
			'RowCreatedPerson'=>$user_id
		);
		
		$query = $this->db->select('Transact_AutoID')->from('Inventory_Transaction')->where($where)->get();
		
		if($query->num_rows()>0)
		{
			$table = array('Inventory_Transaction_Detail', 'Inventory_Transaction');
			
			foreach($query->result_array() as $row)
			{
				$this->db->where('Transact_AutoID', $row['Transact_AutoID']);
				$this->db->delete($table);
			}
		}
		
		echo json_encode($result);
		
	}
	
	public function rollback()
	{
		$content['title'] = "ค้นหาข้อมูลที่ต้องการ Rollback";
		$content['rollback_type'] = rollback_type_dropdown();
		$content['tk_id'] = "";
		
		
		if($this->input->post('search_rollback'))
		{
			$rollback_type = $this->input->post('rollback_type');
			$tk_id = trim($this->input->post('tk_id'));
			
			$content['rollback_list'] = $this->transaction_model->search_rollback($tk_id, $rollback_type);
			$content['rollback_type'] = rollback_type_dropdown($rollback_type);
			$content['tk_id'] = $tk_id;
		}
						
		$data['content'] = $this->load->view('manage/rollback',$content ,TRUE);
		
		$css = array();
		$js = array(
			'js/app/manage/rollback.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function rollback_post()
	{
		parse_str($_POST['rollback'], $rollback);
		
		//set rollback type
		$rollback_type = $this->get_rollback_type($rollback['TK_Code']);
		
		//get main transaction
		$transaction = $this->transaction_model->get_transaction($rollback['Transact_AutoID']);
		
		//default json data
		$json = array(
			'status'=>true,
			'description'=>''
		);
		
		if($rollback_type == "reserve")
		{
			//rollback reserve ticket set approved to wait to approve and rollback data
			
			//check before rollback	
			if($this->transaction_model->check_rollback_rs($rollback['Transact_AutoID']))
			{
				$result = $this->transaction_model->rollback_rs($rollback['Transact_AutoID']);
				
				//set json status to false
				if(!$result){
					$json['status'] = false;
					$json['description'] = 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ';	
						
				}else{
					
					//insert rollback log
					$rollback['Process'] = 'Remove';
					$this->transaction_model->insert_rollback_log($rollback);
					
					//change status
					$this->transaction_model->change_status_rollback_rs($rollback['Transact_AutoID']);
				}
					
			}else{
				
				//set json status to false
				$json['status'] = false;
				$json['description'] = 'มีบางรายการยอดจองไม่เพียงพอที่จะ rollback';
			}
				
		}elseif($rollback_type == "return"){
			
			//rollback return ticket set approved to wait to approve and rollback data
			
			//check before rollback	
			if($this->transaction_model->check_rollback_sr($rollback['Transact_AutoID']))
			{
				$result = $this->transaction_model->rollback_sr($rollback['Transact_AutoID']);
				
				//set json status to false
				if(!$result){
					$json['status'] = false;
					$json['description'] = 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ';	
						
				}else{
					
					//insert rollback log
					$rollback['Process'] = 'Rollback';
					$this->transaction_model->insert_rollback_log($rollback);
					
					//change status
					$this->transaction_model->change_status_rollback_sr($rollback['Transact_AutoID']);
				}
					
			}else{
				
				//set json status to false
				$json['status'] = false;
				$json['description'] = 'มีบางรายการยอดไม่เพียงพอที่จะ rollback';
			}
			
		}elseif($rollback_type == "move"){
			
			//rollback In set approved to wait to approve and rollback data
			
			//check before rollback	
			if($this->transaction_model->check_rollback_rl($rollback['Transact_AutoID']))
			{
				$result = $this->transaction_model->rollback_rl($rollback['Transact_AutoID']);
				
				//set json status to false
				if(!$result){
					$json['status'] = false;
					$json['description'] = 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ';	
						
				}else{
					
					//insert rollback log
					$rollback['Process'] = 'Rollback';
					$this->transaction_model->insert_rollback_log($rollback);
					
					//change status
					$this->transaction_model->change_status_rollback_rl($rollback['Transact_AutoID']);
				}
					
			}else{
				
				//set json status to false
				$json['status'] = false;
				$json['description'] = 'มีบางรายการยอดไม่เพียงพอที่จะ rollback';
			}
			
		}elseif($rollback_type == "in"){
			
			//rollback In set approved to wait to approve and rollback data
			
			//check before rollback	
			if($this->transaction_model->check_rollback_in($rollback['Transact_AutoID']))
			{
				$result = $this->transaction_model->rollback_in($rollback['Transact_AutoID']);
				
				//set json status to false
				if(!$result){
					$json['status'] = false;
					$json['description'] = 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ';	
						
				}else{
					
					//insert rollback log
					$rollback['Process'] = 'Rollback';
					$this->transaction_model->insert_rollback_log($rollback);
					
					//change status
					$this->transaction_model->change_status_rollback_in($rollback['Transact_AutoID']);
				}
					
			}else{
				
				//set json status to false
				$json['status'] = false;
				$json['description'] = 'มีบางรายการยอดไม่เพียงพอที่จะ rollback';
			}
			
				
		}elseif($rollback_type == "cutout"){
			
			//no need to check before rollback
			$result = $this->transaction_model->rollback_cutout($rollback['Transact_AutoID']);
			
			if(!$result){
				$json['status'] = false;
				$json['description'] = 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบ';		
			}else{
				
				$rs_code = substr($transaction['DocRef_No'],0,2);
				$rs_id = substr($transaction['DocRef_No'],2,10);
				
				//get reserve auto id
				$rsid = $this->transaction_model->find_autoid($rs_code, $rs_id);
				
				//insert rollback log
				$rollback['Process'] = 'Rollback';
				$this->transaction_model->insert_rollback_log($rollback);
				
				//change status
				$this->transaction_model->change_status_rollback_cutout($rsid);
				
				//delete all record
				$this->transaction_model->delete_all($rollback['Transact_AutoID']);
				
			}
					
			
		}else{
			$json['status'] = false;
				$json['description'] = 'ไม่สามารถทำรายการได้โปรดติดต่อผู้ดูแลระบบ !!!!';
		}

		echo json_encode($json);
		

	}
	
	
	
	public function rollback_view($auto_id)
	{
		$this->load->model('customer_model');
		$content['title'] = "รายละเอียด Ticket ที่ต้องการ Rollback เลขที่  ".get_ticket_code_id($auto_id);
		$content['transaction'] = $this->transaction_model->get_transaction_full($auto_id);
		
		if($content['transaction']['TK_Code'] == 'RL')
		{
			$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail_des($auto_id);	
		}else{
			$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($auto_id);
		}
		
		
		
		$content['rollback_message'] = '*** โปรดตรวจสอบรายการที่มีโฮไลท์สีแดง เนื่องจากมียอดไม่เพียงพอในการ Rollback';
		
		
		 
		 foreach ($content['transaction_detail'] as $key => $value) {
			
			if($content['transaction']['TK_Code'] == 'RS'){
				if($value['QTY_Good'] > $value['reserve_good'] || $value['QTY_Waste'] > $value['reserve_waste'] || $value['QTY_Damage'] > $value['reserve_damage'])
				{
					$content['transaction_detail'][$key]['rollback_status'] = false;
				}else{
					$content['transaction_detail'][$key]['rollback_status'] = true;
				}
			}elseif($content['transaction']['TK_Code'] == 'RL' || $content['transaction']['TK_Code'] == 'SR' || $content['transaction']['TK_Code'] == 'IN' || $content['transaction']['TK_Code'] == 'IR'){
					
				if($value['QTY_Good'] > $value['remain_good'] || $value['QTY_Waste'] > $value['remain_waste'] || $value['QTY_Damage'] > $value['remain_damage'])
				{
					$content['transaction_detail'][$key]['rollback_status'] = false;
				}else{
					$content['transaction_detail'][$key]['rollback_status'] = true;
				}

			}else{
				
					$content['transaction_detail'][$key]['rollback_status'] = true;
					
			}
			
			
		}
		  
		 
		

		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		//detail of rs
		$content['description'] = '';
		
		if($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==0)
		{
			//wait
			$content['description'] = 'ใบจองนี้อยู่ในสถานะ รอการอนุมัติ';
		}
		elseif($content['transaction']['IsApproved']==1 && $content['transaction']['IsReject']==0)
		{
			//approve
			$content['description'] = 'ใบจองนี้อนุมัติแล้ว';
		}
		elseif($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==1)
		{
			//reject
			$content['description'] = 'ใบจองนี้ไม่ผ่านการอนุมัติเนื่องจาก <br />-'.$content['transaction']['Reject_Remark'];
		}
		
		
		
		$data['content'] = $this->load->view('manage/rollback_view',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/manage/rollback_view.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);

	}

	private function get_rollback_type($code)
	{
		$result = $this->db->select('TK_Category')->from('Ticket_Type')->where('TK_Code',$code)->get()->row_array();
		
		$tk_cat = $result['TK_Category'];
		
		if($tk_cat == 'sale' || $tk_cat == 'cut')
		{
			$rollback_type = "cutout";
		}else{
			$rollback_type = $tk_cat;
		}
		
		return $rollback_type;
		
	}
	
	

	
	
}