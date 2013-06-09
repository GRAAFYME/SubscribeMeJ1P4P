<?php
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('membership_model'); // Load model(s)
	}

	function index($bool = TRUE)
	{
		// Checks if 'is_logged_in' equals TRUE or FALSE
		if (!$this->session->userdata('is_logged_in'))
		{
			if(!$bool)
			{
				$data['error_message'] = 'Gebruikersnaam en/of wachtwoord onjuist';
				$data['show_error_message'] = TRUE;
			}
			else
			{
				$data['error_message'] = '';
				$data['show_error_message'] = FALSE;
			}

			// Load view
			$data['title'] = 'Inloggen';

			$this->load->view('templates/login/header', $data);
			$this->load->view('login_form', $data);
			$this->load->view('templates/login/footer');
		}
		else
		{
			redirect('home'); // Redirect to home
		}

	}

	// This function stores the user data in an array and sets this into a session
	// But only if the user information is correct otherwise he will load the index
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
			$query = $this->membership_model->validate(); // Validate function will return TRUE or FALSE in $query
			
			if($query) // If $query == TRUE -> getrole()
			{
				$role = $this->membership_model->getrole(); // Getrole function will return a role

				if($role != "guest") // If $role != "guest" -> set user information in session
				{
					$data = array(
						'username' => $this->input->post('username'),
						'role' => $role,
						'is_logged_in' => true
						);
					$this->session->set_userdata($data);

					if($role == "admin")
					{
						redirect('admin');
					}
					else
					{
						redirect('home');
					}
				}
				else 
				{
					redirect('uitloggen');
				}
			}
			else // Username and/or password incorrect
			{	
				$this->index(FALSE);
			}
		}
	}

	function signup()
	{
		// Load view
		$data['title'] = 'Registeren';
		$data['error_message'] = '';
		$data['show_error_message'] = FALSE;

		$this->load->view('templates/login/header', $data);
		$this->load->view('signup_form', $data);
		$this->load->view('templates/login/footer');
	}

	// Creates a new member (in local DB)
	function create_member()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First_name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last_name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Registeren';
			$data['error_message'] = '';
			$data['show_error_message'] = FALSE;

			$this->load->view('templates/login/header', $data);
			$this->load->view('signup_form', $data);
			$this->load->view('templates/login/footer');
		}
		else
		{
			$query = $this->membership_model->create_member();
			if($query)
			{
				$data['title'] = 'Inloggen';
				$data['account_created'] = 'Your account has been created.';
				$data['error_message'] = '';
				$data['show_error_message'] = FALSE;

				$this->load->view('templates/login/header', $data);
				$this->load->view('login_form', $data);
				$this->load->view('templates/login/footer');
			}
			else
			{
				$data['title'] = 'Registeren';
				$data['error_message'] = 'Gebruikersnaam is al in gebruik';
				$data['show_error_message'] = TRUE;

				$this->load->view('templates/login/header', $data);
				$this->load->view('signup_form', $data);
				$this->load->view('templates/login/footer');
			}
		}
	}
}