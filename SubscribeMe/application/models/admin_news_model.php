<?php
class Admin_news_model extends CI_Model {

	// Table name
	private $news= 'news';

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');	// Load helper(s)
	}
	
	public function count_all()
	{
		// Get number of entries in database
		return $this->db->count_all($this->news);
	}
	
	public function get_paged_list($limit = 10, $offset = 0)
	{
		// Get entries for each page
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->news, $limit, $offset);
	}
	
	public function get_by_id($id)
	{
		// Get entry by id
		$this->db->where('id', $id);
		return $this->db->get($this->news);
	}
	
	public function save()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE); // Build slug

		$data['news_item'] = $this->db->get_where('news', array('slug' => $slug))->row_array(); // Check if slug already exists

		if (empty($data['news_item'])) // Slug DOESN'T exitst -> insert new entry -> return true
		{
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
				);
			$this->db->insert('news', $data);

			return true;
		}
		else // Slug DOES exitst -> return false
		{
			return false;
		}	
	}
	
	public function update($id)
	{		
		$slug = url_title($this->input->post('title'), 'dash', TRUE); // Build slug

		// Check if slug already exists
		$this->db->where('slug', $slug);
		$this->db->where('id NOT LIKE', $id);
		$data['news_item'] = $this->db->get('news')->row_array();

		if (empty($data['news_item'])) // Slug DOESN'T exitst -> update current entry -> return true
		{
			$entry = array('title' => $this->input->post('title'),
							'slug' => $slug,
							'text' => $this->input->post('text')
							);
			$this->db->where('id', $id);
			$this->db->update('news', $entry);

			return true;
		}
		else // Slug DOES exitst -> return false
		{
			return false;
		}
	}
	
	public function delete($id, $entry)
	{
		// Delete entry by id
		$this->db->where('id', $id);
		$this->db->delete($this->news);
	}
}