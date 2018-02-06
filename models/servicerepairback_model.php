<?php
class Servicerepairback_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'repair_id','sn'=>'equipment_list_sn',
						 'name'=>'equipment_gen_name'
						 ,'address'=>'address_name');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];

			if ($query and $query !="" ) {
				$where = "WHERE equipment_list_status_link=2 AND repair_check=0 AND equipment_list_status=0 AND (";
				$where .= "repair_id LIKE '%$query%'";
				$where .= " OR equipment_list_sn LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%'";
				$where .= " OR repair_social LIKE '%$query%'";
				$where .= " OR repair_about_send LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status_link=2 AND repair_check=0 AND equipment_list_status=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		
		$query = "SELECT repair_id,equipment_gen_name,user_name,address_name,equipment_list_sn,repair_about_send,repair_social,repair_date_send FROM db_repair INNER JOIN db_equipment_list ON repair_link_list=equipment_list_id LEFT JOIN db_address ON address_id = equipment_list_address_link LEFT JOIN db_equipment_gen ON equipment_list_gen_link = equipment_gen_id LEFT JOIN db_user ON user_id=repair_tech_send $where $sort $limit";
		

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT repair_id,equipment_gen_name,user_name,address_name,equipment_list_sn,repair_about_send,repair_social,repair_date_send FROM db_repair INNER JOIN db_equipment_list ON repair_link_list=equipment_list_id LEFT JOIN db_address ON address_id = equipment_list_address_link LEFT JOIN db_equipment_gen ON equipment_list_gen_link = equipment_gen_id LEFT JOIN db_user ON user_id=repair_tech_send $where";
		//$rquery .= " LEFT JOIN db_status ON equipment_list_status_link=status_id $where AND status_id=1";
		
		$row = $this->db->counter($rquery,array());
		$data = array("servicerepairback",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
		//print_r($sth);
	}
	function select($id){
		/*
		$query  = "SELECT equipment_list_sap,equipment_list_sn,equipment_gen_name,group_name,address_name,equipment_list_id";
		$query .= ",equipment_pic_name FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " INNER JOIN db_equipment_pic ON equipment_id_link_pic=equipment_pic_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " WHERE equipment_list_id = :ID AND equipment_list_status_link = :STA AND equipment_list_status=:ACC LIMIT 1 ";
		*/
		
	$query = "SELECT repair_id,equipment_list_sn,equipment_list_id,group_name,repair_pic_name,address_name,equipment_gen_name,equipment_list_sap,repair_about_send FROM db_repair INNER JOIN db_equipment_list ON repair_link_list=equipment_list_id LEFT JOIN db_equipment_gen ON equipment_gen_id=equipment_list_gen_link LEFT JOIN db_group ON group_id=equipment_id_link_group LEFT JOIN db_address ON address_id=equipment_list_address_link LEFT JOIN db_repair_pic ON repair_link_pic=repair_pic_id WHERE repair_id=:ID AND equipment_list_status_link=:STA AND repair_status =:ACC LIMIT 1";
		$sth=$this->db->select($query,array(':ID'=>$id,':STA'=>2,':ACC'=>0));
		
		$data = array("servicerepairback",0,10,"",1,10,0,0,$sth);
		
		return $data;
		//print_r($data);
		}
		
		function create($data,$id){
				Session::init();
		$uid = Session::get('id');
		$where = "repair_id=$id";
		//$upStatus = 0;   // Deleted
		//$upDate   = date('y-m-d G.i:s');
		$update=$this->db->update('db_repair',array('repair_date_back'=>$data['date']
													 ,'repair_social_tech'=>$data['tech']
													 ,'repair_about_back'=>$data['detail']
													 ,'repair_tech_back'=>$uid
													 ,'repair_check'=>1
													 ,'repair_cost'=>$data['cost']),$where);
					if($update==true){
											
						$where ="equipment_list_id =".$data['id'];
						$update = $this->db->update('db_equipment_list',array('equipment_list_status_link'=>1),$where);
							if($update==true)
								header('location:'.URL.'servicerepairback');
							else
								echo "Can't update status";
					}
					
						else 
							echo "Update not successed";
		
		}
	
}

?>