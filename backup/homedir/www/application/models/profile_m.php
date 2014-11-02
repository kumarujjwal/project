<?php

/**
* 
*/
class Profile_m extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	public function getDetails($id){
		$this->db->from("users");
		$this->db->where("id = '$id' ");
		$data=$this->db->get()->result_array();
		if (is_array($data) && sizeof($data) == 1) {
			return $data[0];	
		}
		return array();
	}

	public function saveChanges($name,$addr1,$addr2,$city,$state,$pin){
		$this->db->set('name', $name);
		$this->db->set('addrline1', $addr1);
		$this->db->set('addrline2', $addr2 );
		$this->db->set('city',$city );
		$this->db->set('state', $state);
		$this->db->set('pin', $pin );
		$id=$this->session->userdata('id');
		$this->db->where("id",$id);
		return $this->db->update('users', $this);
	}
}