<?php

/**
* 
*/
class User extends CI_Controller
{
	
	/*
	* Register a new user
	*/
	public function register_action() {
		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$username = $this->input->post('username');

		$this->load->model('user_m');

		// Check if user already exists
		// If exists
		if ($this->user_m->email_exists($email)) {
			redirect('/user/register');
		}
		
		$result = $this->user_m->register($username, $email, $password, $name, $type);
		if (!$result) {
			//echo 'bro';
			redirect('/user/login');
		}
		else {
			if ($type == 'DOCTOR') {
				$this->load->model('doctor_m');
				$this->doctor_m->add($this->db->insert_id());
			}

			else if ($type == 'PATIENT') {
				$this->load->model('patient_m');
				$this->patient_m->add($this->db->insert_id());
			}

			else if ($type == 'LAB') {
				$this->load->model('lab_m');
				$this->lab_m->add($this->db->insert_id());
			}
		}
		redirect('/user/login');
	}

	/*
	* Logs the user in and sets up the user session
	*/
	public function login_action() {
		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}
		$email = $this->input->post('email');
		$password = $this->input->post('password');	

		$this->load->model('user_m');
		$user_array = $this->user_m->login($email, $password);
		if (sizeof($user_array) == 1) {
			$this->session->set_userdata(array(
					'username' => $user_array[0]['username'],
					'id' => $user_array[0]['id'],
					'type' => $user_array[0]['type'],
					'name' => $user_array[0]['name'],
				));
				redirect('/home');
		}
		else {
			redirect('/user/login');
		}
	}

	/*
	* prints true if username already exists
	* prints false otherwise
	*/
	public function user_exists() {
		$username = $this->input->post('username');
		$this->load->model('user_m');
		echo $this->user_m->user_exists($username);
	}

	/*
	* prints true if email exists
	* prints false otherwise
	*/
	public function email_exists() {
		$email = $this->input->post('email');
		$this->model->load('user_m');
		echo $this->user_m->user_exists($email);
	}

	/*
	* The Login Page
	*/
	public function login() {

		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}
		$this->load->view('login');
	}

	/*
	* The Registration page
	*/
	public function register() {
		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}	
		$this->load->view('register');
	}

	/*
	* Logs out a logged in user
	*/
	public function logout_action() {
		$this->session->sess_destroy();
		redirect('/user/login');
	}

	/*
	* Doctor Exists
 	*/

 	public function get_doctor_from_username() {
 		$username = $this->input->post('username');
 		$this->load->model('doctor_m');
 		$result =  $this->doctor_m->get_from_username($username);
 		if (is_array($result)) {
 			echo json_encode($result);
 		}
 	}

 	public function doctors() {
 		if ($this->session->userdata('username') == null ||
 			$this->session->userdata('type') == 'DOCTOR') {
 			redirect('user/login');
 		}

 		$query = $this->input->get('q');
 		$this->load->model('doctor_m');
 		$arr['data'] = $this->doctor_m->search_by_name($query);
 		$this->load->view('doctors', $arr);
 	}

 	public function labs() {
 		if ($this->session->userdata('username') == null ||
 			$this->session->userdata('type') == 'LABS') {
 			redirect('user/login');
 		}

 		$query = $this->input->get('q');
 		$this->load->model('lab_m');
 		$arr['data'] = $this->lab_m->search_by_name($query);
 		$this->load->view('labs', $arr);
 	}

 	public function patients() {
 		if ($this->session->userdata('username') == null ||
 			$this->session->userdata('type') == 'PATIENT') {
 			redirect('user/login');
 		}

 		$query = $this->input->get('q');
 		$this->load->model('patient_m');
 		$arr['data'] = $this->patient_m->search_by_name($query);
 		$this->load->view('patients', $arr);
 	}

 	public function search() {
 		if ($this->session->userdata('username') == null) {
 			redirect('user/login');
 		}

 		$email = $this->input->get('email');
 		if (is_null($email)) {
 			$this->load->view('search');
 		}
 		$id = $this->session->userdata('id');
 		$data = null;
 		switch ($this->session->userdata('type')) {
 			case 'DOCTOR':
 				$this->load->model('doctor_m');
 				$data = $this->doctor_m->get_patient_details($id, $email);
 				break;
 			case 'PATIENT':
 				$this->load->model('patient_m');
 				$data = $this->patient_m->get_lab_doctor_details($id, $email);
 				break;
 			case 'LAB':
 				$this->load->model('lab_m');
 				$data = $this->lab_m->get_patient_details($id, $email);
 				break;
 			default:
 				# code...
 				break;
 		}
 		$arr['data'] = $data;
 		$this->load->view('search', $arr);
 	}
}

?>