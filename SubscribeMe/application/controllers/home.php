<?php
class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('page_model', 'news_model')); // Load model(s)

		$this->load->library('dmenu'); // Load library(s)
	}

	public function index()
	{
		$data['home_item'] = $this->page_model->get_home();

		if (empty($data['home_item'])) // Home item DOESN'T exitst!
		{
			show_404();
		}
		else // Home item DOES exitst!
		{	
			// Load view
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['home_item']['title'];
			$data['username'] = ucfirst($this->session->userdata('username'));

			$data['news'] = $this->news_model->latest_news();

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}