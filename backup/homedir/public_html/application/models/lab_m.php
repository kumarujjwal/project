<?php


/**
* 
*/
class Lab_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add($id) {
		$this->db->set('lab_id', $id);
		return $this->db->insert('labs');
	}

	function get_all() {
		$this->db->from('users');
		$this->db->join('labs', 'labs.lab_id = users.id');
		return $this->db->get()->result_array();
	}

	function search_by_name($name_hint) {
		$this->db->from('users');
		$this->db->join('labs', 'users.id = labs.lab_id');
		$this->db->like('users.name', $name_hint);
		return $this->db->get()->result_array();
	}

	function get_by_username($username) {
		$this->db->from('users');
		$this->db->join('labs', 'labs.lab_id = users.id');
		$this->db->where('users.username', $username);
		return $this->db->get()->result_array();
	}

	function get_reports($id, $query) {
		$this->db->from('reports');
		$this->db->join('users', 'users.id = reports.u_for');
		$this->db->where('u_by', $id);
		$this->db->like('reports.rname', $query);
		$this->db->order_by('uploaded_on','desc');
		return $this->db->get()->result_array();
	}

	function get_from_email($email) {
		$this->db->from('users');
		$this->db->join('labs', 'labs.lab_id = users.id');
		$this->db->where('email', $email);

		$result = $this->db->get()->result_array();
	}

	function get_details($id) {
		$this->db->from('labs');
		$this->db->where('lab_id', $id);
		return $this->db->get()->result_array();
	}

	function get_patient_details( $id,$email) {
		$this->db->from('users');
		$this->db->where_in('id', "SELECT u_for from reports WHERE u_by = '$id'");
		$this->db->where('users.email', $email);
		return $this->db->get()->result_array();
	}
}

?>