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
			
			$data['title'] = ucfirst($page); // Capitalize the first letter 
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
	}
}