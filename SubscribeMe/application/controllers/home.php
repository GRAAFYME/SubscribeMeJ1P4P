<?php
class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->model('news_model');
		$this->load->library('dmenu');
		$this->load->library('amenu');	
	}

	public function index()
	{
		$data['home_item'] = $this->page_model->get_home();
		$data['news'] = $this->news_model->latest_news();

		if (empty($data['home_item'])) // News item DOESN'T exitst!
		{
			show_404();
		}
		else // News item DOES exitst!
		{	
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['home_item']['title'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}