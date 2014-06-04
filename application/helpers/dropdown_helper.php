<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('career_dropdown'))
{
		
		function job_dropdown($selected = "")
		{
			$ci =& get_instance();
			// $ci->db->where('is_delete','no');
			// $ci->db->where('status','active');
			$ci->db->order_by('name');
			$query = $ci->db->get('jobs');
			$dropdown = "";
			$dropdown .= "<option value='0'>-งาน-</option>";
			
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




/* End of file dropdown_helper.php */
/* Location: ./application/helpers/dropdown_helper.php */
