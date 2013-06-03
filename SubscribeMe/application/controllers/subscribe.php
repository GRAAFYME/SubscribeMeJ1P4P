<?php
class Subscribe extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->library('dmenu');
		$this->load->library('amenu');
		$this->load->model('xmlparser_model');
		$this->load->model('subscribe_model');
	}

	public function getall()
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
		$data['xml'] = $this->subscribe_model->getall();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('courses/courses',$data);
		$this->load->view('templates/frontend/footer');

	}
 	public function get($year)
 	{

 		
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
 		

 		$data['xml'] = $this->subscribe_model->getxml($year);

 		$this->load->view('templates/frontend/header',$data);
		$this->load->view('courses/courses',$data);
		$this->load->view('templates/frontend/footer');
 	}

 	public function course($id)
 	{
 		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['xml'] = $this->subscribe_model->getcourse($id);

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('courses/course',$data);
		$this->load->view('templates/frontend/footer');
 	}

 	public function signup($id)
 	{
 	  $this->subscribe_model ->signup($id);
 	}
 }
