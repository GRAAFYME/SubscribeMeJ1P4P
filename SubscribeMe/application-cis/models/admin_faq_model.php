<?php
class Admin_faq_model extends CI_Model {

	// Table name
	private $faq= 'faq';

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url'); // Load helper(s)
	}

	public function count_all() 
	{
		// Get number of entries in database
		return $this->db->count_all($this->faq);	
	}
	
	public function get_paged_list($limit = 10, $offset = 0) 
	{
		// Get entries for each page
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->faq, $limit, $offset);
	}
	
	public function get_by_id($id) 
	{	
		// Get entry by id		
		$this->db->where('id', $id);
		return $this->db->get($this->faq);		
	}
	
	public function save() 
	{	
		$slug = url_title($this->input->post('question'), 'dash', TRUE); // Build slug

		$data['faq_item'] = $this->db->get_where('faq', array('slug' => $slug))->row_array(); // Check if slug already exists

		if (empty($data['faq_item'])) // Slug DOESN'T exitst -> insert new entry -> return true
		{
			$data = array(
				'question' => $this->input->post('question'),
				'slug' => $slug,
				'answer' => $this->input->post('answer')
				);
			$this->db->insert('faq',$data);

			return true;
		}
		else // Slug DOES exitst -> return false
		{
			return false;
		}
	}

	public function update($id)
	{		
		$slug = url_title($this->input->post('question'), 'dash', TRUE); // Build slug

		// Check if slug already exists
		$this->db->where('slug', $slug);
		$this->db->where('id NOT LIKE', $id);
		$data['faq_item'] = $this->db->get('faq')->row_array(); 

		if (empty($data['faq_item'])) // Slug DOESN'T exitst -> update current entry -> return true
		{
			$entry = array('question' => $this->input->post('question'),
							'slug' => $slug,
							'answer' => $this->input->post('answer')
							);
			$this->db->where('id', $id);
			$this->db->update('faq', $entry);

			return true;
		}
		else // Slug DOES exitst -> return false
		{
			return false;
		}		
	}
	
	public function delete($id) 
	{
		// Delete entry by id
		$this->db->where('id', $id);
		$this->db->delete($this->faq);
	}
}