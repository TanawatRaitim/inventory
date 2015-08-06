<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pre'))
{
		
	function pre()
	{
		return '<pre>';

	}
	
}//end if

if ( ! function_exists('pre_close'))
{
		
	function pre_close()
	{
		return '</pre>';

	}
	
}//end if

if ( ! function_exists('gen_product_internal_barcode'))
{
		
	function gen_product_internal_barcode($product_id)
	{
		$ci =& get_instance();
		
		$barcode_path = $ci->config->item('product_internal_barcode_path');
		$file = $barcode_path.$product_id.'.gif';
		
		
		if(file_exists($file))
		{
			//already have barcode
			return $file;
			
		}else{
			
			$ci->load->library('Barcode39');
			
			
			// set Barcode39 object 
			$bc = new Barcode39($product_id); 
			
			// display new barcode 
			$bar = $bc->draw('assets/product_internal_barcode/'.$product_id.'.gif');
			
			return $file;
			
		}
		


	}
	
}//end if







/* End of file arr_helper.php */
/* Location: ./application/helpers/arr_helper.php */
