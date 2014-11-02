<?php 

/**
* 
*/
class Notification extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == null) {
			redirect('home');
		}
	}

	public function fetch_unread() {
		$this->load->model('notification_m');
		$id = $this->session->userdata('id');
		header('Content-type: application/json');
		echo json_encode($this->notification_m->fetch_unread($id));
	}

	public function mark_read() {
		$ids = $this->input->post('ids');
		
		$this->load->model('notification_m');
		echo $this->notification_m->mark_read(explode(',', $ids));

	}

	public function set() {
		$user_id = $this->input->post('user_id');
		$message = $this->input->post('message');
		$this->load->model('notification_m');
		echo $this->notification_m->set($user_id, $message);
	}
}

?>