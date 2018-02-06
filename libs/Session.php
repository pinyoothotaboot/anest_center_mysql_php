<?php
class Session{
	
	/**
	 * init
	 * The function initial Session 
	 * @return none
	*/
	public static function init(){
		@session_start();
	}
	
	/**
	 * set
	 * @param String $key A name of KEY to setting
	 * @param String $value A name of value to setting to session
	 * @return none
	*/
	public static function set($key,$value){
		$_SESSION[$key]=$value;
	}
	
	/**
	 * get
	 * @param String $key A name of KEY to reding from session
	 * @return value $Session($key)
	 */
	public static function get($key){
		if(isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	/**
	 * destroy
	 * The function delete session
	 * @return none
	*/
	public static function destroy(){
		@session_destroy();
	}
}


?>