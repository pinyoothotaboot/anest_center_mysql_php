<?php 
	class Status_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		function selectdatatable($data){
				
			$sortData= array('id'=>'status_id','name'=>'status_name','sta'=>'status_status','date'=>'status_registed');
			$about = array('ASC','DESC');
			$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
			$rp   =(int)$data['row'];
			$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
			$where = "";
			$query = $data['find'];
			if($data['find']=="Active") $where ="WHERE status_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE status_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE status_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE status_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE status_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE status_status LIKE '%1%'";
				else
				{
			if ($query and $query !="" ) {
				$where = "WHERE ";
				$where .= "status_id LIKE '%$query%'";
				$where .= " OR status_name LIKE '%$query%'";
				$where .= " OR status_status LIKE '%$query%'";
				//$where .= " OR status_registed LIKE '%$query%'";
				//$where .= " OR status_date_delete LIKE '%$query%'";
			}
			else if($query=="")
				{
					$where ="";
					}
				}
			$start = (($page-1) * $rp);
			$limit = "LIMIT $start, $rp";
			$query = "SELECT status_id,status_name,case status_status when 0 then 'Active' when 1 then 'Hidden' end as status,status_registed,status_date_delete,status_status FROM db_status $where $sort $limit"; 
		$sth=$this->db->select($query,array());
		
		$rquery = "SELECT * FROM db_status $where";
		$row = $this->db->counter($rquery,array());
		$data = array("status",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		
		return $data;
		}
		
		function select($id){
		$query ="SELECT status_id,status_name FROM db_status WHERE status_id=:ID LIMIT 1";
		$sth=$this->db->select($query,array(':ID'=>$id));
		
		$data = array("status",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
		
		
		function addnew(){
			
			$data = array("status",0,10,"",1,10,0,0);
			return $data;
		}
		
		function create($data){
			$insert=$this->db->insert("db_status",array("status_name"=>$data["name"]
														,"status_status"=>0
														,"status_registed"=>date('y-m-d G.i:s')));
										if($insert==true)
											header('location:'.URL.'status');
										else 
											echo "Insert not successed";
		}
		
		function update($data,$id){
		$where = "status_id=$id";
		$upStatus = 0;   // Deleted
		$upDate   = date('y-m-d G.i:s');
		$update=$this->db->update('db_status',array('status_name'=>$data['name'],'status_status'=>$upStatus,'status_date_delete'=>NULL),$where);
										if($update==true)
											header('location:'.URL.'status');
										else 
											echo "Update not successed";
		}
		
		function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "status_id=$id";
		$update    = $this->db->update('db_status',array('status_status'=>$delStatus,'status_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'status');
													
	}
	}
?>