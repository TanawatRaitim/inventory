<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('career_dropdown'))
{
		
		function career_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('is_delete','no');
			$ci->db->where('status','active');
			$ci->db->order_by('sort_order');
			$query = $ci->db->get('careers');
			$dropdown = "";
			$dropdown .= "<option value='0'>-อาชีพ-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['id'])
					{
						$dropdown .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


/*
 * change mysql date to thaidate
 * @return thai date
 * */

if ( ! function_exists('mysql2thaidate'))
{
		
		function mysql2thaidate($date="")
		{
				
			if($date != "" && $date != '0000-00-00')
			{
				$split = explode('-',$date);
				/*yy-mm-dd*/
				//thai year
				$split[0] += 543;
				
				$thai_date = $split[2]."-".$split[1]."-".$split[0];
				
				return $thai_date;
			}else{
				return "";
			}

		}
}//end if


/**
 * 
 * change thai date format to mysql date format
 * @param string
 * @return mysql date
 * 
 */

if ( ! function_exists('thaidate2mysql'))
{
		
		function thaidate2mysql($date="")
		{
				
			if($date != "" && $date != '00-00-0000')
			{
				$split = explode('-',$date);
				/*dd-mm-yy*/
				//thai year
				$split[2] -= 543;
				
				$mysql_date = $split[2]."-".$split[1]."-".$split[0];
				
				return $mysql_date;
			}else{
				return "";
			}

		}
}//end if



/**
 * 
 * get age
 * @param mysql date
 * @return age
 * 
 */

if ( ! function_exists('get_age'))
{
		
		function get_age($dob="")
		{
			if($dob != '0000-00-00')
			{
			$then = strtotime($dob);  
			return(floor((time()-$then)/31556926));
			}else{
				return "N/A";
			}
		}
}//end if






/* End of file date_helper.php */
/* Location: ./application/helpers/dropdown_helper.php */
