<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('reserve_model');
	}
	
	public function index()
	{
		
		$content['title'] = 'ข้อมูล การจอง';
		$content['create_text'] = "เพิ่มข้อมูล";
		$content['create_link'] = site_url('reserve/add');
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'การจอง',
										'link'=>'',
										'class'=>'active'
									)
								);
		
		$data['content'] = $this->load->view('reserve/main',$content ,TRUE);		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/reserve.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function all()
	{
		$content['title'] = 'ข้อมูลการจองสินค้าทั้งหมด';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/all',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ใบจองสินค้า [รออนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/no_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/no_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ใบจองสินค้า [ผ่านอนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/yes_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/yes_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ใบจองสินค้า [ถูกปฏิเสธ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('reserve/reject',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/reject.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		$content['title'] = 'จองสินค้า  (RS)';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['ticket_type'] = ticket_dropdown();	
		$content['inventory_type'] = inventory_dropdown();
		$data['content'] = $this->load->view('reserve/add',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/reserve/reserve_add.js'
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
		$product_id = $detail['Product_ID'];
		$stock_id = $detail['Effect_Stock_AutoID'];
		
		if($tkid == "")
		{
			
			if($this->check_tran_qty($detail)){
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
			
		}else{
			
			if($this->check_tran_dup($tkid, $product_id, $stock_id))
			{
				if($this->check_tran_qty($detail)){
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

	public function insert_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		
		if($this->is_exist_rsid($main['TK_ID']))
		{
			//find transac_autoID from TKID
			$tid = $this->find_tid($main['TK_ID']);
			$this->reserve_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID']
			);

			echo json_encode($data);
		}else{
			
			$rs_id = $this->gen_rsid();
			$auto_id = $this->reserve_model->insert_main_ticket($rs_id);
			$this->reserve_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$rs_id,
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID']
			);

			echo json_encode($data);
			
		}
	}
	
	public function delete_ticket_detail()
	{
		//print_r($this->input->post());
		
		
		$autoid = $this->input->post('autoid');
		$product_id = $this->input->post('product_id');
		$stock = $this->input->post('stock');
		
		$this->reserve_model->delete_tran_detail($autoid, $product_id, $stock);
		
		echo 'deleted';
	}
	
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
	
	public function get_product()
	{
		
		$id = $this->input->post('id');
		$query = $this->db->get_where('Products',array('Product_ID'=>$id));
		$result = $query->row_array();
		/*
		$arr = array(
			'a'=>'a',
			'b'=>'b',
			'c'=>'c',
			'd'=>'d'
		);
		
		$result['test'] = $arr;
		 * */
		echo json_encode($result);
	}
	
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
	
	public function get_customer()
	{
		$id = $this->input->post('id');
		$query = $this->db->get_where('Customers', array('Cust_ID'=>$id));

		echo json_encode($query->row_array());
	}
	
	public function check_save_rs($tkid)
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
	
	public function save_rs()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->reserve_model->save_rs($main);
		
	}
	
	public function get_product2()
	{
		
		$local = $this->load->database('local', TRUE);		
		$local->select('id_prod, prod_id, prod_name');
		$query = $local->get('product_test');
		$local->close();
		$list = '';
		
		foreach($query->result_array() as $row){
			$list .= "<option value='".$row['id_prod']."'>".$row['prod_id']."-".$row['prod_name']."</option>";
		}
		
		return $list;
	}
	
	public function get_rs_all()
	{
		$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
		$this->db->from('Inventory_Transaction');
		$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
		$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
		$this->db->where('IsDraft', 0);
		//$this->db->where('IsApproved', 0);
		//$this->db->or_where('IsApproved', 1);
		$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
		
		$query = $this->db->get();
		$result = $query->result_array();
		$sql = "select Inventory_Transaction_Detail.Transact_AutoID, COUNT(Inventory_Transaction_Detail.Transact_AutoID)as count_a
				from Inventory_Transaction_Detail
				group by Transact_AutoID	
				";
		$query2 = $this->db->query($sql);
		$result2 = $query2->result_array();
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
		$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
		$this->db->from('Inventory_Transaction');
		$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
		$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
		$this->db->where('IsDraft', 0);
		$this->db->where('IsApproved', 0);
		$this->db->where('IsReject', 0);
		$this->db->where('Inventory_Transaction.RowStatus','active');
		$this->db->where('Inventory_Transaction.IsDel',0);
		//$this->db->or_where('IsApproved', 1);
		$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
		
		$query = $this->db->get();
		$result = $query->result_array();
		$sql = "select Inventory_Transaction_Detail.Transact_AutoID, COUNT(Inventory_Transaction_Detail.Transact_AutoID)as count_a
				from Inventory_Transaction_Detail
				group by Transact_AutoID	
				";
		$query2 = $this->db->query($sql);
		$result2 = $query2->result_array();
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
		$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
		$this->db->from('Inventory_Transaction');
		$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
		$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
		$this->db->where('IsDraft', 0);
		$this->db->where('IsApproved', 1);
		$this->db->where('IsReject', 0);
		$this->db->where('Inventory_Transaction.RowStatus','active');
		$this->db->where('Inventory_Transaction.IsDel',0);
		//$this->db->or_where('IsApproved', 1);
		$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
		
		$query = $this->db->get();
		$result = $query->result_array();
		$sql = "select Inventory_Transaction_Detail.Transact_AutoID, COUNT(Inventory_Transaction_Detail.Transact_AutoID)as count_a
				from Inventory_Transaction_Detail
				group by Transact_AutoID	
				";
		$query2 = $this->db->query($sql);
		$result2 = $query2->result_array();
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
		$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar,Inventory_Transaction.RowCreatedDate,22) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
		$this->db->from('Inventory_Transaction');
		$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
		$this->db->join('Ticket_Type','Ticket_Type.TK_TypeAutoID = Inventory_Transaction.Transaction_For','left');
		$this->db->where('IsDraft', 0);
		$this->db->where('IsReject', 1);
		$this->db->where('IsApproved', 0);
		$this->db->where('Inventory_Transaction.RowStatus','active');
		$this->db->where('Inventory_Transaction.IsDel',0);
		
		//$this->db->or_where('IsApproved', 1);
		$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
		
		$query = $this->db->get();
		$result = $query->result_array();
		$sql = "select Inventory_Transaction_Detail.Transact_AutoID, COUNT(Inventory_Transaction_Detail.Transact_AutoID)as count_a
				from Inventory_Transaction_Detail
				group by Transact_AutoID	
				";
		$query2 = $this->db->query($sql);
		$result2 = $query2->result_array();
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
		$reserve = $query->result_array();
		
		$json = array(
			'data'=>$reserve
		);
		
		echo json_encode($json);

	}
	
	public function detail($rsid="")
	{
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$this->db->select('*, Inventory_Transaction.RowCreatedDate as created_date');
		$this->db->from('Inventory_Transaction');
		$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID');
		$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson');
		$this->db->where(array('TK_Code'=>'RS','TK_ID'=>$rsid));
		
		$content['transaction'] = $this->db->get()->row_array();
		
		$this->db->select('*');
		$this->db->from('Inventory_Transaction_Detail');
		$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
		$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
		$this->db->where(array('Transact_AutoID'=>$content['transaction']['Transact_AutoID']));
		
		$content['transaction_detail'] = $this->db->get()->result_array();
		
		$content['customer'] = $this->db->get_where('Customers',array('Cust_ID'=>$content['transaction']['Cust_ID']))->row_array();
		
		$data['content'] = $this->load->view('reserve/detail',$content, TRUE);
		
		$css = array(
			// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			// 'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/reserve/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_detail()
	{
		//update qty transaction
		//update qty, qtyremain Inventory_detail
		
		
		parse_str($_POST['detail_data'], $data);


		/**
		 * $arr[0] = Transact_AutoID
		 * $arr[1] = Product_ID
		 * $arr[2] = Effect_Stock_AutoID
		 * $arr[3] = Field to update
		 * $arr[4] = qty before update
		 * 
		 */		
		foreach ($data as $key => $value) {

			$arr = explode(',', $key);
			
			$diff = $arr[4] - $value;
			
			if($diff>0){
				
				//get Inventory Detail
				$where = array(
					'Product_ID'=>$arr[1],
					'Stock_AutoID'=>$arr[2]
				);
				
				$inventory = $this->db->get_where('Inventory_Detail', $where)->row_array();
				
				//update
				$update = array($arr[3]=>$value);	//data and field to update
			
				$where = array(
					'Transact_AutoID'=>$arr[0],
					'Product_ID'=>$arr[1],
					'Effect_Stock_AutoID'=>$arr[2]
				);
				
				$this->db->where($where);
				$this->db->update('Inventory_Transaction_Detail', $update);
				
				if($arr[3] == 'QTY_Good'){
					
					$update_inventory = array(
						'QTY_ReserveGood'=>$inventory['QTY_ReserveGood'] - $diff,
						'QTY_RemainGood'=>$inventory['QTY_RemainGood'] + $diff,
					);
					
					$this->db->where('RecNo', $inventory['RecNo']);
					$this->db->update('Inventory_Detail', $update_inventory);
					
				}
				
				if($arr[3] == 'QTY_Waste'){
					
					$update_inventory = array(
						'QTY_ReserveWaste'=>$inventory['QTY_ReserveWaste'] - $diff,
						'QTY_RemainWaste'=>$inventory['QTY_RemainWaste'] + $diff,
					);
					
					$this->db->where('RecNo', $inventory['RecNo']);
					$this->db->update('Inventory_Detail', $update_inventory);
				}
				
				if($arr[3] == 'QTY_Damage'){
					
					$update_inventory = array(
						'QTY_ReserveDamage'=>$inventory['QTY_ReserveDamage'] - $diff,
						'QTY_RemainDamage'=>$inventory['QTY_RemainDamage'] + $diff,
					);
					
					$this->db->where('RecNo', $inventory['RecNo']);
					$this->db->update('Inventory_Detail', $update_inventory);
				}
				
				//update status to wait approve
				
				$update_status = array(
					'IsApproved'=>0,
					'IsReject'=>0
				);
				
				
			}
		}//end foreach
		
		echo 'true';

	}
	
	public function approve($rsid="")
	{
		$content['title'] = 'อนุมัติการจองสินค้า';
		
		//$content['transaction'] = $this->db->get_where('Inventory_Transaction',array('TK_Code'=>'RS','TK_ID'=>$rsid))->row_array();
		$this->db->select('*, Inventory_Transaction.RowCreatedDate as created_date');
		$this->db->from('Inventory_Transaction');
		$this->db->join('DocRefer', 'DocRefer.DocRef_AutoID = Inventory_Transaction.DocRef_AutoID');
		$this->db->join('Employees', 'Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson');
		$this->db->where(array('TK_Code'=>'RS','TK_ID'=>$rsid));
		
		$content['transaction'] = $this->db->get()->row_array();
		
	
		$this->db->select('*');
		$this->db->from('Inventory_Transaction_Detail');
		$this->db->join('Products', 'Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
		$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID', 'left');
		$this->db->where(array('Transact_AutoID'=>$content['transaction']['Transact_AutoID']));
		
		$content['transaction_detail'] = $this->db->get()->result_array();
		
		
		$content['customer'] = $this->db->get_where('Customers',array('Cust_ID'=>$content['transaction']['Cust_ID']))->row_array();
		
		$data['content'] = $this->load->view('reserve/approve',$content, TRUE);
		
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
			'js/app/reserve/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function set_reject()
	{
		parse_str($_POST['reject'], $reject);
		
		//print_r($this->session->all_userdata());
		
		if($reject['is_rejected'] == 0)
		{
			$approved = 1;
			$reject['Reject_Remark'] = '';
		}else{
			$approved = 0;
			
		}
		
		$data = array(
			'IsReject'=>$reject['is_rejected'],
			'IsApproved'=>$approved,
			'Reject_Remark'=>$reject['Reject_Remark'],
			'RejectBy'=>$this->session->userdata('Emp_ID'),
			'RejectDate'=>date("Y/m/d h:i:s")
		);
		
		$where = array(
			'TK_Code'=>'RS',
			'TK_ID'=>$reject['rsid']
		);
		
		$this->db->where($where);
		$query = $this->db->update('Inventory_Transaction', $data);
		
		if($query){
			echo 'true';
		}else{
			echo 'false';
		}
		
		
	}

	public function editable()
	{
		// print_r($_POST);
	}
	
	public function insert()
	{
		
	}
	
	public function table_qty($product_id)
	{
		$query = $this->db->get_where('Products', array("Product_ID"=>$product_id), 1);
		
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
		$this->db->select('*');
		$this->db->from('Inventory_Detail');
		$this->db->join('Inventory', 'Inventory.Stock_AutoID = Inventory_Detail.Stock_AutoID');
		$this->db->where('Inventory_Detail.Product_ID', $product_id);
		$query = $this->db->get();
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
	
	public function test_function()
	{

		
	}

	private function get_notification()
	{
		$notification = array(
			'all' => $this->db->get_where('Inventory_Transaction', array('TK_Code'=>'RS', 'IsDraft='=>0, 'RowStatus'=>'active','IsDel'=>0))->num_rows(),
			'wait' => $this->db->get_where('Inventory_Transaction', array('IsApproved'=>0, 'IsDraft='=>0, 'IsReject='=>0, 'RowStatus'=>'active','IsDel'=>0))->num_rows(),
			'approved' => $this->db->get_where('Inventory_Transaction', array('IsApproved'=>1, 'IsDraft='=>0, 'IsReject'=>0, 'RowStatus'=>'active','IsDel'=>0))->num_rows(),
			'rejected' => $this->db->get_where('Inventory_Transaction', array('IsReject'=>1, 'IsDraft='=>0, 'IsApproved'=>0, 'RowStatus'=>'active','IsDel'=>0))->num_rows()
		);
		return $notification;
	}
	
	public function save_draft($tkid)
	{
		$where = array(
				"TK_Code" => "RS",
				"TK_ID" => $tkid
			);
		$update = array(
			"IsDraft"=>1	
			);	
		$this->db->where($where);
		$query = $this->db->update('Inventory_Transaction', $update);	
		
		if($query)
		{
			echo 'true';
		}else{
			echo 'false';
		}
		
			
	}
	
	public function cancel_all($tkid)
	{
		$autoid = $this->find_tid($tkid);
		$table = array('Inventory_Transaction', 'Inventory_Transaction_Detail');
		$this->db->where('Transact_AutoID',$autoid);
		$delete = $this->db->delete($table);
		
		if($delete){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	private function is_exist_rsid($id)
	{
		if($id == "" || $id == NULL){
			return false;	
		}
		
		return $this->reserve_model->is_exist_rsid($id);
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
	
	private function check_tran_dup($tkid, $product_id, $stock)
	{
		$auto_id = $this->find_tid($tkid);
		
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