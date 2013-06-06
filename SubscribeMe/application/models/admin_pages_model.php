<?php

class Admin_pages_model extends CI_Model {
	//table name
	private $pages= 'pages';

	function Entry(){
		parent::__construct();
	}
	// get number of entries in database
	function count_all(){
		return $this->db->count_all($this->pages);
	}
	//get entries with paging
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->pages, $limit, $offset);
	}
	//get entry by id
	function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->pages);
	}
	//add new entry
	function save(){
		$data = array(
			'title' => $this->input->post('title'),
			'text' => $this->input->post('text')
			);
		$this->db->insert('pages',$data);
	}
	//update entry by id
	function update($id){
		$entry = array('title' => $this->input->post('title'),
						'text' => $this->input->post('text')
						);
		$this->db->where('id', $id);
		$this->db->update('pages', $entry);
		// $this->db->insert('admin_pages');
	}
	//delete entry by id
	function delete($id, $entry){
		$this->db->where('id', $id);
		$this->db->delete($this->pages);
	}
}

?>