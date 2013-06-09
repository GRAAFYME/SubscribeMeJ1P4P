<?php
class Getsignups extends PE_Controller {

	// Gets all the signups 
	public function __construct()
	{
		parent::__construct();

		$this->load->library('dmenu'); // Load library(s)

		$this->load->model('getsignup_model'); // Load model(s)
	}

	// Shows all the availible courses
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

	// Shows all the signups for a selected course
	public function signups($id)
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();

		$data['title'] = "Vakken";
		$data['signups'] = $this->getsignup_model->course_information($id);

		$this->load->view('templates/backend/header', $data);
		$this->load->view('profile/personeel/course_signups',$data);
		$this->load->view('templates/backend/footer');
	}

	// Filter on courses for year and period 
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

	// Filters a particular course on year and period
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

	// Calls the excel view, which will be used for an excel export
	public function excel_export($id,$year,$period)
	{
		$data['signups'] = $this->getsignup_model->signups($id,$year,$period);

		$this->load->view('profile/personeel/excel_view',$data);
	}
}