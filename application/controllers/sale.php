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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>'active'
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>'active'
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>'active'
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>'active'
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>'active'
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>'active'
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>'active'
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>'active'
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>''
									)
								);
		
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

	public function sale_used()
	{
		$content['title'] = 'ใบสั่งขายทั้งหมด';
		$content['breadcrumb'] = array(
									0 => array(
										'name'=>'ระบบการตัดขาย',
										'link'=>'all',
										'class'=>''
									),
									1 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกประจำ (SA) <span class="badge badge-error">'.$this->notification['SA'].'</span>',
										'link'=>'sa',
										'class'=>''
									),
									2 => array(
										'name'=>'ลูกค้าเงินเชื่อหนังสือออกเพิ่มเติม (SS) <span class="badge badge-error">'.$this->notification['SS'].'</span>',
										'link'=>'ss',
										'class'=>''
									),
									3 => array(
										'name'=>'ลูกค้าเงินสดหนังสือออกประจำ (SC) <span class="badge badge-error">'.$this->notification['SC'].'</span>',
										'link'=>'sc',
										'class'=>''
									),
									4 => array(
										'name'=>'ขายเลหลัง (SZ) <span class="badge badge-error">'.$this->notification['SZ'].'</span>',
										'link'=>'sz',
										'class'=>''
									),
									5 => array(
										'name'=>'ลูกค้าสมาชิก (SM) <span class="badge badge-error">'.$this->notification['SM'].'</span>',
										'link'=>'sm',
										'class'=>''
									),
									6 => array(
										'name'=>'ลูกค้าไปรษณีย์ (SD) <span class="badge badge-error">'.$this->notification['SD'].'</span>',
										'link'=>'sd',
										'class'=>''
									),
									7 => array(
										'name'=>'กิจกรรมพิเศษ (SE) <span class="badge badge-error">'.$this->notification['SE'].'</span>',
										'link'=>'se',
										'class'=>''
									),
									8 => array(
										'name'=>'ใบสั่งขายทั้งหมด',
										'link'=>'sale_used',
										'class'=>'active'
									)
								);
		
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
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}


	public function get_sale_used()
	{
		
		$result = $this->sale_model->get_used();
		
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
		
		$json = array(
			'data'=>$result
		);
		
		echo json_encode($json);
	}

	
	public function detail($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
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
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['transaction'] = $this->sale_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->sale_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
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
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
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
	
	
	
	public function add($rsid="")
	{
		$this->load->model('customer_model');
		
		$content['title'] = 'รายละเอียดการจองสินค้า';
		$content['transaction'] = $this->sale_model->get_inventory_transaction($rsid);
		$content['transaction_detail'] = $this->sale_model->get_transaction_detail($content['transaction']['Transact_AutoID']);
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
		// print_r($sale);
		
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
	
}