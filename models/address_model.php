<?php 
	class Address_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		
		function selectdatatable($data){
				
			$sortData= array('id'=>'address_id','name'=>'address_name','sta'=>'address_status','date'=>'address_registed');
			$about = array('ASC','DESC');
			$sort = "ORDER BY ".$sortData[$data['list']]." ".$about[$data['sort']];
			$rp   =(int)$data['row'];
			$page =(int)$data['page'];
			if(!$data['page']) $data['page']=1;
			if(!$data['row']) $data['row']=10;
			$where = "";
			$query = $data['find'];
			 //$query="สยามินทร์ชั้น4";
			//$x=$data['find'];
			
			if($data['find']=="Active") $where ="WHERE address_status LIKE '%0%'";
				else if($data['find'] == "active") $where ="WHERE address_status LIKE '%0%'";
				else if($data['find'] == "ACTIVE") $where ="WHERE address_status LIKE '%0%'";
				else if($data['find'] == "Hidden") $where ="WHERE address_status LIKE '%1%'";
				else if($data['find'] == "hidden") $where ="WHERE address_status LIKE '%1%'";
				else if($data['find'] == "HIDDEN") $where ="WHERE address_status LIKE '%1%'";
				else
				
				{
			if ( $query !="" ) {
				$where = "WHERE ";
				$where .= "address_id LIKE '%$query%'";
				$where .= " OR address_name LIKE '%$query%'";
				$where .= " OR address_status LIKE '%$query%'";
				//$where .= " OR address_registed LIKE '%$query%'";
				//$where .= " OR address_date_delete LIKE '%$query%'";
				
			}
			else if($query=="")
				{
					$where ="";
					}
				}
			$start = (($page-1) * $rp);
			$limit = "LIMIT $start, $rp";
			$query = "SELECT address_id,address_name,case address_status when 0 then 'Active' when 1 then 'Hidden' end as status,address_registed,address_date_delete,address_status FROM db_address $where $sort $limit"; 
			
			//echo $query;
		$sth=$this->db->select($query,array());
		
		$rquery = "SELECT * FROM db_address $where";
		$row = $this->db->counter($rquery,array());
		$data = array("address",$sth,$row,$data['sort'],$data['page'],$data['row'],$data['sort'],$data['list'],$data['find']);
		
		return $data;
		}
		
		function select($id){
		$query ="SELECT address_id,address_name FROM db_address WHERE address_id=:ID LIMIT 1";
		$sth=$this->db->select($query,array(':ID'=>$id));
		
		$data = array("address",0,10,"",1,10,0,0,$sth);
		
		return $data;
		}
		
		
		function addnew(){
			
			$data = array("address",0,10,"",1,10,0,0);
			return $data;
		}
		
		function create($data){
			$insert=$this->db->insert("db_address",array("address_name"=>$data["name"]
														,"address_status"=>0
														,"address_registed"=>date('y-m-d G.i:s')));
										if($insert==true)
											header('location:'.URL.'address');
										else 
											echo "Insert not successed";
		}
		
		function update($data,$id){
		$where = "address_id=$id";
		$upStatus = 0;   // Deleted
		$upDate   = date('y-m-d G.i:s');
		$update=$this->db->update('db_address',array('address_name'=>$data['name'],'address_status'=>$upStatus,'address_date_delete'=>NULL),$where);
										if($update==true)
											header('location:'.URL.'address');
										else 
											echo "Update not successed";
		}
		
		function delete($id){
		//Session::init();
		$delStatus = 1;   // Deleted
		$delDate   = date('y-m-d G.i:s');
		//$delID     = Session::get('id');
		$where     = "address_id=$id";
		$update    = $this->db->update('db_address',array('address_status'=>$delStatus,'address_date_delete'=>$delDate),$where);
										if($update==true)
											header('location:'.URL.'address');
													
	}
		
		
	}
?>