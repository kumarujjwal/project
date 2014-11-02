<?php

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if (null == $this->session->userdata('username')) {
			redirect('/user/login');
		}
	}

	public function index() {

		$query = $this->input->get('q');

		if ($this->session->userdata('type') == 'DOCTOR') {
			$this->load->model('doctor_m');
			$arr['data'] = $this->doctor_m->get_reviews($this->session->userdata('id'), $query);
			$this->load->view('doctor/home', $arr);
		}
		else if ($this->session->userdata('type') == 'PATIENT') {
			$this->load->model('patient_m');
			$data = $this->patient_m->get_reports($this->session->userdata('id'), $query);

			///var_dump($data);
			$arr = array();
			foreach ($data as $item) {
				if (array_key_exists($item['id'], $arr)) {
					array_push($arr[$item['id']], $item);
				}
				else {
					$arr[$item['id']] = [$item];
				}
			}

			$result['data'] = $arr;
			//var_dump($arr);
			$this->load->view('user/home', $result);
		}
		else if ($this->session->userdata('type') == 'LAB') {
			$this->load->model('lab_m');
			$arr['data'] = $this->lab_m->get_reports($this->session->userdata('id'), $query);
			$this->load->view('lab/home', $arr);
		}
	}
}

?>