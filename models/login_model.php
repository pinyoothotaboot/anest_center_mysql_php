<?php 
	class Login_Model extends Model{
		function __construct() {
			parent::__construct();	
		}
		
		function run($data){
			if(Hash::create('md5',$data['user'],HASH_PASSWORD_KEY) == USERNAME  
			&& Hash::create('md5',$data['pass'],HASH_PASSWORD_KEY) == PASSWORD){
				Session::init();
				Session::set('logedIn',true);
				Session::set('user','Administrator');
				Session::set('name','pinyoo');
				Session::set('lname','thotaboot');
				Session::set('account','0');
				Session::set('pic','no-pic.jpg');
				Session::set('id','0');
				header('location: ../index');
			}
			else{
			$pass  = Hash::create('md5',$data['pass'],HASH_PASSWORD_KEY);
			
			$query  = "SELECT user_id,user_name,user_lastname,user_login,user_account,user_id_link_pic";
			$query .= " FROM db_user WHERE user_login = :user AND user_pass = :pass";
			$query .= " AND user_status=0 LIMIT 1";
			
			$login = $this->db->select($query,array(':user'=>$data['user'],':pass'=>$pass));
			
			if($login != null){
					if($login[0]['user_id_link_pic'] == null)
						$pic = 'no-pic.jpg';
					else{
						$query  = "SELECT user_pic_name FROM db_user_pic WHERE user_pic_id=:PID LIMIT 1";
						$loadpic =$this->db->select($query,array(':PID'=>$login[0]['user_id_link_pic']));
						$pic = $loadpic[0]['user_pic_name'];
					}
						
				//print_r($login);
				Session::init();
				Session::set('logedIn',true);
				Session::set('user',$login[0]['user_login']);
				Session::set('name',$login[0]['user_name']);
				Session::set('lname',$login[0]['user_lastname']);
				Session::set('account',$login[0]['user_account']);
				Session::set('pic',$pic);
				Session::set('id',$login[0]['user_id']);
				header('location: ../index');
			}
			else
				echo "oh no!!";
			}
		}
	}
?>