<?php

class Index extends Controller{
	function __construct(){
		parent::__construct();
		
		$this->view->css =array('index-content.css');
		
	}
	function index(){
			//$data = array("hide",0,10,"",1,10,0,0);
			$this->model = new Index_Model();
			$this->view->selectdatatable =$this->model->selectdatatable();;
			$this->view->render('index/index');
	}
	function details(){
			$this->view->render('index/index');
	}
}

?>