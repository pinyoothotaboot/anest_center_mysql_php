<?php

class Equipment extends Controller{
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
		$this->model = new Equipment_Model();
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('equipment-content-table.css');
		$this->view->render('equipment/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Equipment_Model();
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
		$this->view->css =array('equipment-content-table.css');
		$this->view->render('equipment/index');
	}
	function details(){
			//$this->view->render('index/index');
	}
	function addnew(){
		$this->model = new Equipment_Model();
		$this->view->selectdatatable = $this->model->addnew();
		
		$this->view->css =array('equipment-content.css');
		$this->view->js =array('jquery.js','equipment-add.js');
		$this->view->render('equipment/add');
	}
	function create(){
		$this->model   = new Equipment_Model();
		$data   = array();
		$sap 	= array();
		$sn 	 = array();
		$room   = array();
		$tel    = array();
		$status = array();		

		$data['code']       = $this->model->secure($_POST['code']);
		$data['name']       = $this->model->secure($_POST['name']);
		$data['brand']      = $this->model->secure($_POST['brand']);
		$data['model']      = $this->model->secure($_POST['model']);
		$data['group']      = $this->model->secure($_POST['group']);
		$data['budget']     = $this->model->secure($_POST['budget']);
		$data['insdate']    = $this->model->secure($_POST['begin-date']);
		$data['expdate']    = $this->model->secure($_POST['end-date']);
		$data['company']    = $this->model->secure($_POST['comp']);
		$data['comtel']     = $this->model->secure($_POST['comp-tel']);
		$data['comfax']     = $this->model->secure($_POST['comp-fax']);
		$data['sales']      = $this->model->secure($_POST['comp-sale']);
		$data['salestel']   = $this->model->secure($_POST['comp-sale-tel']);
		$data['price']      = $this->model->secure($_POST['comp-price']);

		$sap        = (($_POST['sap']));
		$sn         = (($_POST['sn']));
		$room       = (($_POST['address']));
		$tel        = (($_POST['tel']));
		$status     = (($_POST['status']));
		
		$img = $_FILES['file'];
		$count=0;	
		foreach($sap as $num){  $count++;}
		//for($i=0;$i<$sn[$i];$i++) $count++;
		
		$packet = array($data,$sap,$sn,$room,$tel,$status,$count);
		$this->model->create($packet,$img);
	}
	function edit($id){
		
		if($id != null){
			$this->model = new Equipment_Model();
			$this->view->selectdatatable = $this->model->select($id);
			$this->view->css =array('edit-equipment-content.css');
			//$this->view->js =array('jquery.js','equipment-add.js');
			$this->view->render('equipment/edit');
		}
		else
			header('location:'.URL.'equipment');
	}
	
	function update($id){
		$this->model   = new Equipment_Model();
		$data   = array();

		$data['code']       = $this->model->secure($_POST['code']);
		$data['name']       = $this->model->secure($_POST['name']);
		$data['brand']      = $this->model->secure($_POST['brand']);
		$data['model']      = $this->model->secure($_POST['model']);
		$data['group']      = $this->model->secure($_POST['group']);
		$data['budget']     = $this->model->secure($_POST['budget']);
		$data['insdate']    = $this->model->secure($_POST['begin-date']);
		$data['expdate']    = $this->model->secure($_POST['end-date']);
		$data['company']    = $this->model->secure($_POST['comp']);
		$data['comtel']     = $this->model->secure($_POST['comp-tel']);
		$data['comfax']     = $this->model->secure($_POST['comp-fax']);
		$data['sales']      = $this->model->secure($_POST['comp-sale']);
		$data['salestel']   = $this->model->secure($_POST['comp-sale-tel']);
		$data['price']      = $this->model->secure($_POST['comp-price']);

		$data['sap']        = $this->model->secure(($_POST['sap']));
		$data['sn']         = $this->model->secure(($_POST['sn']));
		$data['address']       = $this->model->secure(($_POST['address']));
		$data['tel']        = $this->model->secure(($_POST['tel']));
		$data['status']     = $this->model->secure(($_POST['status']));
		$img = $_FILES['file'];
			
		$this->model->update($data,$img,$id);
	}
	
	function delete($id){
		$this->model = new Equipment_Model();
		$this->model->delete($id);
	
	}
}
?>