<?php
class Inventorydetail_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'inventory_id','date'=>'inventory_date','about'=>'inventory_about'
						,'note'=>'inventory_note','addr'=>'inventory_address_store','name'=>'equipment_gen_name');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];

			if ($query !="" ) {
				$where = "WHERE equipment_list_status_link=4 AND inventory_status=0 AND (";
				$where .= "inventory_id LIKE '%$query%'";
				$where .= " OR inventory_date LIKE '%$query%'";
				$where .= " OR inventory_about LIKE '%$query%'";
				$where .= " OR user_name LIKE '%$query%'";
				$where .= " OR inventory_note LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR inventory_address_store LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status_link=4 AND inventory_status=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";

		$query  = "SELECT inventory_id,inventory_date,equipment_gen_name,inventory_about,user_name,inventory_note,inventory_address_store";
		$query .= ",equipment_list_sn FROM db_inventory INNER JOIN db_equipment_list ON inventory_link_equip=equipment_list_id";
		$query .= " LEFT JOIN db_user ON user_id=inventory_link_tech";
		$query .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_group ON equipment_id_link_group=group_id $where $sort $limit";

		$sth=$this->db->select($query,array());

		$rquery  = "SELECT * FROM db_inventory INNER JOIN db_equipment_list ON inventory_link_equip=equipment_list_id";
		$rquery .= " LEFT JOIN db_user ON user_id=inventory_link_tech";
		$rquery .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_group ON equipment_id_link_group=group_id $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("inventorydetail",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
		
		//print_r($data);
	}
}

?>