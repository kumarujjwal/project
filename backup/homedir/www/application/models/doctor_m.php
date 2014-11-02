<?php

/**
* 
*/
class Doctor_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add($id) {
		$this->db->set('doctor_id', $id);
		return $this->db->insert('doctors');
	}

	function get_reviews($id, $query) {
		$this->db->select('users.username', 'p_username');
		$this->db->select('reviews.id as rid');
		$this->db->select('reports.rname', 'rname');
		$this->db->select('reports.fname', 'fname');
		$this->db->select('users.name');
		$this->db->select('reports.uploaded_on');
		$this->db->select('reviews.reviewed');
		$this->db->select('reviews.comments');

		$this->db->from('reviews');
		$this->db->join('reports', 'reports.id = reviews.r_id' );
		$this->db->join('users', 'users.id = reports.u_for');
		$this->db->where('reviews.d_id', $id);
		$this->db->like('reports.rname', $query);
		$this->db->order_by('reports.uploaded_on', 'desc');
		return $this->db->get()->result_array();
	}

	function get_all() {
		$this->db->from('users');
		$this->db->join('doctors', 'doctors.doctor_id = users.id');
		return $this->db->get()->result_array();
	}

	function search_by_name($name_hint) {
		$this->db->from('users');
		$this->db->join('doctors', 'users.id = doctors.doctor_id');
		$this->db->like('users.name', $name_hint);
		return $this->db->get()->result_array();
	}

	function get_by_username($username) {
		$this->db->from('users');
		$this->db->join('doctors', 'doctors.doctor_id = users.id');
		$this->db->where('users.username', $username);
		return $this->db->get()->result_array();
	}

	function get_from_email($email) {
		$this->db->from('users');
		$this->db->join('doctors', 'doctors.doctor_id = users.id');
		$this->db->where('email', $email);

		return $this->db->get()->result_array();
	}

	function get_from_username($username) {
		$this->db->from('users');
		$this->db->join('doctors', 'doctor.doctor_id = users.id');
		$this->db->where('users.username', $username);
		return $this->db->get()->result_array();
	}

	function get_details($id) {
		$this->db->from('doctors');
		$this->db->where('doctor_id', $id);
		return $this->db->get()->result_array();
	}

	function get_patient_details( $id,$email) {
		$query = "SELECT * FROM users WHERE users.id in 
		(SELECT u_for FROM reports INNER JOIN reviews ON reviews.r_id = reports.id WHERE d_id=?)
		AND users.email LIKE '%".$email."%';";
		return $this->db->query($query, array($id))->result_array();
	}
}

?>