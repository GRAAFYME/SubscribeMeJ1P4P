<?php 

class Loggedin {
	
	function is_logged_in()
	{
		$this->load->library('session');

		if($this->session->userdata('logged_in'))
		{
			echo "You don't have permission to access this page.";
		}
		else 
		{
			redirect('news');
		}
	}
}