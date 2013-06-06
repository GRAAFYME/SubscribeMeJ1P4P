<?php

class Admin_faq_model extends CI_Model {

	//table name
	private $faq= 'faq';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
		
	public function count_all() // get number of entries in database
	{
		return $this->db->count_all($this->faq);
	}
	
	public function get_paged_list($limit = 10, $offset = 0) // get entries with paging
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->faq, $limit, $offset);
	}
	
	public function get_by_id($id) // get entry by id
	{
		$this->db->where('id', $id);
		return $this->db->get($this->faq);		
	}
	
	public function save() // add new entry
	{		
		$slug = url_title($this->input->post('question'), 'dash', TRUE);

		$data['faq_item'] = $this->db->get_where('faq', array('slug' => $slug))->row_array();

		if (empty($data['faq_item'])) // News item DOESN'T exitst!
		{
			$data = array(
				'question' => $this->input->post('question'),
				'slug' => $slug,
				'answer' => $this->input->post('answer')
				);
			$this->db->insert('faq',$data);

			return true;
		}
		else 
		{
			return false;
		}
	}

	public function update($id) // update entry by id
	{		
		$slug = url_title($this->input->post('question'), 'dash', TRUE);

		$this->db->where('slug', $slug);
		$this->db->where('id NOT LIKE', $id);
		$data['faq_item'] = $this->db->get('faq')->row_array();

		if (empty($data['faq_item'])) // News item DOESN'T exitst!
		{
			$entry = array('question' => $this->input->post('question'),
							'slug' => $slug,
							'answer' => $this->input->post('answer')
							);
			$this->db->where('id', $id);
			$this->db->update('faq', $entry);

			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function delete($id, $entry) //delete entry by id
	{
		$this->db->where('id', $id);
		$this->db->delete($this->faq);
	}
}