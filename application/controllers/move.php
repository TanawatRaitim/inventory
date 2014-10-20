<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Move extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('move_model');
	}

	public function all()
	{
		$content['title'] = 'ข้อมูลการโอนย้ายสินค้าทั้งหมด';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('move/all',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/move/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ข้อมูลการรับคืน [รออนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('move/no_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/move/no_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ข้อมูลการรับคืน [ผ่านอนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('move/yes_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/move/yes_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ข้อมูลการรับคืน [ถูกปฏิเสธ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('move/reject',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/move/reject.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		$content['title'] = 'โอนย้ายสินค้า';
		//$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['inventory_type'] = all_inventory_dropdown();
		$data['content'] = $this->load->view('move/add',$content, TRUE);
		
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
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/move/add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function check_new_data()
	{
		
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		$tkid = $main['TK_ID'];
		$autoid = $main['Transaction_AutoID'];
		$tk_code = $main['TK_Code'];
		$product_id = $detail['Product_ID'];
		$stock_id = $detail['Effect_Stock_AutoID'];
		$stock_to = $detail['Effect_Stock_Des'];
		$detail['Transact_AutoID'] = $autoid;
		
		//here
		
		if($autoid != "")
		{
			//check dup transaction
			if($this->check_tran_dup_rl($autoid, $product_id, $stock_id, $stock_to)){
				//not dup
				$result = array(
					'status'=>true,
					'valid'=>''
				);
			}else{
				//dup
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามารถบันทึกข้อมูลได้ เนื่องจากคุณบันทึกรายการซ้ำ'
				);
			}
		}else{
			//check ticket id
			if($this->check_dup_tk($tk_code, $tkid)){
				//not dup
				$result = array(
					'status'=>true,
					'valid'=>''
				);
				//no need to check tran dup because this is one record
				
			}else{
				//dup
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามารถใช้เลข Ticket นี้ได้ เนื่องจากมีการใช้เลขนี้ไปแล้ว'
				);
			}
		}
		
		if($result['status'] == true)
		{
			//check tran qty
			if(!$this->check_tran_qty($detail))
			{
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามรถบันทึกรายการได้ เนื่องจากสินค้าในคลังมีจำนวนไม่พอที่จะโอนย้าย'
				);
			}
			
		}
		
		
		echo json_encode($result);

	}

	public function insert_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		if($main['Transaction_AutoID']=="")
		{
			$auto_id = $this->move_model->insert_main_ticket($main['TK_Code'], $main['TK_ID']);
			$this->move_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Effect_Stock_Des'=>$detail['Effect_Stock_Des'],
				'Product_ID'=>$detail['Product_ID']
			);

			echo json_encode($data);
		}else{
			$tid = $main['Transaction_AutoID'];
			$this->move_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Effect_Stock_Des'=>$detail['Effect_Stock_Des'],
				'Product_ID'=>$detail['Product_ID']
			);

			echo json_encode($data);	
		}
		
		
	}
	
	public function delete_ticket_detail()
	{
		$autoid = $this->input->post('autoid');
		$product_id = $this->input->post('product_id');
		$stock = $this->input->post('stock');
		
		$this->move_model->delete_tran_detail($autoid, $product_id, $stock);
		
		echo 'deleted';
	}
	
	//product->select2_product
	public function product_list()
	{
		$text = $this->input->post('q');
		$this->db->select('Product_AutoID, Product_ID, Product_Name, Product_Vol');
		$this->db->like('Product_ID', $text);
		$this->db->or_like('Product_Name', $text);
		$this->db->or_like('Product_Vol', $text);
		$query = $this->db->get('Products');
		
		if($query->num_rows()>0)
		{
			$arr = $query->result_array();
			foreach ($arr as $val) {
			$list[] = array(
				'id'=>$val['Product_ID'],
				'text'=>$val['Product_Name'].'#'.$val['Product_Vol']
				);
			}	
		}else{
			$list[] = array(
				'id'=>'',
				'text'=>''
			);	
		}
		
		echo json_encode($list);
		
	}
	
	//product->get_product_json
	public function get_product()
	{
		
		$id = $this->input->post('id');
		$query = $this->db->get_where('Products',array('Product_ID'=>$id));
		$result = $query->row_array();
		
		echo json_encode($result);
	}
	
	//customer->select2_customer
	public function customer_list()
	{
		$text = $this->input->post('q');
		$this->db->select('Cust_AutoID, Cust_ID, Cust_Name, Cust_Contact');
		$this->db->like('Cust_ID', $text);
		$this->db->or_like('Cust_Name', $text);
		$this->db->or_like('Cust_Contact', $text);
		$query = $this->db->get('Customers');
		
		if($query->num_rows()>0)
		{
			$arr = $query->result_array();
			foreach ($arr as $val) {
			$list[] = array(
				'id'=>$val['Cust_ID'],
				'text'=>$val['Cust_Name'].'#'.$val['Cust_Contact']
				);
			}	
		}else{
			$list[] = array(
				'id'=>'',
				'text'=>''
			);	
		}
		
		echo json_encode($list);
		
	}
	
	//customer->get_customer_json
	public function get_customer()
	{
		$id = $this->input->post('id');
		$query = $this->db->get_where('Customers', array('Cust_ID'=>$id));

		echo json_encode($query->row_array());
	}
	
	public function check_save($autoid)
	{
		//$auto_id = $this->find_tid($tkid);
		$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$autoid));
		$trans = $query->result_array();
		$result = array(
				'status'=>true,
				'valid'=>''
			);
		
		foreach ($trans as $key => $value) {
			
			if(!$this->check_tran_qty2($trans[$key])){
				$result['status'] = false;
				$result['valid'] = 'ไม่สามารถบันทักข้อมูลได้เนื่องสินค้า '.$value['Product_ID'].'ไม่จำนวนไม่พอสำหรับจอง';
			}
			
		}
		
		echo json_encode($result);
	}
	
	public function save()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->move_model->save($main);
		
	}
	
	public function get_all()
	{
		
		$result = $this->move_model->get_all();
		
		$result2 = $this->move_model->count_transaction_detail();
		
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
	
	public function get_no_appv_all()
	{
		
		$result = $this->move_model->get_no_appv_all();
		
		$result2 = $this->move_model->count_transaction_detail();
		
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
	
	public function get_yes_appv_all()
	{
		$result = $this->move_model->get_yes_appv_all();
		
		$result2 = $this->move_model->count_transaction_detail();
		
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
	
	public function get_reject_all()
	{
		$result = $this->move_model->get_reject_all();
		$result2 = $this->move_model->count_transaction_detail();
		
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
	
	public function detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการโอนย้ายสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('move/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>site_url('move/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('move/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('move/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('move/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->move_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->move_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		
		foreach($content['transaction_detail'] as $key=>$value){
			$content['transaction_detail'][$key]['Effect_Stock_Des_Name'] = $this->move_model->get_stock_name($content['transaction_detail'][$key]['Effect_Stock_Des']);
		}
		
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->move_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->move_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('move/detail',$content, TRUE);
		
		$css = array(
			'select2/select2-bootstrap-core.css'
			);
		$js = array(
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/move/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_detail($autoid)
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการโอนย้ายสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('move/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>site_url('move/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('move/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('move/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('move/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->move_model->get_inventory_transaction($autoid);
		$content['transaction_detail'] = $this->move_model->get_transaction_detail($autoid);
		
		
		foreach($content['transaction_detail'] as $key=>$value){
			$content['transaction_detail'][$key]['Effect_Stock_Des'] = $this->move_model->get_stock_name($content['transaction_detail'][$key]['Effect_Stock_Des']);
		}
		
		
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->move_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->move_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		$data['content'] = $this->load->view('move/view_detail',$content, TRUE);
		
		$css = array(
			'select2/select2-bootstrap-core.css',
			);
		$js = array(
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/move/view_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_detail()
	{
		$this->load->model('inventory_model');
		$this->load->helper('arr_helper');	
		/**
		 * $arr[0] = Transact_AutoID
		 * $arr[1] = Product_ID
		 * $arr[2] = Effect_Stock_AutoID
		 * $arr[3] = Field to update
		 * $arr[4] = qty before update
		 * $arr[5] = index
		 * $arr[6] = Effect_Stock_Des
		 */
		parse_str($_POST['detail_data'], $data);
		
		//print_r($data);
		//exit();
		
		$temp;
		
		foreach ($data as $key => $value) {
			$temp = $key;
			break;
		}
		$temp_arr = explode(',', $temp);
		$transact_auto_id = $temp_arr[0];
		
		
		$deleted = array();
		
		foreach($data as $key=>$value){
			$arr = explode(',', $key);
			if($arr[3]=="delete"){
				
				//get data before delete for update stock
				$transaction_detail = $this->move_model->get_each_detail($arr[0],$arr[1],$arr[2], $arr[6]);
				
				//delete transaction detail
				$this->move_model->delete_each_detail($arr[0],$arr[1],$arr[2],$arr[6]);
				
				//update qty
				$update = array(
					'QTY_ReserveGood'=> $inventory['QTY_ReserveGood']-$transaction_detail['QTY_Good'],
					'QTY_RemainGood'=>$inventory['QTY_RemainGood']+$transaction_detail['QTY_Good'],
					'QTY_ReserveWaste'=>$inventory['QTY_ReserveWaste']-$transaction_detail['QTY_Waste'],
					'QTY_RemainWaste'=>$inventory['QTY_RemainWaste']+$transaction_detail['QTY_Waste'],
					'QTY_ReserveDamage'=>$inventory['QTY_ReserveDamage']-$transaction_detail['QTY_Damage'],
					'QTY_RemainDamage'=>$inventory['QTY_RemainDamage']+$transaction_detail['QTY_Damage']
				);
				
				$this->inventory_model->update_stock_qty($arr[1], $arr[2], $update);
				
				//keep index of delete
				$deleted[$arr[5]] = $arr[5];
			}
		}
	
		//check delete		
		foreach ($data as $key => $value) {
			
			$arr = explode(',', $key);
			
			if(check_key($deleted, $arr[5]))
			{
				continue;
			}
			
			$diff = $arr[4] - $value ;
			
			//if($diff>=0){
				
				//get Inventory Detail
				$inventory = $this->inventory_model->get_product_stock($arr[1], $arr[2]);
				
				//update
				$update = array($arr[3]=>$value);	//data and field to update			
				$where = array(
					'Transact_AutoID'=>$arr[0],
					'Product_ID'=>$arr[1],
					'Effect_Stock_AutoID'=>$arr[2], 
					'Effect_Stock_Des'=>$arr[6]
				);
				
				$this->move_model->update_detail($update, $where);
				



				if($arr[3] == 'QTY_Good'){
					
					$update_inventory = array(
						'QTY_ReserveGood'=>$inventory['QTY_ReserveGood'] - $diff,
						'QTY_RemainGood'=>$inventory['QTY_RemainGood'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);
					
				}
				
				if($arr[3] == 'QTY_Waste'){
					
					$update_inventory = array(
						'QTY_ReserveWaste'=>$inventory['QTY_ReserveWaste'] - $diff,
						'QTY_RemainWaste'=>$inventory['QTY_RemainWaste'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);

				}
				
				if($arr[3] == 'QTY_Damage'){
					
					$update_inventory = array(
						'QTY_ReserveDamage'=>$inventory['QTY_ReserveDamage'] - $diff,
						'QTY_RemainDamage'=>$inventory['QTY_RemainDamage'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);
				}
				
				//update status to wait approve
				$this->move_model->set_status_wait($arr[0]);
								
			//}
		}//end foreach
		
		//if alld detail are deleted
		//delete main ticket
		$transact_rows = $this->db->get_where('Inventory_Transaction_Detail',array('Transact_AutoID'=>$transact_auto_id))->num_rows();
		
		if($transact_rows==0)
		{
			$this->db->delete('Inventory_Transaction', array('Transact_AutoID'=>$transact_auto_id));
		}
		
		echo 'true';

	}
	
	public function approve($id)
	{
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการโอนย้ายสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('move/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>site_url('move/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('move/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('move/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('move/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->move_model->get_inventory_transaction($id);
		$content['transaction_detail'] = $this->move_model->get_transaction_detail($id);
		
		foreach($content['transaction_detail'] as $key=>$value){
			$content['transaction_detail'][$key]['Effect_Stock_Des'] = $this->move_model->get_stock_name($content['transaction_detail'][$key]['Effect_Stock_Des']);
		}
		
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->move_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->move_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('move/approve',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/move/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_approve($rsid="")
	{
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการโอนย้ายสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการโอนย้ายสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('move/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบโอนย้ายสินค้า (ใบใหม่)',
										'link'=>site_url('move/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบโอนย้ายสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('move/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('move/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบโอนย้ายสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('move/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->move_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->move_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->move_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->move_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		
		
		$data['content'] = $this->load->view('move/view_approve',$content, TRUE);
		
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
			'js/app/move/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function set_reject()
	{
		parse_str($_POST['reject'], $reject);
		
		$result = $this->move_model->set_reject_approve($reject);
		
		if($result){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	public function table_qty($product_id)
	{
		$this->load->model('product_model');
		$this->load->model('inventory_model');

		$query = $this->product_model->get($product_id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีรายละเอียดสินค้า';
			exit;
		}

		$result = $query->row_array();
		
		if($result['Product_SpecSheet'])
		{
			$result['Product_SpecSheet'] = $this->config->item('specsheet_path').$result['Product_SpecSheet'];
		}
		
		if($result['Product_SaleSheet'])
		{
			$result['Product_SaleSheet'] = $this->config->item('salesheet_path').$result['Product_SaleSheet'];
		}
		
		if($result['Product_DocOther'])
		{
			$result['Product_DocOther'] = $this->config->item('docother_path').$result['Product_DocOther'];
		}
		
		if($result['Product_Photo'])
		{
			$result['Product_Photo'] = $this->config->item('productimg_path').$result['Product_Photo'];
		}
		
		$data['product'] = $result;
		
		$query = $this->inventory_model->get_all_stock($product_id);
		$data['inventory'] = $query->result_array();
		
		$total = array(
						'good'=>0,
						'reserve_good'=>0,
						'remain_good'=>0,
						'waste'=>0,
						'reserve_waste'=>0,
						'remain_waste'=>0,
						'damage'=>0,
						'reserve_damage'=>0,
						'remain_damage'=>0
					);
		
		foreach ($data['inventory'] as $value) {
			$total['good'] += $value['QTY_Good'];
			$total['reserve_good'] += $value['QTY_ReserveGood']; 
			$total['remain_good'] += $value['QTY_RemainGood']; 
			$total['waste'] += $value['QTY_Waste']; 
			$total['reserve_waste'] += $value['QTY_ReserveWaste']; 
			$total['remain_waste'] += $value['QTY_RemainWaste']; 
			$total['damage'] += $value['QTY_Damage']; 
			$total['reserve_damage'] += $value['QTY_ReserveDamage']; 
			$total['remain_damage'] += $value['QTY_RemainDamage']; 
		}
		
		$data['total'] = $total;
		$this->load->view('product/table_qty', $data);
		
	}

	public function table_premium($product_id)
	{
		$this->load->model('product_model');
		
		$query = $this->product_model->get_all_product_premium($product_id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีสินค้าประกอบ';
			exit;
		}

		$result = $query->result_array();
		$data['premium'] = $result;
		
		$this->load->view('product/table_premium', $data);
	}

	private function get_notification()
	{
		return $this->move_model->notification();
	}
	
	public function save_draft($autoid)
	{
		
		$query = $this->move_model->save_draft($autoid);	
		
		if($query)
		{
			echo 'true';
		}else{
			echo 'false';
		}
		
			
	}
	
	public function cancel_all($autoid)
	{
		
		$delete = $this->move_model->cancel($autoid);
		
		if($delete){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	/*
	 * return false if data is duplicate
	 * */
	public function check_dup_tk($tkcode, $tkid)
	{
		$where = array(
			'TK_Code'=>$tkcode,
			'TK_ID'=>$tkid
		);
		
		$rows = $this->db->get_where('Inventory_Transaction', $where)->num_rows();
		
		if($rows>0){
			return FALSE;
		}else{
			return TRUE;
			
		}
		
	}
	
	private function check_tran_dup($autoid, $product_id, $stock)
	{
		$where = array(
			'Transact_AutoID'=> $autoid,
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
	
	private function check_tran_dup_rl($autoid, $product_id, $stock, $stock_to)
	{
		$where = array(
			'Transact_AutoID'=> $autoid,
			'Product_ID'=> $product_id,
			'Effect_Stock_AutoID'=> $stock,
			'Effect_Stock_Des'=> $stock_to
		);
		
		$this->db->where($where);
		
		$query = $this->db->get('Inventory_Transaction_Detail');

		if($query->num_rows()>0)
		{
			return false;
		}
		
		return true;
	
	}
	
	private function check_tran_qty($detail)
	{
		
		/**
		 * Product_ID
		 * Effect_Stock_AutoID
		 * QTY_Good
		 * QTY_Waste
		 * QTY_Damage
		 */
		 
		//get transaction qty
		 $sql = "select SUM(QTY_Good) as sum_good, SUM(QTY_Waste) as sum_waste, SUM(QTY_Damage) as sum_damage 
			from Inventory_Transaction_Detail 
			where Transact_AutoID = '".$detail['Transact_AutoID']."' and Product_ID = '".$detail['Product_ID']."' and Effect_Stock_AutoID = '".$detail['Effect_Stock_AutoID']."'";
		$query = $this->db->query($sql);
		$transact_qty = $query->result_array();
		
		foreach ($transact_qty[0] as $key => $value) {
			if($value == NULL)
			{
				$transact_qty[0][$key] = 0;
			}
		}
		
		//check before save rs
		$qty_good = $transact_qty[0]['sum_good'] + $detail['QTY_Good'];
		$qty_waste = $transact_qty[0]['sum_waste'] + $detail['QTY_Waste'];
		$qty_damage = $transact_qty[0]['sum_damage'] + $detail['QTY_Damage'];
		
		//check qty remain stock
		 $this->db->where('Product_ID', $detail['Product_ID']);
		 $this->db->where('Stock_AutoID', $detail['Effect_Stock_AutoID']);
		 $this->db->where('QTY_RemainGood>=', $qty_good);
		 $this->db->where('QTY_RemainWaste>=', $qty_waste);
		 $this->db->where('QTY_RemainDamage>=', $qty_damage);
		 
		 $query = $this->db->get('Inventory_Detail');
		 
		if($query->num_rows()==0)
		{
			return false;
		}
		
		return true;
	}
	
	private function check_tran_qty2($detail)
	{
		//check when sumbit save all
		
		/**
		 * Product_ID
		 * Effect_Stock_AutoID
		 * QTY_Good
		 * QTY_Waste
		 * QTY_Damage
		 */
		 
		//get transaction qty
		 $sql = "select SUM(QTY_Good) as sum_good, SUM(QTY_Waste) as sum_waste, SUM(QTY_Damage) as sum_damage 
			from Inventory_Transaction_Detail 
			where Transact_AutoID = '".$detail['Transact_AutoID']."' and Product_ID = '".$detail['Product_ID']."' and Effect_Stock_AutoID = '".$detail['Effect_Stock_AutoID']."'";
		$query = $this->db->query($sql);
		$transact_qty = $query->result_array();
		
		foreach ($transact_qty[0] as $key => $value) {
			if($value == NULL)
			{
				$transact_qty[0][$key] = 0;
			}
		}
		
		//check before save rs
		$qty_good = $transact_qty[0]['sum_good'];
		$qty_waste = $transact_qty[0]['sum_waste'];
		$qty_damage = $transact_qty[0]['sum_damage'];
		
		//check qty remain stock
		 $this->db->where('Product_ID', $detail['Product_ID']);
		 $this->db->where('Stock_AutoID', $detail['Effect_Stock_AutoID']);
		 $this->db->where('QTY_RemainGood>=', $qty_good);
		 $this->db->where('QTY_RemainWaste>=', $qty_waste);
		 $this->db->where('QTY_RemainDamage>=', $qty_damage);
		 
		 $query = $this->db->get('Inventory_Detail');
		 
		if($query->num_rows()==0)
		{
			return false;
		}
		
		return true;
	}
	
}