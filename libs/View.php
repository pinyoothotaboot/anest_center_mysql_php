<?php
class View{
	
	public function __construct(){
		//echo "This is the view";
	}
	
	/**
	 * render
	 * @param string $name A name of file to view
	 * @param boolean $noInclude A name of checking file include
	 * @return none
	*/
	public function render($name,$noInclude=false){
		if($noInclude==true){
			require "views/$name.php";
		}
		else{
				
					require "views/header.php";
					require "views/$name.php";
					require "views/footer.php";
		}
	}
	
}
?>