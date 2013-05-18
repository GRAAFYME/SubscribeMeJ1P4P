<?php

//class for xml parser just a test for now 
class Xml_parser extends CI_Controller{

//this function loads the xml file and parses it into the $data which will be sent to the views
	function index()
	{
		$this->load->library('parser');
		$data['xml'] = simplexml_load_file("test.xml");
		$data['title'] = 'xml_parser';
		
		$this->load->view('templates/header',$data);
		$this->load->view('xml/xml', $data);
		$this->load->view('templates/footer');
	}
}	