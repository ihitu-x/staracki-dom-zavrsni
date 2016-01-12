<?php

class Admin extends CI_Controller {

	
	public function __construct() {
	
		parent::__construct();
		$this->isLoggedIn();
	}
	
	public function adminArea() {
	
		$this->load->view('adminView');
	}
	
	public function isLoggedIn() {
	
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true) {
		
			echo 'Nemate dopuštenje biti na ovoj stranici! <a href="../login">Login</a>';
			die();
		} else {
		
			$this->load->model('Djelatnik_model');
		}
	}
	
	
	public function prikazDjelatnika() {
	
		$data['prikaz'] = true;
		$data['djelatnici'] = $this->Djelatnik_model->getDjelatnik();
		
		$this->load->view('adminView', $data);
	}
	
	public function upisDjelatnika() {
	
		$data['upis'] = true;
		$this->load->view('adminView', $data);
	}
	
	public function unosDjelatnika() {
	
		$data = array(
			'ime_djelatnika' => $this->input->post('ime'),
			'prezime_djelatnika' => $this->input->post('prezime')
		);
	
		$this->Djelatnik_model->setDjelatnik($data);
		$this->prikazDjelatnika();
	}
	
	public function brisanjeDjelatnika() {
	
		$this->load->model('Djelatnik_model');
		$this->Djelatnik_model->deleteDjelatnik();
		$this->prikazDjelatnika();
	}
}