<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
		
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->auth2->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('assets');
		$this->load->model('in_model');
	}

	public function age_inventory()
	{
		$content['title'] = 'รายงานอายุสินค้าคงคลัง';
		$content['product_type_dropdown'] = product_type_dropdown();	
		$content['product_group_dropdown'] = product_group_dropdown();	
		$content['product_category_dropdown'] = product_category_dropdown();
		$content['age_return_dropdown'] = age_return_dropdown();

		$data['content'] = $this->load->view('report/age_inventory',$content, TRUE);
		
		//initail template	
		
		$js = array(
				'js/app/in/all.js'
		);
				
		$data['css'] = $this->assets->get_css();
		$data['js'] = $this->assets->get_js($js);
		
		$this->load->view('template/main',$data);
	}
	
	public function packing_info($id, $print_type = "")
	{
		//get inventory transaction
		$where_transaction = array(
			'Transact_AutoID'=>$id
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
			
			$content['transport_by'] = get_transport_name($transaction['Transport_By']);
			
			$content['ticket'] = $transaction['DocRef_No'];
			//get ticket code name
			$content['tk_name'] = get_ticket_code_name($transaction['TK_Code']).' ['.$transaction['TK_Code'].']';
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
			
			$data['content'] = $this->load->view('report/packing_info',$content, TRUE);
			
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
				'js/app/report/packing_info.js'
				);
			$data['css'] = $this->assets->get_css($css);
			$data['js'] = $this->assets->get_js($js);
			
			if($print_type == 'excel')
			{
				$data['excel'] = TRUE;
				$data['excel_name'] = $id.'.xls';
			}
			// $data['navigation'] = $this->load->view('template/navigation','',TRUE);
			
			$this->load->view('template/main',$data);
			
		}else{
			echo 'ไม่พบรายการ';
			exit();
		}
		
		//
	}

	public function packing_list()
	{
		
		$content['title'] = "Packing List";
		
		//area dropdown
		$content['area_dropdown'] = area_dropdown();
		
		//customer line dropdown
		$content['customer_line_dropdown'] = customer_line_dropdown();
		
		$data['content'] = $this->load->view('report/packing_list',$content ,TRUE);
		
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
			'js/app/report/packing_list.js'
			);
		
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		$data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->load->view('template/main',$data);
	
	}
	
	public function packing_list_show()
	{
		
		$arr_sale_code = $this->input->post('sale_code');
		$start_date = $this->input->post('start_date_submit'); 
		$end_date = $this->input->post('end_date_submit'); 
		$customer_line = $this->input->post('customer_line'); 
		$customer_area = $this->input->post('area'); 
		
		//get sale type text
		$sale_type = '';
		$sale_sql = "";
		
		for ($i=0; $i <=count($arr_sale_code)-1 ; $i++) {
			 
			if($i != count($arr_sale_code)-1)
			{
				$sale_type .= $arr_sale_code[$i]." / ";
				$sale_sql .= "'".$arr_sale_code[$i]."',";
				
			}else{
				$sale_type .= $arr_sale_code[$i];
				$sale_sql .= "'".$arr_sale_code[$i]."'";
			} 
			 
		}//end for
		
		
		
		
		$content['title'] = 'Packing List';
		
		//get customer line name
		$content['customer_line'] = get_customer_line($customer_line);

		//get area name
		$content['customer_area'] = get_area($customer_area);		

		//transport date text
		$content['transport_date'] = $this->input->post('start_date')." จนถึง  ".$this->input->post('end_date');
		
		//sale type
		$content['sale_type'] = $sale_type;
		
		
		$packing_list = array();
		
		//test data
		/*
		$start_date = '2014-04-10';
		$end_date = '2015-12-01';
		$customer_line = 7; 
		$customer_area = 7; 
		*/
		
		$customer_product_sql = "select 
									Inventory_Transaction_Detail.Transact_AutoID, Inventory_Transaction.Cust_ID, Inventory_Transaction_Detail.Product_ID,  sum(Inventory_Transaction_Detail.QTY_Good) as qty
									from Inventory_Transaction
									left join Inventory_Transaction_Detail on Inventory_Transaction_Detail.Transact_AutoID = Inventory_Transaction.Transact_AutoID
									left join Products on products.Product_ID = Inventory_Transaction_Detail.Product_ID
									left join Transport on Transport.Trans_ID = Inventory_Transaction.Transport_By
									left join Customers on Customers.Cust_ID = Inventory_Transaction.Cust_ID
									left join Customer_Line on Customer_Line.CusLine_ID = Customers.CustLine_ID
									left join Provinces on Provinces.Province_ID = Customers.Cust_Province
									left join Customer_Area on Customer_Area.CustArea_ID = Provinces.Area_ID
									where Invoice_Date between '".$start_date."' and '".$end_date."' 
									and TK_Code in ({$sale_sql})
									and Customers.CustLine_ID = {$customer_line}
									and Customer_Area.CustArea_ID = {$customer_area}
									and Inventory_Transaction.Transport_By is not null
									group by Inventory_Transaction_Detail.Transact_AutoID, Inventory_Transaction.Cust_ID, Inventory_Transaction_Detail.Product_ID, Inventory_Transaction_Detail.QTY_Good"; 
		
		$customer_product_query = $this->db->query($customer_product_sql);
		
		$customer_product = array();
		foreach($customer_product_query->result_array() as $row)
		{
				
			// $customer_product[$row['Cust_ID']]['products'][] = array(
			$customer_product[$row['Transact_AutoID']]['products'][] = array(
			
				'product'=>$row['Product_ID'],
				'qty'=>$row['qty'],
			
			);

		}
		
		$transport_sql = "select 
							Inventory_Transaction.Transact_AutoID, Inventory_Transaction.Transport_By, Transport.Trans_Name, Customers.Cust_ID, Customers.Cust_Name, Customers.Cust_Addr
							from Inventory_Transaction
							left join Transport on Transport.Trans_ID = Inventory_Transaction.Transport_By
							left join Customers on Customers.Cust_ID = Inventory_Transaction.Cust_ID
							left join Customer_Line on Customer_Line.CusLine_ID = Customers.CustLine_ID
							left join Provinces on Provinces.Province_ID = Customers.Cust_Province
							left join Customer_Area on Customer_Area.CustArea_ID = Provinces.Area_ID
							where Invoice_Date between '".$start_date."' and '".$end_date."' 
							and TK_Code in ({$sale_sql})
							and Customers.CustLine_ID = {$customer_line}
							and Customer_Area.CustArea_ID = {$customer_area}
							and Inventory_Transaction.Transport_By is not null
							order by Transport_By";
		
		
		$transport_query = $this->db->query($transport_sql);	
		
		$transport_count = $transport_query->num_rows();
		
		foreach($transport_query->result_array() as $val)
		{
			if(!isset($packing_list[$val['Transport_By']]))
			{
				$packing_list[$val['Transport_By']] = array(
									'transport_id'=>$val['Transport_By'],
									'transport_name'=>$val['Trans_Name'],
									'send_to'=>array(
										$val['Cust_ID']=>array(
											'customer_id'=>$val['Cust_ID'],
											'customer_name'=>$val['Cust_Name'],
											'customer_address'=>$val['Cust_Addr'],
											// 'products'=>$customer_product[$val['Cust_ID']]['products']
											'products'=>$customer_product[$val['Transact_AutoID']]['products']
											
											)
										)
									);	
			}else{
				$packing_list[$val['Transport_By']]['send_to'][$val['Cust_ID']] = array(
										'customer_id'=>$val['Cust_ID'],
										'customer_name'=>$val['Cust_Name'],
										'customer_address'=>$val['Cust_Addr'],
										// 'products'=>$customer_product[$val['Cust_ID']]['products']
										'products'=>$customer_product[$val['Transact_AutoID']]['products']
									);
			}
			
									
		}//end foreach transport
		
		//assign customer 
		
		//sort key array
		ksort($packing_list);		
		$content['packing_list'] = $packing_list;
		$data['content'] = $this->load->view('report/packing_list_show',$content, TRUE);
		
		$css = array(
				'css/packing_list_show.css'
				);
			$js = array(
				'js/app/report/packing_list_show.js'
				);
			$data['css'] = $this->assets->get_css($css);
			$data['js'] = $this->assets->get_js($js);
			
		$this->load->view('template/main',$data);	
		
		
	}

	
	
}