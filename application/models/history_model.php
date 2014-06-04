<?php
	class History_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function getall($perpage, $offset)
		{
			
					
			$sql = "SELECT members.member_code, CONCAT(members.title,' ',members.fname,' ',members.lname) as member_name,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img,
					DATE_FORMAT(history.create_date,'%d-%m-%Y') as history_date   
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
		
	}	