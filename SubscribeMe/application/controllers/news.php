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

	public function create()
	{	
		if ($this->session->userdata('role') == "admin")
		{		
			$this->load->helper('form');
			$this->load->library('form_validation');

			$amenu = new Amenu;

			$data['menu'] = $amenu->show_menu();
			$data['title'] = 'Create a news item';
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			
			if ($this->form_validation->run() === FALSE) // Something went wrong!
			{
				$this->load->view('templates/backend/header', $data);	
				$this->load->view('admin/news/create');
				$this->load->view('templates/backend/footer');
				
			}
			else // New news item succesfully created!
			{
				$return = $this->news_model->set_news();

				if ($return == "error")
				{
					$this->load->view('templates/backend/header', $data);	
					$this->load->view('admin/news/create');
					$this->load->view('admin/news/error');
					$this->load->view('templates/backend/footer');
					// + error, title / slug in use
				}
				else
				{			
					$this->load->view('templates/backend/header', $data);	
					$this->load->view('admin/news/create');
					$this->load->view('admin/news/success');
					$this->load->view('templates/backend/footer');
				}
			}
		}
		else
		{
			redirect('home');
		}
	}
}