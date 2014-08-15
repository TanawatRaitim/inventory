<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends CI_Controller {
	
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
		$this->load->model('reserve_model');
	}
	
	public function index()
	{
		// $this->output->enable_profiler(TRUE);
		//initial content	
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการจองสินค้า',
										'link'=>'#',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบจองสินค้า  [รออนุมัติ] (21)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/all',$content, TRUE);
		
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
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ใบจองสินค้า [รออนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการจองสินค้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบจองสินค้า  [รออนุมัติ] (10)',
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/no_appv',$content, TRUE);
		
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
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ใบจองสินค้า [ผ่านอนุมัติ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการจองสินค้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบจองสินค้า  [รออนุมัติ] (10)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/yes_appv',$content, TRUE);
		
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
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ใบจองสินค้า [ถูกปฏิเสธ]';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการจองสินค้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>'ใบจองสินค้า  [รออนุมัติ] (10)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] (5)',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('reserve/reject',$content, TRUE);
		
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
			'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		// $this->output->enable_profiler(TRUE);		
		$content['title'] = 'จองสินค้า  (RS)';
		$content['input_type'] = 'RS';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการจองสินค้า',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ใบจองสินค้า  [รออนุมัติ] (10)',
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] (15)',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] (5)',
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
			'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/reserve/reserve_add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function select2()
	{
			// echo "big";
			// echo $_POST['q'];
			
			$answer[] = array(
				'id'=>1,
				'text'=>'test'
			);
			
			echo json_encode($answer);
			
	}

	public function insert_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		//parse_str($_POST['ticket_detail'], $detail);
		
		
		if($this->is_exist_rsid($main['TK_ID']))
		{
			//find transac_autoID from TKID
			$tid = $this->find_tid($main['TK_ID']);
			$this->reserve_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid
			);

			echo json_encode($data);
		}else{
			
			$rs_id = $this->gen_rsid();
			$auto_id = $this->reserve_model->insert_main_ticket($rs_id);
			$this->reserve_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$rs_id,
				'Transact_AutoID'=>$auto_id
			);

			echo json_encode($data);
			
		}
	}
	
	public function delete_ticket_detail()
	{
			
	}
	
	public function product_list()
	{
		$text = $this->input->post('q');
		$local = $this->load->database('local', TRUE);
		$local->select('id_prod, prod_id, prod_name, book_num');
		$local->like('prod_id', $text);
		$local->or_like('prod_name',$text);
		$local->or_like('book_num',$text);
		$query = $local->get('product_test');
		$local->close();
		
		if($query->num_rows()>0)
		{
			$arr = $query->result_array();
			foreach ($arr as $val) {
			//echo $list['prod_name'];
			$list[] = array(
				'id'=>$val['prod_id'],
				'text'=>$val['prod_name'].'#'.$val['book_num']
				// 'present'=>$val['prod_id']
				//extra text
				// 'extra'=>'extra'
				);
		}	
		}else{
			$list[] = array(
				'id'=>'none',
				'text'=>''
			);	
		}
		
		echo json_encode($list);
		
	}
	
	public function get_product()
	{
		$id = $this->input->post('id');
		$local = $this->load->database('local', TRUE);
		
		//$local->select('id_prod, prod_id, prod_name, book_num');
		// $local->like('prod_id', $text);
		//$local->or_like('prod_name',$text);
		//$local->or_like('book_num',$text);
		$query = $local->get_where('product_test', array('prod_id'=>$id));
		$local->close();
		echo json_encode($query->row_array());
	}
	
	public function customer_list()
	{
		$text = $this->input->post('q');
		$local = $this->load->database('local', TRUE);
		$local->select('id_customer, id_cust, custname, custtype');
		$local->like('id_cust', $text);
		$local->or_like('custname',$text);
		$local->or_like('custtype',$text);
		$query = $local->get('tb_customer_test');
		$local->close();
		
		
		if($query->num_rows()>0)
		{
			$arr = $query->result_array();
			foreach ($arr as $val) {
			$list[] = array(
				'id'=>$val['id_cust'],
				'text'=>$val['custname'].'('.$val['custtype'].')'
				);
			}	
		}else{
			$list[] = array(
				'id'=>'none',
				'text'=>''
			);	
		}
		
		echo json_encode($list);
		
	}
	
	public function get_customer()
	{
		$id = $this->input->post('id');
		$local = $this->load->database('local', TRUE);
		
		//$local->select('id_prod, prod_id, prod_name, book_num');
		// $local->like('prod_id', $text);
		//$local->or_like('prod_name',$text);
		//$local->or_like('book_num',$text);
		$query = $local->get_where('tb_customer_test', array('id_cust'=>$id));
		$local->close();
		echo json_encode($query->row_array());
	}
	
	
	
	public function get_product2()
	{
		
		$local = $this->load->database('local', TRUE);		
		
		$local->select('id_prod, prod_id, prod_name');
		$query = $local->get('product_test');
				
		$local->close();
		
		$list = '';
		foreach($query->result_array() as $row){
			//echo $row['prod_id'];
			//echo '<br />';
			$list .= "<option value='".$row['id_prod']."'>".$row['prod_id']."-".$row['prod_name']."</option>";
		}
		//print_r($list);
		
		//return $query->result_array();
		return $list;
		
			
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
	
	public function detail()
	{
		$content['title'] = 'รายละเอียดการจองสินค้า';
		// $content['input_type'] = 'SA';
		$data['content'] = $this->load->view('reserve/detail',$content, TRUE);
		
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
			'js/app/reserve/reserve_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function approve()
	{
		$content['title'] = 'อนุมัติการจองสินค้า';
		// $content['input_type'] = 'SA';
		$data['content'] = $this->load->view('reserve/approve',$content, TRUE);
		
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
			'js/app/reserve/reserve_approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function editable()
	{
		// print_r($_POST);
	}
	
	public function insert()
	{
		
	}
	
	public function test_function()
	{
		
		//$query = $this->reserve_model->is_exist_rsid('20');
		//echo '<br />';
		//$this->gen_rsid();
		//echo date('d-m-y');
		//$create_date = date("Y/m/d h:i:s");//hh:mm:ss
		echo '<pre>';
		print_r($this->session->userdata('Emp_ID'));
		echo '</pre>';
		
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
	
}