<?php
class News_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function latest_news($slug = FALSE)
	{
		if ($slug === FALSE)	// Gets the 3 latest new items and returns them ordered by id, desc
		{
			$this->db->select("*");
			$this->db->from("news");
			$this->db->order_by("id", "desc");
			$this->db->limit('3');
			$query = $this->db->get();
			return $query->result_array();
		}
		else 	// Gets and returns a specific news item
		{		
			$query = $this->db->get_where('news', array('slug' => $slug));
			return $query->row_array();
		}
	}

	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)	// Gets all the news items and returns them ordered by id, desc
		{
			$this->db->select("*");
			$this->db->from("news");
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result_array();
		}
		else 	// Gets and returns a specific news item
		{		
			$query = $this->db->get_where('news', array('slug' => $slug));
			return $query->row_array();
		}
	}
}