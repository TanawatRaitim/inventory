<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	private $data;
	
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
		//initial content	
			
		$content['title'] = 'ข้อมูลลูกค้า';
		$content['create_text'] = "เพิ่มข้อมูล";
		$content['create_link'] = site_url('customer/add');
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'all',
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
									),
									3 => array(
										'name'=>'ค้นหาข้อมูล Ticket',
										'link'=>'ticket',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('customer/main',$content,TRUE);	
		
			
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/customer/customer.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_data()
	{
		$local = $this->load->database('local', TRUE);	
		$local->order_by('id_customer', 'desc');
		$query = $local->get('tb_customer_test');	
		$local->close();
		$customers = $query->result_array();
		$json = array(
			'data'=>$customers
		);
		$customers = json_encode($json);

		echo $customers;
	}
	
	public function add()
	{
		$css = array(
			//'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
			);
		$js = array(
			//'js/moment/min/moment.min.js',
			//'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/app/customer/customer_add.js'
			);
		
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = "เพิ่มข้อมูลลูกค้า";
		$this->data['content'] = $this->load->view('customer/add',$this->data,TRUE);
		
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$this->data);
	}
	
	
	public function select2_customer()
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
	
	

}