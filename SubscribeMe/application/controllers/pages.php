<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{			
		if ( ! file_exists('application/views/pages/'.$page.'.php')) // We DON'T have a page for that!
		{			
			show_404();
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