<?php

/**
* 
*/
class Reports_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/*
	* Creates an entry in reports table and returns the inserted id
	*/
	function upload_report($by, $for, $fname, $rname) {
		$this->db->set('u_by', $by);
		$this->db->set('u_for', $for);
		$this->db->set('fname', $fname);
		$this->db->set('rname', $rname);
		$this->db->insert('reports');
	}

}

?>