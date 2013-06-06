<?php 

class Excel_export extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_export_model');
		$this->load->library('amenu');
	}

	function get_excell()
	{
	
		$amenu = new Amenu;
		$data['menu'] = $amenu->show_menu();

		$data['title'] = 'Excel_export';
		$data['enrollments'] = $this->excel_export_model->getExcelItems();
		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/excel/excelparser',$data);
		$this->load->view('templates/backend/footer');
	}

	function to_excell()
	{	
		$data['enrollments'] = $this->excel_export_model->toExcell();
		$this->load->view('admin/excel/excel_view',$data);
		
	}
}