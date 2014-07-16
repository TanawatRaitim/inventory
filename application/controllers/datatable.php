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
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js'
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

	public function main2()
	{
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js'
		);
				
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = 'Datatable & Editing Extension';
		// $this->data['input_type'] = 'RS';
		$this->data['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'Datatable2',
										'link'=>'',
										'class'=>'active'
									)
								);
		
							
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('datatable/main2',$this->data,TRUE);
		
		$this->load->view('template/main',$this->data);
	}


	public function get_data()
	{
		
		$this->db->order_by('id_prod', 'desc');
		$query = $this->db->get('product_test');	
		$products = $query->result_array();
		$json = array(
			'data'=>$products
		);
		$products = json_encode($json);

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
	
	public function show($id)
	{
		echo "show ".$id;
	}
	

}