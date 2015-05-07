<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



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
 * change dd/mm/yyyy to yyyy-mm-dd
 * @param string
 * @return mysql date
 * 
 */
if ( ! function_exists('convert_date_to_mssql'))
{
		
		function convert_date_to_mssql($date="")
		{
				
			if($date != "" && $date != '00-00-0000')
			{
				$split = explode('/',$date);
				
				$mssql_date = $split[2]."-".$split[1]."-".$split[0];
				
				return $mssql_date;
			}else{
				return "";
			}

		}
}//end if

/**
 * 
 * change  yyyy-mm-dd to dd/mm/yyyy
 * @param string
 * @return mysql date
 * 
 */
if ( ! function_exists('convert_mssql_date'))
{
		
		function convert_mssql_date($date="")
		{
				
			if($date != "" && $date != '0000-00-00')
			{
				$split = explode('-',$date);
				
				$mssql_date = $split[2]."/".$split[1]."/".$split[0];
				
				return $mssql_date;
			}else{
				return "";
			}

		}
}//end if

/**
 * 
 * change  yyyy-mm-dd to dd-mm-yyyy
 * @param string
 * @return mysql date
 * 
 */
if ( ! function_exists('convert_mssql_date2'))
{
		
		function convert_mssql_date2($date="")
		{
				
			if($date != "" && $date != '0000-00-00')
			{
				$split = explode('-',$date);
				
				$mssql_date = $split[2]."-".$split[1]."-".$split[0];
				
				return $mssql_date;
			}else{
				return "";
			}

		}
}//end if

/**
 * 
 * change  yyyy-mm-dd to dd-mm-yyyy hh:mm
 * @param string
 * @return datetime
 * 
 */
if ( ! function_exists('convert_mssql_datetime'))
{
		
		function convert_mssql_datetime($date="")
		{
			//echo date('d-m-Y',strtotime($transaction['DocRef_Date']));
				
			if($date != "" && $date != '0000-00-00')
			{

				
				return date('d-m-Y h:m',strtotime($date));
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
