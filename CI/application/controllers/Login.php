<?php

class Login extends CI_Controller {


	public function index() {
	
		$this->load->view('templates/header');
		$this->load->view('loginView');
		$this->load->view('templates/footer');
	}
	
	public function validateCredentials() {
	
		$this->load->model('Djelatnik_model');
		$query = $this->Djelatnik_model->validateAdmin();
		
		if($query) {
		
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('admin/prikazDjelatnika');
		}
		
		else {
		
			$this->index();
		}
	}
	
	public function logout() {
	
		$this->session->sess_destroy();
		$this->index();
	}
}