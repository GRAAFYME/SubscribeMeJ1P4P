<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');		
	}

	public function view($page = 'home')
	{			
		if ( ! file_exists('application/views/pages/'.$page.'.php')) // We DON'T have a page for that!
		{			
			show_404();
		}
		else if ($page == 'home')
		{
			$this->load->library('menu');
			$menu = new Menu;

			$data['menu'] = $menu->show_menu();
			$data['news'] = $this->news_model->latest_news();
			$data['title'] = 'News archive';

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/frontend/footer');
		}
		else // We DO have a page for that!
		{
			$this->load->library('menu');
			$menu = new Menu;

			$data['title'] = ucfirst($page); // Capitalize the first letter
			$data['menu'] = $menu->show_menu();

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('pages/'.$page);
			$this->load->view('templates/frontend/footer');
		}
	}
}