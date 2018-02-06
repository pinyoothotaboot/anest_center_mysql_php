<?php

class Borrowedback extends Controller{
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
		$this->model = new Borrowedback_Model();
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('borrowed-content-table.css');
		$this->view->render('borrowedback/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Borrowedback_Model();
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
		$this->view->render('borrowedback/index');
	}
	function borrowback($id){
			$this->model = new Borrowedback_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('borrowedback-content.css');
			//$this->view->js =array('jquery.js','group-add.js');
			$this->view->render('borrowedback/borrowback');
	}
	function create($id){
		$data = array();
		$this->model   = new Borrowedback_Model();
		$data['date']        =  $this->model->secure($_POST['date']);
		$data['time']      	=  $this->model->secure($_POST['tim']); 
		$data['tech']        =  $this->model->secure($_POST['tech']); 
		$data['user']        =  $this->model->secure($_POST['user']);
		$d=$id;
		$this->model->create($data,$d);
	}
	
	
}
?>