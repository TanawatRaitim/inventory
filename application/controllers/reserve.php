<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('reserve_model');
	}
	
	public function index()
	{
	}

	
	public function test_layout()
	{
		$content['title'] = 'จองสินค้า  (RS)';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['ticket_type'] = ticket_sale_dropdown();	
		$content['inventory_type'] = all_inventory_dropdown();
		$data['content'] = $this->load->view('reserve/test_layout',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/reserve/test_layout.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);	
	}
	
	public function all()
	{
		$content['title'] = 'ข้อมูลการจองสินค้าทั้งหมด';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/all',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function no_appv()
	{
		$content['title'] = 'ใบจองสินค้า [รออนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/no_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/no_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function yes_appv()
	{
		$content['title'] = 'ใบจองสินค้า [ผ่านอนุมัติ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);

		$data['content'] = $this->load->view('reserve/yes_appv',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/yes_appv.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function reject()
	{
		$content['title'] = 'ใบจองสินค้า [ถูกปฏิเสธ]';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>'active'
									)
								);

		$data['content'] = $this->load->view('reserve/reject',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/reserve/reject.js'
		);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function add()
	{
		$content['title'] = 'จองสินค้า  (RS)';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['ticket_type'] = ticket_sale_dropdown();	
		$content['transport_by'] = transport_dropdown();	
		$content['inventory_type'] = all_inventory_dropdown();
		$data['content'] = $this->load->view('reserve/add',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/reserve/reserve_add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_draft($id)
	{
		//$content['title'] = 'แก้ไข';
		$content['title'] = 'แก้ไขแบบร่างเลขที่ ('.get_ticket_code_id($id).')';
		$content['transaction'] = $this->transaction_model->get_transaction($id);
		$content['transaction_detail'] = $this->transaction_model->get_transaction_detail($id);
		$content['input_type'] = 'RS';
		$content['good_qty'] = $this->count_qty('QTY_Good', $id);
		$content['waste_qty'] = $this->count_qty('QTY_Waste', $id);
		$content['damage_qty'] = $this->count_qty('QTY_Damage', $id);
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>base_url('reserve/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>base_url('reserve/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>base_url('reserve/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>base_url('reserve/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>base_url('reserve/reject'),
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown($content['transaction']['DocRef_AutoID']);	
		$content['ticket_type'] = ticket_sale_dropdown($content['transaction']['Transaction_For']);	
		$content['transport_by'] = transport_dropdown($content['transaction']['Transport_By']);			
		$content['inventory_type'] = all_inventory_dropdown();
		$data['content'] = $this->load->view('reserve/edit2',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/reserve/edit2.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_reject($id)
	{
		
		$content['title'] = 'แก้ไขใบจองที่ถูกปฏิเสธ ('.get_ticket_code_id($id).')';
		$content['transaction'] = $this->transaction_model->get_transaction($id);
		$content['transaction_detail'] = $this->transaction_model->get_transaction_detail($id);
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>base_url('reserve/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>base_url('reserve/add'),
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>base_url('reserve/no_appv'),
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>base_url('reserve/yes_appv'),
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>base_url('reserve/reject'),
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown($content['transaction']['DocRef_AutoID']);	
		$content['ticket_type'] = ticket_sale_dropdown($content['transaction']['Transaction_For']);	
		$content['inventory_type'] = all_inventory_dropdown();
		$content['transport_by'] = transport_dropdown($content['transaction']['Transport_By']);
		$data['content'] = $this->load->view('reserve/edit_reject',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/reserve/edit_reject.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function Edit_bak($id)
	{
		$content['title'] = 'แก้ไขการจองสินค้า  (RS)';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>'active'
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
								
		$content['doc_refer'] = doc_refer_dropdown();	
		$content['ticket_type'] = ticket_sale_dropdown();	
		$content['inventory_type'] = inventory_dropdown();
		$content['transaction'] = '';
		$content['transaction_detail'] = '';
		
		$data['content'] = $this->load->view('reserve/edit',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			// 'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/reserve/edit.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function check_new_data()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		$tkid = $main['TK_ID'];
		$product_id = $detail['Product_ID'];
		$stock_id = $detail['Effect_Stock_AutoID'];
		
		if($tkid == "")
		{
			
			$result = array(
						'status'=>true,
						'valid'=>''
					);
			
			/*
			if($this->check_tran_qty($detail)){
					$result = array(
						'status'=>true,
						'valid'=>''
					);
				}else{
					$result = array(
						'status'=>false,
						'valid'=>'ไม่สามรถบันทึกรายการได้ เนื่องจากสินค้าในคลังไม่พอตัด'
					);
				}
			 * 
			 * */
			
		}else{
			
			if($this->check_tran_dup($tkid, $product_id, $stock_id))
			{
				
				/*
				if($this->check_tran_qty($detail)){
					$result = array(
						'status'=>true,
						'valid'=>''
					);
				}else{
					$result = array(
						'status'=>false,
						'valid'=>'ไม่สามรถบันทึกรายการได้ เนื่องจากสินค้าในคลังไม่พอตัด'
					);
				}
				 * 
				 * */
				 
				 $result = array(
						'status'=>true,
						'valid'=>''
					);
				 
				 
			}
			else
			{
				$result = array(
					'status'=>false,
					'valid'=>'ไม่สามารถบันทึกข้อมูลได้ เนื่องจากคุณบันทึกรายการซ้ำ'
				);
			}

		}
		
		echo json_encode($result);

	}

	public function insert_transaction()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		
		if($this->is_exist_rsid($main['TK_ID']))
		{
			//find transac_autoID from TKID
			$tid = $this->find_tid($main['TK_ID']);
			$this->reserve_model->insert_ticket_detail($tid);

			$data = array(
				'TK_ID'=>$main['TK_ID'],
				'Transact_AutoID'=>$tid,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID'])
			);

			echo json_encode($data);
		}else{
			
			$rs_id = $this->gen_rsid();
			$auto_id = $this->reserve_model->insert_main_ticket($rs_id);
			$this->reserve_model->insert_ticket_detail($auto_id);
			
			$data = array(
				'TK_ID'=>$rs_id,
				'Transact_AutoID'=>$auto_id,
				'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
				'Product_ID'=>$detail['Product_ID'],
				'Product_Name'=>get_product_name($detail['Product_ID'])
			);

			echo json_encode($data);
			
		}
	}
	
	public function insert_transaction_draft()
	{
		parse_str($_POST['main_ticket'], $main);
		parse_str($_POST['ticket_detail'], $detail);
		$this->reserve_model->insert_ticket_detail($main['Transact_AutoID']);

		$data = array(
			'TK_ID'=>$main['TK_ID'],
			'Transact_AutoID'=>$main['Transact_AutoID'],
			'Effect_Stock_AutoID'=>$detail['Effect_Stock_AutoID'],
			'Product_ID'=>$detail['Product_ID'],
			'Product_Name'=>get_product_name($detail['Product_ID'])
		);

		echo json_encode($data);
			
	}
	
	public function delete_ticket_detail()
	{
		$autoid = $this->input->post('autoid');
		$product_id = $this->input->post('product_id');
		$stock = $this->input->post('stock');
		
		$result = $this->transaction_model->delete_transaction_detail($autoid, $product_id, $stock);
		
		if($result)
		{
			echo 'deleted';	
		}else{
			echo 'can not delete';
		}
		
		
	}
	
	//product->select2_product
	public function product_list()
	{
		$text = $this->input->post('q');
		$this->db->select('Product_AutoID, Product_ID, Product_Name, Product_Vol');
		
		$this->db->like('Product_ID', $text);
		$this->db->or_like('Product_Name', $text);
		$this->db->or_like('Product_Vol', $text);
		$this->db->or_like('Barcode_Main', $text);
		// $this->db->or_like('RowStatus', 'ACTIVE','after');
		$this->db->where('RowStatus','ACTIVE');
		$this->db->order_by('Product_Name asc, Product_Vol desc');
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
	
	//product->get_product_json
	public function get_product()
	{
		
		$id = $this->input->post('id');
		$query = $this->db->get_where('Products',array('Product_ID'=>$id));
		$result = $query->row_array();
		
		echo json_encode($result);
	}
	
	//customer->select2_customer
	public function customer_list()
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
	
	//customer->get_customer_json
	public function get_customer()
	{
		$id = $this->input->post('id');
		$query = $this->db->get_where('Customers', array('Cust_ID'=>$id));

		echo json_encode($query->row_array());
	}
	
	public function check_appv()
	{

		parse_str($_POST['reject'], $reject);
		$autoid = $this->find_tid($reject['rsid']);
		
		$where = array(
			'Inventory_Transaction_Detail.Transact_AutoID'=>$autoid
		);
		 
		 $json = array(
		 	'status'=>true,
		 	'description'=>array()
		);
		
		$this->db->select('Inventory_Transaction_Detail.*, Inventory_Detail.QTY_RemainGood as remain_good, Inventory_Detail.QTY_RemainWaste as remain_waste, Inventory_Detail.QTY_RemainDamage as remain_damage');
		$this->db->from('Inventory_Transaction_Detail');
		$this->db->join('Inventory_Detail','Inventory_Detail.Product_ID = Inventory_Transaction_Detail.Product_ID AND Inventory_Detail.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID','left');
		$this->db->where($where);

		$transaction_detail = $this->db->get()->result_array();
		
		foreach ($transaction_detail as $row) {
			if($row['QTY_Good']>$row['remain_good'] || $row['QTY_Waste']>$row['remain_waste'] || $row['QTY_Damage']>$row['remain_damage']){
				$json['status'] = false;
				$json['description'][] = $row['Product_ID'];
			}
		}
		
		
		echo json_encode($json);
		
	}
	
	public function check_save_rs($tkid)
	{
		$auto_id = $this->find_tid($tkid);
		$query = $this->db->get_where('Inventory_Transaction_Detail', array('Transact_AutoID'=>$auto_id));
		$trans = $query->result_array();
		$result = array(
				'status'=>true,
				'valid'=>''
			);
		
		
		/*
		foreach ($trans as $key => $value) {
			
			if(!$this->check_tran_qty($trans[$key])){
				$result['status'] = false;
				$result['valid'] = 'ไม่สามารถบันทักข้อมูลได้เนื่องสินค้า '.$value['Product_ID'].'ไม่จำนวนไม่พอสำหรับจอง';
			}
			
		}
		
		 * */
		echo json_encode($result);
	}
	
	public function save_rs()
	{
		parse_str($_POST['main_ticket'], $main);
		$this->reserve_model->save_rs($main);
		
	}
	
	public function get_rs_all()
	{
		
		$result = $this->reserve_model->get_rs_all();
		
		
		/*
		$result2 = $this->reserve_model->count_transaction_detail();
		
		$count = array();
		
		foreach ($result2 as $key => $value) {
			$count[$value['Transact_AutoID']] = $value['count_a'];
		}
		
		foreach ($result as $key => $value) {
			
			if(isset($count[$value['Transact_AutoID']])){
				$result[$key]['count'] = $count[$value['Transact_AutoID']];
			}else{
				$result[$key]['count'] = 0;
			}
		}
		*/
		foreach($result as $key=>$value)
		{
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			
		}
		
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}
	
	public function test_rs()
	{
		$result = $this->reserve_model->get_rs_all();	
		echo pre();
		//print_r($result);
		echo pre_close();
		//$i = 1;
		foreach($result as $key=>$value)
		{
			//echo $value['Transact_AutoID'];
			
			
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			echo $result[$key]['count'];
			echo br();
			
			
			
		}
	}
	
	
	public function get_no_appv_all()
	{
		
		$result = $this->reserve_model->get_no_appv_all();
		foreach($result as $key=>$value)
		{
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			
		}
		
		/*
		$result2 = $this->reserve_model->count_transaction_detail();
		
		$count = array();
		
		foreach ($result2 as $key => $value) {
			//$count
			$count[$value['Transact_AutoID']] = $value['count_a'];
		}
		
		foreach ($result as $key => $value) {
			
			if(isset($count[$value['Transact_AutoID']])){
				$result[$key]['count'] = $count[$value['Transact_AutoID']];
			}else{
				$result[$key]['count'] = 0;
			}
		}
		 * 
		 * */
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}
	
	public function get_yes_appv_all()
	{
		$result = $this->reserve_model->get_yes_appv_all();
		
		foreach($result as $key=>$value)
		{
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			
		}
		
		/*
		$result2 = $this->reserve_model->count_transaction_detail();
		
		$count = array();
		
		foreach ($result2 as $key => $value) {
			//$count
			$count[$value['Transact_AutoID']] = $value['count_a'];
		}
		
		foreach ($result as $key => $value) {
			
			if(isset($count[$value['Transact_AutoID']])){
				$result[$key]['count'] = $count[$value['Transact_AutoID']];
			}else{
				$result[$key]['count'] = 0;
			}
		}
		*/
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}
	
	public function get_reject_all()
	{
		$result = $this->reserve_model->get_reject_all();
		
		foreach($result as $key=>$value)
		{
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			
		}
		/*
		$result2 = $this->reserve_model->count_transaction_detail();
		
		$count = array();
		
		foreach ($result2 as $key => $value) {
			//$count
			$count[$value['Transact_AutoID']] = $value['count_a'];
		}
		
		foreach ($result as $key => $value) {
			
			if(isset($count[$value['Transact_AutoID']])){
				$result[$key]['count'] = $count[$value['Transact_AutoID']];
			}else{
				$result[$key]['count'] = 0;
			}
		}
		
		 * 
		 * */
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}

	public function get_data()
	{
		$sql = "SELECT *, concat(ticket_code,ticket_id) as ticket 
				FROM tb_stock_ed_rs 
				GROUP BY ticket
				ORDER BY dtime DESC
				";
		
		$local = $this->load->database('local', TRUE);		
				
		$query = $local->query($sql);
		$local->close();
		$reserve = $query->result_array();
		
		$json = array(
			'data'=>$reserve
		);
		
		echo json_encode($json);

	}
	
	public function detail($rsid="")
	{
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url().'reserve/all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>site_url().'reserve/add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url().'reserve/no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url().'reserve/yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url().'reserve/reject',
										'class'=>''
									)
								);
		
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['transaction'] = $this->reserve_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->reserve_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->reserve_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->reserve_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		//detail of rs
		$content['description'] = '';
		
		if($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==0)
		{
			//wait
			$content['description'] = 'ใบจองนี้อยู่ในสถานะ รอการอนุมัติ';
		}
		elseif($content['transaction']['IsApproved']==1 && $content['transaction']['IsReject']==0)
		{
			//approve
			$content['description'] = 'ใบจองนี้อนุมัติแล้ว';
		}
		elseif($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==1)
		{
			//reject
			$content['description'] = 'ใบจองนี้ไม่ผ่านการอนุมัติเนื่องจาก <br />-'.$content['transaction']['Reject_Remark'];
		}
		
		$data['content'] = $this->load->view('reserve/detail',$content, TRUE);
		
		$css = array(
			// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			// 'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/reserve/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_detail($rsid="")
	{
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url().'reserve/all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>site_url().'reserve/add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url().'reserve/no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url().'reserve/yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url().'reserve/reject',
										'class'=>''
									)
								);
		
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['transaction'] = $this->reserve_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->reserve_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		
		$data['content'] = $this->load->view('reserve/view_detail',$content, TRUE);
		
		$css = array(
			// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			// 'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'js/app/reserve/view_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function edit_detail()
	{
		$this->load->model('inventory_model');
		$this->load->helper('arr_helper');	
		/**
		 * $arr[0] = Transact_AutoID
		 * $arr[1] = Product_ID
		 * $arr[2] = Effect_Stock_AutoID
		 * $arr[3] = Field to update
		 * $arr[4] = qty before update
		 * $arr[5] = index
		 */
		parse_str($_POST['detail_data'], $data);
		
		//get transact auto id
		$temp;
		
		foreach ($data as $key => $value) {
			$temp = $key;
			break;
		}
		$temp_arr = explode(',', $temp);
		$transact_auto_id = $temp_arr[0];
		
		
		$deleted = array();
		
		foreach($data as $key=>$value){
			$arr = explode(',', $key);
			if($arr[3]=="delete"){
				
				//get data before delete for update stock
				$transaction_detail = $this->reserve_model->get_each_detail($arr[0],$arr[1],$arr[2]);
				
				//delete transaction detail
				$this->reserve_model->delete_each_detail($arr[0],$arr[1],$arr[2]);
				
				//get inventory detail
				//$inventory = $this->db->get_where('Inventory_Detail', $where)->row_array();
				
				$inventory = $this->inventory_model->get_product_stock($arr[1], $arr[2]);
				
				//update qty
				$update = array(
					'QTY_ReserveGood'=> $inventory['QTY_ReserveGood']-$transaction_detail['QTY_Good'],
					'QTY_RemainGood'=>$inventory['QTY_RemainGood']+$transaction_detail['QTY_Good'],
					'QTY_ReserveWaste'=>$inventory['QTY_ReserveWaste']-$transaction_detail['QTY_Waste'],
					'QTY_RemainWaste'=>$inventory['QTY_RemainWaste']+$transaction_detail['QTY_Waste'],
					'QTY_ReserveDamage'=>$inventory['QTY_ReserveDamage']-$transaction_detail['QTY_Damage'],
					'QTY_RemainDamage'=>$inventory['QTY_RemainDamage']+$transaction_detail['QTY_Damage']
				);
				
				$this->inventory_model->update_stock_qty($arr[1], $arr[2], $update);
				
				//keep index of delete
				$deleted[$arr[5]] = $arr[5];
			}
		}
	
		//check delete		
		foreach ($data as $key => $value) {
			
			$arr = explode(',', $key);
			
			if(check_key($deleted, $arr[5]))
			{
				continue;
			}
			
			$diff = $arr[4] - $value;
			
			if($diff>=0){
				
				//get Inventory Detail
				$inventory = $this->inventory_model->get_product_stock($arr[1], $arr[2]);
				
				//update
				$update = array($arr[3]=>$value);	//data and field to update			
				$where = array(
					'Transact_AutoID'=>$arr[0],
					'Product_ID'=>$arr[1],
					'Effect_Stock_AutoID'=>$arr[2]
				);
				
				$this->reserve_model->update_detail($update, $where);

				
				if($arr[3] == 'QTY_Good'){
					
					$update_inventory = array(
						'QTY_ReserveGood'=>$inventory['QTY_ReserveGood'] - $diff,
						'QTY_RemainGood'=>$inventory['QTY_RemainGood'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);
					
				}
				
				if($arr[3] == 'QTY_Waste'){
					
					$update_inventory = array(
						'QTY_ReserveWaste'=>$inventory['QTY_ReserveWaste'] - $diff,
						'QTY_RemainWaste'=>$inventory['QTY_RemainWaste'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);

				}
				
				if($arr[3] == 'QTY_Damage'){
					
					$update_inventory = array(
						'QTY_ReserveDamage'=>$inventory['QTY_ReserveDamage'] - $diff,
						'QTY_RemainDamage'=>$inventory['QTY_RemainDamage'] + $diff,
					);
					
					$this->inventory_model->update_qty($inventory['RecNo'], $update_inventory);
				}
				
				//update status to wait approve
				$this->reserve_model->set_status_wait($arr[0]);
								
			}
		}//end foreach
		
		
		//if alld detail are deleted
		//delete main ticket
		$transact_rows = $this->db->get_where('Inventory_Transaction_Detail',array('Transact_AutoID'=>$transact_auto_id))->num_rows();
		
		if($transact_rows==0)
		{
			$this->db->delete('Inventory_Transaction', array('Transact_AutoID'=>$transact_auto_id));
		}
		
		echo 'true';

	}
	
	public function approve($rsid="")
	{
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url().'reserve/all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>site_url().'reserve/add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url().'reserve/no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url().'reserve/yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url().'reserve/reject',
										'class'=>''
									)
								);
		
		$this->load->model('customer_model');
		$content['title'] = 'อนุมัติการจองเลขที่ RS'.$rsid;
		$content['transaction'] = $this->reserve_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->reserve_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->reserve_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		//detail of rs
		$content['description'] = '';
		
		if($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==0)
		{
			//wait
			$content['description'] = 'ใบจองนี้อยู่ในสถานะ รอการอนุมัติ';
		}
		elseif($content['transaction']['IsApproved']==1 && $content['transaction']['IsReject']==0)
		{
			//approve
			$content['description'] = 'ใบจองนี้อนุมัติแล้ว';
		}
		elseif($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==1)
		{
			//reject
			$content['description'] = 'ใบจองนี้ไม่ผ่านการอนุมัติเนื่องจาก <br />-'.$content['transaction']['Reject_Remark'];
		}
		
		$data['content'] = $this->load->view('reserve/approve',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function view_approve($rsid="")
	{
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>site_url().'reserve/all',
										'class'=>''
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>site_url().'reserve/add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>site_url().'reserve/no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>site_url().'reserve/yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>site_url().'reserve/reject',
										'class'=>''
									)
								);
								
		$this->load->model('customer_model');
		$content['title'] = 'รายละเอียดใบจองที่ RS'.$rsid;
		
		$content['transaction'] = $this->reserve_model->get_inventory_transaction($rsid);
		
		//print_r($content['transaction']);
		
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->reserve_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->reserve_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		//detail of rs
		$content['description'] = '';
		
		if($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==0)
		{
			//wait
			$content['description'] = 'ใบจองนี้อยู่ในสถานะ รอการอนุมัติ';
		}
		elseif($content['transaction']['IsApproved']==1 && $content['transaction']['IsReject']==0)
		{
			//approve
			$content['description'] = 'ใบจองนี้อนุมัติแล้ว';
		}
		elseif($content['transaction']['IsApproved']==0 && $content['transaction']['IsReject']==1)
		{
			//reject
			$content['description'] = 'ใบจองนี้ไม่ผ่านการอนุมัติเนื่องจาก <br />-'.$content['transaction']['Reject_Remark'];
		}
		
		$data['content'] = $this->load->view('reserve/view_approve',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/app/reserve/approve.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function packing_info($rsid, $print_type = "")
	{
		//get inventory transaction
		$where_transaction = array(
			'TK_Code'=>'RS',
			'TK_ID'=>$rsid
		);
		$transaction_query = $this->db->get_where('Inventory_Transaction', $where_transaction);
		
		if($transaction_query->num_rows()>0)
		{
			$transaction = $transaction_query->row_array();
			$autoid = $transaction['Transact_AutoID'];
			$content['transaction'] = $transaction;
			
			$content['title'] = 'ใบสั่งงานจัดแพ๊คสินค้า';
			$content['title2'] = 'ใบตรวจสอบการบรรจุและจัดส่งสินค้า';
			//$content['title'] = "RS".$rsid;
			
			$content['ticket'] = "RS".$rsid;
			//get ticket code name
			$content['tk_name'] = get_ticket_code_name($transaction['Transaction_For']).' ['.$transaction['Transaction_For'].']';
			//get reserve employee
			$content['reserve_employee'] = get_employee_name($transaction['RowCreatedPerson']);
			//get approve employee
			$content['approve_employee'] = get_employee_name($transaction['ApprovedBy']);
			//get customer
			
			$customer = get_customer($transaction['Cust_ID']);
			
			if($customer)
			{
				$content['customer_name'] = '['.$customer['Cust_ID'].'] '.$customer['Cust_Name'];
			}else{
				$content['customer_name'] = "N/A";
			}
			
			//get inventory transaction detail left join product left join inventory
			$this->db->select('*');
			$this->db->from('Inventory_Transaction_Detail');
			$this->db->join('Products','Products.Product_ID = Inventory_Transaction_Detail.Product_ID','left');
			$this->db->join('Inventory','Inventory.Stock_AutoID = Inventory_Transaction_Detail.Effect_Stock_AutoID','left');
			$this->db->where('Inventory_Transaction_Detail.Transact_AutoID', $autoid);
			$this->db->order_by('Inventory_Transaction_Detail.RecNo','asc');
			$query_transaction_detail = $this->db->get();
			$transaction_detail = $query_transaction_detail->result_array();
			// $content['error'] = '';
			$content['total_weight'] = 0;
			
			if($query_transaction_detail->num_rows()>0)
			{
				foreach ($transaction_detail as $key => $value) {
					
					if($transaction_detail[$key]['Weight'] == 0){
						$content['error'] = '*** ไม่สามารถคำนวณน้ำหนักได้ทั้งหมด โปรดตรวจสอบอีกครั้ง!!!';
					}
					$transaction_detail[$key]['product_weight'] = $transaction_detail[$key]['Weight'] * $transaction_detail[$key]['QTY_Good']; 
					$content['total_weight'] +=  ($transaction_detail[$key]['Weight'] * $transaction_detail[$key]['QTY_Good'])/1000;
				}
			}
			$content['transaction_detail'] = $transaction_detail;
			
			//count inventory transaction detail
			$content['product_count'] = $query_transaction_detail->num_rows();
			
			//count total all item
			$this->db->select_sum('QTY_Good');
			$this->db->where('Transact_AutoID', $autoid);
			$sum_query = $this->db->get('Inventory_Transaction_Detail')->row_array();
			$content['item_count'] = $sum_query['QTY_Good'];
			
			$data['content'] = $this->load->view('reserve/packing_info',$content, TRUE);
			
			$css = array(
				'css/packing_print.css'
				// 'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
				// 'select2/select2-bootstrap-core.css',
				// 'select2-bootstrap-css-master/select2-bootstrap.css',
				//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
				);
			$js = array(
				// 'js/moment/min/moment.min.js',
				// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
				// 'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
				// 'select2/select2.min.js',
				//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
				// 'noty/js/noty/packaged/jquery.noty.packaged.min.js',
				'js/app/reserve/packing_info.js'
				);
			$data['css'] = $this->assets->get_css($css);
			$data['js'] = $this->assets->get_js($js);
			
			if($print_type == 'excel')
			{
				$data['excel'] = TRUE;
				$data['excel_name'] = 'RS'.$rsid.'.xls';
			}
			// $data['navigation'] = $this->load->view('template/navigation','',TRUE);
			
			$this->load->view('template/main',$data);
			
		}else{
			echo 'ไม่พบรายการ';
			exit();
		}
		
		//
	}
	
	public function set_reject()
	{
		parse_str($_POST['reject'], $reject);
		
		$result = $this->reserve_model->set_reject_approve($reject);
		
		if($result){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	
	public function table_qty_test($product_id='15-SALA-M1510')
	{
		$content['title'] = 'ข้อมูลการจองสินค้าทั้งหมด';
		$content['input_type'] = 'RS';
		$notification = $this->get_notification();
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>"ระบบการจองสินค้า <span class='badge badge-error'>".$notification['all']."</span>",
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'เปิดใบจองสินค้า (ใบใหม่)',
										'link'=>'add',
										'class'=>''
									),
									2 => array(
										'name'=>"ใบจองสินค้า  [รออนุมัติ] <span class='badge badge-error'>".$notification['wait']."</span>",
										'link'=>'no_appv',
										'class'=>''
									),
									3 => array(
										'name'=>'ใบจองสินค้า  [ผ่านการอนุมัติ] <span class="badge badge-error">'.$notification['approved'].'</span>',
										'link'=>'yes_appv',
										'class'=>''
									),
									4 => array(
										'name'=>'ใบจองสินค้า  [ถูกปฏิเสธ] <span class="badge badge-error">'.$notification['rejected'].'</span>',
										'link'=>'reject',
										'class'=>''
									)
								);
								
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
			$result['Product_Photo'] = $this->config->item('productimg_path').$result['Product_Photo'];
		}
		
		$content['product'] = $result;
		
		$query = $this->inventory_model->get_all_stock($product_id);
		$content['inventory'] = $query->result_array();
		
		
		$all_inventory = array();
		
		$reserve_draft = $this->inventory_model->get_reserve_draft($product_id);
		
		
		foreach ($content['inventory'] as $row) {
			
			//$reserve_draft[$row['Stock_AutoID']]['good'];
			//echo $row['Stock_AutoID'];
			//print_r($row);
			
			$all_inventory[$row['Stock_AutoID']] = array(
				'stock_name'=>$row['Stock_Name'],
				'inventory'=>array(
					'text'=>'ยอดสินค้าคงคลัง',
					'good'=>$row['QTY_Good'],
					'waste'=>$row['QTY_Waste'],
					'damage'=>$row['QTY_Damage']
				),
				'draft'=>array(
					'text'=>'ยอดจอง Draft',
					'good'=>$reserve_draft[$row['Stock_AutoID']]['good'],
					'waste'=>$reserve_draft[$row['Stock_AutoID']]['waste'],
					'damage'=>$reserve_draft[$row['Stock_AutoID']]['damage']
				),
				'reserve'=>array(
					'text'=>'ยอดรับจอง',
					'good'=>$row['QTY_ReserveGood'],
					'waste'=>$row['QTY_ReserveWaste'],
					'damage'=>$row['QTY_ReserveDamage']
				),
				'total'=>array(
					'text'=>'ยอดคงเหลือ',
					'good'=>$row['QTY_Good']-($reserve_draft[$row['Stock_AutoID']]['good']+$row['QTY_ReserveGood']),
					'waste'=>$row['QTY_Waste']-($reserve_draft[$row['Stock_AutoID']]['waste']+$row['QTY_ReserveWaste']),
					'damage'=>$row['QTY_Damage']-($reserve_draft[$row['Stock_AutoID']]['damage']+$row['QTY_ReserveDamage']),
				),
			);
		}
		
		
		$content['all_inventory'] = $all_inventory;
		
		
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

		$data['content'] = $this->load->view('product/table_qty',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				// 'js/app/reserve/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
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
			$result['Product_Photo'] = $this->config->item('productimg_path').$result['Product_Photo'];
		}
		
		$data['product'] = $result;
		
		$query = $this->inventory_model->get_all_product_stock($product_id);
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
		
		/*
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
		
		foreach ($data['inventory'] as $value) {
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
		
		$data['total'] = $total;
		
		 * 
		 * */
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

	private function get_notification()
	{
		return $this->reserve_model->notification();
	}
	
	//here
	
	public function save_draft()
	{
		
		//update main ticket
		$query = $this->transaction_model->save_draft();	
		
		if($query)
		{
			echo json_encode(array('result'=>true));
		}else{
			echo json_encode(array('result'=>false));
		}
		
			
	}
	
	public function cancel_all($tkid)
	{
		$delete = $this->reserve_model->cancel_rs($tkid);
		
		if($delete){
			echo 'true';
		}else{
			echo 'false';
		}
	}
	
	private function is_exist_rsid($id)
	{
		if($id == "" || $id == NULL){
			return false;	
		}
		
		return $this->reserve_model->is_exist_rsid($id);
	}

	private function gen_rsid()
	{
		$this->load->helper('string');
		//yy
		$year =  date('Y');
		$year += 543;
		$year = substr($year, 2);
		//mm
		$month = date('m');
		$rsid = $year."-".$month;
		
		$this->db->where('TK_Code','RS');
		$this->db->like('TK_ID', $rsid, 'after');
		$this->db->order_by('TK_ID', 'DESC');
		$query = $this->db->get('Inventory_Transaction', 1);
		
		if($query->num_rows()>0)
		{
			//have
			$row = $query->row_array();
			$arr = explode("-", $row['TK_ID']);
			$auto_num = (int)$arr[2];
			$auto_num += 1;
			$id_len = strlen($auto_num);
			$repeat = 4-$id_len;
			$zero = repeater('0',$repeat);
			$next_id = $zero.$auto_num;
			
			return $rsid.'-'.$next_id;
			
		}else{
			//not have
			return $rsid = $rsid.'-0001';
		}
	}
	
	private function find_tid($TK_ID)
	{
		$where = array(
			'TK_Code'=>'RS',
			'TK_ID'=>$TK_ID	
		);
		$this->db->select('Transact_AutoID');
		$this->db->where($where);
		$query = $this->db->get('Inventory_Transaction', 1);
		
		$row = $query->row_array();
		
		return $row['Transact_AutoID'];
		
	}
	
	private function check_tran_dup($tkid, $product_id, $stock)
	{
		$auto_id = $this->find_tid($tkid);
		
		$where = array(
			'Transact_AutoID'=> $auto_id,
			'Product_ID'=> $product_id,
			'Effect_Stock_AutoID'=> $stock
		);
		
		$this->db->where($where);
		
		$query = $this->db->get('Inventory_Transaction_Detail');

		
		if($query->num_rows()>0)
		{
			return false;
		}
		
		return true;
		
		
	}
	
	private function check_tran_qty($detail)
	{
		/**
		 * Product_ID
		 * Effect_Stock_AutoID
		 * QTY_Good
		 * QTY_Waste
		 * QTY_Damage
		 */
		 
		 
		 $this->db->where('Product_ID', $detail['Product_ID']);
		 $this->db->where('Stock_AutoID', $detail['Effect_Stock_AutoID']);
		 $this->db->where('QTY_RemainGood>=', $detail['QTY_Good']);
		 $this->db->where('QTY_RemainWaste>=', $detail['QTY_Waste']);
		 $this->db->where('QTY_RemainDamage>=', $detail['QTY_Damage']);
		 
		 $query = $this->db->get('Inventory_Detail');
		 
		 
		if($query->num_rows()==0)
		{
			return false;
		}	
		
		return true;
	}
	
	public function count_qty($type, $autoid)
	{
		$this->db->select_sum($type);
		$this->db->where('Transact_AutoID', $autoid);
		$query = $this->db->get('Inventory_Transaction_Detail')->row_array();
		return number_format($query[$type]);
		
	}
	
}