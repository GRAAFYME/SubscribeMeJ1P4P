<?php

class MY_Enrollment extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('enrolment_model');
		$this->load->library('dmenu');	
		$this->load->library('amenu');
		$this->load->model('enrollment_model');

	}

	public function index()
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
		$data['title'] = "Mijn profiel";
		$data['enrollments'] = $this->enrollment_model->enrollments($this->session->userdata('username'));

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('profile/enrollments', $data);
		$this->load->view('templates/frontend/footer');

	}

	public function unroll($id)
	{
		$this->enrollment_model->unroll($id);
		redirect('mijn-inschrijvingen');
	}
}