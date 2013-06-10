<?php

class Enrollment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function enrollments($username)
	{
		$query = $this->db->get_where('signups', array('username' => $username));
		return $query->result_array();
	}

	public function unroll($id)
	{
		$this->db->delete('signups', array('id'=>$id));		
	}
}