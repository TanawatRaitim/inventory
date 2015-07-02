<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('get_employee_name'))
	{
			
			function get_employee_name($id)
			{
				if($id == '')
			{
				return 'N/A';
			}
			
			$ci =& get_instance();
			$ci->db->where('Emp_ID',$id);
			$query = $ci->db->get('Employees');
			
			if($query->num_rows() == 0)
			{
				return 'N/A';
			}else{
				$row = $query->row_array();
				
				return $row['Emp_FnameTH']." ".$row['Emp_LnameTH'];
				}
			}
	}//end if

	if ( ! function_exists('get_employee_firstname'))
	{
			
			function get_employee_firstname($id)
			{
				if($id == '')
			{
				return 'N/A';
			}
			
			$ci =& get_instance();
			$ci->db->where('Emp_ID',$id);
			$query = $ci->db->get('Employees');
			
			if($query->num_rows() == 0)
			{
				return 'N/A';
			}else{
				$row = $query->row_array();
				
				return $row['Emp_FnameTH'];
				}
			}
	}//end if
	
	if ( ! function_exists('get_product_autoid'))
	{
			
			function get_product_autoid($product_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('Product_ID',$product_id);
			$query = $ci->db->get('Products');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$row = $query->row_array();
			return $row['Product_AutoID'];
			}
	}//end if
	
	if ( ! function_exists('get_ticket_code_name'))
	{
			
			function get_ticket_code_name($tkcode)
			{
				
				$ci =& get_instance();
				$ci->db->where('TK_Code',$tkcode);
			$query = $ci->db->get('Ticket_Type');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$row = $query->row_array();
			
			return $row['TK_Description'];
			}
	}//end if
	
	if ( ! function_exists('get_ticket_code_id'))
	{
			
			function get_ticket_code_id($autoid)
			{
				
				$ci =& get_instance();
				$ci->db->where('Transact_AutoID',$autoid);
			$query = $ci->db->get('Inventory_Transaction');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$row = $query->row_array();
			
			return $row['TK_Code'].$row['TK_ID'];
			}
	}//end if
	
	if ( ! function_exists('get_ticket_code'))
	{
			
			function get_ticket_code($autoid)
			{
				
				$ci =& get_instance();
				$ci->db->where('Transact_AutoID',$autoid);
				$query = $ci->db->get('Inventory_Transaction');
				
				if($query->num_rows() == 0)
				{
					return "N/A";
				}
				
				$row = $query->row_array();
				
				return $row['TK_Code'];
			}
	}//end if
	
	if ( ! function_exists('get_ticket_by_category'))
	{
			
			function get_ticket_by_category($category)
			{
				
				$ci =& get_instance();
				$where = array(
					'TK_Category'=>$category,
					'RowStatus'=>'active',
					'IsDel'=>0
				);
				
				$ci->db->where($where);
				$query = $ci->db->get('Ticket_Type');
				
				
				$tickets = $query->result_array();
				
				return $tickets;
			}
	}//end if
	
	
	
	
	if ( ! function_exists('get_customer_name'))
	{
			
			function get_customer_name($customer_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('Cust_ID',$customer_id);
				$query = $ci->db->get('Customers');
				
				if($query->num_rows() == 0)
				{
					return "N/A";
				}
				
				$row = $query->row_array();
				
				return $row['Cust_Name'];
			}
	}//end if
	
	if ( ! function_exists('get_customer_line'))
	{
			
			function get_customer_line($line_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('CusLine_ID',$line_id);
				$query = $ci->db->get('Customer_Line');
				
				if($query->num_rows() == 0)
				{
					return "N/A";
				}
				
				$row = $query->row_array();
				
				return $row['CusLine_Name'];
			}
	}//end if
	
	if ( ! function_exists('get_area'))
	{
			
			function get_area($area_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('CustArea_ID',$area_id);
				$query = $ci->db->get('Customer_Area');
				
				if($query->num_rows() == 0)
				{
					return "N/A";
				}
				
				$row = $query->row_array();
				
				return $row['CustArea_Name'];
			}
	}//end if
	
	if ( ! function_exists('get_customer'))
	{
			
			function get_customer($customer_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('Cust_ID',$customer_id);
			$query = $ci->db->get('Customers');
				
				if($query->num_rows() == 0)
				{
					return false;
				}
				
				return $query->row_array();
				
			}
	}//end if
	
	if ( ! function_exists('get_customer_address'))
	{
			
			function get_customer_address($customer_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('Cust_ID',$customer_id);
				$query = $ci->db->get('Customers');
				
				if($query->num_rows() == 0)
				{
					return "N/A";
				}
				
				$customer = $query->row_array();
				
				return $customer['Cust_Name']." (".$customer['Cust_Contact'].") ".$customer['Cust_Addr'];
				
			}
	}//end if
	
	if ( ! function_exists('get_inventory_name'))
	{
			
			function get_inventory_name($inventory_id)
			{
				
				$ci =& get_instance();
				$ci->db->where('Stock_AutoID',$inventory_id);
			$query = $ci->db->get('Inventory');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$inventory = $query->row_array();
			
			return $inventory['Stock_Name']; 
				
			}
	}//end if
	
	if ( ! function_exists('get_age_inventory'))
	{
			
			function get_age_inventory($age)
			{
				
				$ci =& get_instance();
				$ci->db->where('AppStatValue',$age);
			$ci->db->where('AppStatType','AGE-ALL');
			$query = $ci->db->get('AppStatus');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$result = $query->row_array();
			
			return $result['AppStatName']; 
				
			}
	}//end if
	
	if ( ! function_exists('get_product_name'))
	{
			
			function get_product_name($product_id)
			{
				$ci =& get_instance();
				$ci->db->where('Product_ID',$product_id);
			// $ci->db->where('AppStatType','AGE-ALL');
			$query = $ci->db->get('Products');
			
			if($query->num_rows() == 0)
			{
				return "N/A";
			}
			
			$result = $query->row_array();
			
			return $result['Product_Name']." # ".$result['Product_Vol']; 
				
			}
	}//end if
	
	if ( ! function_exists('get_count_detail'))
	{
			
			function get_count_detail($auto_id)
			{
				$ci =& get_instance();
				$ci->db->where('Transact_AutoID', $auto_id);
			$query = $ci->db->get('Inventory_Transaction_Detail');
				
				return $query->num_rows();
				
			}
	}//end if
	
	if ( ! function_exists('get_transaction_for'))
	{
			
			function get_transaction_for($code)
			{
				$ci =& get_instance();
				$ci->db->where('TK_Code', $code);
				$query = $ci->db->get('Ticket_Type');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					return $row['TK_Description'];
				}else{
					return "N/A";
				}
				
			}
	}//end if
	
	if ( ! function_exists('get_transaction_for'))
	{
			
			function get_transaction_for($code)
			{
				$ci =& get_instance();
				$ci->db->where('TK_Code', $code);
				$query = $ci->db->get('Ticket_Type');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					return $row['TK_Description'];
				}else{
					return "N/A";
				}
				
			}
	}//end if
	
	if ( ! function_exists('get_transport_name'))
	{
			
			function get_transport_name($id)
			{
				$ci =& get_instance();
				$ci->db->where('Trans_ID', $id);
				$query = $ci->db->get('Transport');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					return $row['Trans_Name'];
				}else{
					return "N/A";
				}
				
			}
	}//end if
	
	if ( ! function_exists('get_product_return_period'))
	{
			
			function get_product_return_period($product_id, $customer_id)
			{
				$ci =& get_instance();
				
				$type_id = '';
				$freq_id = '';
				
				//get product
				$ci->db->where('Product_ID', $product_id);
				$query = $ci->db->get('Products');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					
					$type_id = $row['ProType_ID'];
					$freq_id = $row['ProFreq_ID'];
					
				}else{
					return "N/A";
				}
				
				//get return period from return customize
				$ci->db->where(array(
					'Cust_ID'=>$customer_id,
					'ProType_ID'=>$type_id,
					'ProFreq_ID'=>$freq_id
				));
				 
				$query = $ci->db->get('Return_Customize');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					
					return $row['Return_Period'];
					
				}
				
				
				//if not have customize get from standard
				$ci->db->where(array(
					'ProType_ID'=>$type_id,
					'ProFreq_ID'=>$freq_id
				));
				 
				$query = $ci->db->get('Return_Standard');
				
				if($query->num_rows()>0)
				{
					$row = $query->row_array();
					
					return $row['Return_Period'];
					
				}else{
					return 'N/A';
				}
				
				
			}
	}//end if




/* End of file get_data_helper.php */
/* Location: ./application/helpers/get_data_helper.php */
