<?php 
	ob_start();

		Session::init();
		
?>
<!doctype html>
<html>
<head>

<title>Anesthesia Equipment System</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/side-menu.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/bar-menu.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/css/jquery.multiselect.filter.css" />

<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/assets/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>publics/assets/prettify.css" />

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo URL;?>publics/src/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo URL;?>publics/src/jquery.multiselect.filter.js"></script>
<script type="text/javascript" src="<?php echo URL;?>publics/assets/prettify.js"></script>


<?php
	if(isset($this->css)){
		foreach($this->css as $css){
			echo '<link rel="stylesheet" href="'.URL.'publics/css/'.$css.'" />';
			//echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"><///script>';
		}
	}
	
	if(isset($this->js)){
		foreach($this->js as $js){
			
			echo '<script type="text/javascript" src="'.URL.'publics/js/'.$js.'"></script>';
		}
	}
?>


</head>

<body>



 
 
 
 
 
