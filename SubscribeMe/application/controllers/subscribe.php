<?php
class Subscribe extends ST_Controller {
//class constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->library('dmenu');
		$this->load->library('amenu');
		$this->load->model('xmlparser_model');
		$this->load->model('subscribe_model');
		$this->load->model('enrollment_model');
		$this->load->model('page_model');
	}
//This function loads all the available tests 
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
//gets all the tests by year
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

 	public function course($id)
 	{
 		$dmenu = new Dmenu;
 		$data['xml'] = $this->subscribe_model->getcourse($id);
		$data['menu'] = $dmenu->show_menu();
		$data['userexist'] = $this->subscribe_model->alreadysignedup($this->session->userdata('username'),$id);
		if($data['userexist'] == false)
		{
			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/course',$data);
			$this->load->view('templates/frontend/footer');
		}
		else
		{
			$this->load->view('templates/frontend/header',$data);
			$this->load->view('courses/signout', $data);
			$this->load->view('templates/frontend/footer');
		}
 	}

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

 	public function unroll($id)
 	{
 		$this->subscribe_model->unroll($id);
 		redirect('inschrijven');
 	}
 }
