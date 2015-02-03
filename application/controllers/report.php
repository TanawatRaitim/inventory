<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('in_model');
	}

	public function age_inventory()
	{
		$content['title'] = 'รายงานอายุสินค้าคงคลัง';
		$content['product_type_dropdown'] = product_type_dropdown();	
		$content['product_group_dropdown'] = product_group_dropdown();	
		$content['product_category_dropdown'] = product_category_dropdown();
		$content['age_return_dropdown'] = age_return_dropdown();

		$data['content'] = $this->load->view('report/age_inventory',$content, TRUE);
		
		//initail template	
		
		$js = array(
				'js/app/in/all.js'
		);
				
		$data['css'] = $this->assets->get_css();
		$data['js'] = $this->assets->get_js($js);
		
		$this->load->view('template/main',$data);
	}
	
	public function packing_info($id, $print_type = "")
	{
		//get inventory transaction
		$where_transaction = array(
			'Transact_AutoID'=>$id
		);
		$transaction_query = $this->db->get_where('Inventory_Transaction', $where_transaction);
		
		if($transaction_query->num_rows()>0)
		{
			$transaction = $transaction_query->row_array();
			$autoid = $transaction['Transact_AutoID'];
			$content['transaction'] = $transaction;
			
			$content['title'] = 'ใบสั่งงานจัดแพ๊คสินค้า';
			$content['title2'] = 'ใบตรวจสอบการบรรจุและจัดส่งสินค้า';
			//$content['title'] = "RS".$rsid;
			
			$content['ticket'] = $transaction['DocRef_No'];
			//get ticket code name
			$content['tk_name'] = get_ticket_code_name($transaction['TK_Code']).' ['.$transaction['TK_Code'].']';
			//get reserve employee
			$content['reserve_employee'] = get_employee_name($transaction['RowCreatedPerson']);
			//get approve employee
			$content['approve_employee'] = get_employee_name($transaction['ApprovedBy']);
			//get customer
			
			$customer = get_customer($transaction['Cust_ID']);
			
			if($customer)
			{
				$content['customer_name'] = '['.$customer['Cust_ID'].'] '.$customer['Cust_Name'];
			}else{
				$content['customer_name'] = "N/A";
			}
			
			//get inventory transaction detail left join product left join inventory
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products','Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory','Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID','left');
			$this->db->where('Inventory_Transaction_Detail.Transact_AutoID', $autoid);
			$query_transaction_detail = $this->db->get();
			$transaction_detail = $query_transaction_detail->result_array();
			// $content['error'] = '';
			$content['total_weight'] = 0;
			
			if($query_transaction_detail->num_rows()>0)
			{
				foreach ($transaction_detail as $key => $value) {
					
					if($transaction_detail[$key]['Weight'] == 0){
						$content['error'] = '*** ไม่สามารถคำนวณน้ำหนักได้ทั้งหมด โปรดตรวจสอบอีกครั้ง!!!';
					}
					$transaction_detail[$key]['product_weight'] = $transaction_detail[$key]['Weight'] * $transaction_detail[$key]['QTY_Good']; 
					$content['total_weight'] +=  ($transaction_detail[$key]['Weight'] * $transaction_detail[$key]['QTY_Good'])/1000;
				}
			}
			$content['transaction_detail'] = $transaction_detail;
			
			//count inventory transaction detail
			$content['product_count'] = $query_transaction_detail->num_rows();
			
			//count total all item
			$this->db->select_sum('QTY_Good');
			$this->db->where('Transact_AutoID', $autoid);
			$sum_query = $this->db->get('Inventory_Transaction_Detail')->row_array();
			$content['item_count'] = $sum_query['QTY_Good'];
			
			$data['content'] = $this->load->view('report/packing_info',$content, TRUE);
			
			$css = array(
				'css/packing_print.css'
				// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
				// 'select2/select2-bootstrap-core.css',
				// 'select2-bootstrap-css-master/select2-bootstrap.css',
				//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
				);
			$js = array(
				// 'js/moment/min/moment.min.js',
				// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
				// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
				// 'select2/select2.min.js',
				//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
				// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
				'js/app/report/packing_info.js'
				);
			$data['css'] = $this->assets->get_css($css);
			$data['js'] = $this->assets->get_js($js);
			
			if($print_type == 'excel')
			{
				$data['excel'] = TRUE;
				$data['excel_name'] = $id.'.xls';
			}
			// $data['navigation'] = $this->load->view('template/navigation','',TRUE);
			
			$this->load->view('template/main',$data);
			
		}else{
			echo 'ไม่พบรายการ';
			exit();
		}
		
		//
	}

	
	
}