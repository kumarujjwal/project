<?php


/**
* 
*/
class Patient_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add($id) {
		$this->db->set('patient_id', $id);
		return $this->db->insert('patients');
	}

	function get_id_from_email($email) {
		$this->db->from('users');
		$this->db->join('patients', 'patients.patient_id = users.id');
		$this->db->where('email', $email);

		$result = $this->db->get()->result_array();
		if (sizeof($result) == 1) {
			return $result[0]['id'];
		}
		else {
			return null;
		}
	}

	function get_from_email($email) {
		$this->db->from('users');
		$this->db->join('patients', 'patients.patient_id = users.id');
		$this->db->where('email', $email);

		$result = $this->db->get()->result_array();
	}

	function get_reviews($id) {

		$this->db->select('users.username', 'd_username');
		$this->db->select('reports.rname', 'rname');
		$this->db->select('reports.fname', 'fname');
		$this->db->select('reviews.id', 'rid');

		$this->db->from('reviews');
		$this->db->join('reports', 'reviews.r_id = reports.id');
		$this->db->join('users', 'users.id = reviews.d_id');
		$this->db->where('reports.u_for', $id);
		return $this->db->get()->result_array();
	}

	function get_reports($id, $query) {
		$this->db->select('reports.id as id');
		$this->db->select('reviews.id as rid');
		$this->db->select('reports.rname', 'rname');
		$this->db->select('reports.fname', 'fname');
		$this->db->select('reviews.comments', 'comments');
		$this->db->select('reports.uploaded_on', 'on');
		$this->db->select('reviews.reviewed');
		$this->db->select('users.name as d_name');



		$this->db->from('reports');
		$this->db->join('reviews', 'reports.id = reviews.r_id', 'left');
		$this->db->join('users', 'reviews.d_id = users.id', 'left');
		$this->db->where('u_for', $id);
		$this->db->like('reports.rname', $query);
		$this->db->order_by('reports.uploaded_on', 'desc' );
		return $this->db->get()->result_array();
	}

	function get_all() {
		$this->db->from('users');
		$this->db->join('patients', 'users.id = patients.patient_id');
		return $this->db->get()->result_array();
	}

	function get_by_username($username) {
		$this->db->from('users');
		$this->db->join('patients', 'patients.patient_id = users.id');
		$this->db->where('users.username', $username);
		return $this->db->get()->result_array();
	}

	function search_by_name($name_hint) {
		$this->db->from('users');
		$this->db->join('patients', 'users.id = patients.patient_id');
		$this->db->like('users.name', $name_hint);
		return $this->db->get()->result_array();
	}

	function get_details($id) {
		$this->db->from('patients');
		$this->db->where('patient_id', $id);
		return $this->db->get()->result_array();
	}

	function get_lab_doctor_details($id, $email) {
		$lab_query = "SELECT * FROM users WHERE users.id in 
		(SELECT u_by FROM reports INNER JOIN labs ON labs.lab_id = reports.u_by WHERE u_for=?) AND users.email LIKE '%".$email."%'";
		$doc_query = "SELECT * FROM users WHERE users.id in (SELECT reviews.d_id FROM reviews INNER JOIN reports ON reports.id = reviews.r_id WHERE reports.u_for=?)
		AND users.email LIKE '%".$email."%'";
		$query = $lab_query . " UNION " . $doc_query . ";";
		return $this->db->query($query, array($id, $id))->result_array();
	}


}

?>