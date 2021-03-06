<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {
	
	private $notification = array();
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('sale_model');
		$this->notification = $this->sale_model->notification();
		
	}

	
	public function all()
	{
		$content['title'] = 'ข้อมูลการตัดขายทั้งหมด';
		
		$content['breadcrumb'] = $this->get_breadcrumb('all');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	

	public function sa()
	{
		$content['title'] = 'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA)';
		$content['breadcrumb'] = $this->get_breadcrumb('sa');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sa.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function ss()
	{
		$content['title'] = 'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS)';
		$content['breadcrumb'] = $this->get_breadcrumb('ss');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/ss.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function sc()
	{
		$content['title'] = 'ลูกค้าเงินสดหนังสือออกประจำ (SC)';
		$content['breadcrumb'] = $this->get_breadcrumb('sc');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sc.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function sz()
	{
		$content['title'] = 'ขายเลหลัง (SZ)';
		$content['breadcrumb'] = $this->get_breadcrumb('sz');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sz.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function sm()
	{
		$content['title'] = 'ลูกค้าสมาชิก (SM)';
		$content['breadcrumb'] = $this->get_breadcrumb('sm');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sm.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function sd()
	{
		$content['title'] = 'ลูกค้าไปรษณีย์ (SD)';
		$content['breadcrumb'] = $this->get_breadcrumb('sd');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sd.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function se()
	{
		$content['title'] = 'กิจกรรมพิเศษ (SE)';
		$content['breadcrumb'] = $this->get_breadcrumb('se');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/se.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function su()
	{
		$content['title'] = 'ขายระยะยาว (SU)';
		$content['breadcrumb'] = $this->get_breadcrumb('su');
		
		$data['content'] = $this->load->view('sale/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/su.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function sale_used()
	{
		$content['title'] = 'ใบสั่งขายทั้งหมด';
		$content['breadcrumb'] = $this->get_breadcrumb('sale_used');
		
		$data['content'] = $this->load->view('sale/sale_used',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/sale/sale_used.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_sale_all($type='sale')
	{
		
		$result = $this->sale_model->get_sale_all($type);
		
		foreach($result as $key=>$value)
		{
			$this->db->where(array('Transact_AutoID'=>$value['Transact_AutoID']));
			$this->db->from('Inventory_Transaction_Detail');
			$result[$key]['count']= $this->db->count_all_results();
			
		}
		
		/*
		$result2 = $this->sale_model->count_transaction_detail();
		
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


	public function get_sale_used()
	{
		
		$result = $this->sale_model->get_used();
		
		/*
		$result2 = $this->sale_model->count_transaction_detail();
		
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

	
	public function detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['breadcrumb'] = $this->get_breadcrumb();
		
		$content['transaction'] = $this->sale_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->sale_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		
		$data['content'] = $this->load->view('sale/detail',$content, TRUE);
		
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
			'js/app/sale/detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองเลขที่ RS'.$rsid;
		$content['breadcrumb'] = $this->get_breadcrumb();
		$content['transaction'] = $this->sale_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->sale_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->sale_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('sale/view_detail',$content, TRUE);
		
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
			'js/app/sale/view_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_used_detail($type, $id)
	{

		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดใบสั่งขายเลขที่ '.$type.$id;
		$content['breadcrumb'] = $this->get_breadcrumb();
		$content['transaction'] = $this->sale_model->get_transaction_used($type, $id);
		// $content['transaction_detail'] = $this->sale_model->get_transaction_used_detail($content['transaction']['Transact_AutoID']);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->sale_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->sale_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('sale/view_detail',$content, TRUE);
		
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
			'js/app/sale/view_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function datatable($type, $id)
	{

		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['breadcrumb'] = $this->get_breadcrumb();
		$content['transaction'] = $this->sale_model->get_transaction_used($type, $id);
		$content['transaction_detail'] = $this->sale_model->get_transaction_used_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->sale_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->sale_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('sale/datatable',$content, TRUE);
		
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
			'js/app/sale/datatable.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	
	
	public function add($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'สั่งขายจากใบจองเลขที่ RS'.$rsid;
		$content['breadcrumb'] = $this->get_breadcrumb();
		$content['transaction'] = $this->sale_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->sale_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->sale_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('sale/add',$content, TRUE);
		
		$css = array(
			'bootstrap3-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'select2/select2-bootstrap-core.css',
			// 'select2-bootstrap-css-master/select2-bootstrap.css',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css'
			);
		$js = array(
			'js/moment/min/moment.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'bootstrap3-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			// 'select2/select2.min.js',
			//'bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
			'noty/js/noty/packaged/jquery.noty.packaged.min.js',
			'js/jquery_validation/dist/jquery.validate.min.js',
			'js/jquery_validation/dist/additional-methods.min.js',
			'jquery-mask-plugin/jquery.mask.min.js',
			'js/app/sale/add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function set_is_used()
	{
		parse_str($_POST['sale'], $data);
		
		$result = $this->sale_model->set_is_used($data);
		
		if($result)
		{
			echo 'true';
		}else{
			echo 'false';
		}
		
	}
	
	public function check_dup_id($tkcode, $tkid)
	{
		$where = array(
			'TK_Code'=>$tkcode,
			'TK_ID'=>$tkid
		);
		
		$rows = $this->db->get_where('Inventory_Transaction', $where)->num_rows();
		
		if($rows>0)
		{
			//is dup
			echo 'true';
		}else{
			//not dup
			echo 'false';
		}
		
	}
	
	public function check_dup_invoice($invoice_no)
	{
		$where = array(
			'Invoice_No'=>$invoice_no
		);
		
		$rows = $this->db->get_where('Inventory_Transaction', $where)->num_rows();
		
		if($rows>0)
		{
			//is dup
			echo 'true';
		}else{
			//not dup
			echo 'false';
		}
		
	}

	public function get_breadcrumb($active_menu = false)
	{
		
		$breadcrumb = array(
							0 => array(
								'name'=>'ระบบการตัดขาย',
								'link'=>site_url('sale/all'),
								'class'=>'',
								'sale_code'=>'all'
							),
							1 => array(
								'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
								'link'=>site_url('sale/sa'),
								'class'=>'',
								'sale_code'=>'sa'
							),
							2 => array(
								'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
								'link'=>site_url('sale/ss'),
								'class'=>'',
								'sale_code'=>'ss'
							),
							3 => array(
								'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
								'link'=>site_url('sale/sc'),
								'class'=>'',
								'sale_code'=>'sc'
							),
							4 => array(
								'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
								'link'=>site_url('sale/sz'),
								'class'=>'',
								'sale_code'=>'sz'
							),
							5 => array(
								'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
								'link'=>site_url('sale/sm'),
								'class'=>'',
								'sale_code'=>'sm'
							),
							6 => array(
								'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
								'link'=>site_url('sale/sd'),
								'class'=>'',
								'sale_code'=>'sd'
							),
							7 => array(
								'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
								'link'=>site_url('sale/se'),
								'class'=>'',
								'sale_code'=>'se'
							),
							8 => array(
								'name'=>'ขายระยะยาว (SU) <span class="badge badge-error">'.$this->notification['SU'].'</span>',
								'link'=>site_url('sale/su'),
								'class'=>'',
								'sale_code'=>'su'
							),
							9 => array(
								'name'=>'ใบสั่งขายทั้งหมด',
								'link'=>site_url('sale/sale_used'),
								'class'=>'',
								'sale_code'=>'sale_used'
							),
							10 => array(
								'name'=>'Packing List',
								'link'=> site_url('report/packing_list'),
								'class'=>'',
								'sale_code'=>'packing_list'
							)
						);
						
		//set active menu
		
		if($active_menu)
		{
			foreach ($breadcrumb as $key => $value) {
				if($active_menu == $breadcrumb[$key]['sale_code'])
				{
					$breadcrumb[$key]['class'] = 'active';
					break;	
				}//end if
			}//end foreach
		}
		
		return $breadcrumb;
	
}
	

	
	
}