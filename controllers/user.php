<?php

class User extends Controller{
	function __construct(){
		parent::__construct();
		
	}
	function index(){
			$data = array();
			$data['sort'] = 0;
			$data['list'] = 'id';
			$data['find'] = "";
			$data['row'] = 10;
			$data['page'] = 1;
			$_count=0;
			$this->model = new User_Model();
			$this->view->selectdatatable = $this->model->selectdatatable($data);
			$this->view->css =array('user-content-table.css');
			$this->view->render('user/index');
	}
	
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new User_Model();
		if(isset($_POST['page']) || isset($_POST['sort']) ||  
		   isset($_POST['list']) || isset($_POST['row']) ||isset($_POST['btn'])
		  ){
			$data['row']  = $this->model->secure($_POST['row']);
			$data['page'] = $this->model->secure($_POST['page']);
			$data['list'] = $this->model->secure($_POST['list']);
			$data['sort'] = $this->model->secure($_POST['sort']);
			$data['find'] = $this->model->secure($_POST['s']);
			
			$_count++;
		}
		else{
			if($_count ==0){
				$data['row'] = 10;
				$data['page'] = 1;
				$data['sort'] = 0;
				$data['list'] = 'id';
				$data['find'] = "";
				//$data['key'] = "id";
			}
		}
		
		 //print_r(rtrim($data['find'],','));
		
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('user-content-table.css');
		$this->view->render('user/index');
	}
	function addnew(){
			$this->model = new User_Model();
			$this->view->selectdatatable = $this->model->addnew();
			$this->view->css =array('user-content.css');
			$this->view->js =array('jquery.js','user-add.js');

			$this->view->render('user/add');
	}
	function create(){
		$data = array();
		$this->model   = new User_Model();
		
		
		$data['user']          =  $this->model->secure($_POST['user']);
		$data['name']      	  =  $this->model->secure($_POST['name']); 
		$data['lastname']      =  $this->model->secure($_POST['lastname']); 
		$data['position']      =  $this->model->secure($_POST['position']); 
		$data['tel']           =  $this->model->secure($_POST['tel']); 
		$data['email']         =  $this->model->secure($_POST['email']); 
		$data['gender']        =  $this->model->secure($_POST['gender']); 
		$data['pass']          =  Hash::create('md5', $this->model->secure($_POST['pass']),HASH_PASSWORD_KEY); 
		$data['account']       =  $this->model->secure($_POST['account']); 
		$img =  $_FILES['pic'];
		$this->model->create($data,$img);
	}
	
	function edit($id){
		
		if($id != null){
			$this->model = new User_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('edit-user-content.css');
			$this->view->js =array('jquery.js','user-add.js');
			$this->view->render('user/edit');
		}
		else
			header('location:'.URL.'user');
	}
	
	
	
	function update($id){
		$data = array();
		$this->model = new User_Model();
		$data['user']          =  $this->model->secure($_POST['user']);
		$data['name']      	  =  $this->model->secure($_POST['name']); 
		$data['lastname']      =  $this->model->secure($_POST['lastname']); 
		$data['position']      =  $this->model->secure($_POST['position']); 
		$data['tel']           =  $this->model->secure($_POST['tel']); 
		$data['email']         =  $this->model->secure($_POST['email']); 
		$data['gender']        =  $this->model->secure($_POST['gender']); 
		$data['pass']          =  Hash::create('md5', $this->model->secure($_POST['pass']),HASH_PASSWORD_KEY); 
		$data['account']       =  $this->model->secure($_POST['account']); 
		$data['link']          =  $this->model->secure($_POST['linkpic']); 
		$img =  $_FILES['pic'];
		
		$this->model->update($data,$id,$img);
	}
	
	function delete($id){
		$this->model = new User_Model();
		$this->model->delete($id);
	
	}
}

?>