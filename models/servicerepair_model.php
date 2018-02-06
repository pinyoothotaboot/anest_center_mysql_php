<?php
class Servicerepair_Model extends Model{
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
		
		//echo $query;

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT *";
		$rquery .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$rquery .= " $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("servicerepair",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
	}
	function select($id){
		$query  = "SELECT equipment_list_sap,equipment_list_sn,equipment_gen_name,group_name,address_name,equipment_list_id";
		$query .= ",equipment_pic_name FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " INNER JOIN db_equipment_pic ON equipment_id_link_pic=equipment_pic_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " WHERE equipment_list_id = :ID AND equipment_list_status_link = :STA AND equipment_list_status=:ACC LIMIT 1 ";
		
		$sth=$this->db->select($query,array(':ID'=>$id,':STA'=>1,':ACC'=>0));
		
		$data = array("servicerepair",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
	
	
	
	function create($data,$img,$id){
		//print_r($data);
		$type = array('image/jpg','image/jpeg','image/gif','image/png');
			$check = true;
			
			$file_name = $img['name'];
			$file_tmp  = $img['tmp_name'];
			$file_type = $img['type'];
			$file_size = $img['size'];
			$file_error =$img['error']; 
			
			$target_dir = "publics/images/repair/";
			$target_file = $target_dir.$file_name;
			
			// Check image file [jpg,jpeg,gif,png]
			if(($file_type != $type[0]) && ($file_type != $type[1]) &&($file_type != $type[2]) && ($file_type != $type[3]))
				$check =false;
			// Check image file large too 1MB
			if($file_size > 1024000)
				$check =false;
  			
			if($check== true){
				$result=move_uploaded_file($file_tmp,$target_file);
				 if( $result){
					 $insert=$this->db->insert("db_repair_pic",array('repair_pic_name'=>$file_name
																	  ,'repair_pic_tmp'=>$file_tmp
																	  ,'repair_pic_type'=>$file_type
																	  ,'repair_pic_size'=>$file_size
																	  ,'repair_pic_error'=>$file_error
																	  ,'repair_pic_status'=>0
																	  ,'repair_pic_registed'=>date('y-m-d G.i:s')));
					if($insert==true){
						Session::init();
						$sid   =  Session::get('id');
						$query ="SELECT repair_pic_id FROM db_repair_pic WHERE repair_pic_name=:ID LIMIT 1";
							$code=$this->db->select($query,array(':ID'=>$file_name));
							if($code[0]['repair_pic_id']>0){	
								$insert=$this->db->insert('db_repair',array('repair_link_pic'=>$code[0]['repair_pic_id']
												   						   ,'repair_link_list'=>$id
												   						   ,'repair_date'=>date('y-m-d G:i.s')
																		   ,'repair_date_send'=>$data['date']
												   						   ,'repair_social'=>$data['social']
												   						   ,'repair_about_send'=>$data['detail']
												   						   ,'repair_registed'=>date('y-m-d G:i.s')
												   						   ,'repair_tech_send'=>$sid
																		   ,'repair_check'=>0
												   						   ,'repair_status'=>0));
									if($insert){
										
									$where = "equipment_list_id = $id";
									$update = $this->db->update('db_equipment_list',array('equipment_list_status_link'=>2),$where);
										
										header('location:'.URL.'servicerepair');
									}
									else
										echo "Insert not successed";
										
							}
							
					}
				 }
				 else
				 	echo "Image upload fail!!";
			}
			else
				echo "File not image type or Image too large";
	}
	
}

?>