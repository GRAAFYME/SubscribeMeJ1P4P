<?php
class Xmlparser_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
		$this->load->library('parser');
	}

	public function insert()
	{

	$xml = simplexml_load_file("uploads/test.xml");
	foreach($xml as $product)
		{
			
		$data = array(
		'name' => (string)$product->name,
		'price' => $product->price
		);
		
		$this->db->insert('xml', $data);	
		}
		
	}

	public function getxml()
	{
		$query =$this->db->get('xml');
		return $query->result_array();
	}
}