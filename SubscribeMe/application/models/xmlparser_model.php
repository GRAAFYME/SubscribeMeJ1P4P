<?php
class Xmlparser_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library('parser'); // Load library(s)

		$this->load->helper('file'); // Load helper(s)
	}

	// Inserts the data in XML file into the DB
	public function insert()
	{
		$data = get_filenames("uploads");
		$file = end($data);
		$xml = simplexml_load_file("uploads/".$file);
		foreach($xml as $course)
		{
		
			$this->db->select('short_name');
			$this->db->from('courses');
			$this->db->where('short_name', (string)$course->name);
			$d = $this->db->get();

			if($d->num_rows() > 0)
			{
				$data = array(
					'course_name' => (string)$course->name,
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

				$this->db->select('short_name');
				$this->db->from('courses');
				$this->db->where('short_name', (string)$course->name);
				$a = $this->db->get();
				$b = $a->row_array();
				$c = $b['short_name'];

				 $data = array(
					'course_name' => (string)$c,
					'year' => (int)$course->year,
					'period' => (int)$course->period,
					'test' => (string)$course->toets
					);
				$this->db->insert('tests', $data);
			}
		}
	}
}