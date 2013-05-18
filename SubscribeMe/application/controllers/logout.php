<?php 
//this function kills the current session and redirects the user to the login controller
class Logout extends CI_Controller {

	function index()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}