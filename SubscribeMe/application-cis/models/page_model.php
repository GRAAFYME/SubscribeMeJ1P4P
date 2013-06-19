<?php
class Page_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	// Gets the text for home
	public function get_home()
	{
		$home = "home";
		$query = $this->db->get_where('pages', array('page' => $home));
		return $query->row_array();
	}

	// Gets the text for subscribe
	public function get_subscribe()
	{
		$subscribe = "subscribe";
		$query = $this->db->get_where('pages', array('page' => $subscribe));
		return $query->row_array();
	}
}