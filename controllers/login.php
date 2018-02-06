<?php

class Login extends Controller{
	function __construct(){
		parent::__construct();
		
	}
	function index(){
			$data = array("hide",0,10,"",1,10,0,0);
			$this->model = new Login_Model();
			$this->view->selectdatatable = $data;
			$this->view->css =array('login-content.css');
			$this->view->js = array('jquery.js','login.js');
			$this->view->render('login/index');
	}
	
	function run(){
		$data = array();
		$this->model = new Login_Model();
		
		$data['user'] = $this->model->secure($_POST['user']);
		$data['pass'] = $this->model->secure($_POST['pass']);
		$this->model->run($data);
	}
	
	function logout(){
		Session::init();
		$logedin = Session::get('logedIn');
		if($logedin==true){
			Session::destroy();
			header('location: ../login');
			exit;
		}
	}
}

?>