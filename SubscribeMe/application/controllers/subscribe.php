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
	}
//This function loads all the available tests 
	public function index()
	{
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
		$data['courses'] = $this->subscribe_model->getall();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('courses/courses',$data);
		$this->load->view('templates/frontend/footer');
	}
//gets all the tests by year
 	public function get($year)
 	{

 		
		$dmenu = new Dmenu;
		$data['menu'] = $dmenu->show_menu();
 		

 		$data['courses'] = $this->subscribe_model->getxml($year);

 		$this->load->view('templates/frontend/header',$data);
		$this->load->view('courses/courses',$data);
		$this->load->view('templates/frontend/footer');
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
 	  $dmenu = new Dmenu;
 	  $data['menu'] = $dmenu->show_menu();
 	  $this->subscribe_model ->signup($id);

 	  $this->load->view('templates/frontend/header', $data);
 	  $this->load->view('courses/signup');
 	  $this->load->view('templates/frontend/footer');
 	}
 	
 	public function getperiod($year, $period)
 	{
 		$dmenu = new Dmenu;
 		$data['menu'] = $dmenu->show_menu();
 		$data['courses'] = $this->subscribe_model->getperiod($year, $period);

 		$this->load->view('templates/frontend/header', $data);
 		$this->load->view('courses/courses', $data);
 		$this->load->view('templates/frontend/footer');
 	}

 	public function unroll($id)
 	{
 		$this->subscribe_model->unroll($id);
 		redirect('inschrijven');
 	}
 }
