<?php

/**
* 
*/
class User_m extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	/*
		Register the user
	*/
	function register($username, $email, $password, $name, $type) {
		$this->db->set('email', $email);
		$this->db->set('password', $password);
		$this->db->set('username', $username);
		$this->db->set('name', $name);
		$this->db->set('type', $type);

		return $this->db->insert('users', $this);
	}

	/*
		Login the user and set session variables
	*/
	function login($email, $password) {
		$this->db->select('name');
		$this->db->select('username');
		$this->db->select('type');
		$this->db->select('id');

		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get('users')->result_array();
	}

	/*
		Returns true if a user is already registerd with the email
	*/
	function email_exists($email) {
		$this->db->from('users');
		$this->db->where('email', $email);

		return (bool) $this->db->count_all_results();
	}

	/*
	* Returns true if the username exists
	*/
	function user_exists($username) {
		$this->db->from('users');
		$this->db->where('username', $username);
		return (bool) $this->db->count_all_results();
	}

}

?>