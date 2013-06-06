<?php
class Admin_pages_model extends CI_Model {

	// Table name
	private $pages= 'pages';

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url'); // Load helper(s)
	}

	public function count_all()
	{
		// Get number of entries in database
		return $this->db->count_all($this->pages);
	}

	public function get_paged_list($limit = 10, $offset = 0)
	{
		// Get entries for each page
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->pages, $limit, $offset);
	}

	public function get_by_id($id)
	{
		// Get entry by id	
		$this->db->where('id', $id);
		return $this->db->get($this->pages);
	}

	public function update($id)
	{
		// Update current entry
		$entry = array('title' => $this->input->post('title'),
						'text' => $this->input->post('text')
						);
		$this->db->where('id', $id);
		$this->db->update('pages', $entry);
	}
}