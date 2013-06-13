<?php
class Faq_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_faq($slug = FALSE)
	{
		if ($slug === FALSE)	// Gets all the faq items and returns them ordered by question, asc
		{
			$this->db->select("*");
			$this->db->from("faq");
			$this->db->order_by("question", "asc");
			$query = $this->db->get();
			return $query->result_array();
		}
		else // Gets and returns a specific faq item
		{		
			$query = $this->db->get_where('faq', array('slug' => $slug)); 
			return $query->row_array();
		}
	}	
}