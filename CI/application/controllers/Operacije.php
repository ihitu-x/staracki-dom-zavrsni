<?php
include_once (dirname(__FILE__) . "/Kalendar.php");

class Operacije extends Kalendar {	//Kontroler OPERACIJE nadljeđuje kontroler KALENDAR

	public function __construct() {
		
		parent::__construct();
		$this->load->model('Korisnik_model');
		$this->load->model('Sobe_model');
		$this->load->model('Vrsta_model');
		$this->load->model('Operacije_model');
		$this->load->model('Onk_model');
		$this->load->model('Djelatnik_model');
		
	}
	
	/*
		Funkcija pokreće view u kojem se nalazi forma za unos novih Operacija u bazu podataka.
	*/
	public function upisOperacije() {
		
		$data['vrsta'] = $this->Vrsta_model->getVrsta();
		$data['title'] = 'UPIS NOVE OPERACIJE';
		
		$this->load->view('templates/header');
		$this->load->view('upisOperacije', $data);
		$this->load->view('templates/footer');
	}
	
	/*
		Funkcija se pokreće prilikom potvrde unosa nove operacije.
		Vrši se validacija podataka, a potom upis u bazu ukoliko su podaci ispravno unešeni.
	*/
	public function unosOperacije() {
	
		$this->form_validation->set_rules('vrsta', 'Vrsta', 'required',
			array(
				'required'	=> 'Niste oznacili vrstu'
			));
			
		$this->form_validation->set_rules('naziv', 'Naziv', 'required',
			array(
				'required' =>	'Niste upisali naziv'
			));
		
		if($this->form_validation->run() === FALSE ) {
		
			$this->upisOperacije();
		} else {
			
			$data = array(
				'vrsta' 			=> $this->input->post('vrsta'),
				'naziv_operacije' 	=> $this->input->post('naziv'),
				'opis'				=> $this->input->post('opis')
			);
			
			$this->Operacije_model->setOperacija($data);
			$this->load->view('uspijeh');	
		}
	
		
	}
	
	
	/*
		funkcija prima jedan argument (pregled ili zahvat) te na temelju tog argumenta 
		vrši dohvat određenih podataka iz baze (pregleda ili zahvata). Također funkcija vrši dohvat
		svih korisnika iz baze i potom prikazuje formu za unos novih pregleda ili zahvata u kalendar.
	*/
	public function upisOperacijeUKalendar($vrsta = null) {
	
		if(isset($vrsta)) {	
			if($vrsta == 'pregled') $data['vrsta'] = 'pregled'; // ako se unosi pregled, potrebn je u formi omogućiti unops vremena
			$data['operacije'] = $this->Operacije_model->getOperacije($vrsta);
		} else {
			$data['operacije'] = $this->Operacije_model->getOperacije();
		}
		
		$data['korisnici'] = $this->Korisnik_model->getKorisnici();
	
		$this->load->view('templates/header');
		$this->load->view('operacijaUKalendar', $data);
		$this->load->view('templates/footer');
	}
	
	/*
		Validacija i unos ONK.
		Nakon se poziva funkcija prikaz() koja je nadljeđena iz klase KALENDAR
	*/
	public function unosOperacijeUKalendar() {
		
		// KORISNIK
		$this->form_validation->set_rules('korisnik','Korisnik','required|greater_than[0]',
			array(
				'greater_than'	=> 'Niste odabrali Korisnika'
			));
		
		// Pregled ili Zahvat
		$this->form_validation->set_rules('operacija','Operacija','required|greater_than[0]',
			array(
				'greater_than'	=> 'Niste odabrali Operaciju'
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
			
			$this->upisOperacijeUKalendar('zahvat');
		} else {
	
				// Formiranje DATUMA za unos u bazu podataka!
				$datum = $this->input->post('yyyy').'-'.
						 $this->input->post('mm').'-'.
						 $this->input->post('dd');
	
			$data = array(
				'sifra_korisnika' => $this->input->post('korisnik'),
				'sifra_operacije' => $this->input->post('operacija'),
				'datum'			  => $datum,
				'vrijeme'		  => $this->input->post('hh'),	
				'izvrsenost'      => 0
			);
		
		$this->Onk_model->setOnk($data);
		$this->prikaz();
				
		}
		
	}
	
	public function opisOperacije($id) {
	
		$data['operacija'] = $this->Onk_model->getOnkZaKorisnika($id);
		$data['djelatnici'] = $this->Djelatnik_model->getDjelatnik();
		$data['title'] = 'OPIS OPERACIJE';
		
		$this->load->view('templates/header');
		$this->load->view('opisOperacije', $data);
		$this->load->view('templates/footer');
	}
	
	public function unosOpisaOperacije() {
	
		if($this->input->post('operacijaIzvrsena') == 'izvrseno') {
		
			$data = array();
			if($this->input->post('djelatnik') != null) {
				$data['sifra_djelatnika'] = $this->input->post('djelatnik');
			} else {
				$data['sifra_djelatnika'] = 0;
			}
			
			$data['opis'] = $this->input->post('opis');
			$this->Onk_model->updateOnk($this->input->post('id'), $data);
			$this->prikaz();
		}
	}
}




