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

	public function show($id)
	{
		$this->load->model('customer_model');
		
		//$product_id = $this->product_model->get_id_from_autoid($id);
		
		$content['title'] = 'รายละเอียดลูกค้า';

		//get product quantity
		$query = $this->customer_model->get_view($id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีรายละเอียดลูกค้า';
			exit;
		}

		$result = $query->row_array();
		
		if($result['Cust_Map'])
		{
			$result['Cust_Map'] = $this->config->item('specsheet_path').$result['Cust_Map'];
		}
		
		if($result['Cust_Photo'])
		{
			$result['Cust_Photo'] = $this->config->item('salesheet_path').$result['Cust_Photo'];
		}
		
		$content['customer'] = $result;
		
		$data['content'] = $this->load->view('customer/show',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/moment/min/moment.min.js',
			'js/app/customer/show.js'
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
		$content['title'] = "เพิ่มข้อมูลลูกค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มข้อมูลลูกค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
								
		$content['customer_line_dropdown'] = customer_line_dropdown();						
		
		$data['content'] = $this->load->view('customer/add',$content ,TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			//'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/customer/add.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}

	public function add_post()
	{
		$post = $_POST;
	
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowStatus'] = "ACTIVE";
		$post['IsDel'] = "N";
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		$this->db->insert('Customers',$post);
		$auto_id = $this->db->insert_id();
		
		$update_file = array();
		
		if($_FILES['Cust_Photo']['name']){
			$file_name = $this->upload_img($post['Cust_ID'], 'Cust_Photo',$this->config->item('upload_customer_img'));
			$update_file['Cust_Photo'] = $file_name; 
		}
		
		if($_FILES['Cust_Map']['name']){
			$file_name = $this->upload_img($post['Cust_ID'], 'Cust_Map',$this->config->item('upload_customer_map'));
			$update_file['Cust_Map'] = $file_name; 
		}
		
		//update file name to db
		$arr_size = sizeof($update_file);
		
		if($arr_size>0)
		{
			$this->db->where('Cust_AutoID', $auto_id);
			$this->db->update('Customers',$update_file);
		}
		
		redirect('customer/update_get/'.$auto_id, 'refresh');
	}

	public function update_get($id)
	{
		$content['title'] = "แก้ไขข้อมูลลูกค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'แก้ไขข้อมูลลูกค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
								
		$customer = $this->db->get_where('Customers', array('Cust_AutoID'=>$id))->result_array();
		
		$content['customer'] = $customer;						
		$content['customer_line_dropdown'] = customer_line_dropdown($customer[0]['CustLine_ID']);	
							
		$data['content'] = $this->load->view('customer/update_get',$content ,TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/customer/update.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}

	public function update_post()
	{
		$post = $_POST;
		$id = $this->input->post('Cust_AutoID');
		unset($post['Cust_AutoID']);
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		$this->db->where('Cust_AutoID', $id);
		$this->db->update('Customers', $post);
		
		$update_file = array();
		
		if($_FILES['Cust_Photo']['name']){
			$file_name = $this->upload_img($post['Cust_ID'], 'Cust_Photo',$this->config->item('upload_customer_img'));
			$update_file['Cust_Photo'] = $file_name; 
		}
		
		if($_FILES['Cust_Map']['name']){
			$file_name = $this->upload_img($post['Cust_ID'], 'Cust_Map',$this->config->item('upload_customer_map'));
			$update_file['Cust_Map'] = $file_name; 
		}
		
		//update file name to db
		$arr_size = sizeof($update_file);
		
		if($arr_size>0)
		{
			$this->db->where('Cust_AutoID', $id);
			$this->db->update('Customers',$update_file);
		}
		
		redirect('customer/update_get/'.$id, 'refresh');	
	}

	public function check_customer_id($id)
	{
		$rows = $this->db->get_where('Customers', array('Cust_ID'=>$id))->num_rows();
		
		if($rows>0)
		{
			echo 'false';
		}else{
			echo 'true';
		}
		
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
	
	public function upload_img($image_name, $field_name, $path)
	{
			
		$this->load->library('upload');
		
		//dir image
		//user path directory not url
		$dir = $path;
		
		
		//dir thumb
		//user path directory not url
		$dir_thumb = $path."thumbs/";

		//upload image
		$this->load->library('image_lib');
		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $image_name;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		$this->upload->do_upload($field_name);
		$file_data = array('upload_data'=>$this->upload->data());
		
		//create thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image'] = $dir."/".$file_data['upload_data']['file_name'];
		$config['new_image'] = $dir_thumb;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		
		//resize image
		$config['image_library'] = 'gd2';
		$config['source_image'] = $dir."/".$file_data['upload_data']['file_name'];
		$config['new_image'] = $dir;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 161;
		$config['height'] = 211;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		
		return $file_data['upload_data']['file_name'];
			
	}

	public function delete_upload_file($id, $field)
	{
		
		$this->db->where('Cust_AutoID', $id);
		$res = $this->db->update('Customers', array($field=>NULL));
		
		if(!$res){
			echo 'false';
		}else{
			echo 'true';
		}
		
	}
	
	

}