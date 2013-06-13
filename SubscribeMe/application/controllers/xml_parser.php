<?php
class Xml_parser extends AD_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('file'); // Load helper(s)

		$this->load->library('amenu'); // Load library(s)
	}

	// This function loads the xml file and parses it into the database and a succes page will be loaded
	function index()
	{
		$data = get_filenames("uploads");
		$file['file'] = end($data);

		$amenu = new Amenu;
		
		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'XML';

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/upload/upload_success', $file);
		$this->load->view('templates/backend/footer');		
		
		$this->load->model('xmlparser_model');
		$this->xmlparser_model->insert();
	}
}	