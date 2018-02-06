<?php

class Position extends Controller{
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
			$this->model = new Position_Model();
			$this->view->selectdatatable = $this->model->selectdatatable($data);
			$this->view->css =array('position-content-table.css');
			$this->view->render('position/index');
	}
	
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Position_Model();
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
		$this->view->css =array('position-content-table.css');
		$this->view->render('position/index');
	}
	
	function addnew(){
			$this->model = new Position_Model();
			$this->view->selectdatatable = $this->model->addnew();
			$this->view->css =array('position-content.css');
			$this->view->render('position/add');
	}
	
	function create(){
		$data = array();
		$this->model   = new Position_Model();
		$data['name']  = $this->model->secure($_POST['position-input']);
		$this->model->create($data);
	}
	
	function edit($id){
		
		if($id != null){
			$this->model = new Position_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('position-content.css');
			$this->view->render('position/edit');
		}
		else
			header('location:'.URL.'position');
	}
	
	function update($id){
		$data = array();
		$this->model = new Position_Model();
		$data['name']  = $this->model->secure($_POST['position-input']);
		
		$this->model->update($data,$id);
	}
	
	function delete($id){
		$this->model = new Position_Model();
		$this->model->delete($id);
	
	}
}

?>