<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_p extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('return_p_model');
	}

	public function all()
	{
		$content['title'] = 'ข้อมูลการรับคืนสินค้าทั้งหมด';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('return/all',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/return/all.js'
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
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('return/no_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/return/no_appv.js'
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
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('return/yes_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/return/yes_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function return_standard_get()
	{
		$content['title'] = "Return Standard";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'Return Standard',
										'link'=>base_url('return_p/return_standard_get'),
										'class'=>'active'
									)
								);
								
		$content['data'] = $this->return_p_model->get_standard_return();
		$content['product_type'] = $this->db->get('Product_Type');
		$content['product_frequency'] = $this->db->get('Product_Frequency');
		$content['return_period'] = $this->db->get('Return_Period');						
		
		$data['content'] = $this->load->view('return/return_standard_get',$content ,TRUE);
		
		
		
		$css = array(
			// 'datatable/media/css/dataTables.bootstrap.css',
			// 'datatable/extensions/TableTools/css/dataTables.tableTools.min.css',
			'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css',
		);
		
		$js = array(
			// 'datatable/media/js/jquery.dataTables.min.js',
			// 'js/jquery_validation/dist/jquery.validate.min.js',
			// 'js/jquery_validation/dist/additional-methods.min.js',
			// 'datatable/media/js/dataTables.bootstrap.js',
			// 'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.js',
			'js/app/return/return_standard_get.js',
			
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
		
	}

	public function standard_post()
	{
		//$_POST['name']
		//$_POST['value']
		//$_POST['pk']
		
		$exp = explode('-', $this->input->post('pk'));
		$type_id = $exp[0];
		$freq_id = $exp[1];
		
		$data = array(
			'Return_Period'=>$this->input->post('value')
		);
		
		$where = array(
			'ProType_ID' => $type_id,
			'ProFreq_ID' => $freq_id
		);
		
		$result = $this->db->update('Return_Standard', $data, $where);
		
		if(!$result)
		{
			echo 'error';
		}
		
		
	}

	public function source_return_period()
	{
		$query = $this->db->get('Return_Period')->result_array();
		
		$period = array();
		
		foreach($query as $val)
		{
			$period[$val['Period_Val']] = $val['Period_Name'];
		}
		
		echo json_encode($period);
	}

	public function reject()
	{
		$content['title'] = 'ข้อมูลการรับคืน [ถูกปฏิเสธ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('return/reject',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/return/reject.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_reject($id)
	{
		$content['title'] = 'แก้ไขใบรับคืนที่ถูกปฏิเสธ ('.get_ticket_code_id($id).')';
		$content['transaction'] = $this->transaction_model->get_transaction($id);
		$content['transaction_detail'] = $this->transaction_model->get_transaction_detail($id);
		$content['input_type'] = 'SR';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('return_p/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>site_url('return_p/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('return_p/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('return_p/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('return_p/reject'),
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown($content['transaction']['DocRef_AutoID']);	
		$content['inventory_type'] = inventory_return_dropdown();
		$data['content'] = $this->load->view('return/edit_reject',$content, TRUE);
		
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
			'js/app/return/edit_reject.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_draft($id)
	{
		$content['title'] = 'แก้ไขแบบร่างใบรับคืนเลขที่ ('.get_ticket_code_id($id).')';
		$content['transaction'] = $this->transaction_model->get_transaction($id);
		$content['transaction_detail'] = $this->transaction_model->get_transaction_detail($id);
		$content['input_type'] = 'SR';
								
		$content['doc_refer'] = doc_refer_dropdown($content['transaction']['DocRef_AutoID']);	
		$content['inventory_type'] = inventory_return_dropdown();
		$data['content'] = $this->load->view('return/edit_draft',$content, TRUE);
		
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
			'js/app/return/edit_draft.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		$content['title'] = 'เปิดใบรับสินค้าคืน (ใบใหม่)';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['inventory_type'] = inventory_return_dropdown();
		$data['content'] = $this->load->view('return/add',$content, TRUE);
		
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
			'js/app/return/add.js'
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
		
		
		echo json_encode($result);

	}

	
	public function check_edit_data()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		$tkid = $main['TK_ID'];
		$autoid = $main['Transaction_AutoID'];
		$tk_code = $main['TK_Code'];
		$product_id = $detail['Product_ID'];
		$stock_id = $detail['Effect_Stock_AutoID'];

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
		
		echo json_encode($result);

	}

	public function insert_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		
		if($main['Transaction_AutoID']=="")
		{
			
			if($this->transaction_model->has_autoid($main['TK_Code'], $main['TK_ID']))
			{
				$auto_id = $this->transaction_model->find_autoid($main['TK_Code'], $main['TK_ID']);	
			}else{
				$auto_id = $this->return_p_model->insert_main_ticket($main['TK_Code'], $main['TK_ID']);	
			}	

			$this->return_p_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID'])
			);

			echo json_encode($data);
		}else{
			$tid = $main['Transaction_AutoID'];
			
			$this->return_p_model->update_main_transaction($tid);
			$this->return_p_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID'])
			);

			echo json_encode($data);	
		}
		
		
	}
	
	public function delete_ticket_detail()
	{
		$autoid = $this->input->post('autoid');
		$product_id = $this->input->post('product_id');
		$stock = $this->input->post('stock');
		
		$this->return_p_model->delete_tran_detail($autoid, $product_id, $stock);
		
		echo 'deleted';
	}
	
	//product->select2_product
	public function product_list()
	{
		$text = $this->input->post('q');
		$this->db->select('Product_AutoID, Product_ID, Product_Name, Product_Vol');
		$this->db->where('RowStatus','ACTIVE');
		$this->db->like('Product_ID', $text);
		$this->db->or_like('Product_Name', $text);
		$this->db->or_like('Product_Vol', $text);
		$this->db->or_like('Barcode_Main', $text);
		$this->db->order_by('Product_Name asc, Product_Vol desc');
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
	
	public function check_save($tkid)
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
	
	public function save()
	{
		parse_str($_POST['main_ticket'], $main);
		
		$this->return_p_model->save($main);
		
	}
	
	public function save_edit_reject()
	{
		parse_str($_POST['main_ticket'], $main);
		
		$this->return_p_model->save_edit_reject($main);
	}
	
	public function get_all()
	{
		
		$result = $this->return_p_model->get_all();
		
		$result2 = $this->return_p_model->count_transaction_detail();
		
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
		
		$result = $this->return_p_model->get_no_appv_all();
		
		$result2 = $this->return_p_model->count_transaction_detail();
		
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
		$result = $this->return_p_model->get_yes_appv_all();
		
		$result2 = $this->return_p_model->count_transaction_detail();
		
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
		$result = $this->return_p_model->get_reject_all();
		$result2 = $this->return_p_model->count_transaction_detail();
		
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
		
		$content['title'] = 'รายละเอียดการรับคืนสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('return_p/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>site_url('return_p/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('return_p/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('return_p/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('return_p/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->return_p_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->return_p_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->return_p_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->return_p_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('return/detail',$content, TRUE);
		
		$css = array(
			'select2/select2-bootstrap-core.css'
			);
		$js = array(
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/return/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_detail($autoid)
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดใบรับคืนสินค้าเลขที่ '.get_ticket_code_id($autoid);
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('return_p/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>site_url('return_p/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('return_p/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('return_p/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('return_p/reject'),
										'class'=>''
									)
								);
		$content['transaction'] = $this->return_p_model->get_inventory_transaction($autoid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($autoid);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->return_p_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->return_p_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		$data['content'] = $this->load->view('return/view_detail',$content, TRUE);
		
		$css = array(
			'select2/select2-bootstrap-core.css',
			);
		$js = array(
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/return/view_detail.js'
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
				$transaction_detail = $this->return_p_model->get_each_detail($arr[0],$arr[1],$arr[2]);
				
				//delete transaction detail
				$this->return_p_model->delete_each_detail($arr[0],$arr[1],$arr[2]);
				
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
				$inventory = $this->inventory_model->get_product_stock($arr[1], $arr[2]);
				
				//update
				$update = array($arr[3]=>$value);	//data and field to update			
				$where = array(
					'Transact_AutoID'=>$arr[0],
					'Product_ID'=>$arr[1],
					'Effect_Stock_AutoID'=>$arr[2]
				);
				
				$this->return_p_model->update_detail($update, $where);

				//update status to wait approve
				$this->return_p_model->set_status_wait($arr[0]);
								
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
		$content['title'] = 'อนุมัติการรับคืนเลขที่ '.get_ticket_code_id($id);
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('return_p/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>site_url('return_p/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('return_p/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('return_p/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('return_p/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->return_p_model->get_inventory_transaction($id);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($id);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->return_p_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->return_p_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('return/approve',$content, TRUE);
		
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
			'js/app/return/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_approve($rsid="")
	{
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการรับคืนสินค้า';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการรับคืนสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url('return_p/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบรับสินค้าคืน (ใบใหม่)',
										'link'=>site_url('return_p/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบรับสินค้าคืน  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url('return_p/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบรับสินค้าคืน  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url('return_p/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบรับสินค้าคืน  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url('return_p/reject'),
										'class'=>''
									)
								);
		
		$content['transaction'] = $this->return_p_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->return_p_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->return_p_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->return_p_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		
		
		$data['content'] = $this->load->view('return/view_approve',$content, TRUE);
		
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
			'js/app/return/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function set_reject()
	{
		parse_str($_POST['reject'], $reject);
		
		$result = $this->return_p_model->set_reject_approve($reject);
		
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
		return $this->return_p_model->notification();
	}
	
	public function save_draft($autoid)
	{
		
		$query = $this->return_p_model->save_draft($autoid);	
		
		if($query)
		{
			echo 'true';
		}else{
			echo 'false';
		}
		
			
	}
	
	public function cancel_all($autoid)
	{
		
		$delete = $this->return_p_model->cancel($autoid);
		
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
	
}