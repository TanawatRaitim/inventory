<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
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
	
	public function main()
	{
		$content['title'] = 'ค้นหาข้อมูล';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'main',
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

		$data['content'] = $this->load->view('search/main',$content, TRUE);
		
		$css = array(
			//'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css'
			//'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			// 'js/moment/min/moment.min.js',
			// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'js/app/reserve/reserve_all.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function product()
	{
		$content['title'] = 'ค้นหาข้อมูลสินค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'main',
										'class'=>''
									),
									1 => array(
										'name'=>'ค้นหาข้อมูลสินค้า',
										'link'=>'product',
										'class'=>'active'
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

		$data['content'] = $this->load->view('search/product',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/app/search/product.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function customer()
	{
		$content['title'] = 'ค้นหาข้อมูลลูกค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'main',
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

		$data['content'] = $this->load->view('search/customer',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/app/search/customer.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_product_datatable()
	{
		$this->load->model('product_model');
		$query = $this->product_model->datatable();
		$products = $query->result_array();
		
		$json = array(
			'data'=>$products
		);
		
		echo json_encode($json);
	}

	
	public function get_customer_datatable()
	{
		$this->load->model('customer_model');
		$query = $this->customer_model->datatable();
		$customers = $query->result_array();
		
		// print_r($customers);
		
		$json = array(
			'data'=>$customers
		);
		
		echo json_encode($json);
	}

	
	
}