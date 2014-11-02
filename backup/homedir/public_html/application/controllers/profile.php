<?php 

class profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (null == $this->session->userdata('username')) {
			redirect('/user/login');
		}
	}

	public function index(){
		$id= $this->session->userdata('id');
		$this->load->model('profile_m');
		$data = $this->profile_m->getDetails($id);
		//print_r($data);
		if ($this->session->userdata('type') == 'DOCTOR') {
			$this->load->view('doctor/profile',$data);
		}
		else if ($this->session->userdata('type') == 'PATIENT') {
			$this->load->view('user/profile',$data);
		}
		else if ($this->session->userdata('type') == 'LAB') {
			$this->load->view('lab/profile',$data);
		}
	}

	public function saveChanges(){
		 $name = $this->input->post('name');
		 $addr1 = $this->input->post('addr1');
		 $addr2  = $this->input->post('addr2');
		 $city = $this->input->post('city');
		 $state = $this->input->post('state');
		 $pin = $this->input->post('pin');
		 $this->load->model('profile_m');
		 $this->profile_m->saveChanges($name,$addr1,$addr2,$city,$state,$pin);
		 //echo $name;
		 redirect('/profile');
	}
}