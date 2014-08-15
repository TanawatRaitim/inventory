<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('department_dropdown'))
{
		
		function department_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('IsDel','0');
			$ci->db->where('RowStatus','active');
			$ci->db->order_by('Dept_NameTH');
			$query = $ci->db->get('Department');
			$dropdown = "";
			$dropdown .= "<option value='0'>- แผนก -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['RecNo'])
					{
						$dropdown .= '<option value="'.$row['RecNo'].'" selected="selected">'.$row['Dept_NameTH'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['RecNo'].'">'.$row['Dept_NameTH'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['RecNo'].'">'.$row['Dept_NameTH'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('product_type_dropdown'))
{
		
		function product_type_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('IsDel','0');
			$ci->db->where('RowStatus','active');
			$ci->db->order_by('ProType_Name');
			$query = $ci->db->get('Product_Type');
			$dropdown = "";
			$dropdown .= "<option value='0'>- ประเภทสินค้า -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['ProType_ID'])
					{
						$dropdown .= '<option value="'.$row['ProType_ID'].'" selected="selected">'.$row['ProType_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['ProType_ID'].'">'.$row['ProType_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['ProType_ID'].'">'.$row['ProType_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('product_group_dropdown'))
{
		
		function product_group_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('IsDel','0');
			$ci->db->where('RowStatus','active');
			$ci->db->order_by('ProGroup_Name');
			$query = $ci->db->get('Product_Group');
			$dropdown = "";
			$dropdown .= "<option value='0'>- กลุ่มสินค้า -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['ProGroup_ID'])
					{
						$dropdown .= '<option value="'.$row['ProGroup_ID'].'" selected="selected">'.$row['ProGroup_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['ProGroup_ID'].'">'.$row['ProGroup_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['ProGroup_ID'].'">'.$row['ProGroup_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('product_category_dropdown'))
{
		
		function product_category_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('IsDel','0');
			$ci->db->where('RowStatus','active');
			$ci->db->order_by('ProCat_Name');
			$query = $ci->db->get('Product_Category');
			$dropdown = "";
			$dropdown .= "<option value='0'>-หมวดสินค้า -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['ProCate_ID'])
					{
						$dropdown .= '<option value="'.$row['ProCate_ID'].'" selected="selected">'.$row['ProCat_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['ProCate_ID'].'">'.$row['ProCat_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['ProCate_ID'].'">'.$row['ProCat_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('product_frequency_dropdown'))
{
		
		function product_frequency_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('IsDel','0');
			$ci->db->where('RowStatus','active');
			$ci->db->order_by('ProFreq_Name');
			$query = $ci->db->get('Product_Frequency');
			$dropdown = "";
			$dropdown .= "<option value='0'>-อายุการวางขาย -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['ProFreq_ID'])
					{
						$dropdown .= '<option value="'.$row['ProFreq_ID'].'" selected="selected">'.$row['ProFreq_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['ProFreq_ID'].'">'.$row['ProFreq_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['ProFreq_ID'].'">'.$row['ProFreq_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('product_register_dropdown'))
{
		
		function product_register_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->order_by('TypeReg_Name');
			$query = $ci->db->get('Product_TypeRegist');
			$dropdown = "";
			$dropdown .= "<option value='0'>-ประเภททะเบียน -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['TypeReg_ID'])
					{
						$dropdown .= '<option value="'.$row['TypeReg_ID'].'" selected="selected">'.$row['TypeReg_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['TypeReg_ID'].'">'.$row['TypeReg_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['TypeReg_ID'].'">'.$row['TypeReg_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('inventory_dropdown'))
{
		
		function inventory_dropdown($selected = "")
		{
			$ci =& get_instance();
			//id = 1 คลังทั่วไป
			$ci->db->where('Inventory_TypeID','1');
			//$ci->db->where('RowStatus','active');
			//$ci->db->order_by('TypeReg_Name');
			$query = $ci->db->get('Inventory');
			$dropdown = "";
			$dropdown .= "<option value='0'>-คลัง -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['Stock_AutoID'])
					{
						$dropdown .= '<option value="'.$row['Stock_AutoID'].'" selected="selected">'.$row['Stock_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['Stock_AutoID'].'">'.$row['Stock_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['Stock_AutoID'].'">'.$row['Stock_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('doc_refer_dropdown'))
{
		
		function doc_refer_dropdown($selected = "")
		{
			$ci =& get_instance();
			//id = 1 คลังทั่วไป
			// $ci->db->where('Inventory_TypeID','1');
			$ci->db->where('RowStatus','active');
			$ci->db->where('IsDel',0);
			$ci->db->order_by('DocRef_Name');
			$query = $ci->db->get('DocRefer');
			
			//print_r($query);
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-เอกสารอ้างอิง -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['DocRef_AutoID'])
					{
						$dropdown .= '<option value="'.$row['DocRef_AutoID'].'" selected="selected">'.$row['DocRef_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['DocRef_AutoID'].'">'.$row['DocRef_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['DocRef_AutoID'].'">'.$row['DocRef_Name'].'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
}//end if

if ( ! function_exists('ticket_dropdown'))
{
		
		function ticket_dropdown($selected = "")
		{
			$ci =& get_instance();
			//id = 1 คลังทั่วไป
			// $ci->db->where('Inventory_TypeID','1');
			$ci->db->where('RowStatus','active');
			$ci->db->where('IsDel',0);
			$ci->db->order_by('TK_Code');
			$query = $ci->db->get('Ticket_Type');
			
			//print_r($query);
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-Ticket Code -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['TK_TypeAutoID'])
					{
						$dropdown .= '<option value="'.$row['TK_TypeAutoID'].'" selected="selected">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['TK_TypeAutoID'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['TK_TypeAutoID'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
}//end if




/* End of file dropdown_helper.php */
/* Location: ./application/helpers/dropdown_helper.php */
