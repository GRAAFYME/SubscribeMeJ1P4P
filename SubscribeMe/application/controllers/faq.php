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
}