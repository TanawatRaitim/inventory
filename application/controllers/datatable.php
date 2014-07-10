<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatable extends CI_Controller {
	
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
		$css = array(
				'//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css'
		);
		$js = array(
				'//cdn.datatables.net/1.10.0/js/jquery.dataTables.js',
				'//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js'
		);
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = 'Datatable';
		// $this->data['input_type'] = 'RS';
		$this->data['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'Datatable',
										'link'=>'',
										'class'=>'active'
									)
								);
		
							
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('datatable/main',$this->data,TRUE);
		
		$this->load->view('template/main',$this->data);
	}


	public function get_data()
	{
		// $this->db->select('id_prod, prod_id');
		$query = $this->db->get('product_test');	
		
		$products = $query->result_array();
		// echo '<pre>';
		
		$json = array(
			'data'=>$products
		);
		$products = json_encode($json);
		
	//	echo $products;
		// echo '</pre>';
		// print_r($products);
		echo $products;
	}
	
	public function edit($id)
	{
		echo "edit".$id;
	}
	
	public function delete($id)
	{
		echo "delete".$id;
	}
	

}