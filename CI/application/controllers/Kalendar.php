<?php

class Kalendar extends CI_Controller {

	/*
		funkcija koja služi za generiranje i prikaz kalendara sa određenim datumom.
	*/
	public function prikaz ($year = null, $month = null, $day = null) {
	
		if(!$year) {
			$year = date('Y');
		}
		
		if(!$month) {
			$month = date('m');	
		}
		
		if(!$day) {
			$day = date('d');
		}
	
		$this->load->model('Kalendar_model');
		$data['kalendar'] = $this->Kalendar_model->generate($year, $month);
		$data['year']  = $year;
		$data['month'] = $month;
		$data['onk'] = $this->Kalendar_model->getCalendarData($year, $month, $day);
		
		$this->load->view('templates/header');
		$this->load->view('kalendarView', $data);
		$this->load->view('templates/footer');
	}
	
	// pomocna funkcija za prikaz kalendara
	public function prikazPonovo() {
				
		//$this->prikaz($this->input->post('year'),$this->input->post('month'),$this->input->post('day'));
		$this->load->model('Kalendar_model');
		$data['onk'] = $this->Kalendar_model->getCalendarData($this->input->post('year'), $this->input->post('month'), $this->input->post('day'));
        $this->load->view('kalendarTablica', $data);

 	}
	
	
}