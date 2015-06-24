<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('assets');
	}
	
	public function test_dd()
	{
		echo '<select>';
		echo province_dropdown(5);
		echo '</select>';
		echo '<select>';
		echo transport_dropdown(5);
		echo '</select>';
	}
	
	public function date_time()
	{
		echo 'big';
		$mydate = '2014-12-23';
		
		//echo date_format($mydate, 'dd/mm/yyyy');
		echo date('d/m/Y', strtotime($mydate));
	}
	
	public function pickadate()
	{
		$content['title'] = 'Pickadate';
		
		$data['content'] = $this->load->view('test/pickadate',$content, TRUE);
		
		//initail template	
		$css = array(
				'pickadate-3.5.3/lib/themes/default.css',
				'pickadate-3.5.3/lib/themes/default.date.css',
				'pickadate-3.5.3/lib/themes/default.time.css',
				'pickadate-3.5.3/lib/themes/rtl.css'
		);
		
		$js = array(
				'pickadate-3.5.3/lib/picker.js',
				'pickadate-3.5.3/lib/picker.date.js',
				'pickadate-3.5.3/lib/picker.time.js',
				'pickadate-3.5.3/lib/legacy.js',
				'pickadate-3.5.3/lib/translations/th_TH.js',
				'js/app/test/test_pickadate.js'
		);
				
		$data['css'] = $this->assets->get_css($css);
		$data['js'] = $this->assets->get_js($js);
		
		$this->load->view('template/main',$data);
		
	}
	
	public function get_pack_info($tkcode, $tkid)
	{
		//left join inventory_transaction, inventory_transaction_detail, products
		$where_transaction = array(
			'TK_Code'=>$tkcode,
			'TK_ID'=>$tkid
		);
		
		$auto_id = "";
		$query = $this->db->get_where('Inventory_Transaction', $where_transaction);
		
		if($query->num_rows()>0){
			$transaction = $query->row_array();
			$auto_id = $transaction['Transact_AutoID'];
			
			$where_detail = array(
				'Transact_AutoID'=>$auto_id
			);
			
			$query_detail = $this->db->get_where('Inventory_Transaction_Detail', $where_detail);
			//product count
			$product_count = $query_detail->num_rows();
			
			//get transaction detail
			$transaction_detail = $query_detail->result_array();
			
			echo pre();
			print_r($transaction_detail);
			echo pre_close();
			
		}else{
			echo "ไม่พบข้อมูล";
			exit();
		}
	
		
	}
	
	public function full_query()
	{
		
		
		
		$sql = "Select	ROW_NUMBER() over(Order by dbo.Inventory_Transaction.RowCreatedDate) as RowNo ,dbo.Inventory_Transaction.TK_Code,
		TKCode_Main.TK_Description+ '[ ' + dbo.Inventory_Transaction.TK_Code+' ]' as [TK_Main] ,
		dbo.Inventory_Transaction.TK_Code+''+dbo.Inventory_Transaction.TK_ID as [Ticket_ID],
		dbo.Inventory_Transaction_Detail.Product_ID,
		dbo.Inventory_Transaction_Detail.QTY_Good,dbo.Inventory_Transaction_Detail.QTY_Waste,dbo.Inventory_Transaction_Detail.QTY_Damage,
		dbo.Inventory_Transaction_Detail.QTY_Good+dbo.Inventory_Transaction_Detail.QTY_Waste+dbo.Inventory_Transaction_Detail.QTY_Damage as [SumQTY],
		DocRef.DocRef_Name+''+dbo.Inventory_Transaction.DocRef_Other as [DocRef],
		dbo.Inventory_Transaction.DocRef_No,CONVERT(varchar(50),dbo.Inventory_Transaction.DocRef_Date,103) AS [DocRef_Date],
		
		dbo.Inventory_Transaction.Cust_ID,ISNull(dbo.Customers.Cust_Name,'-') as [Cust_Name],dbo.Inventory_Transaction.Transact_Remark,
		
		CONVERT(varchar(50),dbo.Inventory_Transaction.RowCreatedDate,103) as [RowCreatedDate],
		dbo.Inventory_Transaction.RowCreatedPerson,PersonCreated.Emp_FnameTH+' '+PersonCreated.Emp_LnameTH as [PersonCreated] ,
		
		dbo.Inventory_Transaction.IsApproved,dbo.Inventory_Transaction.ApprovedBy,PersonApproved.Emp_FnameTH +' '+PersonApproved.Emp_LnameTH as [PersonApproved],
		CONVERT(varchar(50),dbo.Inventory_Transaction.ApprovedDate,103) as [ApprovedDate],
		
		dbo.Inventory_Transaction.IsUsed

		From	dbo.Inventory_Transaction 
		
		LEFT OUTER JOIN dbo.Inventory_Transaction_Detail ON dbo.Inventory_Transaction.Transact_AutoID = dbo.Inventory_Transaction_Detail.Transact_AutoID 
		LEFT OUTER JOIN dbo.DocRefer as [DocRef] on dbo.Inventory_Transaction.DocRef_AutoID = DocRef.DocRef_AutoID 
		LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_Main] ON dbo.Inventory_Transaction.TK_Code = TKCode_Main.TK_Code 
		LEFT OUTER JOIN dbo.Ticket_Type as [TKCode_For] ON dbo.Inventory_Transaction.Transaction_For = TKCode_For.TK_Code 
		LEFT OUTER JOIN dbo.Employees as [PersonCreated] ON dbo.Inventory_Transaction.RowCreatedPerson = PersonCreated.Emp_ID 
		LEFT OUTER JOIN dbo.Employees as [PersonApproved] ON dbo.Inventory_Transaction.ApprovedBy = PersonApproved.Emp_ID 
		LEFT OUTER JOIN dbo.Customers ON dbo.Inventory_Transaction.Cust_ID = dbo.Customers.Cust_ID 
		
		WHERE	
		dbo.Inventory_Transaction.TK_Code not in ('RS')
		and dbo.Inventory_Transaction_Detail.Product_ID = '13-CLAS-G2001'
		and dbo.Inventory_Transaction.RowCreatedDate >= '2014-11-28 00:00:00:000' and dbo.Inventory_Transaction.RowCreatedDate <= '2014-12-20 23:59:59.999'";
			
		$query = $this->db->query($sql);
		
		echo pre();
		print_r($query->result_array());		
		echo pre_close();
				
				
	}
	
}