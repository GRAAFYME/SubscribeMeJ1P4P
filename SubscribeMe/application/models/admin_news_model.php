<?php

class Admin_news_model extends CI_Model {

	//table name
	private $news= 'news';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function count_all() // get number of entries in database
	{
		return $this->db->count_all($this->news);
	}
	
	public function get_paged_list($limit = 10, $offset = 0) //get entries with paging
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->news, $limit, $offset);
	}
	
	public function get_by_id($id) //get entry by id
	{
		$this->db->where('id', $id);
		return $this->db->get($this->news);
	}
	
	public function save() //add new entry
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data['news_item'] = $this->db->get_where('news', array('slug' => $slug))->row_array();

		if (empty($data['news_item'])) // News item DOESN'T exitst!
		{
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
				);
			$this->db->insert('news', $data);

			return true;
		}
		else // News item DOES exitst!
		{
			return false;
		}	
	
	}
	
	public function update($id) //update entry by id
	{		
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$this->db->where('slug', $slug);
		$this->db->where('id NOT LIKE', $id);
		$data['news_item'] = $this->db->get('news')->row_array();

		if (empty($data['news_item'])) // News item DOESN'T exitst!
		{
			$entry = array('title' => $this->input->post('title'),
							'slug' => $slug,
							'text' => $this->input->post('text')
							);
			$this->db->where('id', $id);
			$this->db->update('news', $entry);

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
		$this->db->delete($this->news);
	}
}