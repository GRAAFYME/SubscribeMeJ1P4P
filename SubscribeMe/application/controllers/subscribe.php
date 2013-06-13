<?php
class Subscribe extends ST_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('file'); // Load helper(s)

		$this->load->library('dmenu'); // Load library(s)

		$this->load->model(array('xmlparser_model', 'subscribe_model', 'enrollment_model', 'page_model')); // Load model(s)
	}
	
	// This function loads all the available tests 
	public function index()
	{
		$data['subscribe_item'] = $this->page_model->get_subscribe();

		if (empty($data['subscribe_item'])) // Subscribe item DOESN'T exitst!
		{
			show_404();
		}
		else // Subscribe item DOES exitst!
		{	
			// Load view
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['subscribe_item']['title'];

			$data['courses'] = $this->subscribe_model->getall();

			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/courses',$data);
			$this->load->view('templates/frontend/footer');
		}
	}
	
	// Gets all the tests filtered by year
 	public function get($year)
 	{
		$data['subscribe_item'] = $this->page_model->get_subscribe();

		if (empty($data['subscribe_item'])) // Subscribe item DOESN'T exitst!
		{
			show_404();
		}
		else // Subscribe item DOES exitst!
		{	
			// Load view
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['subscribe_item']['title'];

			$data['courses'] = $this->subscribe_model->getxml($year);

			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/courses',$data);
			$this->load->view('templates/frontend/footer');
		}
 	}

 	// Loads a specific test
 	public function course($id)
 	{
 		$data['xml'] = $this->subscribe_model->getcourse($id);

 		$dmenu = new Dmenu;

		$data['menu'] = $dmenu->show_menu();
 		$data['title'] = 'Inschrijven';

		$data['userexist'] = $this->subscribe_model->alreadysignedup($this->session->userdata('username'),$id);

		if($data['userexist'] == false) // Current user can still subscribe to this test -> load view with signup button
		{
			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/course',$data);
			$this->load->view('templates/frontend/footer');
		}
		else // Current user is already subscribed to this test -> load view with signout button
		{
			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/signout', $data);
			$this->load->view('templates/frontend/footer');
		}
 	}

 	// Subscribes current user for the specific test and shows a confirmation page
 	public function signup($id)
 	{
 		$this->subscribe_model ->signup($id);
 		$data['row'] = $this->subscribe_model->signup_information($id);
 		$data['username'] = ucfirst($this->session->userdata('username'));

	 	  $dmenu = new Dmenu;
	 	  $data['menu'] = $dmenu->show_menu();
	 	  $data['title'] = 'Inschrijven';

	 	  $this->load->view('templates/frontend/header', $data);
	 	  $this->load->view('courses/signup', $data);
	 	  $this->load->view('templates/frontend/footer');
 	}
 	
 	// Gets all the tests filtered by year and period
 	public function getperiod($year, $period)
 	{
		$data['subscribe_item'] = $this->page_model->get_subscribe();

		if (empty($data['subscribe_item'])) // Subscribe item DOESN'T exitst!
		{
			show_404();
		}
		else // Subscribe item DOES exitst!
		{	
			// Load view
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['subscribe_item']['title'];

			$data['courses'] = $this->subscribe_model->getperiod($year, $period);

			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/courses',$data);
			$this->load->view('templates/frontend/footer');
		}
 	}

 	// Unrolls a user from a specific test
 	public function unroll($id)
 	{
 		$this->subscribe_model->unroll($id);
 		redirect('inschrijven');
 	}
 }
