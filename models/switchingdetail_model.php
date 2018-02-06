<?php
class Switchingdetail_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'switch_id','date'=>'switch_date','newaddress'=>'switch_link_new_address'
						,'oldaddress'=>'switch_link_old_address','tech'=>'user_name','name'=>'equipment_gen_name');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];

			if ($query !="" ) {
				$where = "WHERE equipment_list_status_link=1 AND switch_status=0 AND (";
				$where .= "switch_id LIKE '%$query%'";
				$where .= " OR switch_note LIKE '%$query%'";
				$where .= " OR switch_address LIKE '%$query%'";
				$where .= " OR user_name LIKE '%$query%'";
				$where .= " OR switch_date LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status_link=1 AND switch_status=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";

		$query  = "SELECT switch_id,switch_address,equipment_gen_name,address_name,user_name,switch_date,switch_note";
		$query .= " FROM db_switch INNER JOIN db_equipment_list ON switch_link_equip=equipment_list_id";
		$query .= " LEFT JOIN db_user ON user_id=switch_link_id_tech";
		$query .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id $where $sort $limit";

		$sth=$this->db->select($query,array());

		$rquery  = "SELECT *";
		$rquery .= " FROM db_switch INNER JOIN db_equipment_list ON switch_link_equip=equipment_list_id";
		$rquery .= " LEFT JOIN db_user ON user_id=switch_link_id_tech";
		$rquery .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("switchingdetail",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
		
		//print_r($data);
	}
}

?>