<?php
class Admin extends AD_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('amenu');
	}

	public function index()
	{
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'Administratie';

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/index');
		$this->load->view('templates/backend/footer');
	}
}