<?php

/**
* 
*/
class Public_profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index($id=null) {
		if (!$id) {
			redirect('/home');
		}

		// if ($this->session->userdata('username') != null && $id = $this->session->userdata('id')) {
		// 	redirect('/profile');
		// }

		$this->load->model('profile_m');
		$details = $this->profile_m->getDetails($id);
		//var_dump($details);
		if (is_array($details) && sizeof($details) != 0) {
			if ($details['type'] == 'PATIENT' &&
			($this->session->userdata('username') == null || 
				$this->session->userdata('type') != 'DOCTOR')) {
				$arr['error'] = 'Access Denied';
				$this->load->view('public_profile', $arr);
				
			} 
		}
		else {
			$arr['error'] = "User doesn't exist";
			$this->load->view('public_profile', $arr);
 		}

		$type = $this->session->userdata('type');

		switch ($type) {
			case 'DOCTOR':
				$this->load->model('doctor_m');
				$specific = $this->doctor_m->get_details($id);
				break;
			case 'PATIENT':
				$this->load->model('patient_m');
				$specific = $this->patient_m->get_details($id);
				break;
			case 'LAB':
				$this->load->model('lab_m');
				$specific = $this->lab_m->get_details($id);
				break;
			default:
				$specific = null;
				break;
		}
		if (is_null($specific)){
			$arr['error'] = 'Failed to fetch information';
		} 

		$arr['details'] = $details;
		$arr['specific'] = $specific;


		$this->load->view('public_profile', $arr);
	}
}


?>