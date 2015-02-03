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




/* End of file get_data_helper.php */
/* Location: ./application/helpers/get_data_helper.php */
