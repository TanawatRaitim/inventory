<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cut extends CI_Controller {
	
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
		$this->load->model('cut_model');
		$this->notification = $this->cut_model->notification();
		
	}

	public function all()
	{
		$content['title'] = 'ข้อมูลการตัดจ่ายทั้งหมด';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/all.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function fr()
	{
		$content['title'] = 'อภินันท์ (FR)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>'active'
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/fr.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function tt()
	{
		$content['title'] = 'รวมเล่มใหม่ (TT)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/tt.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function zz()
	{
		$content['title'] = 'ตัดเคลียร์สต็อค (ZZ)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/zz.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function mo()
	{
		$content['title'] = 'ชัวคราวเพื่อซ่อมแซม (MO)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>'active'
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/mo.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function xs()
	{
		$content['title'] = 'สินค้าตัวอย่าง (XS)';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>'active'
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>''
									)
								);
		
		$data['content'] = $this->load->view('cut/main',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/xs.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	
	public function cut_used()
	{
		$content['title'] = 'ใบตัดจ่ายทั้งหมด';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>'fr',
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>'tt',
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>'zz',
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>'mo',
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>'xs',
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>'cut_used',
										'class'=>'active'
									)
								);
		
		$data['content'] = $this->load->view('cut/cut_used',$content, TRUE);
		
		//initail template	
		$css = array(
				'datatable/media/css/dataTables.bootstrap.css',
				'datatable/extensions/TableTools/css/dataTables.tableTools.min.css'
		);
		
		$js = array(
				'datatable/media/js/jquery.dataTables.min.js',
				'datatable/media/js/dataTables.bootstrap.js',
				'datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
				'js/app/cut/cut_used.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function get_cut_all($type='cut')
	{
		
		$result = $this->cut_model->get_cut_all($type);
		
		$result2 = $this->cut_model->count_transaction_detail();
		
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
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}


	public function get_cut_used()
	{
		
		$result = $this->cut_model->get_used();
		
		$result2 = $this->cut_model->count_transaction_detail();
		
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
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}

	
	public function detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>site_url('cut/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>site_url('cut/fr'),
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>site_url('cut/tt'),
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>site_url('cut/zz'),
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>site_url('cut/mo'),
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>site_url('cut/xs'),
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>site_url('cut/cut_used'),
										'class'=>''
									)
								);
		$content['transaction'] = $this->cut_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->cut_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		
		$data['content'] = $this->load->view('cut/detail',$content, TRUE);
		
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
			'js/app/cut/detail.js'
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>site_url('cut/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>site_url('cut/fr'),
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>site_url('cut/tt'),
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>site_url('cut/zz'),
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>site_url('cut/mo'),
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>site_url('cut/xs'),
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>site_url('cut/cut_used'),
										'class'=>''
									)
								);
		$content['transaction'] = $this->cut_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->cut_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->cut_model->get_transaction_for($content['transaction']['Transaction_For']);
		
		
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
		
		$data['content'] = $this->load->view('cut/view_detail',$content, TRUE);
		
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
			'js/app/cut/view_detail.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}
	
	public function view_used_detail($type, $id)
	{

		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>site_url('cut/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>site_url('cut/fr'),
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>site_url('cut/tt'),
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>site_url('cut/zz'),
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>site_url('cut/mo'),
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>site_url('cut/xs'),
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>site_url('cut/cut_used'),
										'class'=>''
									)
								);
		$content['transaction'] = $this->cut_model->get_transaction_used($type, $id);
		
		
		// $content['transaction_detail'] = $this->cut_model->get_transaction_used_detail($content['transaction']['Transact_AutoID']);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->cut_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->cut_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('cut/view_detail',$content, TRUE);
		
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
			'js/app/cut/view_detail.js'
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดจ่าย',
										'link'=>site_url('cut/all'),
										'class'=>''
									),
									1 => array(
										'name'=>'อภินันท์ (FR) <span class="badge badge-error">'.$this->notification['FR'].'</span>',
										'link'=>site_url('cut/fr'),
										'class'=>''
									),
									2 => array(
										'name'=>'รวมเล่มใหม่ (TT) <span class="badge badge-error">'.$this->notification['TT'].'</span>',
										'link'=>site_url('cut/tt'),
										'class'=>''
									),
									3 => array(
										'name'=>'ตัดเคลียร์สต็อค (ZZ) <span class="badge badge-error">'.$this->notification['ZZ'].'</span>',
										'link'=>site_url('cut/zz'),
										'class'=>''
									),
									4 => array(
										'name'=>'ชัวคราวเพื่อซ่อมแซม (MO) <span class="badge badge-error">'.$this->notification['MO'].'</span>',
										'link'=>site_url('cut/mo'),
										'class'=>''
									),
									5 => array(
										'name'=>'สินค้าตัวอย่าง (XS) <span class="badge badge-error">'.$this->notification['XS'].'</span>',
										'link'=>site_url('cut/xs'),
										'class'=>''
									),
									6 => array(
										'name'=>'ใบตัดจ่ายทั้งหมด',
										'link'=>site_url('cut/cut_used'),
										'class'=>''
									)
								);
								
		$content['transaction'] = $this->cut_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->transaction_model->get_table_transaction_detail($content['transaction']['Transact_AutoID']);
		$content['customer'] = $this->customer_model->get($content['transaction']['Cust_ID']);
		$content['approve_person'] = $this->cut_model->get_approve_person($content['transaction']['ApprovedBy']);
		$content['transaction_for'] = $this->cut_model->get_transaction_for($content['transaction']['Transaction_For']);
		
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
		
		$data['content'] = $this->load->view('cut/add',$content, TRUE);
		
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
			'js/app/cut/add.js'
			);
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		
		$this->load->view('template/main',$data);
	}

	public function set_is_used()
	{
		
		parse_str($_POST['cut'], $data);
		
		$result = $this->cut_model->set_is_used($data);
		
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
	
}