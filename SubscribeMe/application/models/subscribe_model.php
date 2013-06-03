<?php

class Subscribe_model extends CI_Model {
//Gets all the information from the xml table. 
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	public function getall()
	{
		$query = $this->db->get('tests');
		return $query->result_array();
	}
	public function getxml($year)
	{
		$query = $this->db->get_where('tests', array('year'=>$year));
		return $query->result_array();
	}

	public function getcourse($id)
	{
		$query = $this->db->get_where('tests', array('id'=>$id));
		return $query->result_array();
	}

	public function signup($id)
	{
		$query = $this->db->get_where('tests', array('id' => $id));
		$query_list = $query->row_array();
		$query = $this->session->all_userdata();
		
		$data = array(
			'username' => $query['username'],
			'course_name' => $query_list['course_name'],
			'year' => $query_list['year'],
			'period' => $query_list['period'],
			'test' => $query_list['test']
		);

		$this->db->insert('signups', $data);

	}
}