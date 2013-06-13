<?php
class Logout extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	// Destroy session and redirect to 'login'
	function index()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}