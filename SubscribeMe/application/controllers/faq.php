<?php
class Faq extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('faq_model');
		$this->load->library('dmenu');
		$this->load->library('amenu');
	}

	public function index()
	{
		$dmenu = new Dmenu;

		$data['menu'] = $dmenu->show_menu();
		$data['faq'] = $this->faq_model->get_faq();
		$data['title'] = 'FAQ';

		$this->load->view('templates/frontend/header', $data);
		$this->load->view('faq/index', $data);
		$this->load->view('templates/frontend/footer');
	}

	public function view($slug)
	{
		$data['faq_item'] = $this->faq_model->get_faq($slug);

		if (empty($data['faq_item'])) // FAQ item DOESN'T exitst!
		{
			show_404();
		}
		else // FAQ item DOES exitst!
		{	
			$dmenu = new Dmenu;

			$data['menu'] = $dmenu->show_menu();
			$data['title'] = $data['faq_item']['question'];

			$this->load->view('templates/frontend/header', $data);
			$this->load->view('faq/view', $data);
			$this->load->view('templates/frontend/footer');
		}
	}

	/*
	public function create()
	{				
		$this->load->helper('form');
		$this->load->library('form_validation');

		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'Create a FAQ item';
		
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		
		if ($this->form_validation->run() === FALSE) // Something went wrong!
		{
			$this->load->view('templates/backend/header', $data);	
			$this->load->view('admin/faq/create');
			$this->load->view('templates/backend/footer');
			
		}
		else // New news item succesfully created!
		{			
			$return = $this->faq_model->set_faq();

			if ($return == "error")
			{
				$this->load->view('templates/backend/header', $data);	
				$this->load->view('admin/faq/create');
				$this->load->view('admin/faq/error');
				$this->load->view('templates/backend/footer');
				// + error, title / slug in use
			}
			else
			{			
				$this->load->view('templates/backend/header', $data);	
				$this->load->view('admin/faq/create');
				$this->load->view('admin/faq/success');
				$this->load->view('templates/backend/footer');
			}
		}
	}*/
}