<?php 
	class Signup_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		
		function check($data){
			$query = "SELECT * FROM db_user WHERE user_login = :login LIMIT 1";
			$user = $this->db->counter($query,array(':login'=>$data));
			return (int)$user;
		}
		
		function create($data){
			
			$ck = $this->check($data['user']);
			if($ck <1){
				
				$insert = $this->db->insert("db_user",array('user_name'=>$data['name']
														   ,'user_lastname'=>$data['lastname']
														   ,'user_login'=>$data['user']
														   ,'user_pass'=>$data['pass']
														   ,'user_email'=>$data['email']
														   ,'user_account'=>2
														   ,'user_registed'=>date('y-m-d G.i:s')
														   ,'user_status'=>0
														   ));
					if($insert==true)
							header('location:'.URL.'login');
					else
							echo "Insert not successed!!";
				
			}
			else
				echo "Username > 1 !!";
		}
	}
?>