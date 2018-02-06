<?php
class Borrowedback_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'borroweback_id','user'=>'borroweback_nameborrower','tech'=>'borroweback_nametechborrowe',
						 'name'=>'equipment_gen_name','date'=>'borroweback_date_borrowe',
						 'address'=>'borroweback_address_use');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];

			if ($query !="" ) {
				$where = "WHERE equipment_list_status_link=1 AND equipment_list_status=0 AND borroweback_borrowestatus=0 AND (";
				$where .= "borroweback_id LIKE '%$query%'";
				$where .= " OR borroweback_nameborrower LIKE '%$query%'";
				$where .= " OR borroweback_nametechborrowe LIKE '%$query%'";
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR borroweback_date_borrowe LIKE '%$query%'";
				$where .= " OR borroweback_address_use LIKE '%$query%')";
			}
			else if($query=="")
			{
					$where ="WHERE equipment_list_status_link=1 AND equipment_list_status=0 AND borroweback_borrowestatus=0";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		/*
		$query  = "SELECT equipment_list_id,equipment_list_sap,equipment_list_sn";
		$query .= ",equipment_gen_name,equipment_gen_code,group_name,address_name";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " $where $sort $limit";
		*/
		$query  = "SELECT borroweback_id";
		$query .= ",equipment_gen_name,equipment_list_sn";
		$query .= ",borroweback_nameborrower,borroweback_nametechborrowe";
		$query .= ",borroweback_time_borrowe,borroweback_date_borrowe,borroweback_address_use";
		$query .= " FROM db_borroweback INNER JOIN db_equipment_list ON borroweback_id_link_equip=equipment_list_id";
		$query .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id $where $sort $limit";

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT *";
		$rquery .= " FROM db_borroweback INNER JOIN db_equipment_list ON borroweback_id_link_equip=equipment_list_id";
		$rquery .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("borrowedback",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
	}
	function select($id){
		$query  = "SELECT borroweback_id";
		$query .= ",equipment_gen_name";
		$query .= ",borroweback_nameborrower,borroweback_nametechborrowe";
		$query .= ",borroweback_time_borrowe,borroweback_date_borrowe,borroweback_address_use";
		$query .= " FROM db_borroweback INNER JOIN db_equipment_list ON borroweback_id_link_equip=equipment_list_id";
		$query .= " LEFT JOIN db_equipment_gen ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		
		//$query  = "SELECT equipment_list_sap,equipment_list_sn,equipment_gen_name,group_name,address_name,equipment_list_id";
		//$query .= ",equipment_pic_name FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		//$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		//$query .= " INNER JOIN db_equipment_pic ON equipment_id_link_pic=equipment_pic_id";
		//$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " WHERE borroweback_id = :ID AND equipment_list_status_link = :STA";
		$query .= " AND borroweback_status =:ACC AND borroweback_borrowestatus=:BSTA LIMIT 1 ";
		
		$sth=$this->db->select($query,array(':ID'=>$id,':STA'=>1,':ACC'=>0,'BSTA'=>0));
		
		$data = array("borrowedback",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
	function create($data,$id){
		
		$where ="borroweback_id=$id";
		$update = $this->db->update("db_borroweback",array('borroweback_date_back'=>$data['date']
														  ,'borroweback_time_back'=>$data['time']
														  ,'borroweback_nameborrowerback'=>$data['user']
														  ,'borroweback_nametechback'=>$data['tech']
														  ,'borroweback_borrowestatus'=>1),$where);
				if($update==true)
											header('location:'.URL.'borrowedback');
										else 
											echo "Update not successed";
		
	}
	
}

?>