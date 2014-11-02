<?php

/**
* 
*/
class Review extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function send_for_review() {

		if ($this->session->userdata('username') == null ||
			$this->session->userdata('type') != 'PATIENT') {
			redirect('/home');
		}

		$email = $this->input->post('email');
		$r_id = $this->input->post('r_id');

		$this->load->model('review_m');
		$this->load->model('doctor_m');
		$doctor = $this->doctor_m->get_from_email($email);
		$d_id = null;
		if (is_array($doctor)) {
			if (sizeof($doctor) == 1) {
				$d_id = $doctor[0]['id'];
			}

		}

		if (is_null($d_id)) {
			redirect('/home');
		}

		if (!$this->review_m->send_for_review($d_id, $r_id)) {
			redirect('/home');
		}
		else {
			$this->load->model('notification_m');
			$message = $this->session->userdata('username') . ' sent a report for review';
			$this->notification_m->set($d_id, $message);	
			$this->send_email($email, $message, 'New Review');
			redirect('/home');
		}
	}

	public function update_review() {
		if ($this->session->userdata('username') == null ||
			$this->session->userdata('type') != 'DOCTOR') {
			redirect('/home');
		}

		$id = $this->input->post('id');
		$comments = $this->input->post('comments');

		$this->load->model('review_m');
		if (!$this->review_m->update($id, $this->session->userdata('id'), $comments)) {
			redirect('home');
		}
		else {
			$obj = $this->review_m->get_meta_from_rid($id);


			
			if (sizeof($obj) == 1) {
				$this->load->model('notification_m');
				$message = $this->session->userdata('username') . ' updated his review for report ' . $obj[0]['name'];
				$this->notification_m->set($obj[0]['pid'], $message);
				$this->send_email($obj[0]['p_email'], $message, 'Review Update');
			}
			redirect('home');
		}
	}

	private function send_email ($to, $message, $subject) {
		
		$this->email->from('no-reply@zeros.co.in');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	} 



}


?>