<?php
class Admin_tests_model extends CI_Model {

	// Table name
	private $tests= 'tests';

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url'); // Load helper(s)
	}

	public function count_all() 
	{
		// Get number of entries in database
		return $this->db->count_all($this->tests);	
	}
	
	public function get_paged_list($limit = 10, $offset = 0) 
	{
		// Get entries for each page
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tests, $limit, $offset);
	}
	
	public function get_by_id($id) 
	{	
		// Get entry by id		
		$this->db->where('id', $id);
		return $this->db->get($this->tests);		
	}

	public function update($id)
	{	
		$entry = array('course_name' => $this->input->post('course_name'),
						'year' => $this->input->post('year'),
						'period' => $this->input->post('period'),
						'test' => $this->input->post('test')
						);
		$this->db->where('id', $id);
		$this->db->update('tests', $entry);
	}
	
	public function delete($id) 
	{		
		$data['signups'] = $this->db->get_where('signups', array('test_id' => $id))->row_array(); // Check if there is a singup for this specific test

		if (empty($data['signups'])) // No signups for this specific test -> delete entry by id -> return TRUE
		{
			$this->db->where('id', $id);
			$this->db->delete($this->tests);

			return TRUE;
		}
		else // Found signups -> return FALSE
		{
			return FALSE;
		}
	}

	public function courses()
	{
		$query = $this->db->get('courses');
		return $query->result_array();
	}
}