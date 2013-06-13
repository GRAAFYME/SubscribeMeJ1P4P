<?php
class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('membership_model'); // Load model(s)

		$this->load->library('dmenu'); // Load library(s)
	}

	public function index()
	{
		// Set variables that can be used for all views
		$dmenu = new Dmenu;

		$data['menu'] = $dmenu->show_menu();
		$data['title'] = 'Profiel';	

		$email = $this->membership_model->getemail($this->session->userdata('username'));
		$name = $this->membership_model->getname($this->session->userdata('username'));

		$data['username'] = ucfirst($this->session->userdata('username'));
		
		if($this->session->userdata('role') == "admin") // Load view for a admin
		{			
			$data['name'] = $name['first_name'] ."&nbsp;" .$name['last_name'];
			$data['email'] = $email['email'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/admin', $data);
			$this->load->view('templates/frontend/footer');
		}

		else if($this->session->userdata('role') == "personeel") // Load view for a personeel
		{
			if($this->session->userdata('username') == "personeel") // If its a local DB account (test account) -> use settings below to fill name and email field
			{
				$data['name'] = $name['first_name'] ."&nbsp;" .$name['last_name'];
				$data['email'] = $email['email'];
			}
			else // Else (LDAP) -> use settings below to fill name and email field
			{
				$data['name'] = $name;
			 	$data['email'] = $email;
			}

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/personeel', $data);
			$this->load->view('templates/frontend/footer');
		}

		else if($this->session->userdata('role') == "student") // Load view for a student
		{
			if($this->session->userdata('username') == "student") // If its a local DB account (test account) -> use settings below to fill name and email field
			{
				$data['name'] = $name['first_name'] ."&nbsp;" .$name['last_name'];
				$data['email'] = $email['email'];
			}
			else // Else (LDAP) -> use settings below to fill name and email field
			{
				$data['name'] = $name;
			 	$data['email'] = $email;
			}

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/student', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}