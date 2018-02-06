<?php
class Equipmentreport_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'equipment_list_id','sap'=>'equipment_list_sap','sn'=>'equipment_list_sn',
						 'name'=>'equipment_gen_name','code'=>'equipment_gen_code','group'=>'group_name',
						 'address'=>'address_name');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];

			if ($query !="" ) {
				$where = "WHERE equipment_list_status=0 AND (";
				$where .= "equipment_list_id LIKE '%$query%'";
				$where .= " OR equipment_list_sap LIKE '%$query%'";
				$where .= " OR equipment_list_sn LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR group_name LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		$year =date('Y');
		$query  = "SELECT equipment_list_id,status_name,COUNT( repair_about_send ) AS rows,equipment_list_sap,equipment_list_sn";
		$query .= ",equipment_gen_name,group_name,address_name,equipment_gen_brand,equipment_gen_model,";
		$query .= "DATEDIFF( CURDATE( ) , equipment_gen_date_begin ) / 365.25 AS DiffDate";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= "	LEFT JOIN db_repair ON repair_link_list = equipment_list_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " LEFT JOIN db_status ON status_id = equipment_list_status_link";
		$query .= " $where  GROUP BY equipment_list_id $sort $limit";
		

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT *";
		$rquery .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_repair ON repair_link_list = equipment_list_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$rquery .= " LEFT JOIN db_status ON status_id = equipment_list_status_link";
		$rquery .= " $where GROUP BY equipment_list_id";
		
		$row = $this->db->counter($rquery,array());
		$data = array("equipmentreport",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
		
		//print_r($data);
	}
	
	function selectAll(){
		$query  = "SELECT equipment_list_id,status_name,COUNT( repair_about_send ) AS rows,equipment_list_sap,equipment_list_sn";
		$query .= ",equipment_gen_name,group_name,address_name,";
		$query .= "DATEDIFF( CURDATE( ) , equipment_gen_date_begin ) / 365.25 AS DiffDate";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= "	LEFT JOIN db_repair ON repair_link_list = equipment_list_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " LEFT JOIN db_status ON status_id = equipment_list_status_link";
		$query .= " GROUP BY equipment_list_id";
		$sth=$this->db->select($query,array());
		$data = array("equipmentreport",0,10,"",1,10,0,0,$sth);
		return $data;
	}
}
?>