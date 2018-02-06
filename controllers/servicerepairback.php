<?php

class Servicerepairback extends Controller{
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
			$this->model = new Servicerepairback_Model();
			$this->view->selectdatatable = $this->model->selectdatatable($data);
			$this->view->css =array('service-content-table.css');
			$this->view->render('servicerepairback/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Servicerepairback_Model();
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
		$this->view->css =array('service-content-table.css');
		$this->view->render('servicerepairback/index');
	}
	
	function back($id){
			$this->model = new Servicerepairback_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('servicerepairback-content.css');
			//$this->view->js =array('jquery.js','group-add.js');
			$this->view->render('servicerepairback/back');
	}
	
	function create($id){
		$data = array();
		$this->model   = new Servicerepairback_Model();
		$data['date']  = $this->model->secure($_POST['date']);
		$data['tech']  = $this->model->secure($_POST['tech']);
		$data['detail']  = $this->model->secure($_POST['detail']);
		$data['cost']  = $this->model->secure($_POST['cost']);
		$data['id']  = $this->model->secure($_POST['id']);
		$this->model->create($data,$id);
	}
	
}

?>