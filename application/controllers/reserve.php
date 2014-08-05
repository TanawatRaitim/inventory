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
		
		$this->output->enable_profiler(TRUE);		
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
								
		$data['content'] = $this->load->view('reserve/add',$content, TRUE);
		
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
	
	public function product_list()
	{
		$text = $this->input->post('q');
		$local = $this->load->database('local', TRUE);
		$local->select('id_prod, prod_id, prod_name, book_num');
		$local->like('prod_id', $text);
		$local->or_like('prod_name',$text);
		$local->or_like('book_num',$text);
		$query = $local->get('product_test');
		
		
		if($query->num_rows()>0)
		{
			$arr = $query->result_array();
			foreach ($arr as $val) {
			//echo $list['prod_name'];
			$list[] = array(
				'id'=>$val['prod_id'],
				'text'=>$val['prod_name'].'#'.$val['book_num']
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
	
	public function customer_list()
	{
		$text = $this->input->post('q');
		$local = $this->load->database('local', TRUE);
		$local->select('id_cust, custname, custtype');
		$local->like('id_cust', $text);
		$local->or_like('custname',$text);
		$local->or_like('custtype',$text);
		$query = $local->get('tb_customer_test');
		
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
	
	public function get_product()
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
	
}