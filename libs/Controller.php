<?php
class Controller{
	
	public function __construct(){
		$this->view = new View();
	}
	
	/**
	 * loadModel
	 * @param String $name A name is filename to loading
	 * @return none
	*/
	public function loadModel($name){
		$path =require 'models/'.$name.'_model.php';
		if(file_exists($path)){
			require 'models/'.$name.'_model.php';
			$modelName = $name.'_Model';
			$this->model = new $modelName();
		}
	}
}
?>