<?php 
	class Position_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		function selectdatatable($data){
				
			$sortData= array('id'=>'position_id','name'=>'position_name','sta'=>'position_status','date'=>'position_registed');
			$about = array('ASC','DESC');
			$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
			$rp   =(int)$data['row'];
			$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
			$where = "";
			$query = $data['find'];
			if($data['find']=="Active") $where ="WHERE position_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE position_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE position_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE position_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE position_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE position_status LIKE '%1%'";
				else
				{
			if ($query and $query !="" ) {
				$where = "WHERE ";
				$where .= "position_id LIKE '%$query%'";
				$where .= " OR position_name LIKE '%$query%'";
				$where .= " OR position_status LIKE '%$query%'";
				//$where .= " OR position_registed LIKE '%$query%'";
				//$where .= " OR position_date_delete LIKE '%$query%'";
			}
			else if($query=="")
				{
					$where ="";
					}
				}
			$start = (($page-1) * $rp);
			$limit = "LIMIT $start, $rp";
			$query = "SELECT position_id,position_name,case position_status when 0 then 'Active' when 1 then 'Hidden' end as status,position_registed,position_date_delete,position_status FROM db_position $where $sort $limit"; 
		$sth=$this->db->select($query,array());
		
		$rquery = "SELECT * FROM db_position $where";
		$row = $this->db->counter($rquery,array());
		$data = array("position",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		
		return $data;
		}
		
		function select($id){
		$query ="SELECT position_id,position_name FROM db_position WHERE position_id=:ID LIMIT 1";
		$sth=$this->db->select($query,array(':ID'=>$id));
		
		$data = array("position",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
		
		
		function addnew(){
			
			$data = array("position",0,10,"",1,10,0,0);
			return $data;
		}
		
		function create($data){
			$insert=$this->db->insert("db_position",array("position_name"=>$data["name"]
														,"position_status"=>0
														,"position_registed"=>date('y-m-d G.i:s')));
										if($insert==true)
											header('location:'.URL.'position');
										else 
											echo "Insert not successed";
		}
		
		function update($data,$id){
		$where = "position_id=$id";
		$upStatus = 0;   // Deleted
		$upDate   = date('y-m-d G.i:s');
		$update=$this->db->update('db_position',array('position_name'=>$data['name'],'position_status'=>$upStatus,'position_date_delete'=>NULL),$where);
										if($update==true)
											header('location:'.URL.'position');
										else 
											echo "Update not successed";
		}
		
		function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "position_id=$id";
		$update    = $this->db->update('db_position',array('position_status'=>$delStatus,'position_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'position');
													
	}
	}
?>