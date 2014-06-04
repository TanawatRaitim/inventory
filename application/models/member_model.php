<?php
	class Member_model extends CI_Model{
		
		private $search_row;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function is_member($idcard)
		{
			$this->db->select('idcard');
			$this->db->from('members');
			$this->db->where('idcard', $idcard);
			$result = $this->db->get();
			
			if($result->num_rows() > 0)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		public function get_created_date_member($member_id)
		{
			$sql = "SELECT DATE_FORMAT(create_date,'%Y-%m-%d') as history_date FROM members WHERE id = $member_id";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			
			return $result[0]['history_date'];
		}
		
		public function get_member($idcard)
		{
			$this->db->where('idcard',$idcard);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			return $this->db->get('members');
		}
		
		public function get_all_member_history($member_id)
		{
			
			$sql = "SELECT members.id as member_id, history.id as history_id, members.idcard, members.member_code, CONCAT(members.title,members.fname,' ',members.lname) as member_name,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, history.info, history.image, history.attachment, sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img,
					DATE_FORMAT(history.create_date,'%Y-%m-%d') as history_date   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					LEFT JOIN sexual ON(sexual.id = history.sexual_id)
					LEFT JOIN provinces ON(provinces.code = members.province_id)
					LEFT JOIN books ON(books.id = history.book_id)
					LEFT JOIN issues ON(issues.id = history.issue_id)
					WHERE member_id = $member_id
					ORDER BY history.id DESC
					";
			
			$query = $this->db->query($sql);
			
			return $query;
			
		}
		
		public function get_personalize($personalize_id)
		{
			$this->db->where('id',$personalize_id);
			return $this->db->get('personalize');
		}
		
		public function get_last_personalize($personalize_id)
		{
			$this->db->where('id',$personalize_id);
			return $this->db->get('personalize');
		}
		
		public function get_contact($contact_id)
		{
			$this->db->where('id',$contact_id);
			return $this->db->get('contacts');
		}
		
		public function get_last_contact($contact_id)
		{
			$this->db->where('id',$contact_id);
			return $this->db->get('contacts');
		}
		
		public function get_history($history_id)
		{
			$this->db->where('id',$history_id);
			return $this->db->get('history');
		}
		
		public function get_last_history($member_id)
		{
			$this->db->where('member_id',$member_id);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			return $this->db->get('history');
		}
		
		public function get_members_by_issue($book, $issue, $volume)
		{
			//echo 'we are in model';
			$this->db->select('*, contacts.address as contact_address, 
								contacts.sub_district as contact_subdistrict, 
								contacts.district as contact_district, 
								contacts.province_id as contact_province,
								contacts.postcode as contact_postcode, 
								provinces.name as province_name,
								contacts.phone as contact_phone,
								contacts.mobile as contact_mobile,
								contacts.email as contact_email
								'
								);
			$this->db->from('history');
			$this->db->join('members','history.member_id = members.id');
			$this->db->join('contacts','history.contact_id = contacts.id');
			$this->db->join('personalize','history.personalize_id = personalize.id');
			$this->db->join('provinces','contacts.province_id = provinces.code');
			$where = array('book_id'=>$book,
							'issue_id'=>$issue,
							'volume'=>$volume
							);
			
			$this->db->where($where);
			$this->db->order_by('history.id','desc');
			$query = $this->db->get();
			return $query;
		}
		
		/**
		 * @return question array()
		 * 
		 */
		public function get_all_question()
		{
			$this->db->select('label_code, label');
			$result = $this->db->get('questions');
			
			$question = array();
			
			foreach ($result->result_array() as $rows) {
				$question[$rows['label_code']] = $rows['label'];
			}
			
			return $question;
		}
		
		public function get_all_history($perpage, $offset)
		{
			
			$sql = "SELECT members.id as member_id, members.dob,  history.id as history_id, members.idcard, members.member_code, CONCAT(members.title,members.fname,' ',members.lname) as member_name,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, history.image, history.attachment,  sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img,
					DATE_FORMAT(history.create_date,'%Y-%m-%d') as history_date   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					LEFT JOIN sexual ON(sexual.id = history.sexual_id)
					LEFT JOIN provinces ON(provinces.code = members.province_id)
					LEFT JOIN books ON(books.id = history.book_id)
					LEFT JOIN issues ON(issues.id = history.issue_id)
					ORDER BY history.id DESC
					";
			
			if($offset)
			{
				$limit = " LIMIT $offset, $perpage";
			}
			else{
				
				$limit = " LIMIT $perpage";
			}
			
			$sql .= $limit;
			
			$query = $this->db->query($sql);
			
			return $query;
		}

		
		public function main_search($keyword, $perpage, $offset)
		{
			$keyword = urldecode($keyword);
			$sql = "SELECT members.id as member_id, history.id as history_id, members.idcard, members.member_code, CONCAT(members.title,members.fname,' ',members.lname) as member_name, members.dob,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, history.image, history.attachment, sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img,
					DATE_FORMAT(history.create_date,'%Y-%m-%d') as history_date   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					LEFT JOIN sexual ON(sexual.id = history.sexual_id)
					LEFT JOIN provinces ON(provinces.code = members.province_id)
					LEFT JOIN books ON(books.id = history.book_id)
					LEFT JOIN issues ON(issues.id = history.issue_id)
					WHERE CONCAT(members.title,members.fname,' ',members.lname) like '%$keyword%' or members.idcard like '%$keyword%' or members.member_code like '%$keyword%' or books.name like '%$keyword%'
					or issues.name like '%$keyword%' or history.volume like '%$keyword%'
					ORDER BY history.id DESC
					";
			$query = $this->db->query($sql);
			//all rows
			$this->search_row = $query->num_rows();
			
			if($offset)
			{
				$limit = " LIMIT $offset, $perpage";
			}
			else{
				
				$limit = " LIMIT $perpage";
			}
						
			$sql .= $limit;
			$query = $this->db->query($sql);
			
			return $query;
		}
		
		public function get_search_rows()
		{
			return $this->search_row;
		}

		public function get_blank($table)
		{
			$this->db->limit(1);
			return $this->db->get($table);
		}
		
		
		/**
		 * 
		 * @return history id
		 * 
		 */
		 
		public function add_old_member()
		{
			//update member
			$update_date = date("Y-m-d H:i:s");
			$member = array(
							'title'=>trim($this->input->post('member_title')),
							'fname'=>trim($this->input->post('member_fname')),
							'lname'=>trim($this->input->post('member_lname')),
							'nickname'=>trim($this->input->post('member_nickname')),
							'dob'=>thaidate2mysql(trim($this->input->post('member_dob'))),
							'address'=>trim($this->input->post('member_address')),
							'sub_district'=>trim($this->input->post('member_sub_district')),
							'district'=>trim($this->input->post('member_district')),
							'province_id'=>trim($this->input->post('member_province')),
							'postcode'=>trim($this->input->post('member_postcode')),
							'country_id'=>trim($this->input->post('member_country')),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->where('id',$this->input->post('member_id'));
			$this->db->update('members',$member);
			
			//insert contact
			$contact = array(
							'member_id'=>trim($this->input->post('member_id')),
							'address'=>trim($this->input->post('contact_address')),
							'sub_district'=>trim($this->input->post('contact_sub_district')),
							'district'=>trim($this->input->post('contact_district')),
							'province_id'=>trim($this->input->post('contact_province')),
							'country_id'=>trim($this->input->post('contact_country')),
							'postcode'=>trim($this->input->post('contact_postcode')),
							'phone'=>trim($this->input->post('contact_phone')),
							'mobile'=>trim($this->input->post('contact_mobile')),
							'email'=>trim($this->input->post('contact_email')),
							'msn'=>trim($this->input->post('contact_msn')),
							'yahoo'=>trim($this->input->post('contact_yahoo')),
							'qq'=>trim($this->input->post('contact_qq')),
							'facebook'=>trim($this->input->post('contact_facebook')),
							'social_other'=>trim($this->input->post('contact_social_other')),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('contacts',$contact);
			$contact_id = $this->db->insert_id();			
			
			//insert personalize
			$personalize = array(
							'member_id'=>trim($this->input->post('member_id')),
							'q2'=>trim(quotes_to_entities($this->input->post('personalize_q2'))),
							'q3'=>trim(quotes_to_entities($this->input->post('personalize_q3'))),
							'q4'=>trim(quotes_to_entities($this->input->post('personalize_q4'))),
							'q5'=>trim(quotes_to_entities($this->input->post('personalize_q5'))),
							'q6'=>trim(quotes_to_entities($this->input->post('personalize_q6'))),
							'q7'=>trim(quotes_to_entities($this->input->post('personalize_q7'))),
							'q8'=>trim(quotes_to_entities($this->input->post('personalize_q8'))),
							'q9'=>trim(quotes_to_entities($this->input->post('personalize_q9'))),
							'q10'=>trim(quotes_to_entities($this->input->post('personalize_q10'))),
							'q11'=>trim(quotes_to_entities($this->input->post('personalize_q11'))),
							'q12'=>trim(quotes_to_entities($this->input->post('personalize_q12'))),
							'q13'=>trim(quotes_to_entities($this->input->post('personalize_q13'))),
							'q14'=>trim(quotes_to_entities($this->input->post('personalize_q14'))),
							'q15'=>trim(quotes_to_entities($this->input->post('personalize_q15'))),
							'q16'=>trim(quotes_to_entities($this->input->post('personalize_q16'))),
							'q17'=>trim(quotes_to_entities($this->input->post('personalize_q17'))),
							'q18'=>trim(quotes_to_entities($this->input->post('personalize_q18'))),
							'q18_1'=>trim(quotes_to_entities($this->input->post('personalize_q18_1'))),
							'q18_2'=>trim(quotes_to_entities($this->input->post('personalize_q18_2'))),
							'q19'=>trim(quotes_to_entities($this->input->post('personalize_q19'))),
							'q20'=>trim(quotes_to_entities($this->input->post('personalize_q20'))),
							'q21'=>trim(quotes_to_entities($this->input->post('personalize_q21'))),
							'q22'=>trim(quotes_to_entities($this->input->post('personalize_q22'))),
							'q23'=>trim(quotes_to_entities($this->input->post('personalize_q23'))),
							'q24'=>trim(quotes_to_entities($this->input->post('personalize_q24'))),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('personalize',$personalize);
			$personalize_id = $this->db->insert_id();
					
			//insert history
			$history = array(
							'member_id'=>trim($this->input->post('member_id')),
							'contact_id'=>$contact_id,
							'personalize_id'=>$personalize_id,
							'sexual_id'=>trim($this->input->post('history_sexual')),
							'book_id'=>trim($this->input->post('history_book')),
							'issue_id'=>trim($this->input->post('history_issue')),
							'volume'=>trim($this->input->post('history_volume')),
							'education_id'=>trim($this->input->post('history_education')),
							'education_other'=>trim($this->input->post('history_education_other')),
							'career_id'=>trim($this->input->post('history_career')),
							'career_other'=>trim($this->input->post('history_career_other')),
							'salary_id'=>trim($this->input->post('history_salary')),
							'salary_other'=>trim($this->input->post('history_salary_other')),
							'alias'=>trim($this->input->post('history_alias')),
							'info'=>trim(quotes_to_entities($this->input->post('history_info'))),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			
			$this->db->insert('history',$history);
			$history_id = $this->db->insert_id();
			
			//upload image
			/*	upload to member ?	*/
			if($_FILES['history_img']['name']){
			
				//image name (memberid_historyid)
				$image_name = $this->input->post('member_id')."_".$history_id;
				
				//upload image, resize, thumbnail				
				$file_name = $this->upload_image($image_name);
				
				//update history.image
				$image_data = array('image'=>$file_name);
				$this->db->where('id',$history_id);
				$this->db->update('history',$image_data);
				
			}
			
			//upload attachment
			if($_FILES['history_attachment']['name']){
			
				//attachment name (memberid_historyid)
				$attachment_name = $this->input->post('member_id')."_".$history_id;
				
				//upload attachment				
				$file_name = $this->upload_attachment($attachment_name);
				
				//update history.attachment
				$attachment_data = array('attachment'=>$file_name);
				$this->db->where('id',$history_id);
				$this->db->update('history',$attachment_data);
				
			}
			
			return $history_id;
			
		}
		
		/**
		 * @return history id
		 */
		
		public function add_new_member()
		{
			//insert member
			$update_date = date("Y-m-d H:i:s");
			
			//create member code
			$member_code = $this->gen_member_code();
			
			//data to insert
			$member = array(
							'idcard'=>trim($this->input->post('member_idcard')),
							'member_code'=>$member_code,
							'title'=>trim($this->input->post('member_title')),
							'fname'=>trim($this->input->post('member_fname')),
							'lname'=>trim($this->input->post('member_lname')),
							'nickname'=>trim($this->input->post('member_nickname')),
							'dob'=>thaidate2mysql(trim($this->input->post('member_dob'))),
							'address'=>trim($this->input->post('member_address')),
							'sub_district'=>trim($this->input->post('member_sub_district')),
							'district'=>trim($this->input->post('member_district')),
							'province_id'=>trim($this->input->post('member_province')),
							'postcode'=>trim($this->input->post('member_postcode')),
							'country_id'=>trim($this->input->post('member_country')),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
											
			$this->db->insert('members',$member);
			$member_id = $this->db->insert_id();
			
			//insert contact
			$contact = array(
							'member_id'=>$member_id,
							'address'=>trim($this->input->post('contact_address')),
							'sub_district'=>trim($this->input->post('contact_sub_district')),
							'district'=>trim($this->input->post('contact_district')),
							'province_id'=>trim($this->input->post('contact_province')),
							'country_id'=>trim($this->input->post('contact_country')),
							'postcode'=>trim($this->input->post('contact_postcode')),
							'phone'=>trim($this->input->post('contact_phone')),
							'mobile'=>trim($this->input->post('contact_mobile')),
							'email'=>trim($this->input->post('contact_email')),
							'msn'=>trim($this->input->post('contact_msn')),
							'yahoo'=>trim($this->input->post('contact_yahoo')),
							'qq'=>trim($this->input->post('contact_qq')),
							'facebook'=>trim($this->input->post('contact_facebook')),
							'social_other'=>trim($this->input->post('contact_social_other')),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('contacts',$contact);
			$contact_id = $this->db->insert_id();
			
			//insert personalize
			$personalize = array(
							'member_id'=>$member_id,
							'q2'=>trim(quotes_to_entities($this->input->post('personalize_q2'))),
							'q3'=>trim(quotes_to_entities($this->input->post('personalize_q3'))),
							'q4'=>trim(quotes_to_entities($this->input->post('personalize_q4'))),
							'q5'=>trim(quotes_to_entities($this->input->post('personalize_q5'))),
							'q6'=>trim(quotes_to_entities($this->input->post('personalize_q6'))),
							'q7'=>trim(quotes_to_entities($this->input->post('personalize_q7'))),
							'q8'=>trim(quotes_to_entities($this->input->post('personalize_q8'))),
							'q9'=>trim(quotes_to_entities($this->input->post('personalize_q9'))),
							'q10'=>trim(quotes_to_entities($this->input->post('personalize_q10'))),
							'q11'=>trim(quotes_to_entities($this->input->post('personalize_q11'))),
							'q12'=>trim(quotes_to_entities($this->input->post('personalize_q12'))),
							'q13'=>trim(quotes_to_entities($this->input->post('personalize_q13'))),
							'q14'=>trim(quotes_to_entities($this->input->post('personalize_q14'))),
							'q15'=>trim(quotes_to_entities($this->input->post('personalize_q15'))),
							'q16'=>trim(quotes_to_entities($this->input->post('personalize_q16'))),
							'q17'=>trim(quotes_to_entities($this->input->post('personalize_q17'))),
							'q18'=>trim(quotes_to_entities($this->input->post('personalize_q18'))),
							'q18_1'=>trim(quotes_to_entities($this->input->post('personalize_q18_1'))),
							'q18_2'=>trim(quotes_to_entities($this->input->post('personalize_q18_2'))),
							'q19'=>trim(quotes_to_entities($this->input->post('personalize_q19'))),
							'q20'=>trim(quotes_to_entities($this->input->post('personalize_q20'))),
							'q21'=>trim(quotes_to_entities($this->input->post('personalize_q21'))),
							'q22'=>trim(quotes_to_entities($this->input->post('personalize_q22'))),
							'q23'=>trim(quotes_to_entities($this->input->post('personalize_q23'))),
							'q24'=>trim(quotes_to_entities($this->input->post('personalize_q24'))),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('personalize',$personalize);
			$personalize_id = $this->db->insert_id();
			
			//insert history
			$history = array(
							'member_id'=>$member_id,
							'contact_id'=>$contact_id,
							'personalize_id'=>$personalize_id,
							'sexual_id'=>trim($this->input->post('history_sexual')),
							'book_id'=>trim($this->input->post('history_book')),
							'issue_id'=>trim($this->input->post('history_issue')),
							'volume'=>trim($this->input->post('history_volume')),
							'education_id'=>trim($this->input->post('history_education')),
							'education_other'=>trim($this->input->post('history_education_other')),
							'career_id'=>trim($this->input->post('history_career')),
							'career_other'=>trim($this->input->post('history_career_other')),
							'salary_id'=>trim($this->input->post('history_salary')),
							'salary_other'=>trim($this->input->post('history_salary_other')),
							'alias'=>trim($this->input->post('history_alias')),
							'info'=>trim(quotes_to_entities($this->input->post('history_info'))),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			
			$this->db->insert('history',$history);
			$history_id = $this->db->insert_id();
			
			
			//upload image
			if($_FILES['history_img']['name']){
			
				//image name (memberid_historyid)
				$image_name = $member_id."_".$history_id;
				
				//upload image, resize, thumbnail				
				$file_name = $this->upload_image($image_name);
				
				//update history.image
				$image_data = array('image'=>$file_name);
				$this->db->where('id',$history_id);
				$this->db->update('history',$image_data);
				
			}
			
			//upload attachment
			if($_FILES['history_attachment']['name']){
			
				//attachment name (memberid_historyid)
				$attachment_name = $member_id."_".$history_id;
				
				//upload attachment				
				$file_name = $this->upload_attachment($attachment_name);
				
				//update history.attachment
				$attachment_data = array('attachment'=>$file_name);
				$this->db->where('id',$history_id);
				$this->db->update('history',$attachment_data);
				
			}
			
			return $history_id;		
		}

		public function update_history()
		{
			//update member
			$update_date = date("Y-m-d H:i:s");
			$member = array(
							'title'=>trim($this->input->post('member_title')),
							'fname'=>trim($this->input->post('member_fname')),
							'lname'=>trim($this->input->post('member_lname')),
							'nickname'=>trim($this->input->post('member_nickname')),
							'dob'=>thaidate2mysql(trim($this->input->post('member_dob'))),
							'address'=>trim($this->input->post('member_address')),
							'sub_district'=>trim($this->input->post('member_sub_district')),
							'district'=>trim($this->input->post('member_district')),
							'province_id'=>trim($this->input->post('member_province')),
							'postcode'=>trim($this->input->post('member_postcode')),
							'country_id'=>trim($this->input->post('member_country')),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->where('id',$this->input->post('member_id'));
			$this->db->update('members',$member);
			
			//update contact
			$contact = array(
							'member_id'=>trim($this->input->post('member_id')),
							'address'=>trim($this->input->post('contact_address')),
							'sub_district'=>trim($this->input->post('contact_sub_district')),
							'district'=>trim($this->input->post('contact_district')),
							'province_id'=>trim($this->input->post('contact_province')),
							'country_id'=>trim($this->input->post('contact_country')),
							'postcode'=>trim($this->input->post('contact_postcode')),
							'phone'=>trim($this->input->post('contact_phone')),
							'mobile'=>trim($this->input->post('contact_mobile')),
							'email'=>trim($this->input->post('contact_email')),
							'msn'=>trim($this->input->post('contact_msn')),
							'yahoo'=>trim($this->input->post('contact_yahoo')),
							'qq'=>trim($this->input->post('contact_qq')),
							'facebook'=>trim($this->input->post('contact_facebook')),
							'social_other'=>trim($this->input->post('contact_social_other')),
							//'create_date'=>$update_date,
							//'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->where('id',$this->input->post('contact_id'));
			$this->db->update('contacts',$contact);							
			
			
			//update personalize
			$personalize = array(
							'member_id'=>trim($this->input->post('member_id')),
							'q2'=>trim(quotes_to_entities($this->input->post('personalize_q2'))),
							'q3'=>trim(quotes_to_entities($this->input->post('personalize_q3'))),
							'q4'=>trim(quotes_to_entities($this->input->post('personalize_q4'))),
							'q5'=>trim(quotes_to_entities($this->input->post('personalize_q5'))),
							'q6'=>trim(quotes_to_entities($this->input->post('personalize_q6'))),
							'q7'=>trim(quotes_to_entities($this->input->post('personalize_q7'))),
							'q8'=>trim(quotes_to_entities($this->input->post('personalize_q8'))),
							'q9'=>trim(quotes_to_entities($this->input->post('personalize_q9'))),
							'q10'=>trim(quotes_to_entities($this->input->post('personalize_q10'))),
							'q11'=>trim(quotes_to_entities($this->input->post('personalize_q11'))),
							'q12'=>trim(quotes_to_entities($this->input->post('personalize_q12'))),
							'q13'=>trim(quotes_to_entities($this->input->post('personalize_q13'))),
							'q14'=>trim(quotes_to_entities($this->input->post('personalize_q14'))),
							'q15'=>trim(quotes_to_entities($this->input->post('personalize_q15'))),
							'q16'=>trim(quotes_to_entities($this->input->post('personalize_q16'))),
							'q17'=>trim(quotes_to_entities($this->input->post('personalize_q17'))),
							'q18'=>trim(quotes_to_entities($this->input->post('personalize_q18'))),
							'q18_1'=>trim(quotes_to_entities($this->input->post('personalize_q18_1'))),
							'q18_2'=>trim(quotes_to_entities($this->input->post('personalize_q18_2'))),
							'q19'=>trim(quotes_to_entities($this->input->post('personalize_q19'))),
							'q20'=>trim(quotes_to_entities($this->input->post('personalize_q20'))),
							'q21'=>trim(quotes_to_entities($this->input->post('personalize_q21'))),
							'q22'=>trim(quotes_to_entities($this->input->post('personalize_q22'))),
							'q23'=>trim(quotes_to_entities($this->input->post('personalize_q23'))),
							'q24'=>trim(quotes_to_entities($this->input->post('personalize_q24'))),
							// 'create_date'=>$update_date,
							// 'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->where('id',$this->input->post('personalize_id'));
			$this->db->update('personalize',$personalize);		
			
			
			//update history
			
			$history = array(
							'member_id'=>trim($this->input->post('member_id')),
							// 'contact_id'=>$contact_id,
							// 'personalize_id'=>$personalize_id,
							'sexual_id'=>trim($this->input->post('history_sexual')),
							'book_id'=>trim($this->input->post('history_book')),
							'issue_id'=>trim($this->input->post('history_issue')),
							'volume'=>trim($this->input->post('history_volume')),
							'education_id'=>trim($this->input->post('history_education')),
							'education_other'=>trim($this->input->post('history_education_other')),
							'career_id'=>trim($this->input->post('history_career')),
							'career_other'=>trim($this->input->post('history_career_other')),
							'salary_id'=>trim($this->input->post('history_salary')),
							'salary_other'=>trim($this->input->post('history_salary_other')),
							'alias'=>trim($this->input->post('history_alias')),
							'info'=>trim(quotes_to_entities($this->input->post('history_info'))),
							// 'create_date'=>$update_date,
							// 'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			
			$this->db->where('id',$this->input->post('history_id'));
			$this->db->update('history',$history);
			
			
			//upload image
			/*	upload to member ?	*/
			if($_FILES['history_img']['name']){
			
				//image name (memberid_historyid)
				$image_name = $this->input->post('member_id')."_".$this->input->post('history_id');
				
				//upload image, resize, thumbnail				
				$file_name = $this->upload_image($image_name);
				
				//update history.image
				$image_data = array('image'=>$file_name);
				$this->db->where('id',$this->input->post('history_id'));
				$this->db->update('history',$image_data);
				
			}
			
			//upload attachment

			if($_FILES['history_attachment']['name']){
			
				//attachment name (memberid_historyid)
				$attachment_name = $this->input->post('member_id')."_".$this->input->post('history_id');
				
				//upload attachment				
				$file_name = $this->upload_attachment($attachment_name);
				
				//update history.attachment
				$attachment_data = array('attachment'=>$file_name);
				$this->db->where('id',$this->input->post('history_id'));
				$this->db->update('history',$attachment_data);
				
			}
			
			
			return $this->input->post('history_id');
		}

		private function gen_member_code()
		{
			$this->db->select('member_code');
			$this->db->order_by('member_code','desc');
			$this->db->limit(1);
			
			$query = $this->db->get('members');
			$row = $query->row_array();
			$last_id = $row['member_code'];
			
			$year = date('y')+43;
			$month = date('m');
			
			$sprit = substr($last_id, 4,4);
			$format = sprintf('%04d',$sprit+1);
			$member_code = $year.$month.$format;
			
			
			return $member_code;
		}

		/*
		 * upload image, create thumbnail, resize
		 * @param text
		 * @return return file name to uploaded
		 */
		
		public function upload_image($image_name)
		{	
			$this->load->library('upload');
			// $id =  $this->input->post('id');
			
			//dir image
			//user path directory not url
			$dir = $this->config->item('upload_history_images');
			
			//dir thumb
			//user path directory not url
			$dir_thumb = $this->config->item('upload_history_thumbs');
			

			if($_FILES['history_img']['name']){
				
				//upload image
				$this->load->library('image_lib');
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = $image_name;
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
				$this->upload->do_upload('history_img');
				$file_data = array('upload_data'=>$this->upload->data());
				
				//create thumbnail
				$config['image_library'] = 'gd2';
				$config['source_image'] = $dir."/".$file_data['upload_data']['file_name'];
				$config['new_image'] = $dir_thumb;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 150;
				$config['height'] = 150;
				$this->image_lib->initialize($config); 
				$this->image_lib->resize();
				
				//resize image
				$config['image_library'] = 'gd2';
				$config['source_image'] = $dir."/".$file_data['upload_data']['file_name'];
				$config['new_image'] = $dir;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 219;
				$config['height'] = 230;
				$this->image_lib->initialize($config); 
				$this->image_lib->resize();
				
				return $file_data['upload_data']['file_name'];
				
			}else{
				echo "Can not upload please contact admin";
				exit();
			}	
		}

		/**
		 * upload attachment file
		 * @param text
		 * @return return boolean
		 */
		
		public function upload_attachment($attachment_name)
		{	
			$this->load->library('upload');
			
			//dir files
			//user path directory not url
			$dir = $this->config->item('upload_history_attachment');

			if($_FILES['history_attachment']['name']){
				
				//upload image
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'jpg|png|jpeg|pdf';
				$config['file_name'] = $attachment_name;
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
				$this->upload->do_upload('history_attachment');
				$file_data = array('upload_data'=>$this->upload->data());
				
				return $file_data['upload_data']['file_name'];
				
			}else{
				echo "Can not upload please contact admin";
				exit();
			}	
		}

		/**
		 * is_book_registor
		 * 
		 * @param
		 * book, issue, volume, member_id
		 * 
		 * @return
		 * boolean
		 * 
		 * 
		 */
		public function is_book_register()
		{
			$this->db->select('id');
			$this->db->where('member_id',$this->input->post('member_id'));
			$this->db->where('book_id',$this->input->post('book'));
			$this->db->where('issue_id',$this->input->post('issue'));
			$this->db->where('volume',$this->input->post('volume'));
			
			if(isset($_POST['history_id']) && !empty($_POST['history_id']))
			{
				$this->db->where('id !=',$_POST['history_id']);	
			}


			$result = $this->db->get('history');
			
			
			if($result->num_rows() == 0)
			{
				return true;
			}else{
				return false;
			}
			
		}

		/**
		 * 
		 * @param history_id
		 * @return idcard
		 * 
		 */
		public function get_idcard_from_history($history_id)
		{
				$sql = "SELECT history.id as history_id, members.idcard   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					WHERE history.id = $history_id
					ORDER BY history.id DESC 
					limit 1
					";
					
			$query = $this->db->query($sql);
			
			if($query->num_rows()>0)
			{
				$row = $query->row_array();
				return $row['idcard'];
			}else{
				echo "เกิดข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ";
			}
			
		}
			
	}	
	
/* End of file member_model.php */	