<?php

// constructor, loads the database, the parser library and the file helper. 
class Xmlparser_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
		$this->load->library('parser');
		$this->load->helper('file');
		$this->load->library('session');
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
		'datee' => (string)$course->datee,
		'year' => (int)$course->year
		);
		
		$this->db->insert('xml', $data);	
		}
		
	}
}