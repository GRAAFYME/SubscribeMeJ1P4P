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
	/*public function insert()
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
	*/

	public function insert()
	{
		$data = get_filenames("uploads");
		$file = end($data);
		$xml = simplexml_load_file("uploads/".$file);
		foreach($xml as $course)
		{
		
			$this->db->select('id');
			$this->db->from('courses');
			$this->db->where('short_name', (string)$course->name);
			$a = $this->db->get();

			if($a->num_rows() > 0)
			{
				$data = array(
					'course_name' => (int)$c,
					'year' => (int)$course->year,
					'period' => (int)$course->period,
					'test' => (string)$course->toets
					);
				$this->db->insert('tests', $data);
			}
			else
			{
				$courses = array (
					'short_name' => (string) $course->name,
					'full_name' => (string)$course->description
					);
				$this->db->insert('courses', $courses);

				$this->db->select('id');
				$this->db->from('courses');
				$this->db->where('short_name', (string)$course->name);
				$a = $this->db->get();
				$b = $a->row_array();
				$c = $b['id'];

				 $data = array(
					'course_name' => (int)$c,
					'year' => (int)$course->year,
					'period' => (int)$course->period,
					'test' => (string)$course->toets
					);
				$this->db->insert('tests', $data);
			}
		}
	}
}