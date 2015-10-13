<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth2
{
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
    public function index()
    {
		//echo 'auth class';	
	}
	
	public function check()
	{
		
		$admin_type_id = $this->ci->config->item('admin_type_id');
		$query = $this->ci->db->get_where('Employees',
									array('Inven_User'=>$_POST['identity'],
										  'Inven_Pass'=>$_POST['password']	
									),
								1	
								);
		
		if($query->num_rows()==1){
			
			$result = $query->row_array();
			
			$this->ci->session->set_userdata($result);
			
			if($this->ci->session->userdata('UserGroup') == $admin_type_id)
			{
				$this->ci->session->set_userdata('is_admin', TRUE);
				//$result['is_admin'] = TRUE;
				
			}else{
				//$result['is_admin'] = FALSE;	
				$this->ci->session->set_userdata('is_admin', FALSE);
				
			}
			
			return TRUE;
		}
		
	}
	
	public function logged_in()
	{

		
		//print_r($this->session->userdata('user_session'));
		if($this->ci->session->userdata('Inven_User')){
			return true;
		}
		
		return false;
	}
	
	public function logout()
	{
		$this->ci->session->sess_destroy();
		redirect('auth/login');
	}
	
	
	
}
