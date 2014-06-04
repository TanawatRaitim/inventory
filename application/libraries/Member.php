<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member {
	
	private $ci;
	private $member_id;
	private $member_code;
	private $member_info;
	private $member_blank;
	private $count_member_history;
	private $id_card;
	private $history_id;
	private $history_info;
	private $last_history_id;
	private $last_history_info;
	private $last_history_blank;
	private $contact_id;
	private $contact_info;
	private $last_contact_id;
	private $last_contact_info;
	private $last_contact_blank;
	private $personalize_id;
	private $personalize_info;
	private $last_personalize_id;
	private $last_personalize_blank;
	
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('member_model');
	}
	
    public function index()
    {

	}
	
	public function set_idcard($idcard)
	{
		$this->id_card = $idcard;
		
		//get member
		$member = $this->ci->member_model->get_member($this->id_card);
		
		$this->member_info = $member->result_array();
		
		foreach($member->result_array() as $info)
		{
			$this->member_id = $info['id'];
			$this->member_code = $info['member_code'];
		}

		//get history
		$last_history = $this->ci->member_model->get_last_history($this->member_id);		
		$this->last_history_info = $last_history->result_array();
		foreach ($last_history->result_array() as $info) {
			$this->last_history_id = $info['id'];
			$this->last_contact_id = $info['contact_id'];
			$this->last_personalize_id = $info['personalize_id'];
		}
			
		//get personalize
		$last_personalize = $this->ci->member_model->get_last_personalize($this->last_personalize_id);
		$this->last_personalize_info = $last_personalize->result_array();
				
		//get contact
		$last_contact = $this->ci->member_model->get_last_contact($this->last_contact_id);
		$this->last_contact_info = $last_contact->result_array();
		
	}

	public function set_history_id($history_id)
	{
		
		//get idcard from history_id
		
		$idcard = $this->get_idcard_from_history($history_id);
		$this->history_id = $history_id;
		$this->id_card = $idcard;
		
		//get member
		$member = $this->ci->member_model->get_member($this->id_card);
		
		$this->member_info = $member->result_array();
		
		foreach($member->result_array() as $info)
		{
			$this->member_id = $info['id'];
			$this->member_code = $info['member_code'];
		}

		//get history
		//$last_history = $this->ci->member_model->get_last_history($this->member_id);
		$history = $this->ci->member_model->get_history($history_id);		
		$this->history_info = $history->result_array();
		foreach ($history->result_array() as $info) {
			//$this->last_history_id = $info['id'];
			$this->contact_id = $info['contact_id'];
			$this->personalize_id = $info['personalize_id'];
		}
			
		//get personalize
		$personalize = $this->ci->member_model->get_personalize($this->personalize_id);
		$this->personalize_info = $personalize->result_array();
				
		//get contact
		$contact = $this->ci->member_model->get_contact($this->contact_id);
		$this->contact_info = $contact->result_array();
	}
	
	public function is_member()
	{
		
		return $this->ci->member_model->is_member($this->id_card);
	
	}
	
	public function get_member_info()
	{
		return $this->member_info;
	}
	
	public function get_all_member_history()
	{
		$all_history = $this->ci->member_model->get_all_member_history($this->member_id);
		//member history rows
		$this->count_member_history = $all_history->num_rows();
		return $all_history->result_array();
	}
	
	//public function get_member_by_issue($book, $issue, $volume)
	//{
		//return get_member_by_issue()
	//}
	
	public function get_count_history()
	{
		return $this->count_member_history;
	}
	
	public function get_last_history_info()
	{
		return $this->last_history_info;
	}
	
	public function get_history_info()
	{
		return $this->history_info;
	}
	
	
	public function has_contact()
	{
		
	}
		
	public function get_contact_info()
	{
		return $this->contact_info;
	}
	public function get_last_contact_info()
	{
		return $this->last_contact_info;
	}
	
	public function get_personalize_info()
	{
		return $this->personalize_info;
	}
	
	
	public function get_last_personalize_info()
	{
		return $this->last_personalize_info;
	}
	
	public function get_blank($table)
	{
		return $this->ci->member_model->get_blank($table);
	}
	
	public function add()
	{
		if($this->ci->input->post('ismember')=="yes")
		{
			$history_id = $this->ci->member_model->add_old_member();	
		}else{
			$history_id = $this->ci->member_model->add_new_member();
		}
		
		return $history_id;
	}
	
	public function update()
	{
		$history_id = $this->ci->member_model->update_history();
		return $history_id;
	}
	
	
	public function is_book_register()
	{
		return $register = $this->ci->member_model->is_book_register();

	}
	
	
	/**
	 * @return true if passed 3 months
	 * 
	 */
	public function is_3months()
	{
		$current_date =  date('Y-m-d');
		$current_date = strtotime($current_date);
		$date_created = $this->ci->member_model->get_created_date_member($this->member_id);
		$date_created = strtotime($date_created);
		$diff = $current_date-$date_created;
		$months_diff = floor($diff / 86400 / 30 );
		
		if($months_diff>3)
		{
			return true;
		}else{
			return false;
		}
		
	}
	
	private function get_idcard_from_history($history_id)
	{
		return $this->ci->member_model->get_idcard_from_history($history_id);
	}
		
}

/* End of file Member.php */