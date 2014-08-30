<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('check_key'))
{
		
	function check_key($arr, $key)
	{
		if(isset($arr[$key]) || array_key_exists($key, $arr))
		{
			return TRUE;
		}else{
			return FALSE;
		}

	}
}//end if







/* End of file arr_helper.php */
/* Location: ./application/helpers/arr_helper.php */
