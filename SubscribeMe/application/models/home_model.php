<?php
class Home_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_home()
	{
		$home = "home";
		$query = $this->db->get_where('pages', array('page' => $home));
		return $query->row_array();
	}
}