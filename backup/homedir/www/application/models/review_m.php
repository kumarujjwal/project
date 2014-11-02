<?php

/**
* 
*/
class Review_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function send_for_review($d_id, $r_id) {
		$this->db->set('r_id', $r_id);
		$this->db->set('d_id', $d_id);
		return $this->db->insert('reviews');
	}

	function update($rid, $did, $comments) {

		$this->db->set('comments', $comments);
		$this->db->set('reviewed', TRUE);
		
		$this->db->where('id', $rid );
		$this->db->where('d_id', $did);
		return $this->db->update('reviews');
	}

	function get_meta_from_rid($rid) {

		$this->db->select('users.id as pid');
		$this->db->select('reports.rname as name');
		$this->db->select('users.email as p_email');

		$this->db->from('reviews');
		$this->db->join('reports', 'reports.id = reviews.r_id');
		$this->db->join('users', 'users.id = reports.u_for');
		$this->db->where('reviews.id', $rid);

		return $this->db->get()->result_array();
		
	}

}

?>