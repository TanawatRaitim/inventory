<?php
	class Product_model extends CI_Model{
		
		//private $search_row;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get($id)
		{
			return $this->db->get_where('Products', array("Product_ID"=>$id), 1);
		}
		
		public function get_view($id)
		{
			$this->db->select('*, Products.RowStatus as product_status');
			$this->db->from('Products');
			$this->db->join('Product_Category','Product_Category.ProCate_ID = Products.ProCate_ID', 'left');
			$this->db->join('Product_Group','Product_Group.ProGroup_ID = Products.ProGroup_ID', 'left');
			$this->db->join('Product_Type','Product_Type.ProType_ID = Products.ProType_ID', 'left');
			$this->db->join('Product_Frequency','Product_Frequency.ProFreq_ID = Products.ProFreq_ID', 'left');
			$this->db->join('Inventory','Inventory.Stock_AutoID = Products.Main_Inventory', 'left');
			$this->db->join('Product_TypeRegist','Product_TypeRegist.TypeReg_ID = Products.TypeReg_ID', 'left');
			$this->db->join('Department','Department.RecNo = Products.ProduceBy', 'left');
			$this->db->where('Products.Product_AutoID', $id);

			return $this->db->get();	
		}
		
		public function get_all()
		{
			$this->db->order_by('Product_AutoID', 'desc');
			$query = $this->db->get('Products');	
			
			return $query->result_array();
		}
		
		public function get_all_product_premium($product_id)
		{
			return $this->db->get_where('Product_Premium', array("Product_ID"=>$product_id));	
		}
		
		public function datatable()
		{
			$this->db->select('Product_AutoID, Product_ID, Product_Name, Barcode_Main, Product_Vol, Product_Photo ');
			$this->db->select('ProCat_Name, ProGroup_Name, ProType_Name, ProFreq_Name');
			$this->db->from('Products');
			$this->db->join('Product_Category','Product_Category.ProCate_ID = Products.ProCate_ID', 'left');
			$this->db->join('Product_Group','Product_Group.ProGroup_ID = Products.ProGroup_ID', 'left');
			$this->db->join('Product_Type','Product_Type.ProType_ID = Products.ProType_ID', 'left');
			$this->db->join('Product_Frequency','Product_Frequency.ProFreq_ID = Products.ProFreq_ID', 'left');

			return $this->db->get();

		}
		
		public function get_id_from_autoid($id)
		{
			$query = $this->db->get_where('Products', array('Product_AutoID'=>$id))->row_array();
			return $query['Product_ID'];
		}
		
		public function get_product_transaction($id)
		{
			
			$this->db->select('*, Inventory_Transaction.TK_Code as tkcode, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar, Inventory_Transaction.Transport_Date, 105) as Transport_Date, convert(varchar,Inventory_Transaction.RowCreatedDate,105) as reserve_date, Ticket_Type.TK_Description as tkdescription,Ticket_Type.TK_Code as tkfor ');
			$this->db->from('Inventory_Transaction');
			$this->db->join('Inventory_Transaction_Detail','Inventory_Transaction_Detail.Transact_AutoID = Inventory_Transaction.Transact_AutoID','left');
			$this->db->join('Employees','Employees.Emp_ID = Inventory_Transaction.RowCreatedPerson','left');
			$this->db->join('Ticket_Type','Ticket_Type.TK_Code = Inventory_Transaction.TK_Code','left');
			$this->db->where('Inventory_Transaction.TK_Code !=','RS');
			$this->db->where('Inventory_Transaction.IsApproved',1);	
			$this->db->where('Inventory_Transaction_Detail.Product_ID',$id);	
			
			$this->db->order_by('Inventory_Transaction.RowCreatedDate','desc');
			
			$query = $this->db->get();
			// echo $this->db->last_query();	
			return $query->result_array();
		}
		
		public function get_product_sc($product_id)
		{
			$sql = "select SUM(Inventory_Transaction_Detail.QTY_Good) as sum_sc
					from Inventory_Transaction
					left join Inventory_Transaction_Detail on Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory_Transaction.Transact_AutoID
					where Inventory_Transaction_Detail.Product_ID = '". $product_id ."' and Inventory_Transaction.TK_Code = 'SC'";
					
			$query = $this->db->query($sql);
			$result = $query->row_array();
			
			if($result['sum_sc'] == NULL || $result['sum_sc'] == "")
			{
				return 'N/A';
			}
			
			return $result['sum_sc'];		
		}
		
		public function get_product($id)
		{
			return $this->db->get_where('Products',array('Product_ID'=>$id));
		
		}
		
		public function get_product_sa($product_id)
		{
			$sql = "select SUM(Inventory_Transaction_Detail.QTY_Good) as sum_sa
					from Inventory_Transaction
					left join Inventory_Transaction_Detail on Inventory_Transaction_Detail.Effect_Stock_AutoID = Inventory_Transaction.Transact_AutoID
					where Inventory_Transaction_Detail.Product_ID = '". $product_id ."' and Inventory_Transaction.TK_Code = 'SA'";
					
			$query = $this->db->query($sql);
			$result = $query->row_array();
			
			if($result['sum_sa'] == NULL || $result['sum_sa'] == "")
			{
				return 'N/A';
			}
			
			return $result['sum_sa'];		
		}
		
		public function has_history_age_inventory($product_id)
		{
			$query = $this->db->get_where('Extend_ExpireInventory', array('Product_ID'=>$product_id));
			
			if($query->num_rows() == 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function has_history_age_return($product_id)
		{
			$query = $this->db->get_where('Extend_ExpireReturn', array('Product_ID'=>$product_id));
			
			if($query->num_rows() == 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function has_history_age_sale($product_id)
		{
			$query = $this->db->get_where('Extend_ExpireSale', array('Product_ID'=>$product_id));
			
			if($query->num_rows() == 0)
			{
				return false;
			}
			
			return true;
			
		}
		
		public function inventory_age_form($product_id)
		{
			$query = $this->db->get_where('Products', array('Product_ID'=>$product_id))->row_array();
			
			$status = TRUE;
			
			if($query['Manufact_EndDate'] == NULL || $query['Manufact_EndDate'] == "" || !$query['Manufact_EndDate'])
			{
				$status = FALSE;
			}
			
			if($query['Age_Inventory'] == NULL || $query['Age_Inventory']=="" || !$query['Age_Inventory'])
			{
				$status = FALSE;
			}
			
			return $status;
		}
		
		public function sale_age_form($product_id)
		{
			$query = $this->db->get_where('Products', array('Product_ID'=>$product_id))->row_array();
			
			$status = TRUE;
			
			if($query['Manufact_EndDate'] == NULL || $query['Manufact_EndDate'] == "" || !$query['Manufact_EndDate'])
			{
				$status = FALSE;
			}
			
			if($query['Age_Sale'] == NULL || $query['Age_Sale']=="" || !$query['Age_Sale'])
			{
				$status = FALSE;
			}
			
			return $status;
		}
		
		public function return_age_form($product_id)
		{
			$query = $this->db->get_where('Products', array('Product_ID'=>$product_id))->row_array();
			
			$status = TRUE;
			
			if($query['Manufact_EndDate'] == NULL || $query['Manufact_EndDate'] == "" || !$query['Manufact_EndDate'])
			{
				$status = FALSE;
			}
			
			if($query['Age_AverageReturn'] == NULL || $query['Age_AverageReturn']=="" || !$query['Age_AverageReturn'])
			{
				$status = FALSE;
			}
			
			return $status;
		}
		
		public function get_product_select2()
		{
			$text = $this->input->post('q');
			$this->db->select('Product_AutoID, Product_ID, Product_Name, Product_Vol');
			$this->db->like('Product_ID', $text);
			$this->db->or_like('Product_Name', $text);
			$this->db->or_like('Product_Vol', $text);
			$this->db->or_like('Barcode_Main', $text);
			// $this->db->or_like('RowStatus', 'ACTIVE','after');
			$this->db->where('RowStatus','ACTIVE');
			$this->db->order_by('Product_Name asc, Product_Vol desc');
			$query = $this->db->get('Products');
			return $query;
			
		}
		


			
	}	
	
/* End of file product_model.php */	