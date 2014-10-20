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
			$this->db->select('*');
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
			//echo $this->db->last_query();	
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


			
	}	
	
/* End of file product_model.php */	