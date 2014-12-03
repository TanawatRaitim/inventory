<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adjust extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('adjust_model');
	}

	public function all()
	{
		$content['title'] = 'ข้อมูลการปรับยอดสินค้าทั้งหมด';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('adjust/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/adjust/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ข้อมูลการปรับยอด [รออนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('adjust/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/adjust/no_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ข้อมูลการปรับยอด [ผ่านอนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('adjust/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/adjust/yes_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ข้อมูลการปรับยอด [ถูกปฏิเสธ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('adjust/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/adjust/reject.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		$content['title'] = 'ปรับยอดสินค้า';
		$content['input_type'] = 'AD';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown();	
		//$content['ticket_type'] = ticket_in_dropdown();	
		$content['inventory_type'] = all_inventory_dropdown();
		$data['content'] = $this->load->view('adjust/add',$content, TRUE);
		
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
			'js/app/adjust/add.js'
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
		
		if($autoid != "")
		{
			//check dup transaction
			if($this->check_tran_dup($autoid, $product_id, $stock_id)){
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
		
		if($result['status'])
		{
			if(!$this->is_reserve($detail))
			{
				$result = array(
					'status'=>false,
					'valid'=>'ยังมีรายการที่มียอดการจองอยู่ ไม่สาม ารถทำการปรับยอดได้'
				);
				
			}	
		}
		
		if($result['status'])
		{
			if(!$this->check_diff_negative($detail))
			{
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามารถทำรายการปรับยอดได้เนื่องจากเมื่อปรับยอดแล้วจะเป็นรายการติดลบ'
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
			$auto_id = $this->adjust_model->insert_main_ticket($main['TK_Code'], $main['TK_ID']);
			$this->adjust_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID']
			);

			echo json_encode($data);
		}else{
			$tid = $main['Transaction_AutoID'];
			$this->adjust_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
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
		
		$this->adjust_model->delete_tran_detail($autoid, $product_id, $stock);
		
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
		$this->db->or_like('Barcode_Main', $text);
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
	
	public function check_save_in($tkid)
	{
		$auto_id = $this->find_tid($tkid);
		$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$auto_id));
		$trans = $query->result_array();
		$result = array(
				'status'=>true,
				'valid'=>''
			);
		
		foreach ($trans as $key => $value) {
			
			if(!$this->check_tran_qty($trans[$key])){
				$result['status'] = false;
				$result['valid'] = 'ไม่สามารถบันทักข้อมูลได้เนื่องสินค้า '.$value['Product_ID'].'ไม่จำนวนไม่พอสำหรับจอง';
			}
			
		}
		
		echo json_encode($result);
	}
	
	public function save_adjust()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->adjust_model->save_adjust($main);
		
	}
	
	//for datatable
	public function get_adjust_all()
	{
		
		$result = $this->adjust_model->get_adjust_all();
		
		$result2 = $this->adjust_model->count_transaction_detail();
		
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
		
		$result = $this->adjust_model->get_no_appv_all();
		
		$result2 = $this->adjust_model->count_transaction_detail();
		
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
		$result = $this->adjust_model->get_yes_appv_all();
		
		$result2 = $this->adjust_model->count_transaction_detail();
		
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
		$result = $this->adjust_model->get_reject_all();
		$result2 = $this->adjust_model->count_transaction_detail();
		
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

	public function get_data()
	{
		$sql = "SELECT *, concat(ticket_code,ticket_id) as ticket 
				FROM tb_stock_ed_rs 
				GROUP BY ticket
				ORDER BY dtime DESC
				";
		
		$local = $this->load->database('local', TRUE);		
				
		$query = $local->query($sql);
		$local->close();
		$in = $query->result_array();
		
		$json = array(
			'data'=>$in
		);
		
		echo json_encode($json);

	}
	
	public function detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการปรับยอดสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('adjust/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>site_url('adjust/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('adjust/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('adjust/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('adjust/reject'),
										'class'=>''
									)
								);
		
		
		$content['transaction'] = $this->adjust_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->adjust_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->adjust_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->adjust_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('adjust/detail',$content, TRUE);
		
		$css = array(
			// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			// 'js/moment/madjust/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/adjust/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_detail($autoid)
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการปรับยอดสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('adjust/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>site_url('adjust/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('adjust/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('adjust/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('adjust/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->adjust_model->get_inventory_transaction($autoid);
		$content['transaction_detail'] = $this->adjust_model->get_transaction_detail($autoid);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->adjust_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->adjust_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		$data['content'] = $this->load->view('adjust/view_detail',$content, TRUE);
		
		$css = array(
			// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			// 'js/moment/madjust/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/adjust/view_detail.js'
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
		 */
		parse_str($_POST['detail_data'], $data);
		
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
				//$transaction_detail = $this->adjust_model->get_each_detail($arr[0],$arr[1],$arr[2]);
				
				//delete transaction detail
				$this->adjust_model->delete_each_detail($arr[0],$arr[1],$arr[2]);
				
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
				
				//get Inventory Detail
				//$inventory = $this->inventory_model->get_product_stock($arr[1], $arr[2]);
				
				//update
				$update = array($arr[3]=>$value);	//data and field to update			
				$where = array(
					'Transact_AutoID'=>$arr[0],
					'Product_ID'=>$arr[1],
					'Effect_Stock_AutoID'=>$arr[2]
				);
				
				
				//print_r($update);
				//print_r($where);
				$this->adjust_model->update_detail($update, $where);
				
				

				//update status to wait approve
				$this->adjust_model->set_status_wait($arr[0]);
								
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

	public function is_reserve_ajax()
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
		 */
		parse_str($_POST['detail_data'], $data);
		
		$temp;
		$res = array(
			'status'=>true,
			'description'=>''
		);
		
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
			
			if($arr[3] == 'QTY_Good')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2],
					'QTY_ReserveGood>'=>0
				);
				
				$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
				
				if($rows>0)
				{
					
					$res['status'] = false;
					$res['description'] = $arr[1].'ยังมียอดการจองอยู่ ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
			if($arr[3] == 'QTY_Waste')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2],
					'QTY_ReserveWaste>'=>0
				);
				
				$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
				
				if($rows>0)
				{
					
					$res['status'] = false;
					$res['description'] = $arr[1].'ยังมียอดการจองอยู่ ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
			if($arr[3] == 'QTY_Damage')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2],
					'QTY_ReserveDamage>'=>0
				);
				
				$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
				
				if($rows>0)
				{
					
					$res['status'] = false;
					$res['description'] = $arr[1].'ยังมียอดการจองอยู่ ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
			
		}//end foreach	
			
		echo json_encode($res);

	}

	public function check_diff_negative_ajax()
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
		 */
		parse_str($_POST['detail_data'], $data);
		
		$temp;
		$res = array(
			'status'=>true,
			'description'=>''
		);
		
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
			
			if($value >= 0)
			{
				continue;
			}
			
			/*
			 * 
			 * if($detail['QTY_Good']<0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID']
			);
			
			$this->db->select('QTY_Good');
			$this->db->where($where);
			$result = $this->db->get('Inventory_Detail')->row_array();
			
			$diff = $result['QTY_Good'] - abs($detail['QTY_Good']);
			
			if($diff<0)
			{
				return FALSE;
			}
			
		}
			 * 
			 * */
			
			if($arr[3] == 'QTY_Good')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2]
				);
				
				$this->db->select('QTY_Good');
				$this->db->where($where);
				$result = $this->db->get('Inventory_Detail')->row_array();
				
				$diff = $result['QTY_Good'] - abs($value);

				
				if($diff<0)
				{
					$res['status'] = false;
					$res['description'] = $arr[1].'ไม่ยอดคงเหลือไม่พอตัด ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
			if($arr[3] == 'QTY_Waste')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2]
				);
				
				$this->db->select('QTY_Waste');
				$this->db->where($where);
				$result = $this->db->get('Inventory_Detail')->row_array();
				
				$diff = $result['QTY_Waste'] - abs($value);

				
				if($diff<0)
				{
					$res['status'] = false;
					$res['description'] = $arr[1].'ไม่ยอดคงเหลือไม่พอตัด ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
			if($arr[3] == 'QTY_Damage')
			{
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2]
				);
				
				$this->db->select('QTY_Damage');
				$this->db->where($where);
				$result = $this->db->get('Inventory_Detail')->row_array();
				
				$diff = $result['QTY_Damage'] - abs($value);

				
				if($diff<0)
				{
					$res['status'] = false;
					$res['description'] = $arr[1].'ไม่ยอดคงเหลือไม่พอตัด ไม่สามารถทำรายการได้';
					
					echo  json_encode($res);
					exit();
				}
			}
			
		}//end foreach	
			
		echo json_encode($res);

	}

	
	
	public function approve($id)
	{
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการปรับยอดสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('adjust/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>site_url('adjust/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('adjust/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('adjust/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('adjust/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->adjust_model->get_inventory_transaction($id);
		$content['transaction_detail'] = $this->adjust_model->get_transaction_detail($id);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->adjust_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->adjust_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('adjust/approve',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/adjust/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_approve($rsid="")
	{
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการปรับยอดสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการปรับยอดสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('adjust/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบปรับยอดสินค้า (ใบใหม่)',
										'link'=>site_url('adjust/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบปรับยอด  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('adjust/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบปรับยอด  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('adjust/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบปรับยอด  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('adjust/reject'),
										'class'=>''
									)
								);
		$content['transaction'] = $this->adjust_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->adjust_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->adjust_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->adjust_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		
		
		$data['content'] = $this->load->view('adjust/view_approve',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/madjust/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/adjust/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function set_reject()
	{
		parse_str($_POST['reject'], $reject);
		
		//check is_reserve again
		$query = $this->db->get_where('Inventory_Transaction_Detail',array('Transact_AutoID'=>$reject['autoid']));
		//echo $this->db->last_query();
		$transaction = $query->result_array();
		
		foreach($transaction as $key=>$value)
		{
			//print_r($transaction[$key]);
			if(!$this->check_diff_negative($transaction[$key]) || !$this->is_reserve($transaction[$key])){
				echo 'error';
				exit();
			}
		}
		
		$result = $this->adjust_model->set_reject_approve($reject);
		
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
		}else{
			$result['Product_Photo'] = $this->config->item('no_img_path');
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
		return $this->adjust_model->notification();
	}
	
	//here
	
	public function save_draft($autoid)
	{
		
		$query = $this->adjust_model->save_draft($autoid);	
		
		if($query)
		{
			echo 'true';
		}else{
			echo 'false';
		}
		
			
	}
	
	public function cancel_all($autoid)
	{
		
		$delete = $this->adjust_model->cancel_in($autoid);
		
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
	
	private function is_exist_rsid($id)
	{
		if($id == "" || $id == NULL){
			return false;	
		}
		
		return $this->adjust_model->is_exist_rsid($id);
	}

	private function gen_rsid()
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
	
	private function check_tran_dup($autoid, $product_id, $stock)
	{
		//$auto_id = $this->find_tid($tkid);
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
	
	private function check_tran_qty($detail)
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
	
	private function is_positive($number)
	{
		if($number<0)
		{
			return false;
		}
		
		return true;
		
	}
	
	private function is_reserve($detail)
	{
			
		if($detail['QTY_Good']!=0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'QTY_ReserveGood>'=>0
			);
			
			$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
			
			if($rows>0)
			{
				return FALSE;
			}
		}
			
		if($detail['QTY_Waste']!=0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'QTY_ReserveWaste>'=>0
			);
			
			$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
			
			if($rows>0)
			{
				return FALSE;
			}
		}
			
		if($detail['QTY_Damage']!=0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'QTY_ReserveDamage>'=>0
			);
			
			$rows = $this->db->get_where('Inventory_Detail', $where)->num_rows();
			
			if($rows>0)
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}

	private function check_diff_negative($detail)
	{
			
		if($detail['QTY_Good']<0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID']
			);
			
			$this->db->select('QTY_Good');
			$this->db->where($where);
			$result = $this->db->get('Inventory_Detail')->row_array();
			
			$diff = $result['QTY_Good'] - abs($detail['QTY_Good']);
			
			if($diff<0)
			{
				return FALSE;
			}
			
		}	
			
		if($detail['QTY_Waste']<0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID']
			);
			
			$this->db->select('QTY_Waste');
			$this->db->where($where);
			$result = $this->db->get('Inventory_Detail')->row_array();
			
			$diff = $result['QTY_Waste'] - abs($detail['QTY_Waste']);
			
			if($diff<0)
			{
				return FALSE;
			}
		}	
			
		if($detail['QTY_Damage']<0)
		{
			$where = array(
				'Product_ID'=>$detail['Product_ID'],
				'Stock_AutoID'=>$detail['Effect_Stock_AutoID']
			);
			
			$this->db->select('QTY_Damage');
			$this->db->where($where);
			$result = $this->db->get('Inventory_Detail')->row_array();
			
			$diff = $result['QTY_Damage'] - abs($detail['QTY_Damage']);
			
			if($diff<0)
			{
				return FALSE;
			}
		}
		
		return TRUE;	
	}
	
}