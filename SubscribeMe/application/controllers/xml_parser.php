<?php

//class for xml parser just a test for now 
class Xml_parser extends CI_Controller{

//this function loads the xml file and parses it into the $data which will be sent to the views
	function index()
	{

	
		$data['title'] = 'xml_parser';

		$this->load->model('xmlparser_model');
		$this->xmlparser_model->insert();	
	}

	function getxml()
	{
		$this->load->library('menu');
		$menu = new Menu;

		$data['menu'] = $menu->show_menu();
		$this->load->model('xmlparser_model');
		$data['xml'] = $this->xmlparser_model->getxml();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('xml/xml',$data);
		$this->load->view('templates/frontend/footer');
	}
}	