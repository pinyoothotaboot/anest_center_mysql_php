<?php

class Switchingdetail extends Controller{
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
		$this->model = new Switchingdetail_Model();
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('switchingdetail-content-table.css');
		$this->view->render('switchingdetail/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Switchingdetail_Model();
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
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('switchingdetail-content-table.css');
		$this->view->render('switchingdetail/index');
	}
	
}
?>