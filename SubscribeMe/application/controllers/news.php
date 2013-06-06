<?php
class News extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('dmenu');	
		$this->load->library('amenu');
	}

	public function index()
	{
		$dmenu = new Dmenu;

		$data['menu'] = $dmenu->show_menu();
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';

		$this->load->view('templates/frontend/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/frontend/footer');
	}

	public function view($slug)
	{
		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item'])) // News item DOESN'T exitst!
		{
			show_404();
		}
		else // News item DOES exitst!
		{	
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['news_item']['title'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}