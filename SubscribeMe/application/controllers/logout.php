<?php

class Logout extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect('login');
		}
		else
		{
			redirect('login',);
		}
	}
}