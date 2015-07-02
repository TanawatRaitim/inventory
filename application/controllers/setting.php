<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	
	
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

	public function transport_get($id = false)
	{
		$content['title'] = "เพิ่มข้อมูลผู้ขนส่ง";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มขนส่งใหม่',
										'link'=>base_url('setting/transport_get'),
										'class'=>''
									)
								);
		
		$content['data_header'] = 'รายชื่อขนส่งในระบบ';
		$content['name_label'] = 'ชื่อขนส่ง';
		$content['name_placeholder'] = 'Transport Name';						
		
		if($id)
		{
			//update
			$data_set = $this->db->get_where('Transport', array('Trans_ID'=>$id))->row_array();
			$content['data'] = $data_set;
			$content['form_action'] = 'setting/transport_edit_post';
			$content['form_name'] = 'form_edit';
			$content['form_header'] = '<h1>แก้ไข  <small>"'.$data_set['Trans_Name'].'"</small></h1>';
			$content['button_new'] = 'เพิ่มใหม่';
			$content['submit_text'] = 'แก้ไข';
			
		}else{
			//add new
			$content['form_action'] = 'setting/transport_post';
			$content['form_name'] = 'form_add';
			$content['form_header'] = '<h1>เพิ่มขนส่งใหม่</h1>';
			$content['submit_text'] = 'บันทึก';
			
		}
		
		$data['content'] = $this->load->view('setting/transport_get',$content ,TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css',
		);
		
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/setting/transport_get.js'
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function check_transport_name($type = 'add')
	{
		
		if($type == 'edit')
		{
			//for check edit data
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			$this->db->where('Trans_Name', $name);
			$this->db->where('Trans_ID !=', $id);
			$query = $this->db->get('Transport');
			
		}else{
			//for check add new
			$name = $this->input->post('name');
			$this->db->where('Trans_Name', $name);
			$query = $this->db->get('Transport');
				
		}

		if($query->num_rows() > 0)
		{
			echo 'false';
		}else{
			echo 'true';
		}

	}

	public function get_transport_datatable()
	{

		$this->db->order_by('Trans_ID', 'desc');
		$query = $this->db->get('Transport');
		
		$data = $query->result_array();
		
		$json = array(
			'data'=>$data
		);
		
		echo json_encode($json);
	}

	public function transport_post()
	{
		$post = $_POST;
		
		if($post['Trans_Name'] == "")
		{
			redirect('setting/transport_get', 'refresh');
			exit();
		}
		
		
		
		$this->db->insert('Transport', $post);
		
		redirect('setting/transport_get', 'refresh');
	}

	public function transport_edit_post()
	{
		$post = $_POST;
		
		if($post['Trans_Name'] == "")
		{
			redirect('setting/transport_get/', 'refresh');
			exit();
		}
		
		$id = $post['Trans_ID'];
		unset($post['Trans_ID']);
		
		$this->db->where('Trans_ID', $id);
		$this->db->update('Transport', $post);
		redirect('setting/transport_get', 'refresh');
		
	}
	
	

}