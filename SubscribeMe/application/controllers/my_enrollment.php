<?php

class MY_Enrollment extends ST_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('dmenu');	// Load library(s)

		$this->load->model('enrollment_model'); // Load model(s)
	}

	public function index()
	{
		// Load view
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
		$data['title'] = "Mijn profiel";
		$data['enrollments'] = $this->enrollment_model->enrollments($this->session->userdata('username'));

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('profile/student/enrollments', $data);
		$this->load->view('templates/frontend/footer');
	}

	// Unrolls the user from a test
	public function unroll($id)
	{
		$this->enrollment_model->unroll($id);
		redirect('mijn-inschrijvingen');
	}
}