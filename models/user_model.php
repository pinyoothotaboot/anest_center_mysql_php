<?php 
	class User_Model extends Model{
		function __construct() {
			parent::__construct();	

		}
		
		function selectdatatable($data){
			 /* $list= array('id'=>'ID','user'=>'User','fname'=>'First Name','lname'=>'Last Name'
						 ,'pos'=>'Position','tel'=>'Tel','email'=>'E-Mail','acc'=>'Account'
						 ,'sta'=>'Status','date'=>'Date deleted');
				*/
			$sortData= array('id'=>'user_id','fname'=>'user_name','lname'=>'user_lastname'
							,'tel'=>'user_tel','email'=>'user_email'
							,'user'=>'user_login','gen'=>'user_gender'
							,'acc'=>'user_account','sta'=>'user_status','date'=>'user_registed');
			
			$about = array('ASC','DESC');
			$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
			$rp   =(int)$data['row'];
			$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
			$where = "";
			$query = $data['find'];
				if($data['find']=="Active") $where ="WHERE user_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE user_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE user_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE user_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE user_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE user_status LIKE '%1%'";
				
				else if($data['find'] =="MALE"  || $data['find'] =="Male" ||$data['find'] =="male"){
					$where ="WHERE user_gender LIKE '%0%'";
				}
				
				else if($data['find'] =="FEMALE"  || $data['find'] =="Female" ||$data['find'] =="female"){
					$where ="WHERE user_gender LIKE '%1%'";
				}
				else if($data['find'] == "ADMIN"  
					||  $data['find'] == "Admin"
					||  $data['find'] == "admin" 
					||  $data['find'] == "ADMINISTRATOR" 
					||  $data['find'] == "Administrator" 
					||  $data['find'] == "administrator" ){
					$where ="WHERE user_account LIKE '%0%'";
				}
				else if($data['find'] == "CUSTOMER"  
					||  $data['find'] == "Customer"
					||  $data['find'] == "customer"){
					$where ="WHERE user_account LIKE '%1%'";
				}
				else if($data['find'] == "VISIT"  
					||  $data['find'] == "Visit"
					||  $data['find'] == "visit" 
					||  $data['find'] == "VISITOR" 
					||  $data['find'] == "Visitor" 
					||  $data['find'] == "visitor" ){
					$where ="WHERE user_account LIKE '%2%'";
				}
				
				else
				{
			if ($query and $query !="" ) {
				$where = "WHERE ";
				$where .= "user_id LIKE '%$query%'";
				$where .= " OR user_name LIKE '%$query%'";
				$where .= " OR user_lastname LIKE '%$query%'";
				$where .= " OR user_email LIKE '%$query%'";
				$where .= " OR user_tel LIKE '%$query%'";
				$where .= " OR user_login LIKE '%$query%'";
				$where .= " OR user_gender LIKE '%$query%'";
				$where .= " OR user_account LIKE '%$query%'";
				$where .= " OR user_status LIKE '%$query%'";
				//$where .= " OR user_registed LIKE '%$query%'";
				//$where .= " OR user_date_delete LIKE '%$query%'";
				//$where .= " OR position_name LIKE '%$query%'";
			}
			else if($query=="")
				{
					$where ="";
					}
				}
			$start = (($page-1) * $rp);
			$limit = "LIMIT $start, $rp";
			
			$query  = "SELECT user_id,user_name,user_lastname";
			$query .= ",user_login,user_tel,user_email";
			$query .= ",case user_status when 0 then 'Active' when 1 then 'Hidden' end as status";
			$query .= ",user_registed,user_date_delete,case user_gender when 1 then 'MALE' when 2 then 'FEMALE' end as gender";
			$query .= ",case user_account when 0 then 'ADMINISTATOR' when 1 then 'CUSTOMER' when 2 then 'VISITOR' end as account";
			$query .= ",user_status FROM db_user $where $sort $limit";
		$sth=$this->db->select($query,array());
		
		$rquery = "SELECT * FROM db_user $where";
		
		$row = $this->db->counter($rquery,array());
		
		$data = array("user",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		
		return $data;
		}
		
		function addnew(){
			$query = "SELECT position_id,position_name FROM db_position WHERE position_status=0";
			$position=$this->db->select($query,array());
			//return $data;
			//$data = array("equipment",0,10,"",1,10,0,0,$group,$status,$address);
			//return $data;
			
			$data = array("user",0,10,"",1,10,0,0,$position);
			return $data;
		}
		
		function select($id){
			$query  = "SELECT * FROM db_user LEFT JOIN db_position ON position_id = user_position"; 
			$query .= " LEFT JOIN db_user_pic ON user_pic_id = user_id_link_pic";
			$query .= " WHERE user_id = :ID AND user_status=0 LIMIT 1";
			$user = $this->db->select($query,array(':ID'=>$id));
			
			$query = "SELECT position_id,position_name FROM db_position WHERE position_status=0";
			$position=$this->db->select($query,array());
			
			
			$data = array("user",0,10,"",1,10,0,0,$user,$position);
			return $data;
		}
		
		
		function create($data,$img){
			$query = "SELECT * FROM db_user WHERE user_login = :login LIMIT 1";
			$user = $this->db->counter($query,array(':login'=>$data['user']));
			
			
			if($user <1 ){
			$type = array('image/jpg','image/jpeg','image/gif','image/png');
			$check = true;
			
			$file_name = $img['name'];
			$file_tmp  = $img['tmp_name'];
			$file_type = $img['type'];
			$file_size = $img['size'];
			$file_error =$img['error']; 
			
			$target_dir = "publics/images/user/";
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
					$insert=$this->db->insert("db_user_pic",array('user_pic_name'=>$file_name
																	  ,'user_pic_tmp'=>$file_tmp
																	  ,'user_pic_type'=>$file_type
																	  ,'user_pic_size'=>$file_size
																	  ,'user_pic_error'=>$file_error
																	  ,'user_pic_status'=>0
																	  ,'user_pic_registed'=>date('y-m-d G.i:s')));
					if($insert==true){
							$query ="SELECT user_pic_id FROM db_user_pic WHERE user_pic_name=:ID LIMIT 1";
							$code=$this->db->select($query,array(':ID'=>$file_name));
							if($code[0]['user_pic_id']>0){
								$insert = $this->db->insert("db_user",array('user_name'=>$data['name']
																		   ,'user_lastname'=>$data['lastname']
																		   ,'user_login'=>$data['user']
																		   ,'user_pass'=>$data['pass']
																		   ,'user_email'=>$data['email']
																		   ,'user_tel'=>$data['tel']
																		   ,'user_position'=>$data['position']
																		   ,'user_gender'=>$data['gender']
																		   ,'user_account'=>$data['account']
																		   ,'user_registed'=>date('y-m-d G.i:s')
																		   ,'user_status'=>0
																		   ,'user_id_link_pic'=>$code[0]['user_pic_id']));
										if($insert==true)
														$ck = true;
													else
														$ck = false;
							}
									
					}
				} // if Result
		    } // if check
			
			if($ck == true)
					header('location:'.URL.'user');
				else
					echo "Insert not successed";
		}
		
		
		else
			echo "There are username morethan 1 account!!";
		}
	
	function update($data,$id,$img){
		$query  ="SELECT * FROM db_user WHERE user_id =:ID LIMIT 1";
		$user = $this->db->select($query,array(':ID'=>$id));
		
			if($img['name'] != "" ){
				$file_name = $img['name'];
				$file_tmp  = $img['tmp_name'];
				$file_type = $img['type'];
				$file_size = $img['size'];
				$file_error =$img['error']; 
			
				$target_dir = "publics/images/user/";
				$target_file = $target_dir.$file_name;
				
				
				$result=move_uploaded_file($file_tmp,$target_file);
				
				if($result  && $data['link']!="" ){
						if($img['name'] != $data['link']){
						$where = "user_pic_id = ".$user[0]['user_id_link_pic']; 
						$update=$this->db->update("db_user_pic",array('user_pic_name'=>$file_name
																	  ,'user_pic_tmp'=>$file_tmp
																	  ,'user_pic_type'=>$file_type
																	  ,'user_pic_size'=>$file_size
																	  ,'user_pic_error'=>$file_error
																	  ,'user_pic_status'=>0),$where);
								if($update)
									$ck=1;
						}
						
				}
				else{
					$insert=$this->db->insert("db_user_pic",array('user_pic_name'=>$file_name
																	  ,'user_pic_tmp'=>$file_tmp
																	  ,'user_pic_type'=>$file_type
																	  ,'user_pic_size'=>$file_size
																	  ,'user_pic_error'=>$file_error
																	  ,'user_pic_status'=>0
																	  ,'user_pic_registed'=>date('y-m-d G.i:s')));
																	  
						if($insert){
							$query ="SELECT user_pic_id FROM db_user_pic WHERE user_pic_name =:pname LIMIT 1";
							$name = $this->db->select($query,array(':pname'=>$file_name));
							$where = "user_id=$id";
							$update = $this->db->update("db_user",array('user_id_link_pic'=>$name[0]['user_pic_id']),$where);
						
								if($update)
									$ck=1;
										
									}
				
				}
				
			}
			
			if($user[0]['user_name'] != $data['name'] 
			|| $user[0]['user_lastname'] !=$data['lastname']
			|| $user[0]['user_login'] !=$data['user']
			|| $user[0]['user_pass'] !=$data['pass']
			|| $user[0]['user_email'] !=$data['email']
			|| $user[0]['user_tel'] !=$data['tel']
			|| $user[0]['user_position'] !=$data['position']
			|| $user[0]['user_gender'] !=$data['gender']
			|| $user[0]['user_account'] !=$data['account']){
				
				$ck_list=1;
			}
			else {
				$ck_list=0;
			}
			
			if($ck_list==1){
				$where ="user_id=$id";
				$update = $this->db->update("db_user",array('user_name'=>$data['name']
														   ,'user_lastname'=>$data['lastname']
														   ,'user_login'=>$data['user']
														   ,'user_pass'=>$data['pass']
														   ,'user_email'=>$data['email']
														   ,'user_tel'=>$data['tel']
														   ,'user_position'=>$data['position']
														   ,'user_gender'=>$data['gender']
														   ,'user_account'=>$data['account']
														   ,'user_status'=>0
														   ),$where);
							$ck=1;
			}
			else{
				$where ="user_id=$id";
				$update = $this->db->update("db_user",array('user_status'=>0
															,'user_date_delete'=>null										   
														   ),$where);
							$ck=1;
			}
				if($ck == 1)
					header('location:'.URL.'user');
				else
					echo "Update not successed";
			
			
		
	}	
	
	function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "user_id=$id";
		$update    = $this->db->update('db_user',array('user_status'=>$delStatus,'user_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'user');
													
	}
}
?>