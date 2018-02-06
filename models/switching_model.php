<?php
class Switching_Model extends Model{
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
				$where = "WHERE equipment_list_status_link=1 AND equipment_list_status=0 AND (";
				$where .= "equipment_list_id LIKE '%$query%'";
				$where .= " OR equipment_list_sap LIKE '%$query%'";
				$where .= " OR equipment_list_sn LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR group_name LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status_link=1 AND equipment_list_status=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		
		$query  = "SELECT equipment_list_id,equipment_list_sap,equipment_list_sn";
		$query .= ",equipment_gen_name,equipment_gen_code,group_name,address_name";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " $where $sort $limit";
		

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT *";
		$rquery .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$rquery .= " $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("switching",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
	}
	function select($id){
		$query  = "SELECT equipment_list_sap,equipment_list_sn,equipment_gen_name,group_name,address_name,equipment_list_id";
		$query .= ",address_id,equipment_pic_name FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " INNER JOIN db_equipment_pic ON equipment_id_link_pic=equipment_pic_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " WHERE equipment_list_id = :ID AND equipment_list_status_link = :STA AND equipment_list_status=:ACC LIMIT 1 ";
		
		$sth=$this->db->select($query,array(':ID'=>$id,':STA'=>1,':ACC'=>0));
		
		$addrquery = "SELECT address_id,address_name FROM db_address WHERE address_status=:sta";
		$addr = $this->db->select($addrquery,array(':sta'=>0));
		
		$data = array("switching",0,10,"",1,10,0,0,$sth,$addr);
		
		return $data;
		}
	function create($data,$id){
		
		Session::init();
		$uid = Session::get('id');
		$insert = $this->db->insert("db_switch",array('switch_link_equip'=>$id
														  ,'switch_link_old_address'=>$data['oldaddr']
														  ,'switch_link_new_address'=>$data['newaddr']
														  ,'switch_address'=>$data['addrname']
														  ,'switch_note'=>$data['note']
														  ,'switch_date'=>$data['date']
														  ,'switch_link_id_tech'=>$uid
														  ,'switch_status'=>0
														  ,'switch_registed'=>date('y-m-d G.i:s')));
				if($insert==true){
					$where ="equipment_list_id=$id";
					$update = $this->db->update('db_equipment_list',array('equipment_list_address_link'=>$data['newaddr']),$where);
					if($update==true){
						header('location:'.URL.'switching');
					}
					else{ 
						echo "Insert not successed";
					}
				}
	}
	
}

?>