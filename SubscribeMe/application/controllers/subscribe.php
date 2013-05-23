<?php
class Subscribe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->library('menu');	
	}

	public function index()
	{
		$data['subscribe_item'] = $this->page_model->get_subscribe();

		if (empty($data['subscribe_item'])) // News item DOESN'T exitst!
		{
			show_404();
		}
		else // News item DOES exitst!
		{	
			$menu = new Menu;

			$data['menu'] = $menu->show_menu();
			$data['title'] = $data['subscribe_item']['title'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('subscribe/index', $data);
			$this->load->view('templates/frontend/footer');
		}
	}
}