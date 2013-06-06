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

	public function course_information($id)
	{
		$query = $this->db->get_where('signups', array('course_name' => $id));
		return $query->result_array();
	}

	public function get_year_period($year,$period)
	{
		
		$query = $this->db->get_where('signups', array('year' => $year));
		$query = $this->db->get_where('signups', array('period' => $period));
		return $query->result_array();
	}

	public function signups($id,$year,$period)
	{
		$query = $this->db->get_where('signups', array('course_name' => $id));
		$query = $this->db->get_where('signups', array('year' => $year));
		$query = $this->db->get_where('signups', array('period' => $period));
		return $query->result_array();

	}
}