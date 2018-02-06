<?php
class Model{
	
	public function __construct(){
		$this->db = new Database(DB_TYPE,DB_HOST,DB_NAME,DB_LANG,DB_USER,DB_PASS);
	}
	
	
	public function secure($str){
		if(get_magic_quotes_gpc())
			{
				$str=stripslashes(trim($str));
			}
		return  mysql_real_escape_string( trim($str )) ;
	}
}
?>