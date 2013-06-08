<?php

class Upload extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));

		$this->load->library('amenu');

		$this->load->helper('file');
	}

	function index()
	{
		$amenu = new Amenu;
		
		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'Upload';


		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/upload/upload_form',array('error'=>''));
		$this->load->view('templates/backend/footer');		
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xml';

		$this->load->library('upload', $config);

		$amenu = new Amenu;
		
		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'Upload';

		if(!$this->upload->do_upload())
		{
			$error= array('error'=>$this->upload->display_errors());
			
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/upload/upload_form', $error);
			$this->load->view('templates/backend/footer');	
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data['title'] = 'Upload section';
			$data = get_filenames("uploads");
			$data['file'] = end($data);
			$amenu = new Amenu;
		
			$data['menu'] = $amenu->show_menu();

			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/upload/are_you_sure', $data);
			$this->load->view('templates/backend/footer');
		}
	}
}