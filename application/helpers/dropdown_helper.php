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
			$dropdown .= "<option value='0'>-การวางขาย -</option>";
			
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
			//id = 3 คลังพิเศษ
			$ci->db->where('Inventory_TypeID','1');
			$ci->db->or_where('Inventory_TypeID','3');
			$ci->db->order_by('Stock_Name');
			
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

if ( ! function_exists('inventory_return_dropdown'))
{
		
		function inventory_return_dropdown($selected = "")
		{
			$ci =& get_instance();
			//id = 2 คลังรับคืน
			$ci->db->where('Inventory_TypeID','2');
			
			$query = $ci->db->get('Inventory');
			$dropdown = "";
			//$dropdown .= "<option value='0'>-คลัง -</option>";
			
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

if ( ! function_exists('all_inventory_dropdown'))
{
		
		function all_inventory_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->order_by('Stock_Name');
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

if ( ! function_exists('product_inventory_dropdown'))
{
		
		function product_inventory_dropdown($selected = "")
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
			$ci->db->order_by('DocRef_AutoID');
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
			$dropdown .= "<option value=''>-Ticket Code -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['TK_Code'])
					{
						$dropdown .= '<option value="'.$row['TK_Code'].'" selected="selected">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
}//end if

	if ( ! function_exists('rollback_type_dropdown'))
	{
		
		function rollback_type_dropdown($selected = "")
		{
			$ci =& get_instance();
			
			$rollback_type = array(
				'RS'=>'Rollback Reserve (ใบจอง)',
				'SR'=>'Rollback Return (ใบรับคืน)',
				'RL'=>'Rollback Re-Location (ใบโอนย้าย)',
				'IN'=>'Rollback Import (ใบรับเข้า)',
				'CutOut'=>'Rollback CutOut (ใบตัดขาย-ตัดจ่าย)'
			);
			
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-Rollback Type -</option>";
			
			if($selected != "")
			{
				foreach($rollback_type as $key=>$value){
					
					if($selected == $key)
					{
						$dropdown .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$key.'">'.$value.'</option>';
				}
			}
			else
			{
				foreach($rollback_type as $key=>$value){
					$dropdown .= '<option value="'.$key.'">'.$value.'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
	}//end if

if ( ! function_exists('ticket_sale_dropdown'))
{
		
		function ticket_sale_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('TK_Category', 'sale');
			$ci->db->or_where('TK_Category', 'cut');
			$ci->db->where('RowStatus','active');
			$ci->db->where('IsDel',0);
			$ci->db->order_by('TK_Code');
			$query = $ci->db->get('Ticket_Type');
			
			$dropdown = "";
			$dropdown .= "<option value=''>-Ticket Code -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['TK_Code'])
					{
						$dropdown .= '<option value="'.$row['TK_Code'].'" selected="selected">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}	
			}

			return $dropdown;

		}
}//end if

if ( ! function_exists('ticket_in_dropdown'))
{
		
		function ticket_in_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('TK_Category', 'in');
			$ci->db->where('RowStatus','active');
			$ci->db->where('IsDel',0);
			$ci->db->order_by('TK_Code');
			$query = $ci->db->get('Ticket_Type');
			
			$dropdown = "";
			$dropdown .= "<option value=''>-Code-</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['TK_Code'])
					{
						$dropdown .= '<option value="'.$row['TK_Code'].'" selected="selected">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['TK_Code'].'">'.$row['TK_Code']."-".$row['TK_Description'].'</option>';
				}	
			}

			return $dropdown;

		}
}//end if


if ( ! function_exists('product_status_dropdown'))
{
		
	function product_status_dropdown($selected = "")
	{
		
		$dropdown = "";
		$dropdown .= "<option value='0'>-สถานะ-</option>";
		
		$select = array(
			'ACTIVE'=>'ACTIVE',
			'DISCONTINUE'=>'DISCONTINUE',
			'INACTIVE'=>'INACTIVE'
		);
		
		if($selected != "")
		{
			foreach($select as $key=>$row){
				
				if($selected == $key)
				{
					$dropdown .= '<option value="'.$key.'" selected="selected">'.$row.'</option>';
					continue;
				}
				
				$dropdown .= '<option value="'.$key.'">'.$row.'</option>';
			}
		}
		else
		{
			foreach($select as $key=>$row){
				$dropdown .= '<option value="'.$key.'">'.$row.'</option>';
			}	
		}

		return $dropdown;

	}
}//end if


if ( ! function_exists('customer_line_dropdown'))
{
		
		function customer_line_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->order_by('CusLine_Name');
			$query = $ci->db->get('Customer_Line');
			$dropdown = "";
			$dropdown .= "<option value='0'>- สายลูกค้า -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['CusLine_ID'])
					{
						$dropdown .= '<option value="'.$row['CusLine_ID'].'" selected="selected">'.$row['CusLine_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['CusLine_ID'].'">'.$row['CusLine_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['CusLine_ID'].'">'.$row['CusLine_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('age_return_dropdown'))
{
		
		function age_return_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('AppStatType','AGE-ALL');
			$ci->db->order_by('Optional');
			$query = $ci->db->get('AppStatus');
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-อายุรับคืน -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['AppStatValue'])
					{
						$dropdown .= '<option value="'.$row['AppStatValue'].'" selected="selected">'.$row['AppStatName'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('age_inventory_dropdown'))
{
		
		function age_inventory_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('AppStatType','AGE-ALL');
			$ci->db->order_by('Optional');
			$query = $ci->db->get('AppStatus');
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-อายุคงคลัง -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['AppStatValue'])
					{
						$dropdown .= '<option value="'.$row['AppStatValue'].'" selected="selected">'.$row['AppStatName'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
}//end if

if ( ! function_exists('age_sale_dropdown'))
{
		
		function age_sale_dropdown($selected = "")
		{
			$ci =& get_instance();
			$ci->db->where('AppStatType','AGE-ALL');
			$ci->db->order_by('Optional');
			$query = $ci->db->get('AppStatus');
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-อายุการวางขาย -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['AppStatValue'])
					{
						$dropdown .= '<option value="'.$row['AppStatValue'].'" selected="selected">'.$row['AppStatName'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['AppStatValue'].'">'.$row['AppStatName'].'</option>';
				}	
			}
			//print_r($dropdown);
			return $dropdown;

		}
}//end if

if ( ! function_exists('monitor_status_dropdown'))
{
		
		function monitor_status_dropdown($selected = "")
		{
			//default selected
			if($selected == "")
			{
				$selected = 1;
			}
			
			$ci =& get_instance();
			//$ci->db->where('AppStatType','AGE-ALL');
			// $ci->db->order_by('Optional');
			$query = $ci->db->get('Product_StatusMonitor');
			
			$dropdown = "";
			$dropdown .= "<option value='0'>-สถานะการ Monitor -</option>";
			
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['MonStat_ID'])
					{
						$dropdown .= '<option value="'.$row['MonStat_ID'].'" selected="selected">'.$row['MonStat_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['MonStat_ID'].'">'.$row['MonStat_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['MonStat_ID'].'">'.$row['MonStat_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('status_dropdown'))
{
		
		function status_dropdown($selected = "")
		{
			//default selected
			if($selected == "")
			{
				$selected = 'active';
			}
			
			
			$status = array(
				'active'=>'ใช้งาน',
				'inactive'=>'ไม่ใช้งาน'
			);
			
			$dropdown = "";
			//$dropdown .= "<option value='0'>-เลือกสถานะ -</option>";
			
			
			if($selected != "")
			{
				foreach($status as $key=>$row){
					
					if($selected == $key)
					{
						$dropdown .= '<option value="'.$key.'" selected="selected">'.$row.'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$key.'">'.$row.'</option>';
				}
			}
			else
			{
				foreach($status as $key=>$row){
					$dropdown .= '<option value="'.$key.'">'.$row.'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('province_dropdown'))
{
		
		function province_dropdown($selected = "")
		{
			$ci =& get_instance();
			
			$ci->db->from('Provinces');
			$ci->db->join('Customer_Area', 'Customer_Area.CustArea_ID = Provinces.Area_ID');
			$query = $ci->db->get();
			
			
			$dropdown = "";
			$dropdown .= "<option value='0'>- รายชื่อจังหวัด -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['Province_ID'])
					{
						$dropdown .= '<option value="'.$row['Province_ID'].'" selected="selected">'.$row['Province_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['Province_ID'].'">'.$row['Province_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['Province_ID'].'">'.$row['Province_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if

if ( ! function_exists('area_dropdown'))
{
		
		function area_dropdown($selected = "")
		{
			$ci =& get_instance();
			$query = $ci->db->get('Customer_Area');
			
			$dropdown = "";
			$dropdown .= "<option value='0'>- เลือกภาค -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['CustArea_ID'])
					{
						$dropdown .= '<option value="'.$row['CustArea_ID'].'" selected="selected">'.$row['CustArea_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['CustArea_ID'].'">'.$row['CustArea_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['CustArea_ID'].'">'.$row['CustArea_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


if ( ! function_exists('transport_dropdown'))
{
		
		function transport_dropdown($selected = "")
		{
			$ci =& get_instance();
			
			$query = $ci->db->get('Transport');
			$dropdown = "";
			$dropdown .= "<option value='0'>- รายชื่อบริษัทขนส่ง -</option>";
			
			if($selected != "")
			{
				foreach($query->result_array() as $row){
					
					if($selected == $row['Trans_ID'])
					{
						$dropdown .= '<option value="'.$row['Trans_ID'].'" selected="selected">'.$row['Trans_Name'].'</option>';
						continue;
					}
					
					$dropdown .= '<option value="'.$row['Trans_ID'].'">'.$row['Trans_Name'].'</option>';
				}
			}
			else
			{
				foreach($query->result_array() as $row){
					$dropdown .= '<option value="'.$row['Trans_ID'].'">'.$row['Trans_Name'].'</option>';
				}	
			}
			
			return $dropdown;

		}
}//end if


/* End of file dropdown_helper.php */
/* Location: ./application/helpers/dropdown_helper.php */
