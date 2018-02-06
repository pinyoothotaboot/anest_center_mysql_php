<?php
class Index_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function selectdatatable(){
		
		 $query  = "SELECT COUNT(*) AS rows FROM db_equipment_list ";
		 $query .= "WHERE equipment_list_status=0 AND equipment_list_status_link=1";
		 $e1=$this->db->select($query,array());
		 
		 $query  = "SELECT COUNT(*) AS rows FROM db_equipment_list ";
		 $query .= "WHERE equipment_list_status=0";
		 $e2=$this->db->select($query,array());
		 
		 $query  = "SELECT COUNT(*) AS rows FROM db_repair ";
		 $query .= "WHERE repair_status=0 AND repair_check=0";
		 $repair=$this->db->select($query,array());
		 
		 $query  = "SELECT COUNT(*) AS rows FROM db_inventory ";
		 $query .= "WHERE inventory_status=0";
		 $inventory=$this->db->select($query,array());
		 
		 $date = date('y-m-d G.i:s');
		 $query = "SELECT COUNT(*) AS rows FROM `db_borroweback` WHERE DAY(borroweback_date_borrowe)=DAY('$date')";
		 $borrowToday=$this->db->select($query,array());
		 
		 $query = "SELECT COUNT(*) AS rows FROM `db_borroweback`";
		 $borrowAll=$this->db->select($query,array());
		 
		 
		 $today  = date('d');
		 $day    = date('l');
		 $month  = date('M');
		 //date_default_timezone_set("Thailand/Bangkok");
		 $time =   date('G')+5;
		 $clock =  date('A');
		
		$data = array("index",0,10,"",1,10,0,0,$e1,$e2,$repair,$inventory,$today,$month,$day,$time.":".date('i'),$clock,$borrowToday,$borrowAll);
		
		return $data;
	}

	
}
?>