<?php
class Subscribe_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	// Gets and returns all the tests
	public function getall()
	{
		$query = $this->db->get('tests');
		return $query->result_array();
	}

	// Gets and returns all the tests for a specific year
	public function getxml($year)
	{
		$query = $this->db->get_where('tests', array('year'=>$year));
		return $query->result_array();
	}

	// Gets and returns a speficic test
	public function getcourse($id)
	{
		$query = $this->db->get_where('tests', array('id'=>$id));
		return $query->result_array();
	}

	// Subscribes a user for a speficic test
	public function signup($id)
	{
		$query = $this->db->get_where('tests', array('id' => $id));
		$query_list = $query->row_array();
		$query = $this->session->all_userdata();
		
		$data = array(
			'test_id' => $id,
			'username' => $query['username'],
			'course_name' => $query_list['course_name'],
			'year' => $query_list['year'],
			'period' => $query_list['period'],
			'test' => $query_list['test']
		);

		$this->db->insert('signups', $data);
	}

	// Gets and returns a specific test
	public function signup_information($id)
	{
		$query = $this->db->get_where('tests', array('id' => $id));
		return $query->row_array();
	}

	// Gets and returns all tests in a specific year and period
	public function getperiod($year, $period)
	{
		$this->db->select('*');
		$this->db->from('tests');
		$this->db->where(array('year' => $year));
		$this->db->where(array('period' => $period));
		$query = $this->db->get();
		return $query->result_array();
	}

	// Checks if the user is already subscribed for a test
	public function alreadysignedup($username, $id)
	{
		$this->db->where('username', $username);
		$this->db->where('test_id', $id);
		$query = $this->db->get('signups'); 
		
		if($query->num_rows() > 0 )
		{
			return true;
		}

		else 
		{
			return false;
		}
	}

	// Unrolls a user from a specific test
	public function unroll($id)
	{
		$this->db->delete('signups', array('test_id'=>$id));		
	}
}