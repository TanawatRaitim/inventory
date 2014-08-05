<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
	
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
		$content['title'] = 'ข้อมูลสินค้า';
		$content['create_text'] = "เพิ่มข้อมูล";
		$content['create_link'] = site_url('product/add');
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'ค้นหาข้อมูลสินค้า',
										'link'=>'product',
										'class'=>''
									),
									2 => array(
										'name'=>'ค้นหาข้อมูลลูกค้า',
										'link'=>'customer',
										'class'=>''
									),
									3 => array(
										'name'=>'ค้นหาข้อมูล Ticket',
										'link'=>'ticket',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('product/main', $content,TRUE);	
		
			
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
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function get_data()
	{
		//$this->load->library('product_b');
		
		//$products = $this->product_b->get_all_json();
		
		//echo $products;
		
		$local = $this->load->database('local', TRUE);
		$query = $local->get('product_test');
		$local->close();
		$products = $query->result_array();
		
		$json = array(
			'data'=>$products
		);
		
		echo json_encode($json);

		
	}
	
	public function add()
	{
		// $this->output->enable_profiler(TRUE);
		$content['title'] = "เพิ่มข้อมูลสินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มข้อมูลสินค้าสินค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
		$data['content'] = $this->load->view('product/add',$content ,TRUE);
		
		
		$css = array(
				'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
				'js/alertify/themes/alertify.core.css',
				'js/alertify/themes/alertify.default.css'
				//change to noty
				);
		$js = array(
			'js/moment/min/moment.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/alertify/lib/alertify.min.js',
			//change to noty
			'js/app/product/product_add.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}

	
	

}