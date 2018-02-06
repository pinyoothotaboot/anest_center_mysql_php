<?php

class Bootstrap{

	public function __construct(){
		$url =isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
		/*
			Check URL path is empty then go to index.php
			- return @false
		 */
			if(empty($url[0])){
				require "controllers/index.php";
				require "models/index_model.php";
				
				$ctl = new Index();
				
				$ctl->index();
				
				return false;
			}
	/*
			Check if URL not empty then go to filename.php 
			and check if filename not in folder then go to error.php
			- return @false
	 */		
	
		$file ="controllers/$url[0].php";
			if(file_exists($file)){
				require $file;
			}
			else{
				require "controllers/error.php";
				$ctl = new Error();
				$ctl->index();
				return false;
			}
			
		$ctl = new $url[0];
		$ctl->loadModel($url[0]);
	// Calling method
			if(isset($url[2])){
				if(method_exists($ctl,$url[1])){
					$ctl->{$url[1]}($url[2]);
				}
				else{
					$this->error();
				}
		
			}
			else{
				if(isset($url[1])){
					if(method_exists($ctl,$url[1])){
						$ctl->{$url[1]}();
					}
					else{
						$this->error();
					}
			
				}
				else{
					$ctl->index();
				}
			}
	
}
	
	public function error(){
		require "controllers/error.php";
		$ctl = new Error();
		$ctl->index();
		return false;
	}
}

?>