<?php

class Korisnik extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->model('Korisnik_model');
		$this->load->model('Sobe_model');
		$this->load->model('Vrsta_model');
		$this->load->model('Operacije_model');
		$this->load->model('Onk_model');
		
	}
	
	/*
		Funkcija index prikazuje view popis svih korisnika.
		Argument novi je po defaultu false, a ako funkcija primi TRUE argument, znaci 
		da je unešen novi korisnik te da će se u view-u prikazati poruka "Korisnik uspješno unesen".
	*/
	
	public function index($novi = FALSE){
		
		$data['korisnici'] = $this->Korisnik_model->getKorisnici();
		$data['title'] = 'POPIS KORISNIKA';
		
		if($novi === TRUE) {
		
			$data['novi'] = 'Korisnik uspješno unesen.';
			$novi = FALSE;
		}
		
		$this->load->view('templates/header');
		$this->load->view('sviKorisnici', $data);
		$this->load->view('templates/footer');
	}
	
	/*
		Funkcija prima jedan argument, a to je id ili šifra korisnika. Preko modela dobija korisnika
		sa pripadajućom šifrom te sve operacije koje su se izvršile ili se trebaju
		izvršiti na tom korisniku. Nakon toga loada se view jedan Korisnik sa podatrcimo a istom.
	*/
	public function prikazJednogKorisnika($id){
		
		$data['korisnik'] = $this->Korisnik_model->getKorisnici($id);
		$data['onk'] = $this->Onk_model->getOnk($id);
		$data['sobe'] = $this->Sobe_model->promjenaSobe($this->Korisnik_model->getSobaFromID($id));
		
		$this->load->model('Status_model');
		$data['status'] = $this->Status_model->getStatus();
		
		if(empty($data['korisnik'])) {
			echo 'Korisnik Prazan';
		}
		
		$this->load->view('templates/header');
		$this->load->view('jedanKorisnik', $data);
		$this->load->view('templates/footer');
	}
	/*
		Funkcija pokreće view u kojem se nalazi forma za upis novog korisnika.
	*/
	public function upisKorisnika() {
		
		$data['sobe'] = $this->Sobe_model->getSobe();
		$data['title'] = 'UPIS NOVOG KORISNIKA';
		
		$this->load->view('templates/header');
		$this->load->view('upisKorisnika', $data);
		$this->load->view('templates/footer');
	}
	/*
		Funkcija koja se pokreće prilikom potvrde unosa novog korisnika.
		Prvo se vrši validacija podataka, a potom unos u bazu ukoliko su podaci ispavno unešeni.
	*/	
	public function unosKorisnika() {
		
		// IME
		$this->form_validation->set_rules('ime', 'Ime', 'required',
			array(
				'required'	=> 'Niste upisali Ime '
			));
			
		// PREZIME
		$this->form_validation->set_rules('prezime', 'Prezime', 'required',
			array(
				'required'	=> 'Niste upisali Prezime'
			));
			
		// OIB
		$this->form_validation->set_rules('oib', 'OIB', 'required|exact_length[11]',
			array(
				'required'		=> 'Niste upisali OIB',
				'exact_length'	=> 'Unesite tocan broj znamenki OIB-a (11)'
			));
			
		// DATUM
		$this->form_validation->set_rules('yyyy', 'YYYY', 'numeric',
			array(
				'numeric'	=> 'Niste upisali Godinu rođenja'
			));
		$this->form_validation->set_rules('mm', 'MM', 'numeric',
			array(
				'numeric'	=> 'Niste upisali Mjesec rođenja'
			));
		$this->form_validation->set_rules('dd', 'DD', 'numeric',
			array(
				'numeric'	=> 'Niste upisali Dan rođenja'
			));
		
		if($this->form_validation->run() === FALSE) {
			
			$this->upisKorisnika();
		} else {
				
				// Formiranje DATUMA za unos u bazu podataka!
				$datum = $this->input->post('yyyy').'-'.
						 $this->input->post('mm').'-'.
						 $this->input->post('dd');
				
				$data = array(
				'ime' => $this->input->post('ime'),
				'prezime' => $this->input->post('prezime'),
				'OIB' => $this->input->post('oib'),
				'datum_rodjenja' => $datum,
				'dijagnoza' => $this->input->post('dijagnoza'),
				'sifra_sobe' => $this->input->post('soba'),
				'sifra_statusa' => 1
			);
			
			$this->Sobe_model->dodajKrevet($this->input->post('soba'));
			$this->Korisnik_model->setKorisnik($data);
			$this->index(TRUE);
		}
	}
	
	public function izmjenaKorisnika() {
		
		$status = 1;
		if($this->input->post('status') != FALSE) {
			$status = $this->input->post('status');
		}
		
		if($this->input->post('soba') == 'soba') {
			$data = array(
				'sifra_statusa'		=> $status
			);
		} else {
			$data = array(
				'sifra_sobe' 		=> $this->input->post('soba'),
				'sifra_statusa'		=> $status
			);
		}
		
		$id = $this->input->post('sifra_korisnika');
			
		$this->Korisnik_model->updateKorisnik($id, $data);
		$this->index();
	}
	
	public function prikazBivsihKorisnika() {
	
		$data['korisnici'] = $this->Korisnik_model->getBivsiKorisnici();
		
		$this->load->view('adminView', $data);
	}
}




