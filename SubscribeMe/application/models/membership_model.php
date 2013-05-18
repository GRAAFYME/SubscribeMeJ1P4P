<?php

class Membership_model extends CI_Model {
	//validates the user input with the database, if the number of rows equils 1 this function will return true to the controller
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('users');

		if($query->num_rows == 1) {
			return true;
		}
	}
	//stores the user input in the users table , the password will be hashed into the database
	function create_member() {

		$username = $this->input->post('username');

		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name'	 => $this->input->post('last_name'),
			'email'	     => $this->input->post('email'),
			'username'	 => $this->input->post('username'),
			'password'	 => md5($this->input->post('password'))
	    );

	    $insert = $this->db->insert('users', $new_member_insert_data);
	    return $insert;
	}


	
}