<?php

class EntryModel extends CI_Model {
	//table name
	private $tbl_entry= 'tbl_entry';

	function Entry(){
		parent::__construct();
	}
	// get number of entries in database
	function count_all(){
		return $this->db->count_all($this->tbl_entry);
	}
	//get entries with paging
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tbl_entry, $limit, $offset);
	}
	//get entry by id
	function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->tbl_entry);
	}
	//add new entry
	function save(){
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
			);
		$this->db->insert('tbl_entry',$data);
	}
	//update entry by id
	function update($id){
		$entry = array('title' => $this->input->post('title'),
						'content' => $this->input->post('content'));
		$this->db->where('id', $id);
		$this->db->set('tbl_entry', $entry);
		$this->db->insert('tbl_entry');
	}
	//delete entry by id
	function delete($id, $entry){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_entry);
	}

	// //probeersel
	// function get_all_posts()
	// {
	// 	//get all entry
	// 	$query = $this->db->get('tbl_entry');
	// 	return $query->result();
	// }
}

?>