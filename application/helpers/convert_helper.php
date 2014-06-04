<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_province'))
{
		
		function get_province($province_id)
		{
			$ci =& get_instance();
			$ci->db->where('code',$province_id);
			$query = $ci->db->get('provinces');
			
			if($query->num_rows()>0)
			{
				$row = $query->row_array();
				return "จ.".$row['name'];
			}else{
				return "";
			}
		}
}//end if


/**
 * get prefix of district or sub_district
 * 
 * @param text, province_id, text (1==sub_district, 2==district, 3==province)
 * 
 * @return text with prefix
 * 
 * 
 */

if ( ! function_exists('get_prefix'))
{
		
		function get_prefix($text, $province_id, $type)
		{
			$ci =& get_instance();
			
			if($text == "")
			{
				return $text;
			}
			
			if($province_id == "" or $province_id == 0)
			{
				return $text;
			}
			
			//if bangkok
			if($province_id == 10)
			{
				if($type == 1)
				{
					//if sub district
					return "แขวง".$text;
				}elseif($type == 2){
					//if district
					return "เขต".$text;
				}
				
			}else{
				//if not bangkok
				if($type == 1)
				{
					//if sub district
					return "ต.".$text;
				}elseif($type == 2){
					//if district
					return "อ.".$text;
				}
			}
			
		}
}//end if





/* End of file address_helper.php */
/* Location: ./application/helpers/address_helper.php */
