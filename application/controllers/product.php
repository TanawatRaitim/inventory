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
		$content['title'] = 'ข้อมูลสินค้า';
		$content['create_text'] = "เพิ่มข้อมูล";
		$content['create_link'] = site_url('product/add');
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ค้นหาข้อมูล',
										'link'=>'all',
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
		$query = $this->db->get('Products');
		$products = $query->result_array();
		
		
		$json = array(
			'data'=>$products
		);
		
		echo json_encode($json);
	}
	
	public function show($id)
	{
		echo $id;
	}
	
	public function edit($id)
	{
		echo $id;
	}
	
	public function delete($id)
	{
		echo $id;
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
								
		$content['department_dropdown'] = department_dropdown();						
		$content['product_type_dropdown'] = product_type_dropdown();	
		$content['product_group_dropdown'] = product_group_dropdown();	
		$content['product_category_dropdown'] = product_category_dropdown();	
		$content['product_frequency_dropdown'] = product_frequency_dropdown();	
		$content['product_register_dropdown'] = product_register_dropdown();	
		$content['inventory_dropdown'] = inventory_dropdown();	
							
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

	public function insert()
	{
		$post = $this->input->post();
		unset($post['save_and_edit']);
		$this->db->insert('Products', $post);
		
	}

	public function select2_product()
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
	
	
	public function get_product_json()
	{
		
		$id = $this->input->post('id');
		$query = $this->db->get_where('Products',array('Product_ID'=>$id));
		$result = $query->row_array();
		
		echo json_encode($result);
	}

	
	

}