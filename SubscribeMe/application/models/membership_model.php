<?php
class Membership_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		define("_SECURE_",time());
		include_once('./application/config/ldapconfig.php'); // Load ldapconfig.php
	}

	// Validates the user input with the database or LDAP, depends on the username
	function validate() {
		$localcheck = explode('_', $this->input->post('username'));
		if($localcheck[0] == "admin" || $localcheck[0] == "personeel" || $localcheck[0] == "student")
		{
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password',md5($this->input->post('password')));
			$query = $this->db->get('users');

			if($query->num_rows == 1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$connection = @ldap_connect(_ldapServer_,_ldapPort_) or die(ldap_error());
			if($connection)
			{
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, _ldapVersion_);
				ldap_bind($connection);
			}
			else
			{
				return false;
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
			else
			{
				return false;
			}
		}
	}

	// Gets and returns a role
	function getrole() {
		
		$localcheck = explode('_', $this->input->post('username'));
		if($localcheck[0] == "admin")
		{
			return "admin";
		}
		else if($localcheck[0] == "personeel")
		{
			return "personeel";
		}
		else if($localcheck[0] == "student")
		{
			return "student";
		}
		else
		{
			$username = $this->input->post('username');
		
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

	// Gets and returns a name
	function getname($user) {
		
		$username = $user;
		$localcheck = explode('_', $user);

		if($localcheck[0] == "admin" || $localcheck[0] == "personeel" || $localcheck[0] == "student")
		{
			$this->db->select('first_name');
			$this->db->select('last_name');
			$this->db->from('users');
			$this->db->where('username', $username);
			$name = $this->db->get();
			return $name->row_array();
		}
		else
		{		
			$connection = @ldap_connect(_ldapServer_,_ldapPort_) or die(ldap_error());
			if($connection)
			{
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, _ldapVersion_);
				ldap_bind($connection);
			}
			else
			{
				return false;
				die('Could not connect to LDAP server');
			}

			$dn = _ldapDomains_; //ou=voltijd,ou=Informatica BA,ou=Techniek,ou=studenten,
			$filter = "uid=" . $username;
			$search = ldap_search($connection, $dn, $filter) or die ("Search failed");
			$entries = ldap_get_entries($connection, $search);
			return $entries[0]["cn"][0];
		}		
	}

	// Gets and returns a email
	function getemail($user) {
		
		$username = $user;
		$localcheck = explode('_', $user);

		if($localcheck[0] == "admin" || $localcheck[0] == "personeel" || $localcheck[0] == "student")
		{
			$this->db->select('email');
			$this->db->from('users');
			$this->db->where('username', $username);
			$email = $this->db->get();
			return $email->row_array();
		}
		else
		{		
			// Get email from ldap
			$connection = @ldap_connect(_ldapServer_,_ldapPort_) or die(ldap_error());
			if($connection)
			{
				ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, _ldapVersion_);
				ldap_bind($connection);
			}
			else
			{
				return false;
				die('Could not connect to LDAP server');
			}
			$dn = _ldapDomains_; //ou=voltijd,ou=Informatica BA,ou=Techniek,ou=studenten,
			$filter = "uid=" . $username;
			$search = ldap_search($connection, $dn, $filter) or die ("Search failed");
			$entries = ldap_get_entries($connection, $search);
			return $entries[0]["mail"][0];
		}		
	}

	// Stores the user input in the users table , the password will be hashed into the database
	function create_member() 
	{
		$data['username'] = $this->db->get_where('users', array('username' => $this->input->post('username')))->row_array(); // Check if username already exists

		if (empty($data['username'])) // Username DOESN'T exitst -> insert new entry -> return true
		{
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'	 => $this->input->post('last_name'),
				'email'	     => $this->input->post('email'),
				'username'	 => $this->input->post('username'),
				'password'	 => md5($this->input->post('password'))
		    );

		    $this->db->insert('users', $new_member_insert_data);
		    return TRUE;
		}
		else
		{
			return FALSE;
		}
	}	
}