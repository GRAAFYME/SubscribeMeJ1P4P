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
		$query = $this->db->get('xml');
		return $query->result_array();
	}
	public function getxml($year)
	{
		$query = $this->db->get_where('xml', array('year'=>$year));
		return $query->result_array();
	}

	public function getcourse($id)
	{
		$query = $this->db->get_where('xml', array('id'=>$id));
		return $query->result_array();
	}

	public function signup($id)
	{
		$query = $this->db->get_where('xml', array('id' => $id));
		$query_list = $query->row_array();
		$query = $this->session->all_userdata();
		
		$data = array(
			'username' => $query['username'],
			'course' => $query_list['name'],
			'datee' => $query_list['datee'],
			'description' => $query_list['description']
			);

		$this->db->insert('signups', $data);

	}
}