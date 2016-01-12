<?php

class Onk_model extends CI_Model {

	
	public function getOnk($id) {
		
		$this->db->select('k.ime, k.prezime, o.naziv_operacije, o.vrsta, sifra_onk, datum, vrijeme, izvrsenost');
		$this->db->from('OPERACIJA_NAD_KORISNIKOM n');
		$this->db->join('KORISNIK k', 'n.sifra_korisnika = k.sifra_korisnika');
		$this->db->join('OPERACIJA o', 'n.sifra_operacije = o.sifra_operacije');
		$this->db->where('k.sifra_korisnika', $id);
		$query = $this->db->get();
		
		if($query -> num_rows() > 0) {
			
			foreach($query->result() as $row) {
				
				$data[] = $row;
			}
			
			return $data;
		}	
	}
	
	public function getOnkZaKorisnika($id) {
	
		$this->db->select('k.ime, k.prezime, o.naziv_operacije, o.vrsta, sifra_onk, datum, opis_izvrsene_operacije, izvrsenost');
		$this->db->from('OPERACIJA_NAD_KORISNIKOM n');
		$this->db->join('KORISNIK k', 'n.sifra_korisnika = k.sifra_korisnika');
		$this->db->join('OPERACIJA o', 'n.sifra_operacije = o.sifra_operacije');
		$this->db->where('sifra_onk', $id);
		$query = $this->db->get();
		return $query->row();
		
	}
	
	public function setOnk($data) {
	
		$query = $this->db->insert('OPERACIJA_NAD_KORISNIKOM', $data);
		return $query;
	}
	
	public function updateOnk($id, $data) {
	
		if($data['sifra_djelatnika'] != null) {
	
			$query = 'UPDATE OPERACIJA_NAD_KORISNIKOM SET opis_izvrsene_operacije="'.$data['opis'].
				 	'", sifra_djelatnika = '.$data['sifra_djelatnika'].', izvrsenost= 1 WHERE sifra_onk = '.$id;
		} else {
			$query = 'UPDATE OPERACIJA_NAD_KORISNIKOM SET opis_izvrsene_operacije="'.$data['opis'].
				 	'", izvrsenost= 1 WHERE sifra_onk = '.$id;
		}
		$this->db->query($query);
	}
	
	
}