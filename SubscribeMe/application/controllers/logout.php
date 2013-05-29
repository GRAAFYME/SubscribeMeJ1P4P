<?php

class Logout extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect('login');
	}
}