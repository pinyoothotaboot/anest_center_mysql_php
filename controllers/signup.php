<?php

class Signup extends Controller{
	function __construct(){
		parent::__construct();
	
	}
	function index(){
		$data = array("hide",0,10,"",1,10,0,0);
			$this->model = new Signup_Model();
			$this->view->selectdatatable = $data;
			$this->view->css =array('signup-content.css');
			$this->view->js =array('jquery.js','signup-add.js');
			$this->view->render('signup/index');
	}
	
	function create(){
		$data = array();
		$this->model = new Signup_Model();
		$data['user']          =  $this->model->secure($_POST['user']);
		$data['name']      	  =  $this->model->secure($_POST['name']); 
		$data['lastname']      =  $this->model->secure($_POST['lastname']); 
		$data['email']         =  $this->model->secure($_POST['email']); 
		$data['pass']          =  Hash::create('md5', $this->model->secure($_POST['pass']),HASH_PASSWORD_KEY); 
		$this->model->create($data);
	}
}

?>