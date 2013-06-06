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
		$this->load->view('profile/personeel/course_summary', $data);
		$this->load->view('templates/backend/footer');
	}

	public function signups($id)
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['title'] = "Vakken";
		$data['signups'] = $this->getsignup_model->course_information($id);

		$this->load->view('templates/backend/header', $data);
		$this->load->view('profile/personeel/year_period',$data);
		$this->load->view('templates/backend/footer');
	}

	public function course_summary($year,$period)
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['title'] = "Overzicht";
		$data['signups'] = $this->getsignup_model->get_year_period($year,$period);

		$this->load->view('templates/backend/header', $data);
		$this->load->view('profile/personeel/year_period',$data);
		$this->load->view('templates/backend/footer');
	}

	public function courses($id,$year,$period)
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['title'] = "Overzicht";
		$data['signups'] = $this->getsignup_model->signups($id,$year,$period);

		$this->load->view('templates/backend/header', $data);
		$this->load->view('profile/personeel/course_signups',$data);
		$this->load->view('templates/backend/footer');

	}

	public function excell_export($id,$year,$period)
	{
		$data['signups'] = $this->getsignup_model->signups($id,$year,$period);

		$this->load->view('profile/personeel/excell_view',$data);
	}
}