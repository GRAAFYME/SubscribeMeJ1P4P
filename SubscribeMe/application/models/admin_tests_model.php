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
	/*
	public function save() 
	{	
		$slug = url_title($this->input->post('question'), 'dash', TRUE); // Build slug

		$data['tests_item'] = $this->db->get_where('tests', array('slug' => $slug))->row_array(); // Check if slug already exists

		if (empty($data['tests_item'])) // Slug DOESN'T exitst -> insert new entry -> return true
		{
			$data = array(
				'question' => $this->input->post('question'),
				'slug' => $slug,
				'answer' => $this->input->post('answer')
				);
			$this->db->insert('tests',$data);

			return true;
		}
		else // Slug DOES exitst -> return false
		{
			return false;
		}
	}
	*/

	public function update($id)
	{		
	

		// Check if slug already exists
		$data['tests_item'] = $this->db->get_where('courses', array('short_name' => $this->input->post('course_name')))->row_array();

		if (empty($data['tests_item'])) //  course doesn't exitst ->  return false
		{
			return false;
		}
		else // course DOES exitst -> update current entry -> return true
		{
			$entry = array('course_name' => $this->input->post('course_name'),
							'year' => $this->input->post('year'),
							'period' => $this->input->post('period'),
							'test' => $this->input->post('test')
							);
			$this->db->where('id', $id);
			$this->db->update('tests', $entry);
			return true;
		}		
	}
	
	public function delete($id) 
	{
		// Delete entry by id
		$this->db->where('id', $id);
		$this->db->delete($this->tests);
	}
}