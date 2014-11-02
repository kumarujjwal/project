<?php

/**
* 
*/
class Upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	/*
	* Upload action
	*/
	public function lab_uploadreport() {

		if ($this->session->userdata('username') == null || 
			$this->session->userdata('type') != 'LAB') {
			redirect('/user/login');
		}

		$email = $this->input->post('email');
		$rname = $this->input->post('rname');

		$this->load->model('patient_m');
		$pid = $this->patient_m->get_id_from_email($email);
		
		if (is_null($pid)) {
			redirect('/home');
		}
		else {
			$this->upload_report($this->session->userdata('id'), $pid, $rname);
			$message = $this->session->userdata('username') . ' uploaded a report named ' . $rname . ' for you';
			$this->load->model('notification_m');
			$this->notification_m->set($pid, $message);
			$this->send_email($email, $message, 'Report Uploaded by Lab');
			redirect('/home');
		}
	}

	public function patient_uploadreport() {
		if ($this->session->userdata('username') == null || 
			$this->session->userdata('type') != 'PATIENT') {
			redirect('/login');
		}

		$rname = $this->input->post('rname');
		$id = $this->session->userdata('id');
		$this->upload_report($id, $id, $rname);
	}


	private function upload_report($by, $for, $rname) {
		$id = $this->session->userdata('id');
		$config['upload_path'] = './reports/';
		$config['allowed_types'] = 'pdf|jpeg|png|gif|doc|ppt|jpg';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload()) {
			var_dump($this->upload->display_errors());
		}
		else {
			$result = $this->upload->data();
			if (is_array($result)) {
				$fname = $result['file_name'];
				$this->load->model('reports_m');
				$this->reports_m->upload_report($by, $for, $fname, $rname);
				//redirect('/home');
			}
			else {
				redirect('/home');
			}
		}
	}

	public function index() {
		if ($this->session->userdata('username') == null || 
			$this->session->userdata('type') == 'DOCTOR') {
			redirect('/user/login');
		}

		if ($this->session->userdata('type') == 'PATIENT') {
			$this->load->view('user/upload');	
		}

		else if ($this->session->userdata('type') == 'LAB') {
			$this->load->view('lab/upload');	
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