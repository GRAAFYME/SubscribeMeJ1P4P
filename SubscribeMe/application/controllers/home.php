<?php
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('news_model');		
	}

	public function index()
	{
		$data['home_item'] = $this->home_model->get_home();
		$data['news'] = $this->news_model->latest_news();

		if (empty($data['home_item'])) // News item DOESN'T exitst!
		{
			show_404();
		}
		else // News item DOES exitst!
		{	
			$this->load->library('menu');
			$menu = new Menu;

			$data['menu'] = $menu->show_menu();
			$data['title'] = $data['home_item']['title'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}