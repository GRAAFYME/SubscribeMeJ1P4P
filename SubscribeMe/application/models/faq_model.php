<?php
class Faq_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_faq($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$this->db->select("*");
			$this->db->from("faq");
			$this->db->order_by("question", "asc");
			$query = $this->db->get();
			return $query->result_array();
		}
		
		$query = $this->db->get_where('faq', array('slug' => $slug));
		return $query->row_array();
	}	
}