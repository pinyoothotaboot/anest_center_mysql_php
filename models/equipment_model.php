<?php
class Equipment_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function selectdatatable($data){
		$sortData= array('id'=>'equipment_list_id','sap'=>'equipment_list_sap','sn'=>'equipment_list_sn',
						 'name'=>'equipment_gen_name','code'=>'equipment_gen_code','group'=>'group_name',
						 'address'=>'address_name','sta'=>'status_name','stad'=>'equipment_list_status');

		$about = array('ASC','DESC');
		$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
		$rp   =(int)$data['row'];
		$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
		$where = "";
		$query = $data['find'];
		
			if($data['find']=="Active") $where ="WHERE equipment_list_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE equipment_list_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE equipment_list_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE equipment_list_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE equipment_list_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE equipment_list_status LIKE '%1%'";
		
				
			if ($query !="" ) {
				$where = "WHERE ";
				$where .= "equipment_list_id LIKE '%$query%'";
				$where .= " OR equipment_list_sap LIKE '%$query%'";
				$where .= " OR equipment_list_sn LIKE '%$query%'";
				$where .= " OR equipment_list_tel LIKE '%$query%'";
				//$where .= " OR equipment_list_registed LIKE '%$query%'";
				//$where .= " OR equipment_list_date_delete LIKE '%$query%'";
				
				$where .= " OR equipment_gen_name LIKE '%$query%'";
				$where .= " OR equipment_gen_code LIKE '%$query%'";
				$where .= " OR equipment_gen_brand LIKE '%$query%'";
				$where .= " OR equipment_gen_model LIKE '%$query%'";
				$where .= " OR equipment_gen_budget LIKE '%$query%'";
				//$where .= " OR equipment_gen_date_begin LIKE '%$query%'";
				//$where .= " OR equipment_gen_date_end LIKE '%$query%'";
				$where .= " OR equipment_gen_company LIKE '%$query%'";
				$where .= " OR equipment_gen_company_tel LIKE '%$query%'";
				$where .= " OR equipment_gen_company_fax LIKE '%$query%'";
				$where .= " OR equipment_gen_company_sales LIKE '%$query%'";
				$where .= " OR equipment_gen_company_sales_tel LIKE '%$query%'";
				$where .= " OR equipment_gen_price LIKE '%$query%'";
				
				$where .= " OR group_name LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%'";
				$where .= " OR status_name LIKE '%$query%'";
			}
			else if($query=="")
			{
					$where ="";
			}
				
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		
		$query  = "SELECT equipment_list_id,equipment_list_sap,equipment_list_sn,equipment_list_tel";
		$query .= ",equipment_list_registed,equipment_list_date_delete,";
		$query .= "case equipment_list_status when 0 then 'Active' when 1 then 'Hidden' end as status";
		$query .= ",equipment_gen_name,equipment_gen_code,equipment_gen_brand,equipment_gen_model";
		$query .= ",equipment_gen_budget,equipment_gen_date_begin,equipment_gen_date_end,equipment_gen_company";
		$query .= ",equipment_gen_company_tel,equipment_gen_company_fax,equipment_gen_company_sales,equipment_gen_company_sales_tel";
		$query .= ",equipment_gen_price,group_name,address_name,status_name";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " LEFT JOIN db_status ON equipment_list_status_link=status_id $where $sort $limit";
		

		$sth=$this->db->select($query,array());
		$rquery  = "SELECT *";
		$rquery .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$rquery .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$rquery .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$rquery .= " LEFT JOIN db_status ON equipment_list_status_link=status_id $where";
		
		$row = $this->db->counter($rquery,array());
		$data = array("equipment",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		return $data;
	}
	function select($id){
		//$query ="SELECT address_id,address_name FROM db_address WHERE address_id=:ID LIMIT 1";
		$query  = "SELECT *";
		$query .= " FROM db_equipment_gen INNER JOIN db_group ON equipment_id_link_group=group_id";
		$query .= " INNER JOIN db_equipment_list ON equipment_list_gen_link=equipment_gen_id";
		$query .= " INNER JOIN db_equipment_pic ON equipment_id_link_pic=equipment_pic_id";
		$query .= " LEFT JOIN db_address ON equipment_list_address_link=address_id";
		$query .= " LEFT JOIN db_status ON equipment_list_status_link=status_id WHERE equipment_list_id = :ID LIMIT 1";
		
		$sth=$this->db->select($query,array(':ID'=>$id));
		
			$query = "SELECT group_id,group_name FROM db_group WHERE group_status=0";
			$group=$this->db->select($query,array());
			$query = "SELECT status_id,status_name FROM db_status WHERE status_status=0";
			$status=$this->db->select($query,array());
			$query = "SELECT address_id,address_name FROM db_address WHERE address_status=0";
			$address=$this->db->select($query,array());
		
		$data = array("equipment",0,10,"",1,10,0,0,$sth,$group,$status,$address);
		
		return $data;
		}
	
	function addnew(){
			$query = "SELECT group_id,group_name FROM db_group WHERE group_status=0";
			$group=$this->db->select($query,array());
			$query = "SELECT status_id,status_name FROM db_status WHERE status_status=0";
			$status=$this->db->select($query,array());
			$query = "SELECT address_id,address_name FROM db_address WHERE address_status=0";
			$address=$this->db->select($query,array());
			//return $data;
			$data = array("equipment",0,10,"",1,10,0,0,$group,$status,$address);
			return $data;
	}
		
	function create($data,$img){
			$type = array('image/jpg','image/jpeg','image/gif','image/png');
			$check = true;
			
			$file_name = $img['name'];
			$file_tmp  = $img['tmp_name'];
			$file_type = $img['type'];
			$file_size = $img['size'];
			$file_error =$img['error']; 
			
			$target_dir = "publics/images/equipment/";
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
				 	//echo "Uploaded";
					$insert=$this->db->insert("db_equipment_pic",array('equipment_pic_name'=>$file_name
																	  ,'equipment_pic_tmp'=>$file_tmp
																	  ,'equipment_pic_type'=>$file_type
																	  ,'equipment_pic_size'=>$file_size
																	  ,'equipment_pic_error'=>$file_error
																	  ,'equipment_pic_status'=>0
																	  ,'equipment_pic_registed'=>date('y-m-d G.i:s')));
					if($insert==true){
							$query ="SELECT equipment_pic_id FROM db_equipment_pic WHERE equipment_pic_name=:ID LIMIT 1";
							$code=$this->db->select($query,array(':ID'=>$file_name));
							if($code[0]['equipment_pic_id']>0){	
									$insert=$this->db->insert('db_equipment_gen',array('equipment_gen_name'=>$data[0]['name']
												   ,'equipment_gen_code'=>$data[0]['code']
												   ,'equipment_gen_brand'=>$data[0]['brand']
												   ,'equipment_gen_model'=>$data[0]['model']
												   ,'equipment_gen_budget'=>$data[0]['budget']
												   ,'equipment_gen_date_begin'=>$data[0]['insdate']
												   ,'equipment_gen_date_end'=>$data[0]['expdate']
												   ,'equipment_gen_company'=>$data[0]['company']
												   ,'equipment_gen_company_tel'=>$data[0]['comtel']
												   ,'equipment_gen_company_fax'=>$data[0]['comfax']
												   ,'equipment_gen_company_sales'=>$data[0]['sales']
												   ,'equipment_gen_company_sales_tel'=>$data[0]['salestel']
												   ,'equipment_gen_price'=>$data[0]['price']
												   ,'equipment_id_link_group'=>$data[0]['group']
												   ,'equipment_gen_registed'=>date('y-m-d G:i.s')
												   ,'equipment_id_link_pic'=>$code[0]['equipment_pic_id']
												   ,'equipment_gen_status'=>0));
							if($insert==true){
									$query ="SELECT equipment_gen_id FROM db_equipment_gen WHERE equipment_gen_code=:ID LIMIT 1";
									$code=$this->db->select($query,array(':ID'=>$data[0]['code']));
							if($code[0]['equipment_gen_id']>0){
								for($i=0;$i<$data[6];$i++){
									
							$insertlist=$this->db->insert('db_equipment_list',array('equipment_list_gen_link'=>$code[0]['equipment_gen_id']
																				   ,'equipment_list_sn'=>$data[2][$i]
																				   ,'equipment_list_sap'=>$data[1][$i]
																				   ,'equipment_list_address_link'=>$data[3][$i]
																				   ,'equipment_list_tel'=>$data[4][$i]
																				   ,'equipment_list_status_link'=>$data[5][$i]
																				   ,'equipment_list_registed'=>date('y-m-d G.i:s')
																				   ,'equipment_list_status'=>0));
													if($insertlist==true)
														$ck = true;
													else
														$ck = false;
								}
								
								//print_r($code);
							}// for loop	
							
								
							} // if select gen
							
										
							} // if gen inserted
						
					} // if pic inserted
					else 
						echo "Insert not successed";
				 }
				  else // Upload image
				  	echo "Fail image upload";	 
			}// if check true
		
		if($ck == true)
					header('location:'.URL.'equipment');
				else
					echo "Insert not successed";

	}
	
	function update($data,$img,$id){
		//$where = "group_id=$id";
		$upStatus = 0;   // Deleted
		//$upDate   = date('y-m-d G.i:s');
											
		$check = $this->select($id);
			//print_r($check[8][0]);
			
			if($img['name'] != "" && $img['name'] != $check[8][0]['equipment_pic_name']){
				$file_name = $img['name'];
				$file_tmp  = $img['tmp_name'];
				$file_type = $img['type'];
				$file_size = $img['size'];
				$file_error =$img['error']; 
			
				$target_dir = "publics/images/equipment/";
				$target_file = $target_dir.$file_name;
				
				$where = "equipment_pic_id = ".$check[8][0]['equipment_pic_id']; 
				$result=move_uploaded_file($file_tmp,$target_file);
				
				if($result){
					
					$update=$this->db->update("db_equipment_pic",array('equipment_pic_name'=>$file_name
																	  ,'equipment_pic_tmp'=>$file_tmp
																	  ,'equipment_pic_type'=>$file_type
																	  ,'equipment_pic_size'=>$file_size
																	  ,'equipment_pic_error'=>$file_error
																	  ,'equipment_pic_status'=>$upStatus
																	  ,'equipment_pic_date_delete'=>NULL),$where);
								$ck=1;
								
				}
			}
			
			if($check[8][0]['equipment_list_sap'] != $data['sap'] || $check[8][0]['equipment_list_sn'] !=$data['sn']
			|| $check[8][0]['equipment_list_tel'] !=$data['tel'] || $check[8][0]['equipment_list_address_link'] !=$data['address']
			||  $check[8][0]['equipment_list_status_link'] !=$data['status']){
				
				$ck_list=1;
			}
			else {
				$ck_list=0;
			}
			
			if($ck_list==1){
				$where ="equipment_list_id=$id";
				$update=$this->db->update("db_equipment_list",array('equipment_list_sap'=>$data['sap']
																	  ,'equipment_list_sn'=>$data['sn']
																	  ,'equipment_list_tel'=>$data['tel']
																	  ,'equipment_list_address_link'=>$data['address']
																	  ,'equipment_list_status_link'=>$data['status']
																	  ,'equipment_list_status'=>$upStatus
																	  ,'equipment_list_date_delete'=>NULL),$where);
							$ck=1;
			}
			else{
				$where ="equipment_list_id=$id";
				$update=$this->db->update("db_equipment_list",array('equipment_list_status'=>$upStatus
																   ,'equipment_list_date_delete'=>NULL),$where);
							$ck=1;
			}


			if(($check[8][0]['equipment_gen_code'] != $data['code']   || $check[8][0]['equipment_gen_name'] != $data['name']
			|| $check[8][0]['equipment_gen_brand'] != $data['brand'] || $check[8][0]['equipment_gen_model'] != $data['model']
			|| $check[8][0]['equipment_id_link_group'] != $data['group'] || $check[8][0]['equipment_gen_budget'] != $data['budget']
			|| $check[8][0]['equipment_gen_company'] != $data['company'] || $check[8][0]['equipment_gen_company_tel'] != $data['comtel']
			|| $check[8][0]['equipment_gen_company_fax'] != $data['comfax'] || $check[8][0]['equipment_gen_company_sales'] != $data['sales']
			|| $check[8][0]['equipment_gen_company_sales_tel'] != $data['salestel'] || $check[8][0]['equipment_gen_price'] != $data['price']  
			) &&($data['insdate'] != "" && $data['expdate'] != "") ){
				$ck_gen=1;
			}
			else if(($check[8][0]['equipment_gen_code'] != $data['code']   || $check[8][0]['equipment_gen_name'] != $data['name']
			|| $check[8][0]['equipment_gen_brand'] != $data['brand'] || $check[8][0]['equipment_gen_model'] != $data['model']
			|| $check[8][0]['equipment_id_link_group'] != $data['group'] || $check[8][0]['equipment_gen_budget'] != $data['budget']
			|| $check[8][0]['equipment_gen_company'] != $data['company'] || $check[8][0]['equipment_gen_company_tel'] != $data['comtel']
			|| $check[8][0]['equipment_gen_company_fax'] != $data['comfax'] || $check[8][0]['equipment_gen_company_sales'] != $data['sales']
			|| $check[8][0]['equipment_gen_company_sales_tel'] != $data['salestel'] || $check[8][0]['equipment_gen_price'] != $data['price']  
			) &&($data['insdate'] == "" && $data['expdate'] == "")){
				$ck_gen=0;
			}
			else if(($check[8][0]['equipment_gen_code'] == $data['code']   && $check[8][0]['equipment_gen_name'] == $data['name']
			&& $check[8][0]['equipment_gen_brand'] == $data['brand'] && $check[8][0]['equipment_gen_model'] == $data['model']
			&& $check[8][0]['equipment_id_link_group'] == $data['group'] && $check[8][0]['equipment_gen_budget'] == $data['budget']
			&& $check[8][0]['equipment_gen_company'] == $data['company'] && $check[8][0]['equipment_gen_company_tel'] == $data['comtel']
			&& $check[8][0]['equipment_gen_company_fax'] == $data['comfax'] && $check[8][0]['equipment_gen_company_sales'] == $data['sales']
			&& $check[8][0]['equipment_gen_company_sales_tel'] == $data['salestel'] && $check[8][0]['equipment_gen_price'] == $data['price']  
			) &&($data['insdate'] != "" && $data['expdate'] != "")){
				$ck_gen=2;
			}
			
			if($ck_gen==0){
				$where ="equipment_gen_id = ".$check[8][0]['equipment_gen_id'];
				$update=$this->db->update('db_equipment_gen',array('equipment_gen_name'=>$data['name']
												   ,'equipment_gen_code'=>$data['code']
												   ,'equipment_gen_brand'=>$data['brand']
												   ,'equipment_gen_model'=>$data['model']
												   ,'equipment_gen_budget'=>$data['budget']
												   ,'equipment_gen_company'=>$data['company']
												   ,'equipment_gen_company_tel'=>$data['comtel']
												   ,'equipment_gen_company_fax'=>$data['comfax']
												   ,'equipment_gen_company_sales'=>$data['sales']
												   ,'equipment_gen_company_sales_tel'=>$data['salestel']
												   ,'equipment_gen_price'=>$data['price']
												   ,'equipment_id_link_group'=>$data['group']
												   ,'equipment_gen_date_delete'=>NULL
												   ,'equipment_gen_status'=>0),$where);
												  
												   
							$ck=1;
			}
			else if($ck_gen==1){
				$where ="equipment_gen_id = ".$check[8][0]['equipment_gen_id'];
				$update=$this->db->update('db_equipment_gen',array('equipment_gen_name'=>$data['name']
												   ,'equipment_gen_code'=>$data['code']
												   ,'equipment_gen_brand'=>$data['brand']
												   ,'equipment_gen_model'=>$data['model']
												   ,'equipment_gen_budget'=>$data['budget']
												   ,'equipment_gen_date_begin'=>$data['insdate']
												   ,'equipment_gen_date_end'=>$data['expdate']
												   ,'equipment_gen_company'=>$data['company']
												   ,'equipment_gen_company_tel'=>$data['comtel']
												   ,'equipment_gen_company_fax'=>$data['comfax']
												   ,'equipment_gen_company_sales'=>$data['sales']
												   ,'equipment_gen_company_sales_tel'=>$data['salestel']
												   ,'equipment_gen_price'=>$data['price']
												   ,'equipment_id_link_group'=>$data['group']
												   ,'equipment_gen_date_delete'=>NULL
												   ,'equipment_gen_status'=>0),$where);
												  
												   
							$ck=1;
			}
			else{
				$where ="equipment_gen_id = ".$check[8][0]['equipment_gen_id'];
				$update=$this->db->update('db_equipment_gen',array('equipment_gen_date_begin'=>$data['insdate']
												   ,'equipment_gen_date_end'=>$data['expdate']
												   ,'equipment_gen_date_delete'=>NULL
												   ,'equipment_gen_status'=>0),$where);
												  
												   
							$ck=1;
			}
					
				
				
				if($ck == 1)
					header('location:'.URL.'equipment');
				else
					echo "Update not successed";
			
			
			
	}
	
	function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "equipment_list_id=$id";
		$update    = $this->db->update('db_equipment_list',array('equipment_list_status'=>$delStatus,'equipment_list_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'equipment');
													
	}
}

?>