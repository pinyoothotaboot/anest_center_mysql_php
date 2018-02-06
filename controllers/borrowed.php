<?php

class Borrowed extends Controller{
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
		$this->model = new Borrowed_Model();
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('borrowed-content-table.css');
		$this->view->render('borrowed/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Borrowed_Model();
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
		$this->view->css =array('borrowed-content-table.css');
		$this->view->render('borrowed/index');
	}
	function borrow($id){
			$this->model = new Borrowed_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('borrowed-content.css');
			//$this->view->js =array('jquery.js','group-add.js');
			$this->view->render('borrowed/borrow');
	}
	function create($id){
		$data = array();
		$this->model   = new Borrowed_Model();
		$data['date']        =  $this->model->secure($_POST['date']);
		$data['time']      	=  $this->model->secure($_POST['tim']); 
		$data['tech']        =  $this->model->secure($_POST['tech']); 
		$data['user']        =  $this->model->secure($_POST['user']);
		$data['room']        =  $this->model->secure($_POST['room']);
		$data['note']        =  $this->model->secure($_POST['note']);
		$d=$id;
		$this->model->create($data,$d);
	}
	
	
}
?>