<?php

class Equipmentreport extends Controller{
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
		$this->model = new Equipmentreport_Model();
		$this->view->selectdatatable = $this->model->selectdatatable($data);
		$this->view->css =array('equipmentreport-content-table.css');
		$this->view->render('equipmentreport/index');
	}
	function select(){
		$data = array();
		$kkk = array();
		$_count=0;
		$this->model = new Equipmentreport_Model();
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
		$this->view->css =array('equipmentreport-content-table.css');
		$this->view->render('equipmentreport/index');
	}
	
	 function exportExcel(){
		
			$this->model = new Equipmentreport_Model();
			$this->view->xls = $this->model->selectAll();
			
			$filename = "Report_Equipment_".date('d-m-Y');
			
			ExportXLS::xlsInit($filename);

			ExportXLS::xlsBOF();
				
				ExportXLS::xlsWriteLabel(0,0,"SAP");
				ExportXLS::xlsWriteLabel(0,1,"S/N");
				ExportXLS::xlsWriteLabel(0,2,"NAME");
				ExportXLS::xlsWriteLabel(0,3,"GROUP");
				ExportXLS::xlsWriteLabel(0,4,"ADDRESS");
				ExportXLS::xlsWriteLabel(0,5,"STATUS");
				ExportXLS::xlsWriteLabel(0,6,"AGE");
				ExportXLS::xlsWriteLabel(0,7,"REPAIRED");
				
				$xlsRow = 1;

					foreach($this->view->xls[8] as $key => $value){
						
						ExportXLS::xlsWriteLabel($xlsRow,0,$value['equipment_list_sap']);
						ExportXLS::xlsWriteLabel($xlsRow,1,$value['equipment_list_sn']);
						ExportXLS::xlsWriteLabel($xlsRow,2,$value['equipment_gen_name']);
						ExportXLS::xlsWriteLabel($xlsRow,3,$value['group_name']);
						ExportXLS::xlsWriteLabel($xlsRow,4,$value['address_name']);
						ExportXLS::xlsWriteLabel($xlsRow,5,$value['status_name']);
						ExportXLS::xlsWriteLabel($xlsRow,6,$value['DiffDate']);
						ExportXLS::xlsWriteLabel($xlsRow,7,$value['rows']);
						$xlsRow++;			
					}
					
					
			ExportXLS::xlsEOF();
			exit();
			header('location:'.URL.'equipmentreport');
		}
		
		function exportPDF(){
			

			$pdf=new FPDF();

			$pdf->AddPage();

			$pdf->SetFont('Times','B',16);

			$pdf->Cell(0,10,'Welcome to www.ThaiCreate.Com',0,1);

			$pdf->Cell(0,20,'Version 2009',0,1,"C");

			$pdf->Output("MyPDF.pdf","F");
		}
		
}
?>