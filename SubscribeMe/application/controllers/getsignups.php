<?php

class Getsignups extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('dmenu');	
		$this->load->library('amenu');
		$this->load->model('getsignup_model');

	}

	public function index()
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['title'] = "Vakken";
		$data['courses'] = $this->getsignup_model->getcourses();

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/overview/courses', $data);
		$this->load->view('templates/backend/footer');
	}
}