<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function latest_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$this->db->select("*");
			$this->db->from("news");
			$this->db->order_by("id", "desc");
			$this->db->limit('5');
			$query = $this->db->get();
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$this->db->select("*");
			$this->db->from("news");
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
}