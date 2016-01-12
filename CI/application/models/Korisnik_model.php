<?php

class Korisnik_model extends CI_Model {
	
	function getKorisnici($id = FALSE) {
		
		if($id === FALSE) {
			
			$this->db->select('k.sifra_korisnika, k.ime, k.prezime, s.naziv_sobe');
			$this->db->from('KORISNIK k');
			$this->db->join('SOBE s', 's.sifra_sobe = k.sifra_sobe');
			$this->db->where('k.sifra_statusa', 1);
			$query = $this->db->get();
			
		} else {
			
			//$sql = "SELECT * FROM KORISNIK WHERE sifra_korisnika = ? "; 
			//$q = $this->db->query($sql, $id);
			
			$this->db->select('k.sifra_korisnika, k.ime, k.prezime, k.OIB, k.datum_rodjenja, k.dijagnoza, s.naziv_sobe');
			$this->db->from('KORISNIK k');
			$this->db->join('SOBE s', 's.sifra_sobe = k.sifra_sobe');
			$this->db->where('k.sifra_korisnika', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		if($query -> num_rows() > 0) {
			
			foreach($query->result() as $row) {
				
				$data[] = $row;
			}
			
			return $data;
		}
		
	}
	
	function getBivsiKorisnici() {
		
		$this->db->select('k.sifra_korisnika, k.ime, k.prezime, s.naziv_sobe');
		$this->db->from('KORISNIK k');
		$this->db->join('SOBE s', 's.sifra_sobe = k.sifra_sobe');
		$this->db->where('k.sifra_statusa', 2);
		$query = $this->db->get();
		
		if($query -> num_rows() > 0) {
			
			foreach($query->result() as $row) {
				
				$data[] = $row;
			}
			
			return $data;
		}
		
	}
	
	function getSobaFromID($id) {
		$this->db->select('sifra_sobe');
		$this->db->from('KORISNIK');
		$this->db->where('sifra_korisnika', $id);
		$query = $this->db->get();
		return $query->row('sifra_sobe');
		
	}
	
	public function updateKorisnik($id, $data) {
	
		$this->db->where('sifra_korisnika', $id);
		$this->db->update('KORISNIK', $data);
	}
	
	public function setKorisnik($data) {
		
		$query = $this->db->insert('KORISNIK', $data);
		return $query;
	}
	
}