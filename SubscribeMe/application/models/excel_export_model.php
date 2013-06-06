<?php 
class Excel_export_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

		parent::__construct();
	}

	public function getExcelItems()
	{
		$query = $this->db->get('signups');
		return $query->result_array();
	}

	public function toExcell()
	{
		$query = $this->db->get('signups');
		return $query->result_array();
	}
}