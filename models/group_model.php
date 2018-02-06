<?php 
	class Group_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		function selectdatatable($data){
				
			$sortData= array('id'=>'group_id','name'=>'group_name','sta'=>'group_status','main'=>'group_maintanance','date'=>'group_registed');
			$about = array('ASC','DESC');
			$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
			$rp   =(int)$data['row'];
			$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
			$where = "";
			$query = $data['find'];
			if($data['find']=="Active") $where ="WHERE group_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE group_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE group_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE group_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE group_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE group_status LIKE '%1%'";
				else
				{
			if ($query and $query !="" ) {
				$where = "WHERE ";
				$where .= "group_id LIKE '%$query%'";
				$where .= " OR group_name LIKE '%$query%'";
				$where .= " OR group_status LIKE '%$query%'";
				//$where .= " OR group_registed LIKE '%$query%'";
				//$where .= " OR group_date_delete LIKE '%$query%'";
			}
			else if($query=="")
				{
					$where ="";
					}
				}
			$start = (($page-1) * $rp);
			$limit = "LIMIT $start, $rp";
			$query = "SELECT group_id,group_name,case group_status when 0 then 'Active' when 1 then 'Hidden' end as status,group_registed,group_date_delete,group_status,group_maintanance FROM db_group $where $sort $limit"; 
		$sth=$this->db->select($query,array());
		
		$rquery = "SELECT * FROM db_group $where";
		$row = $this->db->counter($rquery,array());
		$data = array("group",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		
		return $data;
		}
		
		function select($id){
		$query ="SELECT group_id,group_name,group_maintanance FROM db_group WHERE group_id=:ID LIMIT 1";
		$sth=$this->db->select($query,array(':ID'=>$id));
		
		$data = array("group",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
		
		
		function addnew(){
			
			$data = array("group",0,10,"",1,10,0,0);
			return $data;
		}
		
		function create($data){
			$insert=$this->db->insert("db_group",array("group_name"=>$data["name"]
														,"group_maintanance"=>$data["main"]
														,"group_status"=>0
														,"group_registed"=>date('y-m-d G.i:s')));
										if($insert==true)
											header('location:'.URL.'group');
										else 
											echo "Insert not successed";
		}
		
		function update($data,$id){
		$where = "group_id=$id";
		$upStatus = 0;   // Deleted
		$upDate   = date('y-m-d G.i:s');
		$update=$this->db->update('db_group',array('group_name'=>$data['name']
												  ,'group_maintanance'=>$data['main']
												  ,'group_status'=>$upStatus
												  ,'group_date_delete'=>NULL),$where);
										if($update==true)
											header('location:'.URL.'group');
										else 
											echo "Update not successed";
		}
		
		function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "group_id=$id";
		$update    = $this->db->update('db_group',array('group_status'=>$delStatus,'group_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'group');
													
	}
	}
?>