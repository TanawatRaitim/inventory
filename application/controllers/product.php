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
		$result = $this->product_model->get_product_transaction($id);
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}

	public function product_movement($product_autoid)
	{
		$content['title'] = "Product Movement";
		$content['product'] = $this->db->get_where('Products', array('Product_AutoID'=>$product_autoid))->row_array();
		$content['start_date'] = "";
		$content['end_date'] = "";
		
		
		if($this->input->post('search_movement'))
		{
			$start_date = $this->input->post('start_date_submit')." 00:00:00:000";
			$end_date = $this->input->post('end_date_submit')."  23:59:59.999";
			$product_id = $content['product']['Product_ID'];
			$where = "";
			$where .= " WHERE dbo.Inventory_Transaction.TK_Code not in ('RS')";
			$where .= " and dbo.Inventory_Transaction_Detail.Product_ID = '$product_id'";
			$where .= " and dbo.Inventory_Transaction.RowCreatedDate >= '$start_date' and dbo.Inventory_Transaction.RowCreatedDate <= '$end_date'";
			$sql = "Select	ROW_NUMBER() over(Order by dbo.Inventory_Transaction.RowCreatedDate) as RowNo ,dbo.Inventory_Transaction.TK_Code,
					TKCode_Main.TK_Description+ '[ ' + dbo.Inventory_Transaction.TK_Code+' ]' as [TK_Main] ,
					dbo.Inventory_Transaction.TK_Code+''+dbo.Inventory_Transaction.TK_ID as [Ticket_ID],
					dbo.Inventory_Transaction_Detail.Product_ID,
					dbo.Inventory_Transaction_Detail.QTY_Good,dbo.Inventory_Transaction_Detail.QTY_Waste,dbo.Inventory_Transaction_Detail.QTY_Damage,
					dbo.Inventory_Transaction_Detail.QTY_Good+dbo.Inventory_Transaction_Detail.QTY_Waste+dbo.Inventory_Transaction_Detail.QTY_Damage as [SumQTY],
					DocRef.DocRef_Name+''+dbo.Inventory_Transaction.DocRef_Other as [DocRef],
					dbo.Inventory_Transaction.DocRef_No,CONVERT(varchar(50),dbo.Inventory_Transaction.DocRef_Date,103) AS [DocRef_Date],
					
					dbo.Inventory_Transaction.Cust_ID,ISNull(dbo.Customers.Cust_Name,'-') as [Cust_Name],dbo.Inventory_Transaction.Transact_Remark,
					
					CONVERT(varchar(50),dbo.Inventory_Transaction.RowCreatedDate,103) as [RowCreatedDate],
					dbo.Inventory_Transaction.RowCreatedPerson,PersonCreated.Emp_FnameTH+' '+PersonCreated.Emp_LnameTH as [PersonCreated] ,
					
					dbo.Inventory_Transaction.IsApproved,dbo.Inventory_Transaction.ApprovedBy,PersonApproved.Emp_FnameTH +' '+PersonApproved.Emp_LnameTH as [PersonApproved],
					CONVERT(varchar(50),dbo.Inventory_Transaction.ApprovedDate,103) as [ApprovedDate],
					
					dbo.Inventory_Transaction.IsUsed
			
					From	dbo.Inventory_Transaction 
					
					LEFT OUTER JOIN dbo.Inventory_Transaction_Detail ON dbo.Inventory_Transaction.Transact_AutoID = dbo.Inventory_Transaction_Detail.Transact_AutoID 
					LEFT OUTER JOIN dbo.DocRefer as [DocRef] on dbo.Inventory_Transaction.DocRef_AutoID = DocRef.DocRef_AutoID 
					LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_Main] ON dbo.Inventory_Transaction.TK_Code = TKCode_Main.TK_Code 
					LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_For] ON dbo.Inventory_Transaction.Transaction_For = TKCode_For.TK_Code 
					LEFT OUTER JOIN dbo.Employees as [PersonCreated] ON dbo.Inventory_Transaction.RowCreatedPerson = PersonCreated.Emp_ID 
					LEFT OUTER JOIN dbo.Employees as [PersonApproved] ON dbo.Inventory_Transaction.ApprovedBy = PersonApproved.Emp_ID 
					LEFT OUTER JOIN dbo.Customers ON dbo.Inventory_Transaction.Cust_ID = dbo.Customers.Cust_ID ";
			
			$sql .= $where;
			
			$content['product_movement'] = $this->db->query($sql);
			$content['start_date'] = $this->input->post('start_date');
			$content['end_date'] = $this->input->post('end_date');
			$content['excel_link'] = base_url("product/product_movement_excel/".$product_autoid."/".$this->input->post('start_date_submit')."/".$this->input->post('end_date_submit'));
					
			
		}
						
		$data['content'] = $this->load->view('product/product_movement',$content ,TRUE);
		
		$css = array(
			'pickadate-3.5.3/lib/themes/classic.css',
			'pickadate-3.5.3/lib/themes/classic.date.css',
			'pickadate-3.5.3/lib/themes/classic.time.css',
			);
		$js = array(
			'pickadate-3.5.3/lib/picker.js',
			'pickadate-3.5.3/lib/picker.date.js',
			'pickadate-3.5.3/lib/picker.time.js',
			'pickadate-3.5.3/lib/legacy.js',
			'pickadate-3.5.3/lib/translations/th_TH.js',
			'js/app/product/product_movement.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	
	}

	public function product_movement_excel($product_autoid, $start_date, $end_date)
	{

		$content['title'] = "Product Movement";
		$content['product'] = $this->db->get_where('Products', array('Product_AutoID'=>$product_autoid))->row_array();
		$content['start_date'] = $start_date;
		$content['end_date'] = $end_date;
		$content['excel'] = true;
		$content['excel_name'] = $product_autoid."_";

		$start_date .= " 00:00:00:000";
		$end_date .= " 23:59:59.999";
		$product_id = $content['product']['Product_ID'];
		
		$content['excel_name'] = $product_id;
		
		$where = "";
		$where .= " WHERE dbo.Inventory_Transaction.TK_Code not in ('RS')";
		$where .= " and dbo.Inventory_Transaction_Detail.Product_ID = '$product_id'";
		$where .= " and dbo.Inventory_Transaction.RowCreatedDate >= '$start_date' and dbo.Inventory_Transaction.RowCreatedDate <= '$end_date'";
		$sql = "Select	ROW_NUMBER() over(Order by dbo.Inventory_Transaction.RowCreatedDate) as RowNo ,dbo.Inventory_Transaction.TK_Code,
				TKCode_Main.TK_Description+ '[ ' + dbo.Inventory_Transaction.TK_Code+' ]' as [TK_Main] ,
				dbo.Inventory_Transaction.TK_Code+''+dbo.Inventory_Transaction.TK_ID as [Ticket_ID],
				dbo.Inventory_Transaction_Detail.Product_ID,
				dbo.Inventory_Transaction_Detail.QTY_Good,dbo.Inventory_Transaction_Detail.QTY_Waste,dbo.Inventory_Transaction_Detail.QTY_Damage,
				dbo.Inventory_Transaction_Detail.QTY_Good+dbo.Inventory_Transaction_Detail.QTY_Waste+dbo.Inventory_Transaction_Detail.QTY_Damage as [SumQTY],
				DocRef.DocRef_Name+''+dbo.Inventory_Transaction.DocRef_Other as [DocRef],
				dbo.Inventory_Transaction.DocRef_No,CONVERT(varchar(50),dbo.Inventory_Transaction.DocRef_Date,103) AS [DocRef_Date],
				
				dbo.Inventory_Transaction.Cust_ID,ISNull(dbo.Customers.Cust_Name,'-') as [Cust_Name],dbo.Inventory_Transaction.Transact_Remark,
				
				CONVERT(varchar(50),dbo.Inventory_Transaction.RowCreatedDate,103) as [RowCreatedDate],
				dbo.Inventory_Transaction.RowCreatedPerson,PersonCreated.Emp_FnameTH+' '+PersonCreated.Emp_LnameTH as [PersonCreated] ,
				
				dbo.Inventory_Transaction.IsApproved,dbo.Inventory_Transaction.ApprovedBy,PersonApproved.Emp_FnameTH +' '+PersonApproved.Emp_LnameTH as [PersonApproved],
				CONVERT(varchar(50),dbo.Inventory_Transaction.ApprovedDate,103) as [ApprovedDate],
				
				dbo.Inventory_Transaction.IsUsed
		
				From	dbo.Inventory_Transaction 
				
				LEFT OUTER JOIN dbo.Inventory_Transaction_Detail ON dbo.Inventory_Transaction.Transact_AutoID = dbo.Inventory_Transaction_Detail.Transact_AutoID 
				LEFT OUTER JOIN dbo.DocRefer as [DocRef] on dbo.Inventory_Transaction.DocRef_AutoID = DocRef.DocRef_AutoID 
				LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_Main] ON dbo.Inventory_Transaction.TK_Code = TKCode_Main.TK_Code 
				LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_For] ON dbo.Inventory_Transaction.Transaction_For = TKCode_For.TK_Code 
				LEFT OUTER JOIN dbo.Employees as [PersonCreated] ON dbo.Inventory_Transaction.RowCreatedPerson = PersonCreated.Emp_ID 
				LEFT OUTER JOIN dbo.Employees as [PersonApproved] ON dbo.Inventory_Transaction.ApprovedBy = PersonApproved.Emp_ID 
				LEFT OUTER JOIN dbo.Customers ON dbo.Inventory_Transaction.Cust_ID = dbo.Customers.Cust_ID ";
		
		$sql .= $where;
		
		$content['product_movement'] = $this->db->query($sql);						
		$data['content'] = $this->load->view('product/product_movement_excel',$content ,TRUE);
		
		$css = array();
		$js = array();
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		
		$this->load->view('template/main',$data);
	
	}
	
	/**
	 * Product Category
	 */
	
	public function category_get($id = false)
	{
		$content['title'] = "เพิ่มข้อมูลหมวดหมู่สินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มหมวดหมู่ใหม่',
										'link'=>base_url('product/category_get'),
										'class'=>''
									)
								);
		
		$content['data_header'] = 'รายชื่อหมวดหมู่ในระบบ';
		$content['name_label'] = 'ชื่อหมวดหมู่';
		$content['name_placeholder'] = 'Product Category';
		$content['status_label'] = 'สถานะ';						
		
		if($id)
		{
			//update
			$data_set = $this->db->get_where('Product_Category', array('ProCate_ID'=>$id))->row_array();
			$content['data'] = $data_set;
			$content['form_action'] = 'product/category_edit_post';
			$content['form_name'] = 'form_edit';
			$content['form_header'] = '<h1>แก้ไข  <small>"'.$data_set['ProCat_Name'].'"</small></h1>';
			$content['status_dropdown'] = status_dropdown($data_set['RowStatus']);
			$content['button_new'] = 'เพิ่มใหม่';
			$content['submit_text'] = 'แก้ไข';
			
		}else{
			//add new
			$content['form_action'] = 'product/category_post';
			$content['form_name'] = 'form_add';
			$content['form_header'] = '<h1>เพิ่มหมวดหมู่สินค้าใหม่</h1>';
			$content['status_dropdown'] = status_dropdown();
			$content['submit_text'] = 'บันทึก';
			
		}
		
		$data['content'] = $this->load->view('product/category_get',$content ,TRUE);
		
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
			'js/app/product/category_get.js'
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function check_category_name($type = 'add')
	{
		
		if($type == 'edit')
		{
			//for check edit data
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			$this->db->where('ProCat_Name', $name);
			$this->db->where('ProCate_ID !=', $id);
			$query = $this->db->get('Product_Category');
			
		}else{
			//for check add new
			$name = $this->input->post('name');
			$this->db->where('ProCat_Name', $name);
			$query = $this->db->get('Product_Category');
				
		}

		if($query->num_rows() > 0)
		{
			echo 'false';
		}else{
			echo 'true';
		}

	}

	public function get_product_category_datatable()
	{

		$this->db->order_by('ProCate_ID', 'desc');
		$query = $this->db->get('Product_Category');
		
		$data = $query->result_array();
		
		$json = array(
			'data'=>$data
		);
		
		echo json_encode($json);
	}

	public function category_post()
	{
		$post = $_POST;
		
		if($post['ProCat_Name'] == "")
		{
			redirect('product/category_get', 'refresh');
			exit();
		}
		
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['IsDel'] = 0;
		
		$this->db->insert('Product_Category', $post);
		
		redirect('product/category_get', 'refresh');
	}

	public function category_edit_post()
	{
		$post = $_POST;
		
		if($post['ProCat_Name'] == "")
		{
			redirect('product/category_get/', 'refresh');
			exit();
		}
		
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		$id = $post['ProCate_ID'];
		unset($post['ProCate_ID']);
		
		$this->db->where('ProCate_ID', $id);
		$this->db->update('Product_Category', $post);
		redirect('product/category_get', 'refresh');
		
	}
	
	/**
	 * end product category
	 */
	
	
	/**
	 * Product Group
	 */
	
	public function group_get($id = false)
	{
		$content['title'] = "เพิ่มข้อมูลกลุ่มสินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มกลุ่มสินค้าใหม่',
										'link'=>base_url('product/group_get'),
										'class'=>''
									)
								);
		
		$content['data_header'] = 'รายชื่อกลุ่มสินค้าในระบบ';
		$content['name_label'] = 'ชื่อกลุ่มสินค้า';
		$content['name_placeholder'] = 'Product Group';
		$content['status_label'] = 'สถานะ';						
		
		if($id)
		{
			//update
			$data_set = $this->db->get_where('Product_Group', array('ProGroup_ID'=>$id))->row_array();
			$content['data'] = $data_set;
			$content['form_action'] = 'product/group_edit_post';
			$content['form_name'] = 'form_edit';
			$content['form_header'] = '<h1>แก้ไข  <small>"'.$data_set['ProGroup_Name'].'"</small></h1>';
			$content['status_dropdown'] = status_dropdown($data_set['RowStatus']);
			$content['button_new'] = 'เพิ่มใหม่';
			$content['submit_text'] = 'แก้ไข';
			
		}else{
			//add new
			$content['form_action'] = 'product/group_post';
			$content['form_name'] = 'form_add';
			$content['form_header'] = '<h1>เพิ่มกลุ่มสินค้าใหม่</h1>';
			$content['status_dropdown'] = status_dropdown();
			$content['submit_text'] = 'บันทึก';
			
		}
		
		$data['content'] = $this->load->view('product/group_get',$content ,TRUE);
		
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
			'js/app/product/group_get.js'
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function check_group_name($type = 'add')
	{
		
		if($type == 'edit')
		{
			//for check edit data
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			$this->db->where('ProGroup_Name', $name);
			$this->db->where('ProGroup_ID !=', $id);
			$query = $this->db->get('Product_Group');
			
		}else{
			//for check add new
			$name = $this->input->post('name');
			$this->db->where('ProGroup_Name', $name);
			$query = $this->db->get('Product_Group');
				
		}

		if($query->num_rows() > 0)
		{
			echo 'false';
		}else{
			echo 'true';
		}

	}

	public function get_product_group_datatable()
	{

		$this->db->order_by('ProGroup_ID', 'desc');
		$query = $this->db->get('Product_Group');
		
		$data = $query->result_array();
		
		$json = array(
			'data'=>$data
		);
		
		echo json_encode($json);
	}

	public function group_post()
	{
		$post = $_POST;
		
		if($post['ProGroup_Name'] == "")
		{
			redirect('product/group_get/', 'refresh');
			exit();
		}
		
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['IsDel'] = 0;
		
		$this->db->insert('Product_Group', $post);
		
		redirect('product/group_get', 'refresh');
	}

	public function group_edit_post()
	{
		$post = $_POST;
		
		if($post['ProGroup_Name'] == "")
		{
			redirect('product/group_get/', 'refresh');
			exit();
		}
		
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		$id = $post['ProGroup_ID'];
		unset($post['ProGroup_ID']);
		
		$this->db->where('ProGroup_ID', $id);
		$this->db->update('Product_Group', $post);
		redirect('product/group_get', 'refresh');
		
	}
	
	/**
	 * end Product Group
	 */
	 
	 
	/**
	 * Product Type
	 */
	
	public function type_get($id = false)
	{
		$content['title'] = "เพิ่มข้อมูลประเภทสินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มประเภทสินค้าใหม่',
										'link'=>base_url('product/type_get'),
										'class'=>''
									)
								);
		
		$content['data_header'] = 'รายชื่อประเภทสินค้าในระบบ';
		$content['name_label'] = 'ชื่อประเภทสินค้า';
		$content['name_placeholder'] = 'Product Type';
		$content['status_label'] = 'สถานะ';						
		
		if($id)
		{
			//update
			$data_set = $this->db->get_where('Product_Type', array('ProType_ID'=>$id))->row_array();
			$content['data'] = $data_set;
			$content['form_action'] = 'product/type_edit_post';
			$content['form_name'] = 'form_edit';
			$content['form_header'] = '<h1>แก้ไข  <small>"'.$data_set['ProType_Name'].'"</small></h1>';
			$content['status_dropdown'] = status_dropdown($data_set['RowStatus']);
			$content['button_new'] = 'เพิ่มใหม่';
			$content['submit_text'] = 'แก้ไข';
			
		}else{
			//add new
			$content['form_action'] = 'product/type_post';
			$content['form_name'] = 'form_add';
			$content['form_header'] = '<h1>เพิ่มประเภทสินค้าใหม่</h1>';
			$content['status_dropdown'] = status_dropdown();
			$content['submit_text'] = 'บันทึก';
			
		}
		
		$data['content'] = $this->load->view('product/type_get',$content ,TRUE);
		
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
			'js/app/product/type_get.js'
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function check_type_name($type = 'add')
	{
		
		if($type == 'edit')
		{
			//for check edit data
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			$this->db->where('ProType_Name', $name);
			$this->db->where('ProType_ID !=', $id);
			$query = $this->db->get('Product_Type');
			
		}else{
			//for check add new
			$name = $this->input->post('name');
			$this->db->where('ProType_Name', $name);
			$query = $this->db->get('Product_Type');
				
		}

		if($query->num_rows() > 0)
		{
			echo 'false';
		}else{
			echo 'true';
		}

	}

	public function get_product_type_datatable()
	{

		$this->db->order_by('ProType_ID', 'desc');
		$query = $this->db->get('Product_Type');
		
		$data = $query->result_array();
		
		$json = array(
			'data'=>$data
		);
		
		echo json_encode($json);
	}

	public function type_post()
	{
		$post = $_POST;
		
		if($post['ProType_Name'] == "")
		{
			redirect('product/type_get/', 'refresh');
			exit();
		}
		
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['IsDel'] = 0;
		
		$this->db->insert('Product_Type', $post);
		
		//get last id of product type to insert
		$type_id = $this->db->insert_id();
		
		//select all id from frequency table
		$frequency = $this->db->get('Product_Frequency')->result_array();
		
		//insert to Return Standard
		foreach($frequency as $val)
		{
			$data = array(
				'ProType_ID'=> $type_id,
				'ProFreq_ID'=> $val['ProFreq_ID'],
				'Return_Period'=> 60
			);
			
			$this->db->insert('Return_Standard', $data);

		}

		redirect('product/type_get', 'refresh');
	}

	public function type_edit_post()
	{
		$post = $_POST;
		
		if($post['ProType_Name'] == "")
		{
			redirect('product/type_get/', 'refresh');
			exit();
		}
		
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		$id = $post['ProType_ID'];
		unset($post['ProType_ID']);
		
		$this->db->where('ProType_ID', $id);
		$this->db->update('Product_Type', $post);
		redirect('product/type_get', 'refresh');
		
	}
	
	/**
	 * End Product Type
	 */
	
	
	/**
	 * Product Frequency
	 */
	
	public function frequency_get($id = false)
	{
		$content['title'] = "เพิ่มข้อมูลประเภทการออกสินค้า";
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'หน้าหลัก',
										'link'=>base_url(),
										'class'=>''
									),
									1 => array(
										'name'=>'เพิ่มประเภทการออกสินค้าใหม่',
										'link'=>base_url('product/frequency_get'),
										'class'=>''
									)
								);
		
		$content['data_header'] = 'รายชื่อประเภทการออกสินค้าในระบบ';
		$content['name_label'] = 'ชื่อประเภทการออกสินค้า';
		$content['name_placeholder'] = 'Product Frequency';
		$content['status_label'] = 'สถานะ';						
		
		if($id)
		{
			//update
			$data_set = $this->db->get_where('Product_Frequency', array('ProFreq_ID'=>$id))->row_array();
			$content['data'] = $data_set;
			$content['form_action'] = 'product/frequency_edit_post';
			$content['form_name'] = 'form_edit';
			$content['form_header'] = '<h1>แก้ไข  <small>"'.$data_set['ProFreq_Name'].'"</small></h1>';
			$content['status_dropdown'] = status_dropdown($data_set['RowStatus']);
			$content['button_new'] = 'เพิ่มใหม่';
			$content['submit_text'] = 'แก้ไข';
			
		}else{
			//add new
			$content['form_action'] = 'product/frequency_post';
			$content['form_name'] = 'form_add';
			$content['form_header'] = '<h1>เพิ่มประเภทการออกสินค้าใหม่</h1>';
			$content['status_dropdown'] = status_dropdown();
			$content['submit_text'] = 'บันทึก';
			
		}
		
		$data['content'] = $this->load->view('product/frequency_get',$content ,TRUE);
		
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
			'js/app/product/frequency_get.js'
		);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	}
	
	public function check_frequency_name($type = 'add')
	{
		
		if($type == 'edit')
		{
			//for check edit data
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			$this->db->where('ProFreq_Name', $name);
			$this->db->where('ProFreq_ID !=', $id);
			$query = $this->db->get('Product_Frequency');
			
		}else{
			//for check add new
			$name = $this->input->post('name');
			$this->db->where('ProFreq_Name', $name);
			$query = $this->db->get('Product_Frequency');
				
		}

		if($query->num_rows() > 0)
		{
			echo 'false';
		}else{
			echo 'true';
		}

	}

	public function get_product_frequency_datatable()
	{

		$this->db->order_by('ProFreq_ID', 'desc');
		$query = $this->db->get('Product_Frequency');
		
		$data = $query->result_array();
		
		$json = array(
			'data'=>$data
		);
		
		echo json_encode($json);
	}

	public function frequency_post()
	{
		$post = $_POST;
		
		if($post['ProFreq_Name'] == "")
		{
			redirect('product/frequency_get/', 'refresh');
			exit();
		}
		
		$post['RowCreatedDate'] = date("Y/m/d h:i:s");
		$post['RowCreatedPerson'] = $this->session->userdata('Emp_ID');
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		$post['IsDel'] = 0;
		
		$this->db->insert('Product_Frequency', $post);
		
		
		//get last id of product frequency to insert
		$frequency_id = $this->db->insert_id();
		
		//select all id from product type table
		$product_type = $this->db->get('Product_Type')->result_array();
		
		//insert to Return Standard
		foreach($product_type as $val)
		{
			$data = array(
				'ProType_ID'=> $val['ProType_ID'],
				'ProFreq_ID'=> $frequency_id,
				'Return_Period'=> 60
			);
			
			$this->db->insert('Return_Standard', $data);

		}
		
		redirect('product/frequency_get', 'refresh');
		
	}

	public function frequency_edit_post()
	{
		$post = $_POST;
		
		if($post['ProFreq_Name'] == "")
		{
			redirect('product/frequency_get/', 'refresh');
			exit();
		}
		
		$post['RowUpdatedDate'] = date("Y/m/d h:i:s");
		$post['RowUpdatedPerson'] = $this->session->userdata('Emp_ID');
		
		$id = $post['ProFreq_ID'];
		unset($post['ProFreq_ID']);
		
		$this->db->where('ProFreq_ID', $id);
		$this->db->update('Product_Frequency', $post);
		redirect('product/frequency_get', 'refresh');
		
	}
	
	/**
	 * End Product Type
	 */
	
	

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
		
		//generate barcode
		gen_product_internal_barcode($post['Product_ID']);
		
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
		
		//assign null
		foreach($post as $key=>$val)
		{
			if($val == ""){
				$post[$key] = NULL;
			}
		}
		
		$this->db->where('Product_AutoID', $id);
		$this->db->update('Products', $post);
		
		gen_product_internal_barcode($post['Product_ID']);
		
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
		$query = $this->product_model->get_product_select2();
		
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
		
		$query = $this->product_model->get_product($id);
		
		$result = $query->row_array();
		
		echo json_encode($result);
	}
	
	public function table_qty($product_id="")
	{
		$this->load->model('product_model');
		$this->load->model('inventory_model');

		$query = $this->product_model->get($product_id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีรายละเอียดสินค้า';
			exit();
		}

		$result = $query->row_array();
		
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
			
			if(file_exists($this->config->item('upload_product_img').$result['Product_Photo'])){
				$result['Product_Photo'] = $this->config->item('productimg_path').$result['Product_Photo'];
				
			}else{
				$result['Product_Photo'] = $this->config->item('no_img_path');
			}
		}
		
		$data['product'] = $result;
		
		$query = $this->inventory_model->get_all_stock($product_id);
		$data['inventory'] = $query->result_array();
		
		
		$all_inventory = array();
		
		$reserve_draft = $this->inventory_model->get_reserve_draft($product_id);
		
		
		foreach ($data['inventory'] as $row) {
			
			$all_inventory[$row['Stock_AutoID']] = array(
				'stock_name'=>$row['Stock_Name'],
				'inventory'=>array(
					'text'=>'ยอดสินค้าคงคลัง',
					'good'=>number_format($row['QTY_Good']),
					'waste'=>number_format($row['QTY_Waste']),
					'damage'=>number_format($row['QTY_Damage'])
				),
				'draft'=>array(
					'text'=>'ยอดจอง Draft',
					'good'=>number_format($reserve_draft[$row['Stock_AutoID']]['good']),
					'waste'=>number_format($reserve_draft[$row['Stock_AutoID']]['waste']),
					'damage'=>number_format($reserve_draft[$row['Stock_AutoID']]['damage'])
				),
				'reserve'=>array(
					'text'=>'ยอดรับจอง',
					'good'=>number_format($row['QTY_ReserveGood']),
					'waste'=>number_format($row['QTY_ReserveWaste']),
					'damage'=>number_format($row['QTY_ReserveDamage'])
				),
				'total'=>array(
					'text'=>'ยอดคงเหลือ',
					'good'=>number_format($row['QTY_Good']-($reserve_draft[$row['Stock_AutoID']]['good']+$row['QTY_ReserveGood'])),
					'waste'=>number_format($row['QTY_Waste']-($reserve_draft[$row['Stock_AutoID']]['waste']+$row['QTY_ReserveWaste'])),
					'damage'=>number_format($row['QTY_Damage']-($reserve_draft[$row['Stock_AutoID']]['damage']+$row['QTY_ReserveDamage'])),
				),
			);
		}
		
		
		$data['all_inventory'] = $all_inventory;
		
		$this->load->view('product/table_qty', $data);
	}

	public function table_premium($product_id="")
	{
		$this->load->model('product_model');
		
		$query = $this->product_model->get_all_product_premium($product_id);
		
		if($query->num_rows() == 0)
		{
			echo 'ไม่มีสินค้าประกอบ';
			exit();
		}

		$result = $query->result_array();
		$data['premium'] = $result;
		
		$this->load->view('product/table_premium', $data);
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