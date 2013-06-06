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

	/*
	public function set_faq()
	{
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('question'), 'dash', TRUE);

		$data['faq_item'] = $this->faq_model->get_faq($slug);

		if (empty($data['faq_item'])) // News item DOESN'T exitst!
		{
			$data = array(
			'question' => $this->input->post('question'),
			'slug' => $slug,
			'answer' => $this->input->post('answer')
			);
		
			/*return *//*$this->db->insert('faq', $data);
			return "success";
		}
		else // News item DOES exitst!
		{
			return "error";
		}	*/	
	
}