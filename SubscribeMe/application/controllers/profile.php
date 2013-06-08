<?php
class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('membership_model');
		$this->load->library('dmenu');
		$this->load->library('amenu');	
	}

	public function index()
	{
		$dmenu = new Dmenu;

		$data['menu'] = $dmenu->show_menu();
		$data['title'] = 'Profiel';	

		$email = $this->membership_model->getemail($this->session->userdata('username'));
		$name = $this->membership_model->getname($this->session->userdata('username'));

		$data['username'] = ucfirst($this->session->userdata('username'));
		
		if($this->session->userdata('role') == "admin")
		{			
			$data['name'] = $name['first_name'] ."&nbsp;" .$name['last_name'];
			$data['email'] = $email['email'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/admin', $data);
			$this->load->view('templates/frontend/footer');
		}

		else if($this->session->userdata('role') == "personeel")
		{
			$data['name'] = $name;
			$data['email'] = $email;

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/personeel', $data);
			$this->load->view('templates/frontend/footer');
		}

		else
		{
			$data['name'] = $name;
			$data['email'] = $email;

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('profile/student', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}