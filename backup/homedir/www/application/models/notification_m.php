<?php

/**
* 
*/
class Notification_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function set($user_id, $message) {
		$this->db->set('user_id', $user_id);
		$this->db->set('message', $message);
		return $this->db->insert('notifications');
	}

	function mark_read($ids) {
		$data = array();
		foreach($ids as $id) {
			$temp = array();
			$temp['id'] = $id;
			$temp['read'] = TRUE;
			$data[] = $temp;
		}
		return $this->db->update_batch('notifications', $data, 'id');
	}

	function fetch_unread($id) {
		$this->db->from('notifications');
		$this->db->where('read', FALSE);
		$this->db->where('user_id', $id);
		$this->db->order_by('notif_on', 'desc');
		return $this->db->get()->result_array();
	}
}

?>