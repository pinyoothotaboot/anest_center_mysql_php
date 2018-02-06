<?php
	require "config/paths.php";
	require "config/database.php";
	require "config/param.php";
	
	function __autoload($class){
		require LIBS.$class.".php";
	}
	
	require "config/secure.php";
	
	$app = new Bootstrap();
	
?>