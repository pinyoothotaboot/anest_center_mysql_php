<?php
class Loged{
		/**
	 		* Handle
	 		* function type static for secure login 
			* This function use are
			*	- Admin
			*	- Customer
			*	- Visitor
	 		* @return none
		*/
		public static function Handle(){
			Session::init();
				$loged=Session::get('logedIn');
				if($loged == false){
					Session::destroy();
					header('location:'.URL."login");
					exit;
				}
		}
		
		
		/**
	 		* Handle_Admin_Customer
	 		* function type static for secure login 
			* This function use are
			*	- Admin
			*	- Customer
	 		* @return none
		*/
		public static function Handle_Admin_Customer(){
			Session::init();
			
			$loged=Session::get('logedIn');
			
				if($loged == false){
					Session::destroy();
					header('location:'.URL."login");
					exit;
				}
				else {
					$status = Session::get('account');
						
						if($status==2){
							Session::destroy();
							header('location:'.URL."login");
							exit;
						}
				}
		}
		
		/**
	 		* Handle_Admin
	 		* function type static for secure login 
			* This function use is
			*	- Admin
	 		* @return none
		*/
		public static function Handle_Admin(){
			Session::init();
			
			$loged=Session::get('logedIn');
			
				if($loged == false){
					Session::destroy();
					header('location:'.URL."login");
					exit;
				}
				else {
					$status = Session::get('account');
						
						if($status!=0){
							Session::destroy();
							header('location:'.URL."login");
							exit;
						}
				}
		}
}
?>