<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
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
		$this->data['title'] = 'ข้อมูลสินค้า';
		$this->data['create_text'] = "เพิ่มข้อมูล";
		$this->data['create_link'] = site_url('product/add');
		$this->data['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'ข้อมูลสินค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
		$this->data['content'] = $this->load->view('product/main',$this->data,TRUE);	
		
			
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/product/product.js'
		);
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$this->data);
	}

	public function test()
	{
		echo "big";
	}
	
	public function add()
	{
		$css = array('bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
		$js = array(
			'js/moment/min/moment.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
			);
		
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = "เพิ่มข้อมูลสินค้า";
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('product/add',$this->data,TRUE);
		$this->load->view('template/main',$this->data);
	}

	
	

}