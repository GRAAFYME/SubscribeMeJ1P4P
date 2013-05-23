<?php

// constructor, loads the database, the parser library and the file helper. 
class Xmlparser_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
		$this->load->library('parser');
		$this->load->helper('file');
	}
//Gets the info from the latest uploaded file, and stores it into the xml database. 
	public function insert()
	{	
		$data = get_filenames("uploads");
		$file = end($data);
		$xml = simplexml_load_file("uploads/".$file);
		foreach($xml as $course)
		{
			
		$data = array(
		'name' => (string)$course->name,
		'description' => (string)$course->description,
		'datee' => (string)$course->datee
		);
		
		$this->db->insert('xml', $data);	
		}
		
	}
//Gets all the information from the xml table. 
	public function getxml()
	{
		$query =$this->db->get('xml');
		return $query->result_array();
	}
}