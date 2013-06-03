<?php 

class Getsignup_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getcourses()
	{
		$query = $this->db->get('courses');
		return $query-> result_array();
	}
}