<?php
class Upload extends AD_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->helper(array('form', 'url', 'file')); // Load helper(s)

			$this->load->library('amenu'); // Load library(s)
		}

		// Load the view
		function index()
		{
			$amenu = new Amenu;
			
			$data['menu'] = $amenu->show_menu();
			$data['title'] = 'Upload';

			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/upload/upload_form',array('error'=>''));
			$this->load->view('templates/backend/footer');		
		}

		// If 'upload' button is clicked, here we will upload the file
		function do_upload()
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = '*';

			$this->load->library('upload', $config);

			$amenu = new Amenu;
			
			$data['menu'] = $amenu->show_menu();
			$data['title'] = 'Upload';

			if(!$this->upload->do_upload())
			{
				$error = array('error'=>$this->upload->display_errors());
				
				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/upload/upload_form', $error);
				$this->load->view('templates/backend/footer');	
			}
			else
			{
				$file = array('upload_data' => $this->upload->data());
				$file = get_filenames("uploads");
				$data['file'] = end($file);
				
				$amenu = new Amenu;
			
				$data['menu'] = $amenu->show_menu();

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/upload/are_you_sure', $data);
				$this->load->view('templates/backend/footer');
			}
		}
	}