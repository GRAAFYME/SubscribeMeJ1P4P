<?php

class Login extends CI_Controller {

<<<<<<< HEAD
	function __construct()
	{
		parent::__construct();
		$this->load->model('membership_model');
=======
	function index()
	{
		$this->load->view('templates/login/header');
		$this->load->view('admin/login_form');
		$this->load->view('templates/login/footer');
>>>>>>> 34b3b861ff35e65c484ef7732ab7020eacaebee6
	}
//this controller stores the user data in an array if the user information is correct otherwise hell load the index
	function validate_credentials()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if($query)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
				);
			$this->session->set_userdata($data);
			redirect('news');
		}
		else
		{
			$this->index();
		}
	}
	function signup()
	{
		$this->load->view('templates/login/header');
		$this->load->view('admin/signup_form');
		$this->load->view('templates/login/footer');
//creates a new member
	}
	function create_member()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/login/header');
<<<<<<< HEAD
			$this->load->view('admin/login_form');
			$this->load->view('templates/login/footer');
		}
		else
		{
			$this->index();
		}

	}
//this controller stores the user data in an array if the user information is correct otherwise hell load the index
	function validate_credentials()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[32]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$query = $this->membership_model->validate();

			if($query)
			{
				$data = array(
					'username' => $this->input->post('username'),
					'is_logged_in' => true
					);
				$this->session->set_userdata('logged_in', $data);
				redirect('news');
			}
			else // wachtwoord onjuist
			{
				$this->index();
			}
		}
	}
	function signup()
	{
		$this->load->view('templates/login/header');
		$this->load->view('admin/signup_form');
		$this->load->view('templates/login/footer');
//creates a new member
	}
	function create_member()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/login/header');
=======
>>>>>>> 34b3b861ff35e65c484ef7732ab7020eacaebee6
			$this->load->view('admin/signup_form');
			$this->load->view('templates/login/footer');
		}
		else
		{
<<<<<<< HEAD
=======
			$this->load->model('membership_model');

>>>>>>> 34b3b861ff35e65c484ef7732ab7020eacaebee6
			if($query = $this->membership_model->create_member())
			{

				$data['account_created'] = 'Your account has been created <br></br> You may wanna login.';

				$this->load->view('templates/login/header');
				$this->load->view('admin/login_form', $data);
				$this->load->view('templates/login/footer');
			}
			else
			{
				$this->load->view('templates/login/header');
				$this->load->view('admin/signup_form');
				$this->load->view('templates/login/footer');
			}
		}

	}

}