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
		$this->load->model('product_model');
		
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

	public function show($id)
	{
		$this->load->model('inventory_model');
		
		$product_id = $this->product_model->get_id_from_autoid($id);
		
		$content['title'] = 'รายละเอียดสินค้า';

		//get product quantity
		$query = $this->product_model->get_view($id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีรายละเอียดสินค้า';
			exit;
		}

		$result = $query->row_array();
		
		$result['total_sa'] = $this->product_model->get_product_sa($result['Product_ID']);
		$result['total_sc'] = $this->product_model->get_product_sc($result['Product_ID']);
		
		if($result['Product_SpecSheet'])
		{
			$result['Product_SpecSheet'] = $this->config->item('specsheet_path').$result['Product_SpecSheet'];
		}
		
		if($result['Product_SaleSheet'])
		{
			$result['Product_SaleSheet'] = $this->config->item('salesheet_path').$result['Product_SaleSheet'];
		}
		
		if($result['Product_DocOther'])
		{
			$result['Product_DocOther'] = $this->config->item('docother_path').$result['Product_DocOther'];
		}
		
		if($result['Product_Photo'])
		{
			$result['Product_Photo'] = $this->config->item('productimg_path').$result['Product_Photo'];
		}else{
			$result['Product_Photo'] = $this->config->item('no_img_path');
		}
		
		$content['product'] = $result;
		
		$content['premium'] = $this->product_model->get_all_product_premium($result['Product_ID']);
		
		$query = $this->inventory_model->get_all_stock($product_id);
		$content['inventory'] = $query->result_array();
		
		$total = array(
						'good'=>0,
						'reserve_good'=>0,
						'remain_good'=>0,
						'waste'=>0,
						'reserve_waste'=>0,
						'remain_waste'=>0,
						'damage'=>0,
						'reserve_damage'=>0,
						'remain_damage'=>0
					);
		
		foreach ($content['inventory'] as $value) {
			$total['good'] += $value['QTY_Good'];
			$total['reserve_good'] += $value['QTY_ReserveGood']; 
			$total['remain_good'] += $value['QTY_RemainGood']; 
			$total['waste'] += $value['QTY_Waste']; 
			$total['reserve_waste'] += $value['QTY_ReserveWaste']; 
			$total['remain_waste'] += $value['QTY_RemainWaste']; 
			$total['damage'] += $value['QTY_Damage']; 
			$total['reserve_damage'] += $value['QTY_ReserveDamage']; 
			$total['remain_damage'] += $value['QTY_RemainDamage']; 
		}
		
		$content['total'] = $total;
		
		
		$data['content'] = $this->load->view('product/show',$content, TRUE);
		
		$css = array(
			'datatable/media/css/dataTables.bootstrap.css',
			'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
			);
		$js = array(
			'datatable/media/js/jquery.dataTables.min.js',
			'datatable/media/js/dataTables.bootstrap.js',
			'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
			'js/moment/min/moment.min.js',
			'js/app/product/show.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_product_transaction($id)
	{
		//echo $id;
		$result = $this->product_model->get_product_transaction($id);
		
		//print_r($result);
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}
	
	//for datatable
	public function get_data()
	{
		$query = $this->db->get('Products');
		$products = $query->result_array();
		
		
		$json = array(
			'data'=>$products
		);
		
		echo json_encode($json);
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
		$content['product_status_dropdown'] = product_status_dropdown('ACTIVE');	
		$content['age_return_dropdown'] = age_return_dropdown();	
		$content['age_inventory_dropdown'] = age_inventory_dropdown();	
		$content['age_sale_dropdown'] = age_sale_dropdown();
		$content['monitor_status_dropdown'] = monitor_status_dropdown();	
							
		$data['content'] = $this->load->view('product/add',$content ,TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/product/add.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}

	public function insert()
	{
		$post = $_POST;
		unset($post['btn_save']);
		
		if($post['Manufact_StartDate']!==""){
			$post['Manufact_StartDate'] = convert_date_to_mssql($post['Manufact_StartDate']);
		}
		
		if($post['Manufact_EndDate']!=="")
		{
			$post['Manufact_EndDate'] = convert_date_to_mssql($post['Manufact_EndDate']);
			
		}
		
		
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['IsDel'] = "N";
		
		//get return expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_AverageReturn'] != 0)
		{
			$date_return = strtotime("+".$post['Age_AverageReturn']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireReturn'] = date("Y-m-d",$date_return);
		}else{
			$post['Age_ExpireReturn'] = NULL;
		}
		//get inventory expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_Inventory'] != 0){
			$date_inventory = strtotime("+".$post['Age_Inventory']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireInventory'] = date("Y-m-d",$date_inventory);
		}else{
			$post['Age_ExpireInventory'] = NULL;
		}
		//get sale expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_Sale'] != 0){
			$date_sale = strtotime("+".$post['Age_Sale']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireSale'] = date("Y-m-d",$date_inventory);
		}else{
			$post['Age_ExpireSale'] = NULL;
		}
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		$this->db->insert('Products',$post);
		$auto_id = $this->db->insert_id();
		
		//create inventory
		
		//get all inventory
		$inventories = $this->db->get('Inventory')->result_array();
		
		//create each inventory
		foreach($inventories as $inventory)
		{
			$insert = array(
				'Stock_AutoID'=>$inventory['Stock_AutoID'],
				'Product_ID'=>$post['Product_ID'],
				'QTY_Good'=>0,
				'QTY_ReserveGood'=>0,
				'QTY_RemainGood'=>0,
				'QTY_Waste'=>0,
				'QTY_ReserveWaste'=>0,
				'QTY_RemainWaste'=>0,
				'QTY_Damage'=>0,
				'QTY_ReserveDamage'=>0,
				'QTY_RemainDamage'=>0,
				'RowCreatedDate'=>date("Y/m/d h:i:s"),
				'RowCreatedPerson'=>$this->session->userdata('Emp_ID'),
				'RowUpdatedDate'=>date("Y/m/d h:i:s"),
				'RowUpdatedPerson'=>$this->session->userdata('Emp_ID'),
				'RowStatus'=>'ACTIVE',
				'IsDel'=>'N'
			);
			
			$this->db->insert('Inventory_Detail', $insert);
		}
		
		//insert Image, PDF
		$update_file = array();
		
		if($_FILES['Product_Photo']['name']){
			$file_name = $this->upload_img($post['Product_ID'], 'Product_Photo', $this->config->item('upload_product_img'));
			$update_file['Product_Photo'] = $file_name; 
		}
		
		if($_FILES['Product_SpecSheet']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_SpecSheet');
			$update_file['Product_SpecSheet'] = $file_name; 
		}
		
		if($_FILES['Product_SaleSheet']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_SaleSheet');
			$update_file['Product_SaleSheet'] = $file_name; 
		}
		
		if($_FILES['Product_DocOther']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_DocOther');
			$update_file['Product_DocOther'] = $file_name; 
		}
		
		//update file name to db
		$arr_size = sizeof($update_file);
		
		if($arr_size>0)
		{
			$this->db->where('Product_AutoID', $auto_id);
			$this->db->update('Products',$update_file);
		}
		
		
		
		
		redirect('product/update_get/'.$auto_id, 'refresh');
}
	
	public function update_get($id)
	{
		$content['title'] = "แก้ไขข้อมูลสินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>'/inventory',
										'class'=>''
									),
									1 => array(
										'name'=>'แก้ไขข้อมูลสินค้าสินค้า',
										'link'=>'',
										'class'=>'active'
									)
								);
								
		$product = $this->db->get_where('Products', array('Product_AutoID'=>$id))->result_array();
		$premium = $this->db->get_where('Product_Premium', array('Product_ID'=> $product[0]['Product_ID']));
		$age_inventory_history = $this->db->get_where('Extend_ExpireInventory', array('Product_ID'=> $product[0]['Product_ID']));
		$age_return_history = $this->db->get_where('Extend_ExpireReturn', array('Product_ID'=> $product[0]['Product_ID']));
		$age_sale_history = $this->db->get_where('Extend_ExpireSale', array('Product_ID'=> $product[0]['Product_ID']));
		
		$content['status_end_date'] = TRUE;
		$content['has_age_inventory'] = $this->product_model->has_history_age_inventory($product[0]['Product_ID']);
		$content['has_age_return'] = $this->product_model->has_history_age_return($product[0]['Product_ID']);
		$content['has_age_sale'] = $this->product_model->has_history_age_sale($product[0]['Product_ID']);
		
		//status of extend from age
		$content['age_inventory_form'] = $this->product_model->inventory_age_form($product[0]['Product_ID']);
		$content['age_sale_form'] = $this->product_model->sale_age_form($product[0]['Product_ID']);
		$content['age_return_form'] = $this->product_model->return_age_form($product[0]['Product_ID']);
		
		if($content['has_age_inventory'] || $content['has_age_return'] || $content['has_age_sale']){
			$content['status_end_date'] = FALSE;
		}
		
		
		$product[0]['Manufact_StartDate'] = convert_mssql_date($product[0]['Manufact_StartDate']);
		$product[0]['Manufact_EndDate'] = convert_mssql_date($product[0]['Manufact_EndDate']);
		

		$content['product'] = $product;
		$content['premium'] = $premium;						
		$content['age_inventory_history'] = $age_inventory_history;						
		$content['age_sale_history'] = $age_sale_history;						
		$content['age_return_history'] = $age_return_history;						
		$content['department_dropdown'] = department_dropdown($product[0]['ProduceBy']);						
		$content['product_type_dropdown'] = product_type_dropdown($product[0]['ProType_ID']);	
		$content['product_group_dropdown'] = product_group_dropdown($product[0]['ProGroup_ID']);	
		$content['product_category_dropdown'] = product_category_dropdown($product[0]['ProCate_ID']);	
		$content['product_frequency_dropdown'] = product_frequency_dropdown($product[0]['ProFreq_ID']);	
		$content['product_register_dropdown'] = product_register_dropdown($product[0]['TypeReg_ID']);	
		$content['inventory_dropdown'] = inventory_dropdown($product[0]['Main_Inventory']);	
		$content['product_status_dropdown'] = product_status_dropdown($product[0]['RowStatus']);	
		$content['return_age_dropdown'] = age_return_dropdown($product[0]['Age_AverageReturn']);	
		$content['return_age_dropdown_blank'] = age_return_dropdown();	
		$content['inventory_age_dropdown'] = age_inventory_dropdown($product[0]['Age_Inventory']);	
		$content['inventory_age_dropdown_blank'] = age_inventory_dropdown();	
		$content['sale_age_dropdown'] = age_sale_dropdown($product[0]['Age_Sale']);	
		$content['sale_age_dropdown_blank'] = age_sale_dropdown();	
		$content['monitor_status_dropdown'] = monitor_status_dropdown($product[0]['MonitorStat_ID']);	
							
		$data['content'] = $this->load->view('product/update_get',$content ,TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			//'select2/select2-bootstrap-core.css',
			//'select2-bootstrap-css-master/select2-bootstrap.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			//'select2/select2.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/product/update.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
		
	}

	public function update_post()
	{
		$post = $_POST;
		$id = $this->input->post('Product_AutoID');
		unset($post['Product_AutoID']);
		
		if($post['Manufact_StartDate']!==""){
			$post['Manufact_StartDate'] = convert_date_to_mssql($post['Manufact_StartDate']);
		}
		if($post['Manufact_EndDate']!==""){
			$post['Manufact_EndDate'] = convert_date_to_mssql($post['Manufact_EndDate']);
		}

		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		//get return expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_AverageReturn'] != 0){
			$date_return = strtotime("+".$post['Age_AverageReturn']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireReturn'] = date("Y-m-d",$date_return);
		}else{
			$post['Age_ExpireReturn'] = NULL;
		}
		//get return expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_Sale'] != 0){
			$date_sale = strtotime("+".$post['Age_Sale']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireSale'] = date("Y-m-d",$date_sale);
		}else{
			$post['Age_ExpireSale'] = NULL;
		}
		//get inventory expire date
		if($post['Manufact_EndDate']!=="" && $post['Age_Inventory'] != 0){
			$date_inventory = strtotime("+".$post['Age_Inventory']." day", strtotime($post['Manufact_EndDate']));
			$post['Age_ExpireInventory'] = date("Y-m-d",$date_inventory);
		}else{
			$post['Age_ExpireInventory'] = NULL;
		}
		
		/*
		echo '<pre>';
		print_r($post);
		echo '</pre>';
		exit();
		*/
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		$this->db->where('Product_AutoID', $id);
		$this->db->update('Products', $post);
		
		$update_file = array();
		
		if($_FILES['Product_Photo']['name']){
			$file_name = $this->upload_img($post['Product_ID'], 'Product_Photo', $this->config->item('upload_product_img'));
			$update_file['Product_Photo'] = $file_name; 
		}
		
		if($_FILES['Product_SpecSheet']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_SpecSheet');
			$update_file['Product_SpecSheet'] = $file_name; 
		}
		
		if($_FILES['Product_SaleSheet']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_SaleSheet');
			$update_file['Product_SaleSheet'] = $file_name; 
		}
		
		if($_FILES['Product_DocOther']['name']){
			$file_name = $this->upload_attachment($post['Product_ID'],'Product_DocOther');
			$update_file['Product_DocOther'] = $file_name; 
		}
		
		//update file name to db
		$arr_size = sizeof($update_file);
		
		if($arr_size>0)
		{
			$this->db->where('Product_AutoID', $id);
			$this->db->update('Products',$update_file);
		}
		
		redirect('product/update_get/'.$id, 'refresh');	
	}

	public function premium_add()
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
		 
		$this->db->insert('Product_Premium', $post);
		$auto_id = $this->db->insert_id();
		
		$update_file = array();
		
		if($_FILES['Premium_Photo']['name']){
			$file_name = $this->upload_img($post['Product_ID']."-".$auto_id, 'Premium_Photo', $this->config->item('upload_premium'));
			$update_file['Premium_Photo'] = $file_name; 
		}
		
		//update file name to db
		$arr_size = sizeof($update_file);
		
		if($arr_size>0)
		{
			$this->db->where('Premium_AutoID', $auto_id);
			$this->db->update('Product_Premium',$update_file);
		}
		
		//create inventory
		
		//get all inventory
		$inventories = $this->db->get('Inventory')->result_array();
		
		$product = $this->db->get_where('Products', array('Product_ID'=>$post['Product_ID']))->row_array();
		
		redirect('product/update_get/'.$product['Product_AutoID'], 'refresh'); 
		 
	}

	public function extend_age_inventory()
	{
		$post = $_POST;
		$autoid = get_product_autoid($_POST['Product_ID']);
		$post['Old_Age_ExpireInventory'] = convert_date_to_mssql($post['Old_Age_ExpireInventory']);
		$post['New_Age_ExpireInventory'] = convert_date_to_mssql($post['New_Age_ExpireInventory']);
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowStatus'] = 'ACTIVE';
		$post['IsDel'] = '0';
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		//insert  to history
		$this->db->insert('Extend_ExpireInventory',$post);
		
		//update new to Products table
		
		 
		$where = array('Product_AutoID'=>$autoid);
		$update = array(
			'Age_Inventory'=>$post['New_Age_Inventory'],
			'Age_ExpireInventory'=>$post['New_Age_ExpireInventory']
		);
		
		$this->db->where($where);
		$this->db->update('Products',$update);
		
		redirect('product/update_get/'.$autoid, 'refresh');
		
	}

	public function extend_age_sale()
	{
		$post = $_POST;
		$autoid = get_product_autoid($_POST['Product_ID']);
		$post['Old_Age_ExpireSale'] = convert_date_to_mssql($post['Old_Age_ExpireSale']);
		$post['New_Age_ExpireSale'] = convert_date_to_mssql($post['New_Age_ExpireSale']);
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowStatus'] = 'ACTIVE';
		$post['IsDel'] = '0';
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		//insert  to history
		$this->db->insert('Extend_ExpireSale',$post);
		
		//update new to Products table
		$where = array('Product_AutoID'=>$autoid);
		$update = array(
			'Age_Sale'=>$post['New_Age_Sale'],
			'Age_ExpireSale'=>$post['New_Age_ExpireSale']
		);
		
		$this->db->where($where);
		$this->db->update('Products',$update);
		
		redirect('product/update_get/'.$autoid, 'refresh');
		
	}

	public function extend_age_return()
	{
		$post = $_POST;
		$autoid = get_product_autoid($_POST['Product_ID']);
		$post['Old_Age_ExpireReturn'] = convert_date_to_mssql($post['Old_Age_ExpireReturn']);
		$post['New_Age_ExpireReturn'] = convert_date_to_mssql($post['New_Age_ExpireReturn']);
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowStatus'] = 'ACTIVE';
		$post['IsDel'] = '0';
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		//insert  to history
		$this->db->insert('Extend_ExpireReturn',$post);
		
		//update new to Products table
		$where = array('Product_AutoID'=>$autoid);
		$update = array(
			'Age_AverageReturn'=>$post['New_Age_AverageReturn'],
			'Age_ExpireReturn'=>$post['New_Age_ExpireReturn']
		);
		
		$this->db->where($where);
		$this->db->update('Products',$update);
		
		redirect('product/update_get/'.$autoid, 'refresh');
		
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

	public function upload_attachment($attachment_name, $type)
	{	
		$this->load->library('upload');
		
		//dir files
		//user path directory not url
		
		if($type == 'Product_SpecSheet')
		{
			$dir = $this->config->item('upload_specsheet');	
		}elseif($type == 'Product_SaleSheet'){
			$dir = $this->config->item('upload_salesheet');
		}elseif($type == 'Product_DocOther'){
			$dir = $this->config->item('upload_docother');
		}else{
			exit();
		}

		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['file_name'] = $attachment_name;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		$this->upload->do_upload($type);
		$file_data = array('upload_data'=>$this->upload->data());
		
		return $file_data['upload_data']['file_name'];	
	}
	
	public function check_product_id($id)
	{
		$rows = $this->db->get_where('Products', array('Product_ID'=>$id))->num_rows();
		
		if($rows>0)
		{
			echo 'false';
		}else{
			echo 'true';
		}
		
	}
	
	public function delete_upload_file($id, $field)
	{
		
		$this->db->where('Product_AutoID', $id);
		$res = $this->db->update('Products', array($field=>NULL));
		
		if(!$res){
			echo 'false';
		}else{
			echo 'true';
		}
		
	}

	public function delete_premium_upload_file($id)
	{
		$this->db->where('Premium_AutoID', $id);
		$res = $this->db->delete('Product_Premium');
		
		if(!$res){
			echo 'false';
		}else{
			echo 'true';
		}	
	}

	
	

}