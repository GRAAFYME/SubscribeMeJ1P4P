<?php

class Membership_model extends CI_Model {

	public function __construct()
	{
		define("_SECURE_",time());
		include_once('./application/config/ldapconfig.php');
	}

	//validates the user input with the database, if the number of rows equils 1 this function will return true to the controller
	function validate() {
		$admincheck = explode('_', $this->input->post('username'));
		if($admincheck[0] == "admin")
		{
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password',md5($this->input->post('password')));
			$query = $this->db->get('users');

			if($query->num_rows == 1) 
			{
				return true;
			}
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$connection = @ldap_connect(_ldapServer_,_ldapPort_) or die(ldap_error());
			if($connection){
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, _ldapVersion_);
				ldap_bind($connection);
			}else{
				return false;
				die('Coud not connect to LDAP server');
			}

			$search = ldap_search($connection,_ldapDomains_,"uid=" . $username);
			$result = ldap_get_entries($connection,$search);
			$ldapUserString = $result[0]['dn'];
			$ldapResult = ldap_bind($connection,$ldapUserString,$password);
			$ldapAuthInfo = ($ldapResult? $result : false);

			if (count($ldapAuthInfo) > 1)
			{
				return true;
			}
			
			
			/*
			$connection = @ldap_connect('ldapmaster.nhl.nl',380) or die(ldap_error());
			if($connection)
			{
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
				ldap_bind($connection);
			}
			else
			{
				return false;
				die('Could not connect to LDAP server');
			}

			$search = ldap_search($connection,'o=Noordelijke Hogeschool Leeuwarden,c=nl',"uid=" . $username);
			$result = ldap_get_entries($connection,$search);
			$ldapUserString = $result[0]['dn'];
			$ldapResult = ldap_bind($connection,$ldapUserString,$password);
			$ldapAuthInfo = ($ldapResult? $result : false);
			if(count($ldapAuthInfo) > 1)
			{
				return true;
			}
			*/
		}
	}

	function getrole() {
		
		$admincheck = explode('_', $this->input->post('username'));
		if($admincheck[0] == "admin")
		{
			return "admin";
		}
		else
		{
			$username = $this->input->post('username');

			// get role from ldap.
			//return "student";
		
			$connection = @ldap_connect(_ldapServer_,_ldapPort_) or die(ldap_error());
			if($connection)
			{
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, _ldapVersion_);
				ldap_bind($connection);
			}
			else
			{
				return false;
				die('Coud not connect to LDAP server');
			}
			
			$master = _ldapDomains_;
			$dn = "ou=personeel," . $master; //ou=Engineering, ou=Techniek, 
			$filter = "uid=" . $username;
			$search = ldap_search($connection, $dn, $filter);
			$result = ldap_get_entries($connection, $search);
			if(count($result) == 1)
			{
				$master = _ldapDomains_;
				$dn = "ou=studenten," . $master; //ou=Engineering, ou=Techniek, 
				$filter = "uid=" . $username;
				$search = ldap_search($connection, $dn, $filter);
				$result = ldap_get_entries($connection, $search);
				if(count($result) == 1)
				{
					return "guest";
				}
				else
				{
					return "student";
				}
			}
			else
			{
				return "personeel";
			}
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