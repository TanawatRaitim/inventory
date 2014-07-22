<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		
	}
	
	public function index()
	{
		//initial content	
			
		$this->data['title'] = 'ข้อมูลลูกค้า';
		$this->data['create_text'] = "เพิ่มข้อมูล";
		$this->data['create_link'] = site_url('customer/add');
		$this->data['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'ข้อมูลลูกค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
		
		$this->data['content'] = $this->load->view('customer/main',$this->data,TRUE);	
		
			
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
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$this->data);
	}

	public function get_data()
	{
		
		$this->db->order_by('id_customer', 'desc');
		$query = $this->db->get('tb_customer_test');	
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
	

	
	

}